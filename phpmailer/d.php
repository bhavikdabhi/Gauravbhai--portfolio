
<?php

// Check if the form has been submitted
if(isset($_POST['submit'])) {
    // Retrieve form data
    $fname = $_POST['inputName'];
    $lname = $_POST['inputLName'];
    $email = $_POST['inputEmail'];
    $subject = "Feedback Form";
    $rev = $_POST['inputrev'];
    $message = $_POST['inputMessage'];

    $fullname = $fname . ' ' . $lname;

   
} else {
    // If form not submitted, redirect or display an error message
    echo "Form not submitted!";
}
$body = ' <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Received Mail</title>
<style>
  body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f4f4f4;
    padding: 20px;
  }
  .container {
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    border-radius: 5px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  h2 {
    text-align: center;
    margin-bottom: 20px;
  }
  .message {
    padding: 20px;
    border-left: 4px solid #007bff;
    background-color: #f0f9ff;
    margin-bottom: 20px;
  }
  .message p {
    margin: 0;
    font-style: italic;
  }
  .details {
    margin-bottom: 20px;
  }
  .details table {
    width: 100%;
    border-collapse: collapse;
  }
  .details th, .details td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    text-align: left;
  }
</style>
</head>
<body>

<div class="container">
  <h2>Received Mail</h2>

  <div class="message">
    <p style="text-align: center;">You got a new message '. $email .'</p>
    <p><span style="font-size: 14pt;">Hello, I am '. $fullname . '</span></p>
    <p style="font-size: 11pt;">Subject: '.  $subject  .'</p>
     <p style="font-size: 12pt;">Review: '.  $rev .'</p>
    <p style="padding: 12px; border-left: 4px solid #007bff; font-style: italic;">' .$message .'</p>
  </div>

  <div class="details">
    <h3>Message Details:</h3>
    <table>
      <tr>
        <th>Full Name</th>
        <td>'. $fullname .'</td>
      </tr>
      <tr>
        <th>Email</th>
        <td>'. $email.'</td>
      </tr>
      <tr>
        <th>Subject</th>
        <td>'. $subject .'</td>
      </tr>
      <tr>
        <th>Review</th>
        <td>'. $rev .'</td>
      </tr>
      <tr>
        <th>Message</th>
        <td>'. $message .'</td>
      </tr>
    </table>
  </div>
</div>

</body>
</html>'
?>
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {

                      //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'bhavikdabhi3777@gmail.com';                     //SMTP username
$mail->Password   = 'rpia uzjt pgih tyws';                               //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//Recipients
$mail->setFrom($email, $fullname);

$mail->addAddress('bhavikdabhi3777@gmail.com', 'Bhavik Dabhi'); //Add a recipient     //Add a recipient
$mail->addAddress($email);    
               //Name is optional
//$mail->addReplyTo($email, $fullname);
//$mail->addCC($email, $fullname);
//$mail->addBCC($email, $fullname);
//Content
$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject =  $subject;

$mail->Body    = $body;
$mail->AltBody = $fullname;

$mail->send();
echo '<script>alert("Message has been sent")</script>';
header('Location: feedback.html');
 exit;

} catch (Exception $e) {

}

?>
  

