<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exel extends CI_Controller {

 	public function __construct(){
        parent::__construct();
    }
	
	public function index(){
		
	   $this->load->helper('php_excel');
	   $data_array =  array (
	   $data_array[] = array ("Oliver", "Peter", "Paul"),
	                    array ("Marlene", "Mica", "Lina")
	            ); 
	   $xls = new Excel_XML;
	   $xls->addArray ($data_array);
	   $xls->generateXML ( "output_name" );
	}

}

/* End of file exel.php */
/* Location: ./application/controllers/exel.php */