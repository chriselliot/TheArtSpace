<?php 
    require_once('includes/header.php');
    require_once('includes/artworkManager.php');
    $oArtworkMan = new ArtworkManager();
    $aAllArtworks = $oArtworkMan->getAllArtworks();
?>

        <h1>Artworks</h1>

        <div id="leftcolumn"></div><!--end of leftcolumn-->
        <div id="rightcolumn"></div><!--end of rightcolumn-->
        

<?php 
    require_once('includes/footer.php');
    echo '<pre>'; 
    print_r($aAllArtworks); 
    echo '</pre>';
?>












                    