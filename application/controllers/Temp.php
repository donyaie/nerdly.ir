<?php
class Temp extends CI_Controller {
	var $nusoap_server;
	var $ns = "http://127.0.0.1/projects/CodeIgniter/service/"; //this is namespacefunction Soap_Member()
	
	public function __construct(){
	    parent::__construct();
	    
        $this->load->library("Nusoap_lib");
        
	    $this->nusoap_server = new soap_server();
		$this->nusoap_server->configureWSDL("Service", $this->ns);
		$this->nusoap_server->wsdl->ports = array('ServicePort'=> array(
	    "binding" => "ServiceBinding",
	    "location" => $this->ns,
	    "bindingType"=> "http://schemas.xmlsoap.org/wsdl/soap/"
	    ));
		
	    //SOAP complex type return type (an array/struct)
		$this->nusoap_server->wsdl->addComplexType(
		    'user',
		    'complexType',
		    'struct',
		    'all',
		    '',
		    array(
		        'userId' => array('name' => 'id_user', 'type' => 'xsd:int'),
		        'UserEmail' => array('name' => 'fullname', 'type' => 'xsd:string'),
		        'UserType' => array('name' => 'level', 'type' => 'xsd:string')
		    )
		);
	    
	    $this->nusoap_server->register(
	    "login",
	    array('userName'=>'xsd:string','Password'=>'xsd:string'),
		array('return' => 'tns:user'),
	    "urn:Service",
	    "urn:".$this->ns."/login",
	    "rpc",
	    "encoded",
	    "Check user login"
	    );
		
		function login($username, $password) {
        return array(
			'userId'=>1,
			'UserEmail'=>'admin@admin',
			'UserType'=>'admin'
			);
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
