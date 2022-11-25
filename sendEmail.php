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
  // if (isset($_POST['vaytheo'])) {
  //   $vaytheos = $_POST['vaytheo'];
  // }
  if (isset($_POST['bangLuong']) || isset($_POST['baoHiemNhanTho']) || isset($_POST['hopDongVayCu']) || isset($_POST['hoaDon'])) {
    $bangluong = $_POST['bang-Luong'];
    $baohiemnhantho = $_POST['bao-Hiem-Nhan-Tho'];
    $hopDongVayCu = $_POST['hop-Dong-Vay-Cu'];
    $hoaDon = $_POST['hoa-Don'];
  }

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
    $mail->Subject = 'New Finance client ';

    // if (isset($_POST['vaytheo'])) {
    //   foreach ($_POST['vaytheo'] as $value) {
    $mail->Body =  "<h4>Họ và tên : $name <br>
                        Địa chỉ: $address <br>
                        Số điện thoại : $phoneNumber <br>
                        Số tiền vay: $numberMoney <br>
                        

                        </h4>";
    // }
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