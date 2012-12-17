<?php

class Greeting extends CI_Controller {

	public function view($lang, $greeting = null)
	{
            $this->load->helper("language");
            if(!isLanguage($lang)) {
                show_404();
                return;
            }
            
            if($greeting != null) {
		if(strpos($greeting, ".jpg")!==false) {
		    $this->promptDownload($greeting);
		} else {
		}
                // TODO Show personalized greeting
                // check if it exists, else 404
            }
            
            $this->load->helper("language_strings");
            $data["s"] = getLanguageStrings($lang);
            $data["greeting"] = $greeting;
            $data["lang"] = $lang;
            
            $this->load->view('templates/header', $data);
            $this->load->view('greeting.php', $data);
            $this->load->view('templates/footer', $data);
            
	}
	
	protected function promptDownload($file) {
	    //Please give the Path like this
	    $file = FCPATH.'i/'.$file;

	    if (file_exists($file)) {
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.basename($file));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file));
		ob_clean();
		flush();
		readfile($file);
		exit;
	    } else {
		show_404();
	    }
	}
}