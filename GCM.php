<?php

class GCM extends CApplicationComponent {
	
	/**
	 * CONSTANTS
	 */
	public static $ERROR_DEVICE_QUOTA_EXCEEDED = "DeviceQuotaExceeded";
	public static $ERROR_INTERNAL_SERVER_ERROR = "InternalServerError";
	public static $INVALID_REGISTRATION = "InvalidRegistration";
	public static $INVALID_TTL = "InvalidTtl";
	public static $MESSAGE_TOO_BIG = "MessageTooBig";
	public static $MISMATCH_SENDER_ID = "MismatchSenderId";
	public static $MISSING_COLLAPSE_KEY = "MissingCollapseKey";
	public static $MISSING_REGISTRATION = "MissingRegistration";
	public static $NOT_REGISTERED = "NotRegistered";
	public static $QUOTA_EXCEEDED = "QuotaExceeded";
	public static $UNAVAILABLE = "Unavailable";
	public static $GCM_SEND_ENDPOINT = "https://android.googleapis.com/gcm/send";
	public static $JSON_CANONICAL_IDS = "canonical_ids";
	public static $JSON_ERROR = "error";
	public static $JSON_FAILURE = "failure";
	public static $JSON_MESSAGE_ID = "message_id";
	public static $JSON_MULTICAST_ID = "multicast_id";
	public static $JSON_PAYLOAD = "data";
	public static $JSON_REGISTRATION_IDS = "registration_ids";
	public static $JSON_RESULTS = "results";
	public static $JSON_SUCCESS = "success";
	public static $PARAM_COLLAPSE_KEY = "collapse_key";
	public static $PARAM_DELAY_WHILE_IDLE = "delay_while_idle";
	public static $PARAM_PAYLOAD_PREFIX = "data.";
	public static $PARAM_REGISTRATION_ID = "registration_id";
	public static $PARAM_TIME_TO_LIVE = "time_to_live";
	public static $TOKEN_CANONICAL_REG_ID = "registration_id";
	public static $TOKEN_ERROR = "Error";
	public static $TOKEN_MESSAGE_ID = "id";
	
	/**
	 * Unique Google API key. Generated in API console 
	 * @var string
	 */
	public $apiKey;
	
	
	/**
	 * Initializes the application component.
	 * This method is required by {@link IApplicationComponent} and is invoked by application.
	 */
	public function init()
	{
		if(empty($this->apiKey))
			throw new CException('No API key set');
	
		parent::init();
	}
	
	/**
	 * Sends the message.
	 * @param array $devices
	 * @param array $data
	 * @param string $collapseKey
	 * @param int $retry
	 * @param int $timeToLive
	 * @param bool $delayIdle
	 */
	public function send($devices, $data, $collapseKey = "", $timeToLive=0, $delayIdle = false, $retry=0) {
		if($devices == null || $data == null) {
			return;
		}
		
		$headers = array("Content-Type" => "application/json", "Authorization" => "key=" . $this->apiKey);
		$fullData = array(
				'data' => $data,
				'registration_ids' => $devices
		);
		
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		// set the send point url
		curl_setopt($ch, CURLOPT_URL, GCM::GCM_SEND_ENDPOINT);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// endcode the data as JSON
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fullData));
		
		$response = curl_exec($ch);
		curl_close($ch);
		
		if(!$response > 0){
		    if($retry > 0) {		    	
		    	$this->send($devices, $data, $collapseKey, $timeToLive, $delayIdle, $retry -1);
		    }
		}
		else{
		    $json_return = json_decode($response);
		}
	}
	
	
}
