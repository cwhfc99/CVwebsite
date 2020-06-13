<?php

    $userName = $_GET['uName'];
    $userEmail = $_GET['uEmail'];
    $userMessage = $_GET['uMessage'];

    $errors = false;

    if (($userName == '')||($userEmail == '')||($userMessage == '')||(((filter_var($userEmail, FILTER_VALIDATE_EMAIL))) == false))
    {
        //errors exist
        header('Location: index.php?contactFormErrors=true#contact');
    }
    else
    {
        //no errors exist
        $message = wordwrap('From: '.$userName.', '.$userEmail."\r\n".'Message: '.$userMessage, 70);

        $headers = "From:calumwillis99@gmail.com\r\n";

        if (mail('cw@calumwillis.com', 'Website Contact Message', $message, $headers)==false)
        {
            header('Location: index.php?contactFormErrors=true#contact');
        }
        else
        {
            header('Location: index.php?contactFormErrors=false#contact');
        }

    }


?>
