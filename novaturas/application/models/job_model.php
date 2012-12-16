<?php
class Job_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function fetch($jobId)
	{
            $q = $this->db->get_where("job", array('id'=>$jobId));
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
        public function addFile($jobId, $filename, $which="") {
            return $this->db->insert("files", array("job"=>$jobId, "filename"=>$filename, "which"=>$which));
        }
        public function deleteFile($jobId, $filename) {
            
            return $this->db->delete("files", array("job"=>$jobId, "filename"=>$filename));
        }
        public function update($jobId, $data) {
            return $this->db->update("job", $data, array("id"=>$jobId));
        }
        public function remove($jobId)
        {
            return $this->db->delete("job", array("id"=>$jobId));
        }
}