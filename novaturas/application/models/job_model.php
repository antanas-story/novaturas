<?php
class Job_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function fetch($jobId, $field='id')
	{
            $q = $this->db->get_where("job", array($field=>$jobId));
            return $q->row_array();
	}
	public function insert()
	{
            do {
                $hash = substr(md5(time()), 0, 5);
                $query = $this->db->get_where("job", array('hash'=>$hash));
                $unique = ($query->num_rows() == 0);
                $unique = true;
            } while ( !$unique );
            
            $data = array(
                'hash'=>$hash,
                'started'=>date("Y-m-d H:i:s")
            );

            $this->db->insert('job', $data);
            return $this->db->insert_id();
	}
        public function update($jobId, $data) {
            return $this->db->update("job", $data, array("id"=>$jobId));
        }
        public function remove($jobId)
        {
            return $this->db->delete("job", array("id"=>$jobId));
        }	
        public function resetFile($jobId, $which) {
	    return $this->db->update("files", array("which"=>""), array("job"=>$jobId, "which"=>$which));
	}
        public function addFile($jobId, $filename, $which="") {
            return $this->db->insert("files", array("job"=>$jobId, "filename"=>$filename, "which"=>$which));
        }
	public function updateFile($jobId, $filename, $data) {
	    $updated = $this->db->update("files", $data, array("job"=>$jobId, "filename"=>$filename));
	    if($this->db->affected_rows() == 0) {
		$data["job"] = $jobId;
		$this->db->insert("files", $data);
	    }
	}
        public function deleteFile($jobId, $filename) {
            return $this->db->delete("files", array("job"=>$jobId, "filename"=>$filename));
        }
	public function fetchFiles($jobId) {
	    return $this->db->get_where("files", array('job'=>$jobId,'which !='=>""))->result_array();
	}
	public function makePicture($jobId) {
	    $q = $this->fetch($jobId);
	    $files = $this->fetchFiles($jobId);
	    $this->load->config("characters");
	    $characters = $this->config->item('character_info');
            $canvas = $this->config->item('canvas');
	    $width = $canvas["width"];
	    $height = $canvas["height"];
	
	    
	    $mainImage =imagecreatetruecolor($width,$height);
	    $bgColor = imagecolorallocate($mainImage, 255, 243, 198); //ff f3 c6
	    imagefill($mainImage, 0, 0, $bgColor);
	    $pngImage = imagecreatefrompng(FCPATH."imgs/example-postcard.png");
	    imagecopyresampled($mainImage,$pngImage,0,0,0,0, $width,$height,$width,$height);
	    
	    if(is_array($files)) {
		foreach($files as $data) {
		    if(!empty($data["cropped"])) {
			$ch = $characters[$data["which"]];
			//data:image/png;base64,
			$raw = base64_decode(substr($data["cropped"],22));
			$image = imagecreatefromstring($raw);
			if($image) {
			    echo "resampled ".imagecopyresampled(
				$mainImage, $image, 
				$ch["x"], $ch["y"],//$dst_x , $dst_y , 
				0, 0,//int $src_x , int $src_y ,
				$ch["scale"], $ch["scale"],//int $dst_w , int $dst_h ,
				$canvas["croppedSize"], $canvas["croppedSize"]//int $src_w , int $src_h
			    )." ";
			}
		    }
		}
	    }
	    
	    return imagejpeg($mainImage, FCPATH."i/{$q["hash"]}.jpg", 100);
	    
	}
}