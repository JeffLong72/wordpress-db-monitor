<?php
/*
 Plugin Name: Extended wpdb
 Description: A few extra functions for wpdb (eg. log mysql queries, send email if database goes down )
 Version: 	  1.0
 Author:	  ACC Digital (Jeff Long)
 Author URI:  https://www.acc.cc/
*/
 
class wpdb_extended extends wpdb {
	
	// the email where we want to send reports too
	private $email_recipient = "your@mail.com";
	
	public function __construct()
	{
		parent::__construct( DB_USER, DB_PASSWORD, DB_NAME, DB_HOST );
	}
 
	public function sendEmail($db) 
	{
		// set subject
		$subject = 'MySQL database offline';
		
		// set db error message
		$message = print_r($db->errors, true);

		// include the contents of mysql log file in message 
		// ( requires wp-log-mysql plugin installed & active )
		if(file_exists(dirname(__FILE__).'/plugins/wp-log-mysql/sql_log.html')) 
		{
			$message.= "<h2>Last logged MySQL queries</h2>";
			$message.= file_get_contents(dirname(__FILE__).'/plugins/wp-log-mysql/sql_log.html');
		}
		
		// set headers
		$headers = "From: ".$this->email_recipient."\r\n";
		$headers.= "Reply-To: ".$this->email_recipient."\r\n";
		$headers.= "MIME-Version: 1.0\r\n";
		$headers.= "Content-Type: text/html; charset=UTF-8\r\n";
		
		// send email
		mail($this->email_recipient, $subject, $message, $headers);
	}
}

// get wp db
global $wpdb;

// create our extended db object
$wpdb = new wpdb_extended();

// if we have a db error, we need to send an email
$db_error = (!empty($wpdb->error)) ? $wpdb->sendEmail($wpdb->error) : "";

