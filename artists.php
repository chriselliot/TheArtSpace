<?php 
    require_once('includes/header.php');
    require_once('includes/artistManager.php');
    require_once('includes/artistView.php');

    
    $oAM = new ArtistManager();
    $aAllArtists = $oAM->getAllArtists();

    $oAV = new ArtistView();
    echo $oAV->render($aAllArtists);


    require_once('includes/footer.php');

?>












                    