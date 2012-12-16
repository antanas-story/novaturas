<?php

class Uploader extends CI_Controller {
    private $jobId;

    public function __construct()
    {
        parent::__construct();

        $this->jobId = $this->session->userdata("jobId");
        if($this->jobId==false) {
            die();
        }
    }
    
    public function handle() {
        $allowedExtensions = array("jpeg", "jpg", "png", "gif");
        // max file size in bytes
        $sizeLimit = 10 * 1024 * 1024;

        $this->load->helper("qq_file_uploader");
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);

        // Call handleUpload() with the name of the folder, relative to PHP's getcwd()
        $result = $uploader->handleUpload('uploads/');
        if( isset($result["success"]) && $result["success"] ) {
            // if upload was successful
            $uploadedName = $uploader->getUploadName();
            $result["filename"] = $uploadedName;
            
            $this->load->model('Job_model');
            $this->jobId = $this->Job_model->addFile($this->jobId, $uploadedName);
        }
        echo json_encode($result);
    }
}
