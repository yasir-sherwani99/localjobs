<?php
	$api_key = "7f06b082fbed9e2f811a3ebd1dc9b6fd-us11";
	$list_id = "674d602d14";
 
	require('MailChimp.php');
	$Mailchimp = new Mailchimp( $api_key );
	$Mailchimp_Lists = new Mailchimp_Lists( $Mailchimp );
	$subscriber = $Mailchimp_Lists->subscribe( $list_id, array( 'email' => htmlentities($_POST['email']) ) );
 
	if ( ! empty( $subscriber['leid'] ) ) {
		echo "success";
	}
	else
	{
		echo "fail";
	}
 
?>