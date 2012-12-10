<?php

class Steps extends CI_Controller {
        private $jobId;
        
        public function __construct()
        {
            parent::__construct();
            
            $this->jobId = $this->session->userdata("jobid");
            if($this->jobId==false) {
                $this->load->model('Job_model');
                $this->jobId = $this->Job_model->insert();
                $this->session->set_userdata("jobid", $this->jobId);
                header("Location: ".  base_url()."1st-step");
            }
            if($this->session->userdata("language")==false) {
                $this->session->set_userdata("language", "lt");
            }
        }
	public function first()
	{
            $this->config->load('characters');
            $data["characters"] = $this->config->item('character_info');
            $data["step"] = 1;
            $this->loadView("1st-step/main", $data);
	}
	public function second()
	{
            $data["step"] = 2;
            $this->loadView("2nd-step/main", $data);
	}
	public function third()
	{
            $data["step"] = 3;
            $this->loadView("3rd-step/main", $data);
	}
        
        private function loadView($view, $data = array())
        {
            $data = (array) $data;
            $this->load->helper("language_strings");
            $data["s"] = getLanguageStrings($this->session->userdata("language"));
            
            $this->load->view('templates/header', $data);
            $this->load->view($view, $data);
            $this->load->view('templates/footer', $data);            
        }
        
       public function upload() {
            $this->load->helper("language_strings");
            $s = getLanguageStrings($this->session->userdata("language"));
           
            $return = array("error"=>"", "data"=>"");
            $file_element_name = 'image';
             
            
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1024 * 3;
            $config['max_width']  = '5000';
            $config['max_height']  = '4000';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file_element_name)) {
                $return["error"] = $this->upload->display_errors(', ');
                $return["data"] = $s["other"]["error-pic-upload-failed"];
            } else {
                $return["data"] = $this->upload->data();
                $this->load->model('Job_model');
                $this->jobId = $this->Job_model->addFile($this->jobId, $return["data"]["file_name"], $_POST['which']);
                
            }
            //for security reason, we force to remove all uploaded file
            @unlink($_FILES[$file_element_name]);
            
            echo json_encode($return);
       }
}