<?php 
    require_once('includes/header.php');
    require_once('includes/form.php');
    require_once('includes/artistClass.php');
    require_once("includes/encoder.php");

    if(isset($_SESSION["currentUser"]) == false){

        header("Location: login.php"); 
        exit;

    }else{

        $iUserID = $_SESSION["currentUser"];
        $oArtist = new Artist();
        $oArtist->load($iUserID);

        $aData = array();
        $aData["FirstName"] = $oArtist->FirstName;
        $aData["LastName"] = $oArtist->LastName;
        $aData["Region"] = $oArtist->Region;
        $aData["ProfilePic"] = $oArtist->ProfilePic;
        $aData["PreferredMedium"] = $oArtist->PreferredMedium;
        $aData["Education"] = $oArtist->Education;
        $aData["Awards"] = $oArtist->Awards;
        $aData["Biography"] = $oArtist->Biography;

        $oForm = new Form();

        $oForm->data = $aData;

        if(isset($_POST["Submit"])){

        $oForm->data = $_POST;
        $oForm->files = $_FILES;

        $oForm->checkRequired("FirstName");
        $oForm->checkRequired("LastName");
        $oForm->checkImageUpload("ProfilePic");
        $oForm->checkRequired("Biography");
    	    
    	    if($oForm->valid==true){

                $sNewName = substr(Encoder::Encode($oArtist->Password),0,10).".jpg";
                $oForm->moveFile("ProfilePic",$sNewName);
    	    	
    	    	$oArtist->FirstName = $_POST["FirstName"];
    	    	$oArtist->LastName = $_POST["LastName"];
    	    	$oArtist->Region = $_POST["Region"];
    	    	$oArtist->ProfilePic = $sNewName;
    	    	$oArtist->PreferredMedium = $_POST["PreferredMedium"];
                $oArtist->Education = $_POST["Education"];
    	    	$oArtist->Awards = $_POST["Awards"];
    	    	$oArtist->Biography = $_POST["Biography"];
    	    	$oArtist->save();

    	    	header("Location: artistbio.php?ArtistID=$oArtist->ArtistID"); 
                exit;
    	    }

    	} 

        $oForm->makeInput("FirstName","First Name *");
    	$oForm->makeInput("LastName","Last Name *");
    	$oForm->makeInput("Region","Region");
    	$oForm->makeFileUpload("ProfilePic","Profile Image");
    	$oForm->makeInput("PreferredMedium","Preferred Medium");
    	$oForm->makeInput("Education", "Education");
    	$oForm->makeInput("Awards", "Awards");
    	$oForm->makeTextArea("Biography", "Biography *");
    	$oForm->makeSubmit("Submit", "Register");
}

?>
            
            <h1>Edit Artist Biography</h1>
            <div id="leftcolumn">
                
                <div class="profilepic"><img alt="Artist Profile pic" src="assets/images/profiles/<?php echo $oArtist->ProfilePic ?> " /></div>
                <h3><?php echo $oArtist->FirstName.' '.$oArtist->LastName; ?></h3><br />
               <p>You can update your biography page here. Simply modify the form data and click update.</p>
               <p>Update your artworks on the <a href="manageartworks.php">MANAGE ARTWORKS</a> page.</p> 
               <p>* Required fields</p> 
            </div><!--end of leftcolumn-->
            <div id="rightcolumn">
                <div id="edit">  <?php echo $oForm->html; ?> </div>
            </div><!--end of rightcolumn-->

<?php 
    require_once('includes/footer.php');
?>












                    