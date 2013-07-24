<?php 
    require_once('includes/header2.php');
    require_once('includes/exhibitionView.php');
    require_once('includes/exhibitionClass.php');
    
    $oExhibition = new Exhibition();
    $oExhibition->loadCurrent();
    
    $oEV = new ExhibitionView();
    echo $oEV->render($oExhibition);

    require_once('includes/footer.php');
?>












                    