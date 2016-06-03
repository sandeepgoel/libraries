<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* WHMCS API
*
* @author    Joe Parihar
* @version   v0.0.1
* @copyright 2013
*/

class Expedia{	

	function __construct(){		
		$dir = APPPATH.'libraries';
		require_once "{$dir}/expedia/Expedia_base.php";
		require_once "{$dir}/expedia/Expedia_hotel.php";
		require_once "{$dir}/expedia/Expedia_booking.php";
		require_once "{$dir}/expedia/Expedia_offers.php";
		}

			
	/** Client Management **/

	function hotel_listing($hotelcode,$method,$propertytoken){
		return (new Goibibo_hotel)->goibibo_hotel_listing($hotelcode,$method,$propertytoken);
		
	}
	
	function inventory_update($hotelcode,$roomtypecode,$startdate,$enddate,$daysofweek,$minstay,$cutoff,$availability,$stopsell,$method,$propertytoken){
		return (new Goibibo_hotel)->goibibo_update_room_inventory($hotelcode,$roomtypecode,$startdate,$enddate,$daysofweek,$minstay,$cutoff,$availability,$stopsell,$method,$propertytoken);
		
	}

	function rate_update($hotelcode,$rateplan,$startdate,$enddate,$singlerackrate,$singlesellrate,$doublerackrate,$doublesellrate,$triplerackrate,$triplesellrate,$extrachildrate,$extraadultrate,$infantrate,$daysofweek,$contracttype,$currency,$stopsell,$method,$propertytoken){
		return (new Goibibo_hotel)->goibibo_update_room_rates($hotelcode,$rateplan,$startdate,$enddate,$singlerackrate,$singlesellrate,$doublerackrate,$doublesellrate,$triplerackrate,$triplesellrate,$extrachildrate,$extraadultrate,$infantrate,$daysofweek,$contracttype,$currency,$stopsell,$method,$propertytoken);
		
	}
	
	function get_room_inventory($hotelcode,$roomtypecode,$startdate,$enddate,$method,$propertytoken){
		return (new Goibibo_hotel)->goibibo_get_room_inventory($hotelcode,$roomtypecode,$startdate,$enddate,$method,$propertytoken);
		
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