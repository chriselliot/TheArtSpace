<?php 
    require_once('includes/header.php');
    require_once("includes/form.php");
	require_once("includes/artistClass.php");
	require_once("includes/encoder.php");

	$oForm = new Form();

	if(isset($_POST["Submit"])){

	    $oTestArtist = new Artist();
	    $bLoadResult =  $oTestArtist->loadByEmail($_POST["Email"]); 

	    if($bLoadResult == false){

	         $oForm->raiseCustomError("Email","Email does not exist");

	    }else{

	        if($oTestArtist->Password == Encoder::Encode($_POST["Password"])){

	        	$_SESSION["currentUser"] = $oTestArtist->ArtistID;

                header("Location: artistbio.php?ArtistID=$oTestArtist->ArtistID"); 
                exit; 

	        }else{

	            $oForm->raiseCustomError("Password","Password is incorrect");
	        }
	    }
	} 

	$oForm->makeInput("Email", "Email");
	$oForm->makePass("Password", "Password");
	$oForm->makeSubmit("Submit", "Login");

?>

            <h1>Login</h1>
            <div id="leftcolumn">
            	<h3>Not a member?</h3>
            	<p>Go to the <a href="register.php">REGISTER</a> page.</p>
            </div><!--end of leftcolumn-->
            <div id="rightcolumn">
            <div id="login-butt">  <?php echo $oForm->html; ?> </div>
            </div><!--end of rightcolumn-->

<?php 
    require_once('includes/footer.php');
?>












                    