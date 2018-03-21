<?php







if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          	//echo '<h2>Please go back and recheck the the captcha form.</h2>';
		$message = "Please recheck the captcha form";
		$webpage = "https://www.tom-horseman.uk";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<script type='text/javascript'>window.history.back();</script>";
		exit;
        }
        $secretKey = "6LdxZxgTAAAAAE6QQHKhnrwOiXSabt9lOFhyNDhG";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
          echo '<h2>Spambot detected</h2>';
	  exit;        
	} else {

// $email and $message are the data that is being
// posted to this page from our html contact form
$email = $_REQUEST['email'] ;
$message = $_REQUEST['message'] ;
$name = $_REQUEST['name'] ;
// When we unzipped PHPMailer, it unzipped to
// public_html/PHPMailer_5.2.0
require("/var/www/lib/PHPMailer/PHPMailerAutoload.php");

$mail = new PHPMailer();
$mail1 = new PHPMailer();
// set mailer to use SMTP
$mail->IsSMTP();
$mail1->IsSMTP();
// As this email.php script lives on the same server as our email server
// we are setting the HOST to localhost
$mail->Host = "mail.privateemail.com";  // specify main and backup server
$mail->Port       = 26;
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail1->Host = "mail.privateemail.com";  // specify main and backup server
$mail1->Port       = 26;
$mail1->SMTPAuth = true;     // turn on SMTP authentication
// When sending email using PHPMailer, you need to send from a valid email address
// In this case, we setup a test email account with the following credentials:
// email: send_from_PHPMailer@bradm.inmotiontesting.com
// pass: password
$mail->Username = "postmaster@tom-horseman.uk";  // SMTP username
$mail->Password = "BaconStrips06"; // SMTP password
$mail1->Username = "postmaster@tom-horseman.uk";  // SMTP username
$mail1->Password = "BaconStrips06"; // SMTP password
// $email is the user's email address the specified
// on our contact us page. We set this variable at
// the top of this page with:
// $email = $_REQUEST['email'] ;
//$mail->From = $email;
$mail->From = "postmaster@tom-horseman.uk";
$mail1->From = "postmaster@tom-horseman.uk";
// below we want to set the email address we will be sending our email to.
$mail->AddAddress("postmaster@tom-horseman.uk", "Tom Horseman");
$mail1->AddAddress($email);
// set word wrap to 50 characters
$mail->WordWrap = 50;
$mail1->WordWrap = 50;
// set email format to HTML
$mail->IsHTML(true);
$mail1->IsHTML(true);
$mail->Subject = "Website Contact Form Submission";
$mail1->Subject = "Website Contact Form Submission";
// $message is the user's message they typed in
// on our contact us page. We set this variable at
// the top of this page with:
// $message = $_REQUEST['message'] ;
$mail1->Body	= "Thanks for your submission, I will be in contact soon.";
$mail->Body    = '<p>Contact Name: ' . $name . '</p></br>' . '<p>Contact Email Address: ' . $email . '</p></br>' . '<p>Message: ' . $message . '</p></br>';
$mail->AltBody = $message;
$mail1->AltBody = "Thanks for your submission, I will be in contact soon.";
if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

if(!$mail1->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}
//header('Location: https://www.tom-horseman.uk/index2.html');

                $message = "Email successfully sent";
                $webpage = "https://www.tom-horseman.uk";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo "<script type='text/javascript'>window.location = '$webpage';</script>";

}
?>
