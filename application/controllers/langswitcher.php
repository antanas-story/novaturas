<?php

class LangSwitcher extends CI_Controller {
	public function switchIt($language = "lt")
	{
            // TODO Remake Language String switcher to be cost-effective
            $allowed = array("lt", "en", "ru", "ee", "lv");
            if(in_array($language, $allowed)) {
                $this->session->set_userdata("language", $language);
                header("Location: ".base_url()."1st-step");
            }
	}
}