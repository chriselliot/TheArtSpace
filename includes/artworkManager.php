<?php 
require_once ('database.php');
require_once ('artworkClass.php');

class ArtworkManager {

	public function getAllArtworks(){

		$oDatabase = new Database();

		$sQuery = "SELECT ArtworkID FROM tbartwork";
		$oResult = $oDatabase->query($sQuery);

		$aArtworks = array();

		while ($aRows = $oDatabase->fetch_array($oResult)){

			$oArtwork = new Artwork();
			$oArtwork->load($aRows["ArtworkID"]);
			$aArtworks[] = $oArtwork;
		}

		$oDatabase-> close();

		return $aArtworks;

	}


}

/*
$oArtMan = new ArtworkManager();
$aAllArt = $oArtMan->getAllArtworks();

echo '<pre>';
print_r($aAllArt);
echo '</pre>';*/
?>