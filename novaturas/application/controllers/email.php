<?php

class Email extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
        }
	public function send()
	{
            $this->load->model("Email_model");
            $to = $_POST['sentTo'];
            if(!$this->Email_model->validateEmail($to))
                return 0;
            
            $jobId = $this->session->userdata("jobId");
            $this->load->model("Job_model");
            $this->Job_model->update($jobId, array("finished"=>date("Y-m-d H:i:s")));
            $job = $this->Job_model->fetch($jobId);
            
            $this->load->helper("language_strings");
            $strings = getLanguageStrings($this->session->userdata("language"));
            
            $from = $strings["3rd-step-share-it"]["email-sent-as"];
            $subject = $strings["3rd-step-share-it"]["email-subject"];
            $subject = str_replace("$1", $_POST['sentBy'], $subject);
            $message = $strings["3rd-step-share-it"]["email-text"];
            $message = str_replace("{link}", base_url().$job["hash"], $message);
            
            echo $this->Email_model->sendEmail($jobId, $to, $subject, $message, $from);
	}
        
}