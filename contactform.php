<?php

    $mail_to = "info@pepperwrapper.com";
    $message = $_POST['message'];
    $subject = "Test";
    
    
    mail($mail_to, $subject, $message);
    
    header("Location: index.html");
?>
