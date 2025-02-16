<?php
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
function sendMail($recipient, $name,$reservationDate,$time,$number_of_people,$orderlist = "None",$transactionRef, $total = 0){
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'perez.menard.nomiddlename@gmail.com';                     //SMTP username
    $mail->Password   = 'anyk glij oknf xgbw';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('perez.menard.nomiddlename@gmail.com', 'HYGGE');
    $mail->addAddress($recipient);     //Add a recipient
   $orders = "";
   $items = json_decode($orderlist,true) ?? [];
   if(count($items) > 0){
      foreach($items['items'] as $item){
       $orders .= "<li>".$item['name']." x ".$item['quantity']." ".$item['price']."</li>";
    }
    }
       
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'HYYGE RESTAURANT RESERVATION';
    $mail->Body    = "
    <p>Dear {$name},</p>
    <p>Thank you for choosing Hygge Restaurant! Your transaction has been successfully confirmed.</p>
    <p>Here are the details:</p>
    <ul>
    <li>Name: {$name} </li>
    <li>Date: {$reservationDate} </li>
    <li>Time: {$time} </li>
    <li>Number of People: {$number_of_people} </li>
    <li>Order List: <ul>{$orders}</ul> </li>
    <li>Transaction Reference: {$transactionRef} </li>
    <li>Total: {$total} </li>
    </ul>
    <p>We look forward to serving you. If you have any special requests or need to make changes, please contact us at hygge_testmail@gmail.com</p>
    <p>See you soon!</p>
    <p>Best regards,</p>
    <b>Hygge Restaurant</b>
    <p>Rosario Commercial Lane, Rosario Avenue, Rosario Complex, San Pedro City, Laguna 4023</p>
    <p>Cellphone: (+63) 912-345-6789</p>
    <p>Telephone: (02) 123-4567</p>
    <p>Email: hygge_testemail@gmail.com</p>

    ";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>