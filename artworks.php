<?php 
    require_once('includes/header.php');
    require_once('includes/artworkManager.php');
    require_once('includes/artworkView.php');
    

    $oCM = new CategoryManager();
	$aAllCategories = $oCM->getAllCategories();
	$oAV = new ArtworkView();

	echo $oAV->render($aAllCategories);

    require_once('includes/footer.php');
?>












                    