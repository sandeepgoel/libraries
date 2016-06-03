<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* WHMCS API
*
* @author    Joe Parihar
* @version   v0.0.1
* @copyright 2013
*/


require_once "Goibibo_base.php";
class Goibibo_offers{
	
	const NEW_LINE = "\n";
		
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
	
	
	public function goibibo_create_offers($hotelcode,$startdate,$enddate,$method,$propertytoken) {
		
		$xml = '<?xml version="1.0" encoding="UTF-8" ?>' . self::NEW_LINE;
		$xml .= '<Website Name="ingoibibo" HotelCode="'.$hotelcode.'">' . self::NEW_LINE;
		$xml .= '<Offer>' . self::NEW_LINE;
		$xml .= '<BasicInfo>' . self::NEW_LINE;
		$xml .= '<HotelCode>'.$hotelcode.'</HotelCode>' . self::NEW_LINE;
		$xml .= '<RelatedTo type="rateplan">'.$rateplan.'</RelatedTo>' . self::NEW_LINE;
		$xml .= '<PromoText>'.$promoname.'</PromoText>' . self::NEW_LINE;
		$xml .= '<ContractType '.$contracttype.'></ContractType>' . self::NEW_LINE;
		$xml .= '</BasicInfo>' . self::NEW_LINE;
		$xml .= '<Conditions>' . self::NEW_LINE;
		$xml .= '<AdvancePurchase>' . self::NEW_LINE;
		$xml .= '<MaximumDays>'.$maximumdays.'</MaximumDays>' . self::NEW_LINE;
		$xml .= '</AdvancePurchase>' . self::NEW_LINE;
		$xml .= '<Booking>' . self::NEW_LINE;
		$xml .= '<BookingDate format="yyyy-mm-dd">' . self::NEW_LINE;
		$xml .= '<From>'.$bookingfromdate.'</From>' . self::NEW_LINE;
		$xml .= '<To>'.$bookingtodate.'</To>' . self::NEW_LINE;
		$xml .= '</BookingDate>' . self::NEW_LINE;
		$xml .= '</Booking>' . self::NEW_LINE;
		$xml .= '<CheckIn>' . self::NEW_LINE;
		$xml .= '<CheckInDate format="yyyy-mm-dd">' . self::NEW_LINE;
		$xml .= '<From>'.$checkinfromdate.'</From>' . self::NEW_LINE;
		$xml .= '<To>'.$checkintodate.'</To>' . self::NEW_LINE;
		$xml .= '</CheckInDate>' . self::NEW_LINE;
		$xml .= '</CheckIn>' . self::NEW_LINE;
		$xml .= '<BookingOnDaysOfWeek '.$bookingdaysofweek.'"></BookingOnDaysOfWeek>' . self::NEW_LINE;
		$xml .= '<CheckInOnDaysOfWeek '.$chekindaysofweek.'>' . self::NEW_LINE;
		$xml .= '<OnlyWhenAllDays>False</OnlyWhenAllDays>' . self::NEW_LINE;
		$xml .= '<StartDate Format="yyyy-mm-dd">'.$startdate.'</StartDate>' . self::NEW_LINE;
		$xml .= '<EndDate Format="yyyy-mm-dd">'.$enddate.'</EndDate>' . self::NEW_LINE;
		$xml .= '</Website>' . self::NEW_LINE;
		$xml .= '<Website Name="ingoibibo">' . self::NEW_LINE;
		$xml .= '<HotelCode>'.$hotelcode.'</HotelCode>' . self::NEW_LINE;
		$xml .= '<StartDate Format="yyyy-mm-dd">'.$startdate.'</StartDate>' . self::NEW_LINE;
		$xml .= '<EndDate Format="yyyy-mm-dd">'.$enddate.'</EndDate>' . self::NEW_LINE;
		$xml .= '</Website>' . self::NEW_LINE;
		$xml .= '<Website Name="ingoibibo">' . self::NEW_LINE;
		$xml .= '<HotelCode>'.$hotelcode.'</HotelCode>' . self::NEW_LINE;
		$xml .= '<StartDate Format="yyyy-mm-dd">'.$startdate.'</StartDate>' . self::NEW_LINE;
		$xml .= '<EndDate Format="yyyy-mm-dd">'.$enddate.'</EndDate>' . self::NEW_LINE;
		$xml .= '</Website>' . self::NEW_LINE;
		
		return (new Goibibo_base)->send_request($xml,$method,$propertytoken);  
  	}
	
}