<?php 
    require_once('includes/header.php');
    require_once('includes/categoryClass.php');
    require_once('includes/artworkView.php');
   
	$oAV = new ArtworkView();

	$iCategoryID = 1;

    if (isset($_GET['CategoryID'])) {

        $iCategoryID = $_GET['CategoryID'];

    }

    $oCat = new Category();
    $oCat->load($iCategoryID);

    echo $oAV->render($oCat);

    require_once('includes/footer.php');
?>












                    