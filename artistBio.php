<?php 
    require_once('includes/header.php');
    require_once('includes/artistClass.php');
    require_once('includes/artistBioView.php');
    require_once('includes/form.php');
    require_once("includes/class.phpmailer.php");
    

    $oABV = new ArtistBioView();

    $iArtistID = 1;

    if (isset($_GET['ArtistID'])) {

        $iArtistID = $_GET['ArtistID'];

    }

    $oArtist = new Artist();
    $oArtist->load($iArtistID);

    $oForm = new Form();

    if(isset($_POST["Submit"])){

    $oForm->data = $_POST;  
    $oForm->checkRequired("Name");
    $oForm->checkEmail("Email");
    $oForm->checkRequired("Message");
        
        if($oForm->valid==true){

            $mail = new PHPMailer();
            $mail->SetFrom($_POST["Email"], $_POST["Name"]);
            $mail->AddReplyTo($_POST["Email"],$_POST["Name"]);
            $mail->AddAddress($oArtist->Email, $oArtist->FirstName. $oArtist->LastName);
            $mail->Subject = 'Enquiry from a user of The Art Space';
            $mail->MsgHTML($_POST["Message"]);
            $mail->AltBody = $_POST["Message"];

            //Send the message, check for errors
            if(!$mail->Send()) {
              echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
              //echo "Message sent!";
              echo $oForm->raiseCustomError("Message","Message sent successfully");
            }

        }

    } 


    $oForm->makeInput("Name", "Your Name *");
    $oForm->makeInput("Email", "Email Address *");
    $oForm->makeInput("Phone", "Phone Number");
    $oForm->makeTextArea("Message", "Message *");
    $oForm->makeSubmit("Submit", "Send");
    
    echo $oABV->render($oArtist, $oForm);

    require_once('includes/footer.php');
?>











                    