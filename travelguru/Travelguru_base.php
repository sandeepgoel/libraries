<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* goibibo channel manager API
*
* @author    Sandeepandeep Goel
* @version   v0.0.1
* @copyright 2016
*/




class Travelguru_base{

		function send_request($xml,$method){

		
		$url='http://stage-api.travelguru.com/jagat-service-2.0/".$method."';
	    		
		//print_r($xml);
		//exit();
				
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
		$result = curl_exec($ch);
		if (curl_error($ch)) die("Connection Error: ".curl_errno($ch).' - '.curl_error($ch));
		curl_close($ch);
		
		return $result;
		
		/*
		Debug Output - Uncomment if needed to troubleshoot problems
		echo "<textarea rows=50 cols=100>Request: ".print_r($postfields,true);
		echo "\nResponse: ".htmlentities($jsondata)."\n\nArray: ".print_r($arr,true);
		echo "</textarea>";
		*/
	}	
}