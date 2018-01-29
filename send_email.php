<?php

if((!empty($_POST['your-name']) && !empty($_POST['your-email']) && !empty($_POST['your-contactno'])))
{
    $to = 'centralizedspace@gmail.com';
    $subject = 'App Request';
    $message = '-:ABC Organization:-'.PHP_EOL.'--------------------------------------------------------------------------'.PHP_EOL.PHP_EOL.'Name: '.$_POST['your-name']. PHP_EOL .'EmailId: '.$_POST['your-email']. PHP_EOL .'Phone: '.$_POST['your-contactno'].PHP_EOL .'DOB: '.$_POST['your-dob']. PHP_EOL .'Appointment date: '.$_POST['your-appdate'].PHP_EOL .'Subject: '.$_POST['your-subject'].PHP_EOL .''. PHP_EOL ."Message: ".$_POST['your-message'];

    $headers = "MIME-Version: 1.0" . "\r\n";
    // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    // More headers
    // $headers .= 'From: <contactus@equihashtech.com>' . "\r\n";
    // $headers .= 'Cc: mazhar.inamdar@equihashtech.com' . "\r\n";
    $headers .= 'Reply-To: <'.$_POST['your-email'].'>';

    mail($to,$subject,$message,$headers);
    mail($_POST['your-email'],"Respond to your email","Your appointment request is received.".PHP_EOL."We will contact you as soon as possible.".PHP_EOL.PHP_EOL."Regards,".PHP_EOL."RK Hospital, Vijayapura.","MIME-Version: 1.0" . "\r\n".'Reply-To: <'.$to.'>');
    
    echo "<script>alert('"."Messege has been sent successfully."."');
    window.open('./','_self');
    </script>";
}

?>
