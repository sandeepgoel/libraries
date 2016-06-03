<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* WHMCS API
*
* @author    Sandeep Goel
* @version   v0.0.1
* @copyright 2016
*/


require_once "Goibibo_base.php";
class Goibibo_booking{
	
	const NEW_LINE = "\n";
	
	//-------------------------------------------------------------

	/**
	* Get Cancelled booking
	*
	*  Parameters:
	*
	*	hotelcode 	// goibibo hotel id
	*   startdate 	//date format YYYY-MM-DD condition it must be present date or future and do no exceed 550 days from present date.
	*   enddate  	//date format YYYY-MM-DD condition it must be same as startdate or higher then it but do no exceed 550 days from present date.
	*   propertytoken  	//goibibo hotel authentication token
	*   method 	//url dynamic parameter
    * 
    */
	
	
	public function goibibo_get_cancelled_booking($hotelcode,$startdate,$enddate,$method,$propertytoken) {
		
		$xml = '<?xml version="1.0" encoding="UTF-8" ?>' . self::NEW_LINE;
		$xml .= '<Website Name="ingoibibo">' . self::NEW_LINE;
		$xml .= '<HotelCode>'.$hotelcode.'</HotelCode>' . self::NEW_LINE;
		$xml .= '<StartDate Format="yyyy-mm-dd">'.$startdate.'</StartDate>' . self::NEW_LINE;
		$xml .= '<EndDate Format="yyyy-mm-dd">'.$enddate.'</EndDate>' . self::NEW_LINE;
		$xml .= '</Website>' . self::NEW_LINE;
		
		return (new Goibibo_base)->send_request($xml,$method,$propertytoken);  
  	}
	
	//-------------------------------------------------------------

	/**
	* Get booking listing
	*
	*  Parameters:
	*
	*	hotelcode 	// goibibo hotel id
	*   startdate 	//date format YYYY-MM-DD condition it must be present date or future and do no exceed 550 days from present date.
	*   enddate  	//date format YYYY-MM-DD condition it must be same as startdate or higher then it but do no exceed 550 days from present date.
	*   bookingtype // type of booking you want to fetch
	*	bookingstatus // types stsus of booking to be fetch
	*	propertytoken  	//goibibo hotel authentication token
	*   method 	//url dynamic parameter
    * 
    */
	
	
	public function goibibo_get_booking_listing($hotelcode,$startdate,$enddate,$bookingtype,$bookingststus,$method,$propertytoken) {
		
		$xml = '<?xml version="1.0" encoding="UTF-8" ?>' . self::NEW_LINE;
		$xml .= '<Website Name="ingoibibo" HotelCode="'.$hotelcode.'">' . self::NEW_LINE;
		$xml .= '<StartDate Format="yyyy-mm-dd">'.$startdate.'</StartDate>' . self::NEW_LINE;
		$xml .= '<EndDate Format="yyyy-mm-dd">'.$enddate.'</EndDate>' . self::NEW_LINE;
		$xml .= '<BookingType '.$bookingtype.'></BookingType>' . self::NEW_LINE;
		$xml .= '<BookingStatus>'.$bookingststus.'</BookingStatus>' . self::NEW_LINE;
		$xml .= '</Website>' . self::NEW_LINE;
		
		return (new Goibibo_base)->send_request($xml,$method,$propertytoken);  
  	}
	
	
	//-------------------------------------------------------------

	/**
	* Update Booking status
	*
	*  Parameters:
	*
	*	hotelcode 	// goibibo hotel id
	*   bookingid	//	booking id
	*	propertytoken  	//goibibo hotel authentication token
	*   method 	//url dynamic parameter
    * 
    */
	
	
	public function goibibo_update_booking_status($hotelcode,$bookingid,$method,$propertytoken) {
		
		$xml = '<?xml version="1.0" encoding="UTF-8" ?>' . self::NEW_LINE;
		$xml .= '<Website Name="ingoibibo" HotelCode="'.$hotelcode.'">' . self::NEW_LINE;
		$xml .= '<BookingId>'.$bookingid.'</BookingId>' . self::NEW_LINE;
		$xml .= '</Website>' . self::NEW_LINE;
		
		return (new Goibibo_base)->send_request($xml,$method,$propertytoken);  
  	}
	
	//-------------------------------------------------------------

	/**
	* Get Booking details
	*
	*  Parameters:
	*
	*	hotelcode 	// goibibo hotel id
	*   bookingid	//	booking id
	*	propertytoken  	//goibibo hotel authentication token
	*   method 	//url dynamic parameter
    * 
    */
	
	
	public function goibibo_get_booking_details($hotelcode,$bookingid,$method,$propertytoken) {
		
		$xml = '<?xml version="1.0" encoding="UTF-8" ?>' . self::NEW_LINE;
		$xml .= '<Website Name="ingoibibo" HotelCode="'.$hotelcode.'">' . self::NEW_LINE;
		$xml .= '<BookingId>'.$bookingid.'</BookingId>' . self::NEW_LINE;
		$xml .= '</Website>' . self::NEW_LINE;
		
		return (new Goibibo_base)->send_request($xml,$method,$propertytoken);  
  	}
	
	
	//-------------------------------------------------------------

	/**
	* Get Cancelled booking listing
	*
	*  Parameters:
	*
	*	hotelcode 	// goibibo hotel id
	*   startdate 	//date format YYYY-MM-DD condition it must be present date or future and do no exceed 550 days from present date.
	*   enddate  	//date format YYYY-MM-DD condition it must be same as startdate or higher then it but do no exceed 550 days from present date.
	*   propertytoken  	//goibibo hotel authentication token
	*   method 	//url dynamic parameter
    * 
    */
	
	
	public function goibibo_get_cancelled_booking_listing($hotelcode,$startdate,$enddate,$method,$propertytoken) {
		
		$xml = '<?xml version="1.0" encoding="UTF-8" ?>' . self::NEW_LINE;
		$xml .= '<Website Name="ingoibibo" HotelCode="1000000136">' . self::NEW_LINE;
		$xml .= '<StartDate Format="yyyy-mm-dd">'.$startdate.'</StartDate>' . self::NEW_LINE;
		$xml .= '<EndDate Format="yyyy-mm-dd">'.$enddate.'</EndDate>' . self::NEW_LINE;
		$xml .= '</Website>' . self::NEW_LINE;
		
		return (new Goibibo_base)->send_request($xml,$method,$propertytoken);  
  	}
}