
<?php

namespace App\Traits;
use AfricasTalking\SDK\AfricasTalking;
use App\Models\Sms;

trait Smsing {
 
  public function sendSMS($smses,$message)
  {

 	$username = 'hotlunch'; // use 'sandbox' for development in the test environment
	$apiKey   = 'f00081c7d5230a82b19fded9e16cd5c3ae73df8196ede611cd3694fc6141d4d6'; // use your sandbox app API key for development in the test environment
	$AT       = new AfricasTalking($username, $apiKey);
	$sms      = $AT->sms();
	$result   = $sms->send([
    	'to'      => $smses->contact,
    	'from'	  =>'HOTLUNCH',
    	'sms' => $message
	]);
 	
 	$smsD=array();
 	$smsD['date']=date('Y-m-d');
 	$smsD['time']=date('H:i:s');
 	$smsD['sms']=$message;
 	Sms::create($smsD);
  }
 
}

?>