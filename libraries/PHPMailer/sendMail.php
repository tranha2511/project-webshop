<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require 'vendor/autoload.php'; // do không dùng composer nên đường dẫn này không tồn tại

// Nhúng thủ công 3 class sau theo đúng thứ tự:
require_once 'assets/libraries/PHPMailer/src/PHPMailer.php';
require_once 'assets/libraries/PHPMailer/src/SMTP.php';
require_once 'assets/libraries/PHPMailer/src/Exception.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
    // Cấu hình gửi mail có dấu
    $mail->Charset = 'UTF8';
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through  // Dùng host của gmail
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username = 'tranha251101@gmail.com';                     //SMTP username = tài khoản mail cá nhân của bạn

    $mail->Password = 'rostgmvczraytlyo';                            //SMTP password  // không phải mật khẩu đăng nhập gmail
    // Phải dùng mật khẩu ứng dụng -> tạo mật khẩu ứng dụng  rostgmvczraytlyo

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('tranha251101@gmail.com', 'From TrnHa Store');
    //$mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
    $mail->addAddress('tranha251101@gamil.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
    // Tìm hiểu thêm 3 cái trển

    //Attachments
    // Copy một file bất kì cùng cấp với file hiện tại
    $mail->addAttachment('test_mail.jpg');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Lời cảm ơn';
    $mail->Body    = '<h2>TrnHa Store</h2>, body mail test';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>  