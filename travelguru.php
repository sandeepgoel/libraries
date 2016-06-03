<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* WHMCS API
*
* @author    Joe Parihar
* @version   v0.0.1
* @copyright 2013
*/

class Travelguru{	

	function __construct(){		
		$dir = APPPATH.'libraries';
		require_once "{$dir}/travelguru/Travelguru_base.php";
		require_once "{$dir}/travelguru/Travelguru_hotel.php";
		require_once "{$dir}/travelguru/Travelguru_booking.php";
		}

			
	/** Client Management **/

	function hotel_listing($cmpassword,$cmuser,$hotelcode,$startdate,$enddate,$method){
		return (new Travelguru_hotel)->travelguru_hotel_listing($cmpassword,$cmuser,$hotelcode,$startdate,$enddate,$method);
		
	}
	
	function hotel_getrates($cmpassword,$cmuser,$hotelcode,$classcode,$startdate,$enddate,$daysofweek,$rateplan,$roomcode,$rateclass,$method){
		return (new Travelguru_hotel)->travelguru_hotel_getrates($cmpassword,$cmuser,$hotelcode,$classcode,$startdate,$enddate,$daysofweek,$rateplan,$roomcode,$rateclass,$method);
		
	}

	function hotel_updaterate($cmpassword,$cmuser,$hotelcode,$rateplan,$type,$startdate,$enddate,$roomcode,$daysofweek,$unit,$minlos,$amountwithtax,$amoutwithouttax,$currency,$method){
		return (new Travelguru_hotel)->travelguru_hotel_updaterates($cmpassword,$cmuser,$hotelcode,$rateplan,$type,$startdate,$enddate,$roomcode,$daysofweek,$unit,$minlos,$amountwithtax,$amoutwithouttax,$currency,$method);
		
	}
	
	function update_room_inventory($cmpassword,$cmuser,$hotelcode,$available,$daysofweek,$startdate,$enddate,$roomcode,$stopsell,$method){
		return (new Goibibo_hotel)->travelguru_hotel_roominventoryupdate($cmpassword,$cmuser,$hotelcode,$available,$daysofweek,$startdate,$enddate,$roomcode,$stopsell,$method);
		
	}
	
	function get_room_rates($hotelcode,$rateplan,$startdate,$enddate,$contracttype,$method,$propertytoken){
		return (new Goibibo_hotel)->goibibo_get_room_rates($hotelcode,$rateplan,$startdate,$enddate,$contracttype,$method,$propertytoken);
		
	}
	
	function get_tax_info($hotelcode,$rateplan,$method,$propertytoken){
		return (new Goibibo_hotel)->goibibo_get_tax_information($hotelcode,$rateplan,$method,$propertytoken);
		
	}
	
	
	//BOOKING FUNCTIONS
	
	function get_cancelled_booking($hotelcode,$startdate,$enddate,$method,$propertytoken){
		return (new Goibibo_booking)->goibibo_get_cancelled_booking($hotelcode,$startdate,$enddate,$method,$propertytoken);
		
	}
	
	function get_booking_listing($hotelcode,$startdate,$enddate,$bookingtype,$bookingststus,$method,$propertytoken){
		return (new Goibibo_booking)->goibibo_get_booking_listing($hotelcode,$startdate,$enddate,$bookingtype,$bookingststus,$method,$propertytoken);
		
	}
	
	function update_booking_status($hotelcode,$bookingid,$method,$propertytoken){
		return (new Goibibo_booking)->goibibo_update_booking_status($hotelcode,$bookingid,$method,$propertytoken);
		
	}
	
	
	function get_booking_details($hotelcode,$bookingid,$method,$propertytoken){
		return (new Goibibo_booking)->goibibo_get_booking_details($hotelcode,$bookingid,$method,$propertytoken);
		
	}
	
	function get_cancelled_booking_listing($hotelcode,$startdate,$enddate,$method,$propertytoken){
		return (new Goibibo_booking)->goibibo_get_cancelled_booking_listing($hotelcode,$startdate,$enddate,$method,$propertytoken);
		
	}
	
}