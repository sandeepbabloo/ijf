<?php
session_start();
ini_set('display_errors', 1);
include_once "../swift/lib/swift_required.php";
include "mysql_connect.php";

$name =  mysqli_real_escape_string($conn, $_POST["name"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$message = mysqli_real_escape_string($conn, $_POST["message"]);
$subject = mysqli_real_escape_string($conn, $_POST["subject"]);

// echo "reached somewhere";
	    $subject = 'Message from iHack - '. $subject;
	    $from = array('ihack@ecell.in' =>"I_Hack 2019");
	    $to = array(
	     'akash@ecell.in'  => 'Akash, E-Cell IITB','shrvan@ecell.in'  => 'Shrvan, E-Cell IITB',
	    );
	    // $to = array(
	    //  'akash@ecell.in'  => 'Akash, E-Cell IITB',
	    // );	    


	    $text = "Please update your browser to view this message";
	    $html =  "Name: ".$name." <br> E-mail : ".$email."<br> <br> message : ".$message;
	    // echo $html;
	    $transport = Swift_SmtpTransport::newInstance('smtp.mandrillapp.com', 2525);
	    $transport->setUsername('THE ENTREPRENEURSHIP CELL, IIT BOMBAY');
	    $transport->setPassword('lXYcHl52RFJaElGCKzMpLw');
	    $swift = Swift_Mailer::newInstance($transport);

	    $message = new Swift_Message($subject);
	    $message->setFrom($from);
	    $message->setBody($html, 'text/html');
	    $message->setTo($to);
	    $message->addPart($text, 'text/plain');

	    if ($recipients = $swift->send($message, $failures))
	    {

				session_unset();
				session_destroy();
	     echo '<script>alert("Thank you! Your message is received. We will get back to you as soon as possible.");</script><script>window.location = "index.html";</script>';
	    } else {
	     echo "Mailing error:\n";
	     //print_r($failures);
	    }


?>

