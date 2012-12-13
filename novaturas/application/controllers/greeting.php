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
}