<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service extends CI_Controller {
	var $nusoap_server;
	var $ns; //this is namespacefunction Soap_Member()
	
	public function __construct(){
	    parent::__construct();
        $this->load->library("Nusoap_lib");
        
	    $this->ns = base_url()."/service/";
	    $this->nusoap_server = new soap_server();
		$this->nusoap_server->configureWSDL("Service", $this->ns);
		$this->nusoap_server->wsdl->ports = array('ServicePort'=> array(
	    "binding" => "ServiceBinding",
	    "location" => $this->ns,
	    "bindingType"=> "http://schemas.xmlsoap.org/wsdl/soap/"
	    ));
	    
	    //login register
	    $this->nusoap_server->register(
	    "login",
	    array('userName'=>'xsd:string','Password'=>'xsd:string'),
		array('return' => 'xsd:string'),
	    "urn:Service",
	    "urn:".$this->ns."/login",
	    "rpc",
	    "encoded",
	    "Check user login"
	    );
	    
	    //Login functuon
		function login($username, $password) {
			
			$CI =& get_instance();
			
			if($CI->user_model->login(array('userEmail'=>$username,'userPassword'=>$password))){
				return "true";
			}
			return  "false";
		}
		
		
		//hello register
	    $this->nusoap_server->register(
	    "hello",
	    array('userName'=>'xsd:string','Password'=>'xsd:string'),
		array('return' => 'xsd:string'),
	    "urn:Service",
	    "urn:".$this->ns."/hello",
	    "rpc",
	    "encoded",
	    "hello to user"
	    );
	    
	    //hello functuon
		function hello($username, $password) {
			
			
			if($CI->user_model->login(array('userEmail'=>$username,'userPassword'=>$password))){
				return "hello ".$username;
			}
			return "no acess";
		}
		
	}
	
	function index()
	{
		$this->nusoap_server->service(file_get_contents("php://input"));
	}
	function webservice()
	{
		if($this->uri->rsegment(3) == "wsdl") {
			$_SERVER['QUERY_STRING'] = "wsdl";
		} else {
			$_SERVER['QUERY_STRING'] = "";
		}
		$this->nusoap_server->service(file_get_contents("php://input"));
	}
}
