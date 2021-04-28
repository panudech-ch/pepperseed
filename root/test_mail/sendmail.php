<?php
    /*use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    date_default_timezone_set('Australia/Sydney');

    $phpMail = new PHPMailer(true);

        //Server settings
        $phpMail->SMTPDebug = 2;
        $phpMail->isSMTP();
        $phpMail->Host = 'webcloud43.au.syrahost.com';
        //$phpMail->Host = 'smtp.gmail.com';
        //$phpMail->Username = 'equierze@gmail.com';
        //$phpMail->Password = 'Noonaek16';
        $phpMail->SMTPAuth = true;
        $phpMail->Username = 'eat@pepperseeds.com.au';
        $phpMail->Password = 'Porsche418';
        $phpMail->SMTPSecure = 'tls';
        $phpMail->Port = 587;


        //Recipients
        $phpMail->setFrom('eat@pepperseeds.com.au', 'PepperSeeds Order Online');
        //$phpMail->setFrom('equierze@gmail.com', 'PepperSeeds Order Online');
        $phpMail->addAddress('chawapon.wit@gmail.com', 'test customer');
//        $phpMail->addReplyTo($toInfo, 'Information');
       // $phpMail->addReplyTo('equierze@gmail.com', 'Information');

        //Content
        $phpMail->isHTML(true);                                  // Set email format to HTML
        $phpMail->Subject = 'Send By SMTP';
        $phpMail->Body    = 'test send smtp by phpMailer on crazydomain.';

        if($phpMail->send()){
            echo "Send Email Success";
        }else{
            error_log('Message could not be sent. Mailer Error: '.$phpMail->ErrorInfo,0);
        }
       

*/
?>