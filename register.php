<?php 
    require_once('includes/header.php');
    require_once('includes/form.php');
    require_once('includes/artistClass.php');
    require_once("includes/encoder.php");
    require_once("includes/class.phpmailer.php");

    $oForm = new Form();

    if(isset($_POST["Submit"])){

    $oForm->data = $_POST;
    $oForm->files = $_FILES;
    $oForm->checkRequired("FirstName");
    $oForm->checkRequired("LastName");
    $oForm->checkImageUpload("ProfilePic");
    $oForm->checkRequired("Biography");
    $oForm->checkEmail("Email");
    $oForm->checkRequired("Password");
    $oForm->checkRequired("ConfirmPassword");

    $oTestArtist = new Artist();
    $bLoadResult = $oTestArtist->loadByEmail($_POST["Email"]);
    
	    if($bLoadResult == true){
	    	$oForm->raiseCustomError("Email","This email is already taken");
	    }

	    if($_POST["ConfirmPassword"] != $_POST["Password"]){
	    	$oForm->raiseCustomError("ConfirmPassword","Password does not match");
	    }

	    if(count($_POST["ProfilePic"]) == 0) {
	    	$_POST["ProfilePic"] = "default-profile.png";
	    }
	    
	    if($oForm->valid==true){

            $sNewName = "profiles/".substr(Encoder::Encode($oArtist->Password),0,10).".jpg";
            $oForm->moveFile("ProfilePic",$sNewName);
	    	
            $oArtist = new Artist();
	    	$oArtist->FirstName = $_POST["FirstName"];
	    	$oArtist->LastName = $_POST["LastName"];
	    	$oArtist->Region = $_POST["Region"];
	    	$oArtist->ProfilePic = $sNewName;
	    	$oArtist->PreferredMedium = $_POST["PreferredMedium"];
	    	$oArtist->Awards = $_POST["Awards"];
	    	$oArtist->Biography = $_POST["Biography"];
	    	$oArtist->Email = $_POST["Email"];
	    	$oArtist->Password = Encoder::Encode($_POST["Password"]);
	    	$oArtist->Password = Encoder::Encode($_POST["ConfirmPassword"]);
	    	$oArtist->save();

	    	$mail = new PHPMailer();
            $mail->SetFrom('admin@theartspace.com', 'The Art Space administrator');
            $mail->AddReplyTo('no-reply@theartspace.com','No Reply');
            $mail->AddAddress($_POST["Email"], $_POST["FirstName"]);
            $mail->Subject = 'Welcome to The Art Space';
            $mail->MsgHTML('Your registration with The Art Space was successful.');
            $mail->AltBody = 'Your registration with The Art Space was successful.';
            $mail->AddAttachment('assets/images/logo-white.png');

            //Send the message, check for errors
            if(!$mail->Send()) {
              echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
              echo "Message sent!";
            }

            $_SESSION["currentUser"] = $oArtist->ArtistID;

	    	header("Location: manageartworks.php"); 
            exit;
	    }

	} 

    $oForm->makeInput("FirstName","First Name *");
	$oForm->makeInput("LastName","Last Name *");
	$oForm->makeInput("Region","Region");
	$oForm->makeFileUpload("ProfilePic","Profile Image *");
	$oForm->makeInput("PreferredMedium","Preferred Medium");
	$oForm->makeInput("Education", "Education");
	$oForm->makeInput("Awards", "Awards");
	$oForm->makeTextArea("Biography", "Biography *");
	$oForm->makeInput("Email", "Email *");
	$oForm->makePass("Password", "Password *");
	$oForm->makePass("ConfirmPassword", "Confirm Password *");
	$oForm->makeSubmit("Submit", "Register");

?>
            
            <h1>Register with us</h1>
            <div id="leftcolumn">
               <h3>To set up your own Artist biography page, simply fill in this form.</h3><br />
               <p>Once registered and logged in, you can upload new artworks on the <a href="manageartworks.php">MANAGE ARTWORKS</a> page or change your biography details on the <a href="editartistbio.php">UPDATE MY BIO</a> page.</p> 
               <p>* Required fields</p>
            </div><!--end of leftcolumn-->
            <div id="rightcolumn">

              <?php echo $oForm->html ?>
            </div><!--end of rightcolumn-->

<?php 
    require_once('includes/footer.php');
?>












                    