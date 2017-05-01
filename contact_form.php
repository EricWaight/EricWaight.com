<?php
	
	// include the default cintacs mailer
	include_once("/Common/CintacsMailer.php");
	
	$mail = new CintacsMailer();
	
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
	
	function spamcheck($field) {
		//filter_var() sanitizes the e-mail address using FILTER_SANITIZE_EMAIL
		$field=filter_var($field, FILTER_SANITIZE_EMAIL);
		
		//filter_var() validates the e-mail address using FILTER_VALIDATE_EMAIL
		if(filter_var($field, FILTER_VALIDATE_EMAIL)) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	
	// check if form is filled out
	if (empty($_REQUEST['name']) || empty($_REQUEST['c-email']) || empty($_REQUEST['msg'])) {
		$mailcheck = false;
	}
	// check if the email address is valid
	else {
		$mailcheck = spamcheck($_REQUEST['c-email']);
	}
	
	// if error
	if ($mailcheck==FALSE) {
		echo "3";
	}
	// else send email
	else {
		// set local variables
		$message = $_REQUEST['msg'];
		$phone = $_REQUEST['phone'];
		$email = $_REQUEST['c-email'];
		$name = $_REQUEST['name'];
		
		// build message
		$actual_message  = '<b>Name:</b><br>'.$name.'<br><br>';
		$actual_message .= '<b>Email:</b><br>'.$email.'<br><br>';
		$actual_message .= '<b>Phone:</b><br>'.$phone.'<br><br>';
		$actual_message .= '<b>Message:</b><br>'.$message.'<br><br>';
		
		// sets the mail information
		$mail->SetSubject('Contact Form Submission: '.$name);
		$mail->SetReplyTo($email, $name);
		$mail->SetMainBody($actual_message);
		
		// send the mail
		$result = $mail->SendMail('ewaight12@gmail.com');
		
		// echo response
		if ($result == true) {
			echo "1";
		} else {
			echo "2";
		}	
	}
?>