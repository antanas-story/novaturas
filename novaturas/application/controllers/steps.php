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
	public function create($lang)
	{
            $data = array();
            $this->config->load('characters');
            $data["characters"] = $this->config->item('character_info');
            
            $this->load->helper("language_strings");
            $data["lang"] = $this->session->userdata("language");
            $data["s"] = getLanguageStrings($lang);
            
            $this->load->view('templates/header', $data);
            $this->load->view('steps.php', $data);
            $this->load->view('templates/footer', $data);     
	}
}