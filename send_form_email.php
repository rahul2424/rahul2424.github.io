<?php
if(isset($_POST['email'])) {
     
    // EDIT THE 2 LINES BELOW AS REQUIRED
	
    $email_to = "rahul.parbhankar@gmail.com"; //  put ur need email address means which email id u use for sending the emails
	$email_subject = "Enquiry from www.rahulparbhankar.com
 "; // and subject line here
	
     
     
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['name']) ||
       !isset($_POST['phone']) ||
       !isset($_POST['query'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
    $name 		= $_POST['name']; // required
    $phone 	= $_POST['phone']; // not required
    $query 	= $_POST['query']; // required
     
    $error_message = "";
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(strlen($query) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "Your Name: ".clean_string($name)."\n";
    $email_message .= "Mobile: ".clean_string($phone)."\n";
    $email_message .= "Comments: ".clean_string($query)."\n";
     
     
// create email headers
$header = "From: ga@rahul.parbhankar.com" . "\r\n";
$header .= "Reply-To: " . "\r\n";
$header .= "Cc:" . "\r\n"; // this put ur cc email address for example i put the 
$header .= "Bcc: " . "\r\n"; // this put ur Bcc email address for example i put the 
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $header );  
?>
 <!-- put ur web site message u need -->
 <style type="text/css">
<!--
.style3 {font-family: Calibri}
.style5 {font-family: Calibri; font-size: 24px; }
-->
 </style>
 
 <div align="center" class="style3"><br />
   <br />
   <span class="style5">Thank you for contacting us. <br />
  We will be in touch with you very soon.
   
   <?php
}
?>
   </span></div>
 