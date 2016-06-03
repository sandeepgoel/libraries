
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Travelguru API
*
* @author    Sandeep Goel
* @version   v0.0.1
* @copyright 2016
*/



require_once "Travelguru_base.php";


class Travelguru_hotel{ 

	const NEW_LINE = "\n";
	
	
	/**
	* Hotel Information
	*
	*  Parameters:
	*
	*	 
	* See: documentation 
    *
    * 
    */

	public function travelguru_hotel_listing($cmpassword,$cmuser,$hotelcode,$startdate,$enddate,$method) {
		
		$xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>' . self::NEW_LINE;
		$xml .= '<OTA_HotelAvailRQ xmlns="http://www.opentravel.org/OTA/2003/05">' . self::NEW_LINE;
		$xml .= '<POS>' . self::NEW_LINE;
		$xml .= '<Source>' . self::NEW_LINE;
		$xml .= 'RequestorID MessagePassword= "'.$cmpassword.'" ID= "'.$cmuser.'" Type="CHM"/' . self::NEW_LINE;
		$xml .= '</Source>' . self::NEW_LINE;
		$xml .= '</POS>' . self::NEW_LINE;
		$xml .= '<AvailRequestSegments>' . self::NEW_LINE;
		$xml .= '<AvailRequestSegment>' . self::NEW_LINE;
		$xml .= '<HotelSearchCriteria>' . self::NEW_LINE;
		$xml .= '<Criterion>' . self::NEW_LINE;
		$xml .= '<HotelRef HotelCode="'.$hotelcode.'"/>' . self::NEW_LINE;
		$xml .= '<StayDateRange Start="'.$startdate.'" End="'.$enddate.'">' . self::NEW_LINE;
		$xml .= '</StayDateRange>' . self::NEW_LINE;
		$xml .= '</Criterion>' . self::NEW_LINE;
		$xml .= '</HotelSearchCriteria>' . self::NEW_LINE;
		$xml .= '</AvailRequestSegment>' . self::NEW_LINE;
		$xml .= '</AvailRequestSegments>' . self::NEW_LINE;
		$xml .= '</OTA_HotelAvailRQ>' . self::NEW_LINE;
		
		return (new travelguru_base)->send_request($xml,$method);  
  	}

	/**
	* Featch room rates
	*
	*  Parameters:
	*
	*	 
	* See: documentation 
    *
    * 
    */

	public function travelguru_hotel_getrates($cmpassword,$cmuser,$hotelcode,$classcode,$startdate,$enddate,$daysofweek,$rateplan,$roomcode,$rateclass,$method) {
		
		$xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>' . self::NEW_LINE;
		$xml .= '<OTA_HotelAvailRQ xmlns="http://www.opentravel.org/OTA/2003/05">' . self::NEW_LINE;
		$xml .= '<POS>' . self::NEW_LINE;
		$xml .= '<Source>' . self::NEW_LINE;
		$xml .= 'RequestorID MessagePassword= "'.$cmpassword.'" ID= "'.$cmuser.'" Type="CHM"/' . self::NEW_LINE;
		$xml .= '</Source>' . self::NEW_LINE;
		$xml .= '</POS>' . self::NEW_LINE;
		$xml .= '<AvailRequestSegments>' . self::NEW_LINE;
		$xml .= '<AvailRequestSegment>' . self::NEW_LINE;
		$xml .= '<HotelSearchCriteria>' . self::NEW_LINE;
		$xml .= '<Criterion>' . self::NEW_LINE;
		$xml .= '<HotelRef HotelCode="'.$hotelcode.'" SegmentCategoryCode="ALL" PropertyClassCode="'.$classcode.'"/>' . self::NEW_LINE;
		$xml .= '<StayDateRange Start="'.$startdate.'" End="'.$enddate.'">' . self::NEW_LINE;
		$xml .= '<TPA_Extensions>' . self::NEW_LINE;
		$xml .= '<Day_Of_Week '.$daysofweek.'"/>' . self::NEW_LINE;
		$xml .= '</TPA_Extensions>' . self::NEW_LINE;
		$xml .= '</StayDateRange>' . self::NEW_LINE;
		$xml .= '<RatePlanCandidates>' . self::NEW_LINE;
		$xml .= '<RatePlanCandidate RatePlanID="'.$rateplan.'"/>' . self::NEW_LINE;
		$xml .= '</RatePlanCandidates>' . self::NEW_LINE;
		$xml .= '<RoomStayCandidates>' . self::NEW_LINE;
		$xml .= '<RoomStayCandidate RoomTypeCode="'.$roomcode.'" SharedRoomInd="True" RoomClassificationCode="'.$rateclass.'"/>' . self::NEW_LINE;
		$xml .= '</RoomStayCandidates>' . self::NEW_LINE;
		$xml .= '</Criterion>' . self::NEW_LINE;
		$xml .= '</HotelSearchCriteria>' . self::NEW_LINE;
		$xml .= '</AvailRequestSegment>' . self::NEW_LINE;
		$xml .= '</AvailRequestSegments>' . self::NEW_LINE;
		$xml .= '</OTA_HotelAvailRQ>' . self::NEW_LINE;
		
		return (new travelguru_base)->send_request($xml,$method);  
  	}
	
	
	/**
	* Featch room rates
	*
	*  Parameters:
	*
	*	 
	* See: documentation 
    *
    * 
    */

	public function travelguru_hotel_updaterates($cmpassword,$cmuser,$hotelcode,$rateplan,$type,$startdate,$enddate,$roomcode,$daysofweek,$unit,$minlos,$amountwithtax,$amoutwithouttax,$currency,$method) {
		
		$xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>' . self::NEW_LINE;
		$xml .= '<OTA_HotelRateAmountNotifRQ xmlns="http://www.opentravel.org/OTA/2003/05">' . self::NEW_LINE;
		$xml .= '<POS>' . self::NEW_LINE;
		$xml .= '<Source>' . self::NEW_LINE;
		$xml .= 'RequestorID MessagePassword= "'.$cmpassword.'" ID= "'.$cmuser.'" Type="CHM"/' . self::NEW_LINE;
		$xml .= '</Source>' . self::NEW_LINE;
		$xml .= '</POS>' . self::NEW_LINE;
		$xml .= '<RateAmountMessages HotelCode="'.$hotelcode.'">' . self::NEW_LINE;
		$xml .= '<RateAmountMessage>' . self::NEW_LINE;
		$xml .= '<StatusApplicationControl RatePlanCode="'.$rateplan.'" RatePlanType="'.$type.'" End="'.$enddate.'" Start="'.$startdate.'" InvCode="'.$roomcode.'" '.$daysofweek.'"/>' . self::NEW_LINE;
		$xml .= '<Rates>' . self::NEW_LINE;
		$xml .= '<Rate NumberOfUnits="'.$Unit.'" MinLos="'.$minlos.'" End="'.$enddate.'" Start="'.$startdate.'">' . self::NEW_LINE;
		$xml .= '<BaseByGuestAmts>' . self::NEW_LINE;
		$xml .= '<BaseByGuestAmt AmountAfterTax="'.$amountwithtax.'" AmountBeforeTax="'.$amoutwithouttax.'" CurrencyCode="'.$currency.'"/>' . self::NEW_LINE;
		$xml .= '</BaseByGuestAmts>' . self::NEW_LINE;
		$xml .= '</Rate>' . self::NEW_LINE;
		$xml .= '</Rates>' . self::NEW_LINE;
		$xml .= '</RateAmountMessage>' . self::NEW_LINE;
		$xml .= '</RateAmountMessages>' . self::NEW_LINE;
		$xml .= '</OTA_HotelAvailRQ>' . self::NEW_LINE;
		
		return (new travelguru_base)->send_request($xml,$method);  
  	}
	
	/**
	* Update room inventory
	*
	*  Parameters:
	*
	*	 
	* See: documentation 
    *
    * 
    */

	public function travelguru_hotel_roominventoryupdate($cmpassword,$cmuser,$hotelcode,$available,$daysofweek,$startdate,$enddate,$roomcode,$stopsell,$method) {
		
		$xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>' . self::NEW_LINE;
		$xml .= '<OTA_HotelRateAmountNotifRQ xmlns="http://www.opentravel.org/OTA/2003/05">' . self::NEW_LINE;
		$xml .= '<POS>' . self::NEW_LINE;
		$xml .= '<Source>' . self::NEW_LINE;
		$xml .= 'RequestorID MessagePassword= "'.$cmpassword.'" ID= "'.$cmuser.'" Type="CHM"/' . self::NEW_LINE;
		$xml .= '</Source>' . self::NEW_LINE;
		$xml .= '</POS>' . self::NEW_LINE;
		$xml .= '<AvailStatusMessages HotelCode="'.$hotelcode.'">' . self::NEW_LINE;
		$xml .= '<AvailStatusMessage BookingLimit="'.$available.'">' . self::NEW_LINE;
		$xml .= '<StatusApplicationControl '.$daysofweek.' Start="'.$startdate.'" End="'.$enddate.'" InvCode="'.$roomcode.'"/>' . self::NEW_LINE;
		$xml .= '<RestrictionStatus SellThroughOpenIndicator="'.$stopsell.'"/>' . self::NEW_LINE;
		$xml .= '</AvailStatusMessage>' . self::NEW_LINE;
		$xml .= '</AvailStatusMessages>' . self::NEW_LINE;
		$xml .= '</OTA_HotelAvailNotifRQ>' . self::NEW_LINE;
		
		
		return (new travelguru_base)->send_request($xml,$method);  
  	}
	
	
  	
}