
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Goibibo API
*
* @author    Sandeep Goel
* @version   v0.0.1
* @copyright 2016
*/



require_once "Expedia_base.php";


class Expedia_hotel{ 

	const NEW_LINE = "\n";

	/**
	* Hotel Information
	*
	*  Parameters:
	*
	*	 Hotel Code
	* See: documentation 
    *
    * 
    */

	public function goibibo_hotel_listing($hotelcode,$method,$propertytoken) {
		
		$xml = '<?xml version="1.0" encoding="UTF-8" ?>' . self::NEW_LINE;
		$xml .= '<Website Name="ingoibibo" HotelCode="'.$hotelcode.'">' . self::NEW_LINE;
		$xml .= '<HotelCode>'.$hotelcode.'</HotelCode>' . self::NEW_LINE;
		$xml .= '</Website>' . self::NEW_LINE;
		
		return (new Goibibo_base)->send_request($xml,$method,$propertytoken);  
  	}

  	/**
	* Update Room Inventory
	*
	*  Parameters:
	*
	*	$hotelcode 	// goibibo hotel id
	*   roomtypecode 	//room code from goibibo
	*   startdate 	//date format YYYY-MM-DD condition it must be present date or future and do no exceed 550 days from present date.
	*   enddate  //date format YYYY-MM-DD condition it must be same as startdate or higher then it but do no exceed 550 days from present date.
	*   daysofweek  //days of week
	*   minstay 	//minimum stay condition for booking do not exceed 10
	*   cutoff  //cut of time in hours minimum value 0h and highest value 72h
	*   availability 	//available number of rooms do not exceed available room of category available in system 
	*   stopsell 	// value required to block room change to True
	*   propertytoken  	//goibibo hotel authentication token
	*   method 	//url dynamic parameter
    *
    * 
    */

	public function goibibo_update_room_inventory($hotelcode,$roomtypecode,$startdate,$enddate,$daysofweek,$minstay,$cutoff,$availability,$stopsell,$method,$propertytoken) {
		
		$xml = '<?xml version="1.0" encoding="UTF-8" ?>' . self::NEW_LINE;
		$xml .= '<Website Name="ingoibibo" HotelCode="'.$hotelcode.'">' . self::NEW_LINE;
		$xml .= '<Room>' . self::NEW_LINE;
		$xml .= '<RoomTypeCode>'.$roomtypecode.'</RoomTypeCode>' . self::NEW_LINE;
		$xml .= '<StartDate Format="yyyy-mm-dd">'.$startdate.'</StartDate>' . self::NEW_LINE;
		$xml .= '<EndDate Format="yyyy-mm-dd">'.$enddate.'</EndDate>' . self::NEW_LINE;
		$xml .= '<DaysOfWeek '.$daysofweek.'></DaysOfWeek>' . self::NEW_LINE;
		$xml .= '<MinLOS>'.$minstay.'</MinLOS>' . self::NEW_LINE;
		$xml .= '<CutOff>'.$cutoff.'</CutOff>' . self::NEW_LINE;
		$xml .= '<Available>.'.$availability.'</Available>' . self::NEW_LINE;
		$xml .= '<StopSell>.'.$stopsell.'</StopSell>' . self::NEW_LINE;
		$xml .= '</Room>' . self::NEW_LINE;
		$xml .= '</Website>' . self::NEW_LINE;
		
		return (new Goibibo_base)->send_request($xml,$method,$propertytoken);  
  	}

	
	//-------------------------------------------------------------

	/**
	* Update Room Rates
	*
	*  Parameters:
	*
	*	hotelcode 	// goibibo hotel id
	*   rateplan 	//goibibo room rate plan code
	*   startdate 	//date format YYYY-MM-DD condition it must be present date or future and do no exceed 550 days from present date.
	*   enddate  	//date format YYYY-MM-DD condition it must be same as startdate or higher then it but do no exceed 550 days from present date.
	*   singlerackrate 	// room rack rate for single occupancy
	*   singlesellrate 	// room sell rate for single occupancy
	*   doublerackrate 	// room rack rate for double occupancy
	*   doublesellrate 	// room sell rate for double occupancy
	*   triplerackrate 	// room rack rate for triple occupancy
	*   triplesellrate 	// room rack rate for triple occupancy
	*   extrachildrate 		// extra child charges
	*   extraadultrate 		//extra adult charges
	*   infantrate 			//extra infant child charges
	*   daysofweek  //days of week
	*   contracttype 	//contract type fetch during initial rate fetch
	*   currency 	//client default currency
	*   stopsell 	// value required to block room change to True
	*   propertytoken  	//goibibo hotel authentication token
	*   method 	//url dynamic parameter
    * 
    */
	
	
	public function goibibo_update_room_rates($hotelcode,$rateplan,$startdate,$enddate,$singlerackrate,$singlesellrate,$doublerackrate,$doublesellrate,$triplerackrate,$triplesellrate,$extrachildrate,$extraadultrate,$infantrate,$daysofweek,$contracttype,$currency,$stopsell,$method,$propertytoken) {
		
		$xml = '<?xml version="1.0" encoding="UTF-8" ?>' . self::NEW_LINE;
		$xml .= '<Website Name="ingoibibo" HotelCode="'.$hotelcode.'">' . self::NEW_LINE;
		$xml .= '<RatePlan>' . self::NEW_LINE;
		$xml .= '<RatePlanCode>'.$rateplan.'</RatePlanCode>' . self::NEW_LINE;
		$xml .= '<StartDate Format="yyyy-mm-dd">'.$startdate.'</StartDate>' . self::NEW_LINE;
		$xml .= '<EndDate Format="yyyy-mm-dd">'.$enddate.'</EndDate>' . self::NEW_LINE;
		$xml .= '<SingleOccupancyRates>' . self::NEW_LINE;
		$xml .= '<RackRate>'.$singlerackrate.'</RackRate>' . self::NEW_LINE;
		$xml .= '<SellRate>'.$singlesellrate.'</SellRate>' . self::NEW_LINE;
		$xml .= '</SingleOccupancyRates>' . self::NEW_LINE;
		$xml .= '<DoubleOccupancyRates>' . self::NEW_LINE;
		$xml .= '<RackRate>'.$doublerackrate.'</RackRate>' . self::NEW_LINE;
		$xml .= '<SellRate>'.$doublesellrate.'</SellRate>' . self::NEW_LINE;
		$xml .= '</DoubleOccupancyRates>' . self::NEW_LINE;
		$xml .= '<TripleOccupancyRates>' . self::NEW_LINE;
		$xml .= '<RackRate>'.$triplerackrate.'</RackRate>' . self::NEW_LINE;
		$xml .= '<SellRate>'.$triplesellrate.'</SellRate>' . self::NEW_LINE;
		$xml .= '</TripleOccupancyRates>' . self::NEW_LINE;
		$xml .= '<ExtraChildCharge>'.$extrachildrate.'</ExtraChildCharge>' . self::NEW_LINE;
		$xml .= '<ExtraAdultCharge>'.$extraadultrate.'</ExtraAdultCharge>' . self::NEW_LINE;
		$xml .= '<InfantCharge>'.$infantrate.'</InfantCharge>' . self::NEW_LINE;
		$xml .= '<DaysOfWeek '.$daysofweek.'></DaysOfWeek>' . self::NEW_LINE;
		$xml .= '<ContractType '.$contracttype.'></ContractType>' . self::NEW_LINE;
		$xml .= '<StopSell>.'.$stopsell.'</StopSell>' . self::NEW_LINE;
		$xml .= '<Currency>'.$currency.'</Currency>'	. self::NEW_LINE;
		$xml .= '</RatePlan>'	. self::NEW_LINE;
		$xml .= '</Website>' . self::NEW_LINE;
		
		return (new Goibibo_base)->send_request($xml,$method,$propertytoken);  
  	}

	
	//-------------------------------------------------------------
	
	/**
	* Get Room Inventory
	*
	*  Parameters:
	*
	*	hotelcode 	// goibibo hotel id
	*   roomtypecode 	//goibibo room code
	*   startdate 	//date format YYYY-MM-DD condition it must be present date or future and do no exceed 550 days from present date.
	*   enddate  	//date format YYYY-MM-DD condition it must be same as startdate or higher then it but do no exceed 550 days from present date.
	*   propertytoken  	//goibibo hotel authentication token
	*   method 	//url dynamic parameter
    * 
    */
	
	
	public function goibibo_get_room_inventory($hotelcode,$roomtypecode,$startdate,$enddate,$method,$propertytoken) {
		
		$xml = '<?xml version="1.0" encoding="UTF-8" ?>' . self::NEW_LINE;
		$xml .= '<Website Name="ingoibibo" HotelCode="'.$hotelcode.'">' . self::NEW_LINE;
		$xml .= '<RoomType Code="'.$roomtypecode.'"></RoomType>' . self::NEW_LINE;
		$xml .= '<StartDate Format="yyyy-mm-dd">'.$startdate.'</StartDate>' . self::NEW_LINE;
		$xml .= '<EndDate Format="yyyy-mm-dd">'.$enddate.'</EndDate>' . self::NEW_LINE;
		$xml .= '</Website>' . self::NEW_LINE;
		
		
		return (new Goibibo_base)->send_request($xml,$method,$propertytoken);  
  	}

	
	//-------------------------------------------------------------
	
	/**
	* Get Room Inventory
	*
	*  Parameters:
	*
	*	hotelcode 	// goibibo hotel id
	*   rateplan	//goibibo room code
	*   startdate 	//date format YYYY-MM-DD condition it must be present date or future and do no exceed 550 days from present date.
	*   enddate  	//date format YYYY-MM-DD condition it must be same as startdate or higher then it but do no exceed 550 days from present date.
	*   contracttype	//contract type fetch during initial rate fetch
	*	propertytoken  	//goibibo hotel authentication token
	*   method 	//url dynamic parameter
    * 
    */
	
	
	public function goibibo_get_room_rates($hotelcode,$rateplan,$startdate,$enddate,$contracttype,$method,$propertytoken) {
		
		$xml = '<?xml version="1.0" encoding="UTF-8" ?>' . self::NEW_LINE;
		$xml .= '<Website Name="ingoibibo" HotelCode="'.$hotelcode.'">' . self::NEW_LINE;
		$xml .= '<RatePlan Code="'.$rateplan.'"></RatePlan>' . self::NEW_LINE;
		$xml .= '<StartDate Format="yyyy-mm-dd">'.$startdate.'</StartDate>' . self::NEW_LINE;
		$xml .= '<EndDate Format="yyyy-mm-dd">'.$enddate.'</EndDate>' . self::NEW_LINE;
		$xml .= '<ContractType>'.$contracttype.'</ContractType>' . self::NEW_LINE;
		$xml .= '</Website>' . self::NEW_LINE;
		
		
		return (new Goibibo_base)->send_request($xml,$method,$propertytoken);  
  	}

	
	//-------------------------------------------------------------
	
	/**
	* Get Room Inventory
	*
	*  Parameters:
	*
	*	hotelcode 	// goibibo hotel id
	*   rateplan	//goibibo room code
	*   startdate 	//date format YYYY-MM-DD condition it must be present date or future and do no exceed 550 days from present date.
	*   enddate  	//date format YYYY-MM-DD condition it must be same as startdate or higher then it but do no exceed 550 days from present date.
	*   contracttype	//contract type fetch during initial rate fetch
	*	propertytoken  	//goibibo hotel authentication token
	*   method 	//url dynamic parameter
    * 
    */
	
	
	public function goibibo_get_tax_information($hotelcode,$rateplan,$method,$propertytoken) {
		
		$xml = '<?xml version="1.0" encoding="UTF-8" ?>' . self::NEW_LINE;
		$xml .= '<Website Name="ingoibibo" HotelCode="'.$hotelcode.'">' . self::NEW_LINE;
		$xml .= '<RatePlan Code="'.$rateplan.'"></RatePlan>' . self::NEW_LINE;
		$xml .= '</Website>' . self::NEW_LINE;
		
		
		return (new Goibibo_base)->send_request($xml,$method,$propertytoken);  
  	}

	
	//-------------------------------------------------------------
	
}