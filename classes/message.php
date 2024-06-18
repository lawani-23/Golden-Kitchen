
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '../vendor/autoload.php';

 class Message{

        public function send_message_mailer($email,$msg){

          
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'lawikos@gmail.com';                     //SMTP username
                $mail->Password   = 'rwwu fvyj yylm pvxz';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                // //Recipients
                $mail->setFrom('lawikos@gmail.com', 'Devfest Omlione');
                $mail->addAddress( $email, 'website Visitor');     //Add a recipient
                // $mail->addAddress('ellen@example.com');               //Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');
            
                //Attachments
                $mail->addAttachment();         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Thank you for contacting us';
                $mail->Body    = "your message $msg was received. <br> you need to send the following:
                <ul> 
                        <li> Passport </li>
                        <li> Registration  form </li>
                </ul>";
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

        }



    public function send_message($name,$email, $phone,$msg){

        echo " thank you";

        // $check = mail($to, $subject,$message,$header,$opt);
        //

        $header = "from: Devfest Website <admin@devfest.com>"."\r\n";
        $subject = "thank you for contacting us";
        $message = " your message $msg has been received <b> "."\r\n"."Thank you"."\r\n"."<img 
        src='http://devfest.com/assets/static/images/11.png";
        $check = mail($email,$subject, $message);
        if($check){
            echo "thank you for contacting us ";
        }else{
            echo "please try again";
        }
    }
 }


?>