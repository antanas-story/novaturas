<?php

class Steps extends CI_Controller {
        private $jobId;
        private $job;
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Job_model');
            $this->jobId = $this->session->userdata("jobId");
            if($this->session->userdata("language")==false) {
                $this->session->set_userdata("language", "lt");
            }
            if($this->jobId==false || isset($_GET['newJob'])) {
                $this->jobId = $this->Job_model->insert();
                $this->session->set_userdata("jobId", $this->jobId);
                header("Location: ".  base_url().$this->session->userdata('language')."/create");
            }
            $this->job = $this->Job_model->fetch($this->jobId);
        }
	public function create($lang)
	{
            $data = array();
            $this->config->load('characters');
            $data["characters"] = $this->config->item('character_info');
            $data["canvas"] = $this->config->item('canvas');
            
            $this->load->helper("language_strings");
            $this->session->set_userdata("language", $lang);
            $data["lang"] = $lang;
            $data["s"] = getLanguageStrings($lang);
            $data["job"] = $this->job;
            $this->load->model('Job_model');
            $this->Job_model->update($this->jobId, array("lang"=>$lang));
            
            $this->load->view('templates/header', $data);
            $this->load->view('steps.php', $data);
            $this->load->view('templates/footer', $data);     
	}
        
        public function update(){
            $data["headline"] = $_POST['greeting']['headline'];
            $data["text"] = $_POST['greeting']['text'];
            $data["signedBy"] = $_POST['greeting']['signedBy'];
	    
            $this->load->model('Job_model');
            $this->Job_model->update($this->jobId, $data);
	    
	    if(is_array($_POST['avatars'])) {
		foreach($_POST['avatars'] as $which=>$info) {
		    if(is_array($info)) {
			$info["which"]=$which;
			$this->Job_model->updateFile($this->jobId, $info["filename"], $info);
		    } else {
			$this->Job_model->resetFile($this->jobId, $which);
		    }
		}
	    }
	    echo "done ".$this->Job_model->makePicture($this->jobId);;
        }
}