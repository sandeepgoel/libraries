<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* goibibo channel manager API
*
* @author    Sandeepandeep Goel
* @version   v0.0.1
* @copyright 2016
*/




class Expedia_base{

		function send_request($xml,$method,$propertytoken){

		
		$url='http://ppin.goibibo.com/api/chmv2/'.$method.'/?bearer_token='.$propertytoken.'&channel_token=efcd34b6a1';
	    		
		//print_r($xml);
		//exit();
				
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
		$result = curl_exec($ch);
		if (curl_error($ch)) die("Connection Error: ".curl_errno($ch).' - '.curl_error($ch));
		curl_close($ch);
		
		return $result;
		
		
		//var_dump($result); // show output
		
		
		//return $arr = json_decode($jsondata); # Decode JSON String

		//print_r($arr); # Output XML Response as Array

		/*
		Debug Output - Uncomment if needed to troubleshoot problems
		echo "<textarea rows=50 cols=100>Request: ".print_r($postfields,true);
		echo "\nResponse: ".htmlentities($jsondata)."\n\nArray: ".print_r($arr,true);
		echo "</textarea>";
		*/
	}	
}