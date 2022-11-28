<?php error_reporting(0); ?>
<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $phoneNumber = $_POST['phonenumber'];
  $address = $_POST['diachi'];
  $numberMoney = $_POST['numbermoney'];

  $vaytheos = $_POST['vaytheo'];

  // if (isset($_POST['bangLuong'])) {
  //   $bangluong = $_POST['bang-Luong'];
  // } else if (isset($_POST['baoHiemNhanTho'])) {
  //   $baohiemnhantho = $_POST['bao-Hiem-Nhan-Tho'];
  // } else if (isset($_POST['hopDongVayCu'])) {
  //   $hopDongVayCu = $_POST['hop-Dong-Vay-Cu'];
  // } else if (isset($_POST['hoaDon'])) {
  //   $hoaDon = $_POST['hoa-Don'];
  // }

  try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'anhlouuku@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'mgbtifyrmltirxgu'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('anhlouuku@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('anhlouuku@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = "Khach hang moi";

    // if (isset($_POST['vaytheo'])) {
    //   foreach ($_POST['vaytheo'] as $value) {
    $mail->Body =  "<h4>Họ và tên : $name <br>
                        Địa chỉ: $address <br>
                        Số điện thoại : $phoneNumber <br>
                        Số tiền vay: $numberMoney <br>
                        Vay theo:  $vaytheos[0]
                        </h4>";
    //$bangluong $baohiemnhantho $hoaDon $hopDongVayCu

    // }
    // Vay theo : {$bangluong} $baohiemnhantho $hopDongVayCu $hoaDon
    $mail->send();
    $alert = '<div class="alert-success">
                 <span>Message Sent! Thank you for contacting us.</span>
                </div>';
  } catch (Exception $e) {
    $alert = '<div class="alert-error">
                <span>' . $e->getMessage() . '</span>
              </div>';
  }
}