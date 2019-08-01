<?
$mailto = 'xplod_ldg@yahoo.com' ;
$subject = "Contact form message - PixelsMarket" ;
$formurl = "contact.html" ;
$errorurl = "error.html" ;
$thankyouurl = "thankyou.html" ;

// -------------------- END OF CONFIGURABLE SECTION ---------------

$name = $_POST['name'] ;
$email = $_POST['email'] ;
$subject = $_POST['subject'] ;
$comments = $_POST['comments'] ;
$spam=$_POST['spam'] ;
$http_referrer = getenv( "HTTP_REFERER" );

if (!isset($_POST['email'])) {
	header( "Location: $formurl" );
	exit ;
}
if (empty($name) || empty($email) || empty($subject) || empty($comments) || $spam!="7") {
   header( "Location: $errorurl" );
   exit ;
}
$name = strtok( $name, "\r\n" );
$email = strtok( $email, "\r\n" );
$subject = strtok( $subject, "\r\n" );
if (get_magic_quotes_gpc()) {
	$comments = stripslashes( $comments );
}

$messageproper =

	"---------- PixelsMarket.com message ----------\n\n" . "\nTrimis de : " . $name . "\nEmail : " . $email . "\nSubiect : " . $subject . "\n\n\nMesaj : " . $comments;

mail($mailto, $subject, $messageproper, "From: \"$name\" <$email>\r\nReply-To: \"$name\" <$email>\r\nX-Mailer: chfeedback.php 2.04" );
header( "Location: $thankyouurl" );
exit ;

?>
