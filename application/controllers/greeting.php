<?php

class Greeting extends CI_Controller {

	public function view($greeting = null)
	{
            if($greeting != null) {
                // TODO Show personalized greeting
                // check if it exists, else 404
                show_404();
                return;
            }
            
            $this->load->helper("language_strings");
            $data["s"] = getLanguageStrings("lt");
            $data["greeting"] = $greeting;
            
            $this->load->view('templates/header', $data);
            $this->load->view('greeting/main.php', $data);
            $this->load->view('templates/footer', $data);
            
	}
}