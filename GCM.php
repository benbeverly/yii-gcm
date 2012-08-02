<?php

class GCM extends CApplicationComponent {
	
	/**
	 * Unique Google API key. Generated in API console 
	 * @var string
	 */
	public $SApi;
	
	/**
	 * Sender ID. Unique project ID found in Google API console
	 * @var string
	 */
	public $senderID;
	
	/**
	 * 
	 */
	private $_ERROR_DEVICE_QUOTA_EXCEEDED = "DeviceQuotaExceeded";
	private $_ERROR_INTERNAL_SERVER_ERROR = "InternalServerError";
	private $_ERROR_INVALID_REGISTRATION = "InvalidRegistration";
	private $_ERROR_INVALID_TTL = "InvalidTtl";
	private $_ERROR_MESSAGE_TOO_BIG = "MessageTooBig";
	private $_ERROR_MISMATCH_SENDER_ID = "MismatchSenderId";
	private $_ERROR_MISSING_COLLAPSE_KEY = "MissingCollapseKey";
	private $_ERROR_MISSING_REGISTRATION = "MissingRegistration";
	private $_ERROR_NOT_REGISTERED = "NotRegistered";
	private $_ERROR_QUOTA_EXCEEDED = "QuotaExceeded";
	private $_ERROR_UNAVAILABLE = "Unavailable";
	private $_GCM_SEND_ENDPOINT = "https://android.googleapis.com/gcm/send";
	private $_JSON_CANONICAL_IDS = "canonical_ids";
	private $_JSON_ERROR = "error";
	private $_JSON_FAILURE = "failure";
	private $_JSON_MESSAGE_ID = "message_id";
	private $_JSON_MULTICAST_ID = "multicast_id";
	private $_JSON_PAYLOAD = "data";
	private $_JSON_REGISTRATION_IDS = "registration_ids";
	private $_JSON_RESULTS = "results";
	private $_JSON_SUCCESS = "success";
	private $_PARAM_COLLAPSE_KEY = "collapse_key";
	private $_PARAM_DELAY_WHILE_IDLE = "delay_while_idle";
	private $_PARAM_PAYLOAD_PREFIX = "data.";
	private $_PARAM_REGISTRATION_ID = "registration_id";
	private $_PARAM_TIME_TO_LIVE = "time_to_live";
	private $_TOKEN_CANONICAL_REG_ID = "registration_id";
	private $_TOKEN_ERROR = "Error";
	private $_TOKEN_MESSAGE_ID = "id";
	
	/**
	 * 
	 * 
	 */
}