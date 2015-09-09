<?php
		require_once 'nusoap/nusoap.php';
		$soap = new soap_server();
		$soap->configureWSDL('MathService', 'http://www.tanguay.info');
		$soap->wsdl->schemaTargetNamespace =  'http://soapinterop.org/xsd/';

		$soap->register(
			'add',
			array('a'=>'xsd:int','b'=>'xsd:int'),
			array('sum'=>'xsd:int'),
			'http://soapinterop.org'
		);
		$soap->service(isset($HTTP_RAW_POST_DATA)?$HTTP_RAW_POST_DATA:'');
		
		function add($a=null,$b=null){
			if($a!=null && $b!=null && trim($a) != '' && trim($b)!=''){
				return $a+$b;
			}else{
				return new soap_fault('Client','','invalid parameter');
			}
		}
