<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

require_once 'libraries/PHPMailer/src/PHPMailer.php';
require_once 'libraries/PHPMailer/src/SMTP.php';
require_once 'libraries/PHPMailer/src/Exception.php';


class Helper
{
  const STATUS_ACTIVE = 1;
  const STATUS_DISABLED = 0;
  const STATUS_ACTIVE_TEXT = 'Active';
  const STATUS_DISABLED_TEXT = 'Disabled';

  /**
   * Get status text
   * @param int $status
   * @return string
   */

  public static function sendMail($subject, $to, $body){
    $mail = new PHPMailer(true);

try {
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
    
    $mail->CharSet = 'utf8';
    
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                     
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username = 'tranha251101@gmail.com';                    

    $mail->Password = 'rostgmvczraytlyo';                          
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                   
    //Recipients
    $mail->setFrom('tranha251101@gmail.com', 'From TrnHa Store');
    $mail->addAddress($to);               

    //Attachments
    $mail->addAttachment('assets/img/trnha-store-black.jpg');   

    //Content
    $mail->isHTML(true);                            
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



  }


  public static function getStatusText($status = 0) {
    $status_text = '';
    switch ($status) {
      case self::STATUS_ACTIVE:
        $status_text = self::STATUS_ACTIVE_TEXT;
        break;
      case self::STATUS_DISABLED:
        $status_text = self::STATUS_DISABLED_TEXT;
        break;
    }
    return $status_text;
  }

    /**
     * Chuy???n ?????i chu???i k?? t??? c?? d???u th??nh chu???i k?? t??? kh??ng d???u, ng??n c??ch  nhau b???i k?? t??? -
     * @param $str
     * @return null|string|string[]
     */
  public static function getSlug($str) {
    $str = trim(mb_strtolower($str));
    $str = preg_replace('/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/', 'a', $str);
    $str = preg_replace('/(??|??|???|???|???|??|???|???|???|???|???)/', 'e', $str);
    $str = preg_replace('/(??|??|???|???|??)/', 'i', $str);
    $str = preg_replace('/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/', 'o', $str);
    $str = preg_replace('/(??|??|???|???|??|??|???|???|???|???|???)/', 'u', $str);
    $str = preg_replace('/(???|??|???|???|???)/', 'y', $str);
    $str = preg_replace('/(??)/', 'd', $str);
    $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
    $str = preg_replace('/([\s]+)/', '-', $str);
    return $str;
  }

}