<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SMS extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	function Recive(){

		$this->load->library("Nusoap_lib");
		$soap = new SoapClient('http://87.107.52.147/wsdl?XML');
		if ($soap->Authentication('kianraya', '2486258'))
		{
			$proceed = 0;
			if (($new = $soap->HasUnread()) > 0)
			{
				while ($soap->HasUnread() > 0 AND $proceed < 20)
				{
					$message = $soap->RetrieveMessage();
					echo "From: $message->From<br />";
					echo "To: $message->To<br />";
					echo "$message->Message<br />";
					echo "Date: " . date('Y/m/d H:i:s', $message->Dateline) . "<br />";
					$proceed++;
				}

			}
			else
			{
				echo 'No new message.';
			}
		}
		else
		{
			echo 'Authentication failed!';
		}


	}

	function Send(){


		if (!$this->user_model->Secure(array('userType' => array('admin', 'user')))) {
			$this->session->set_flashdata('flashError', 'You most be logged into a valid admin OR user acount to access to this section');
			redirect('login');
		}

		$this->load->library("SMS_Sender");

		echo Send_SMS('kianraya', '2486258', '100002972', '09115427615', 'Hello World!', 0, false);

	}

	function timer(){


		$start = microtime(true);
		set_time_limit(60);
		for ($i = 0; $i < 59; ++$i) {
			echo $i;
			time_sleep_until($start + $i + 1);
		}
	}




}