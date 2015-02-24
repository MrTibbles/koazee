<?php
require_once 'MailChimp.php';
require_once 'Mandrill.php';


$servername = "mysql-55.int.mythic-beasts.com";
$username = "vaughnmck";
$password = "ecohraep";
$dbname = "vaughnmck";

$admin_email = "hey@koazee.co";
// $admin_email = "freddie@tibblesscribbles.com";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST["email"];
// $email     = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
$group_size = $_POST["group_size"];
$destination = $_POST["destination"];
$dates_depart = $_POST["dates_depart"];
$dates_return = $_POST["dates_return"];

// if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ //email validation
//     $output = json_encode(array('type'=>'error', 'text' => 'Please enter a valid email!'));
//     die($output);
// }

// /VALUES ($_POST[email], $_POST[group_size], $_POST[destination], $_POST[dates])";
$sql = "INSERT INTO enquiries (user_email, group_size, hol_destination, desired_dates)
VALUES ('$email', '$group_size', '$destination', '$dates')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    // header("Location: http://www.koazee.co/thanks.html");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    // header("Location: http://www.koazee.co");
}

mysqli_close($conn);

$admin_msg_body = "New Koazee user requested chalet details, user details: \r\n\r\n-".$email."\r\Destination : ".$destination."\r\Date of departure : " .$dates_depart."\r\Date of return : " .$dates_return."\r\nGroup size : " .$group_size;
$admin_subject = "New Koazee request";
//proceed with PHP email.
$headers = 'From: '.$email.'' . "\r\n" .
'Reply-To: '.$email.'' . "\r\n" .
'X-Mailer: PHP/' . phpversion();

$send_mail = mail($admin_email, $admin_subject, $admin_msg_body, $headers);

if(!$send_mail)
{
    //If mail couldn't be sent output error. Check your PHP email configuration (if it ever happens)
    $output = json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));
    // die($output);
    // var_dump($output);
}else{
    $output = json_encode(array('type'=>'message', 'text' => 'Hello '.$name .' Thank you for your email.'));
    // die($output);
    // var_dump($output);
}

$mail_chimp_api = 'a60447d8f049e2f867100a1f523fce52-us10';

$MailChimp = new \Drewm\MailChimp($mail_chimp_api);
$result = $MailChimp->call('lists/subscribe', array(
                'id'                => '6dc58e68fd',
                'email'             => array('email'=>$email),
                'merge_vars'        => array('EMAIL' => $email, 'GROUP' => $group_size, 'DEST' => $destination, 'MERGE3' => $dates_depart, 'MERGE4' => $dates_return),
                'double_optin'      => false,
                'update_existing'   => true,
                'replace_interests' => false,
                'send_welcome'      => true,
            ));
print_r($result);
// include('../libs/mailchimp/MCAPI.class.php');

// $options = array('list_id' => '6dc58e68fd', 'subject' => 'Welcome to Koazee', 'from_name' => $admin_email, 'from_email' => $email);
// $content = array('html' => '<p>Testo di prova</p>');

// // $api = new MCAPI($mail_chimp_api	);
// $campaignId = $MailChimp->campaignCreate('trans', $options, $content);

// // $MailChimp->listSubscribe($options['list_id']);

// $MailChimp->campaignSendNow($campaignId);

// var_dump($MailChimp->errorCode);

// if ($MailChimp->errorCode){
//     echo "Unable to Create New Campaign!";
//     echo "\n\tCode=".$MailChimp->errorCode;
//     echo "\n\tMsg=".$MailChimp->errorMessage."\n";
// } else {
//     echo "New Campaign ID:".$campaignId ."\n";
// }

header("Location: http://www.koazee.co/thanks.html");
?>