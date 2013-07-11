<?php 
    require_once('includes/header.php');
    require_once('includes/artistClass.php');
    require_once('includes/artistBioView.php');
    

    $oABV = new ArtistBioView();

    $iArtistID = 1;

    if (isset($_GET['ArtistID'])) {

        $iArtistID = $_GET['ArtistID'];

    }

    $oArtist = new Artist();
    $oArtist->load($iArtistID);
    
    echo $oABV->render($oArtist);


    require_once('includes/footer.php');
?>











                    