<?php 
require_once ('database.php');
require_once ('artistClass.php');

class ArtistManager {

	public function getAllArtists(){

		$oDatabase = new Database();

		$sQuery = "SELECT ArtistID FROM tbartist";
		$oResult = $oDatabase->query($sQuery);

		$aArtists = array();

		while ($aRows = $oDatabase->fetch_array($oResult)){

			$oArtist = new Artist();
			$oArtist->load($aRows["ArtistID"]);
			$aArtists[] = $oArtist;
		}

		$oDatabase-> close();

		return $aArtists;

	}


}

/*
$oArtistMan = new ArtistManager();
$aAllArtists = $oArtistMan->getAllArtists();

echo '<pre>';
print_r($aAllArtists);
echo '</pre>';*/
?>