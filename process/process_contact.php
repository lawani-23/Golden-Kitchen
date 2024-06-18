<?php
require_once "../classes/Message.php";

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

 $sm = new Message;
 $sm->send_message_mailer( $phone,$email, $phone, $message);

?>