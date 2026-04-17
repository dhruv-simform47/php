<?php
require __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

interface Notification{
    public function compose($recipent,$subject,$body,$cc="",$bcc="");
}


class Emailnotification implements Notification
{
    private $host;
    private $password;
    private $port;

    public function __construct($host,$password,$port)
    {
        $this->host=$host;
        $this->password=$password;
        $this->port=$port;
    }
    public function compose($recipent,$subject,$body,$cc="",$bcc="")
    {
        
        $mail=new PHPMailer(true);
        try{
        $mail->isSMTP();
        $mail->Host = $this->host;
        $mail->SMTPAuth = true;
        $mail->Username = 'ranadhruv842@gmail.com';
        $mail->Password = $this->password;
        $mail->Port = $this->port;

        $mail->setFrom('ranadhruv842@gmail.com');
        $mail->addAddress($recipent);


        if(!empty($cc)){$mail->addCC($cc);}
        if(!empty($bcc)){$mail->addBCC($bcc);}

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();

        echo "Mail Send Successfully";
    }
        catch(Exception $e)
        {
        echo $e->getMessage() . "Error sending mail";
        }
        

        
    }

}


$mailer= new Emailnotification('smtp.gmail.com','kccz uxvd bjgk hpap',587);

$mailer->compose('dhruv.rana@simformsolutions.com','Greetings','Hello Good Morning jiii!');



?>