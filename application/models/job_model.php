<?php
class Job_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function fetch($jobId)
	{
            return $this->db->get_where("job", array('id'=>$jobId));
	}
	public function insert()
	{
		$data = array(
			'started' => date("Y-m-d H:i:s")
		);
		
		return $this->db->insert('job', $data);
	}
        public function addFile($jobId, $filename, $which="") {
            return $this->db->insert("files", array("job"=>$jobId, "filename"=>$filename, "which"=>$which));
        }
        public function deleteFile($jobId, $filename) {
            
        }
        public function remove($jobId)
        {
            $this->db->delete("jobs", array("id"=>$jobId));
        }
}