<?php 
    require_once('includes/header.php');
    require_once('includes/categoryView.php');
    require_once('includes/categoryManager.php');
    

    $oCM = new CategoryManager();
	$aAllCategories = $oCM->getAllCategories();
	$oCV = new CategoryView();

	echo $oCV->render($aAllCategories);

    require_once('includes/footer.php');
?>












                    