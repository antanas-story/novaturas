<?php
class Email_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function sendEmail($jobId, $to, $subject, $message, $from)
	{
            $status = $this->actualSend($to, $subject, $message, $from);
            
            $data = array(
                'job'=>$jobId,
                'sentOn'=>date("Y-m-d H:i:s"),
                'status'=>$status,
                'to'=>$to,
                'subject'=>$subject,
                'message'=>$message
            );

            $this->db->insert('email', $data);
            return $status;
	}
        
        protected function actualSend($to, $subject, $message, $from="info@novaturas.lt") {
            $headers = 
                'MIME-Version: 1.0' . "\r\n".
                'Content-type: text/html; charset=utf-8' . "\r\n".
                'From: '.$from . "\r\n" .
                'Reply-To: '.$from . "\r\n" .
                'X-Mailer: PHP/' . phpversion();        
            return mail($to, $subject, $message, $headers);                    
        }
        public function validateEmail($email) {
            if(preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $email)) {
                    list (, $domain)  = explode('@', $email);
                    if (checkdnsrr($domain, 'MX') || checkdnsrr($domain, 'A')) {
                        return true;
                    }
            }
            return false;
        }        

}