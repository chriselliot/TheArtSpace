<?php 
require_once ('database.php');
require_once ('artworkClass.php');

class Artist {

	private $iArtistID;
	private $sFirstName;
	private $sLastName;
	private $sRegion;
	private $sProfilePic;
	private $sPreferredMedium;
	private $sEducation;
	private $sAwards;
	private $sBiography;
	private $sEmail;
	private $sPassword;
	private $iVisible;

	public function __construct(){

		$this->iArtistID = 0;
		$this->sFirstName = "";
		$this->sLastName = "";
		$this->sRegion = "";
		$this->sProfilePic = "";
		$this->sPreferredMedium = "";
		$this->sEducation = "";
		$this->sAwards = "";
		$this->sBiography = "";
		$this->sEmail = "";
		$this->sPassword = "";
		$this->iVisible = 0;
		$this->aArtworks = array();

	}

	public function load($iArtistID){

		$oDatabase = new Database();

		$sQuery = "SELECT ArtistID, FirstName, LastName, Region, ProfilePic, PreferredMedium, Education, Awards, Biography, Email, Password, Visible
				FROM tbartist
				WHERE ArtistID = ".$iArtistID;

		$oResult = $oDatabase->query($sQuery);
		$aArtistInfo = $oDatabase->fetch_array($oResult);

		$this->iArtistID = $aArtistInfo['ArtistID'];
		$this->sFirstName = $aArtistInfo['FirstName'];
		$this->sLastName = $aArtistInfo['LastName'];
		$this->sRegion = $aArtistInfo['Region'];
		$this->sProfilePic = $aArtistInfo['ProfilePic'];
		$this->sPreferredMedium = $aArtistInfo['PreferredMedium'];
		$this->sEducation = $aArtistInfo['Education'];
		$this->sAwards = $aArtistInfo['Awards'];
		$this->sBiography = $aArtistInfo['Biography'];
		$this->sEmail = $aArtistInfo['Email'];
		$this->sPassword = $aArtistInfo['Password'];
		$this->iVisible = $aArtistInfo['Visible'];

		$sQuery = "SELECT ArtworkID
					FROM tbartwork
					WHERE ArtistID = ".$iArtistID;

		$oResult = $oDatabase->query($sQuery);

		while ($aRow = $oDatabase->fetch_array($oResult)){

			$oArtwork = new Artwork();
			$oArtwork->load($aRow["ArtworkID"]);
			$this->aArtworks[] = $oArtwork;

		}

		$oDatabase-> close();

	}

	public function save(){

	}

	public function __get($sProperty){
		switch ($sProperty){
			case "ArtistID":
				return $this->iArtistID;
				break;
			case "FirstName":
				return $this->sFirstName;
				break;
			case "LastName":
				return $this->sLastName;
				break;
			case "Region":
				return $this->sRegion;
				break;
			case "ProfilePic":
				return $this->sProfilePic;
				break;
			case "PreferredMedium":
				return $this->sPreferredMedium;
				break;
			case "Education":
				return $this->sEducation;
				break;
			case "Awards":
				return $this->sAwards;
				break;
			case "Biography":
				return $this->sBiography;
				break;
			case "Email":
				return $this->sEmail;
				break;
			case "Password":
				return $this->sPassword;
				break;
			case "Visible":
				return $this->iVisible;
				break;
			default:
				die($sProperty . " cannot be read from");
		}
	}
}
/*
$oArtist = new Artist();
$oArtist->load(1);

echo '<pre>';
print_r($oArtist);
echo '</pre>';*/

?>