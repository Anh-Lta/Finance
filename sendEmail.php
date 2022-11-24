<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';
$mail = new PHPMailer(true);
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $phoneNumber = $_POST['phonenumber'];
  $address = $_POST['diachi'];
  $numberMoney = $_POST['numbermoney'];
  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'anhlouuku@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'Changepw06111'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';
    $mail->setFrom('anhlouuku@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('anhlouuku@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
    $mail->isHTML(true);
    $mail->Subject = 'Message Received (Contact Page)';
    $mail->Body = "<h3>Name : $name <br>Địa chỉ: $address <br>Sđt : $phoneNumber <br>Số tiền vay: $numberMoney</h3>";
    $mail->send();
    $alert = '<div class="alert-success">
                 <span>Message Sent! Thank you for contacting us.</span>
                </div>';
  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}
?>