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
	private $aArtworks;

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

	public function loadByEmail ($sEmail){

		$oDatabase = new Database();

		$sQuery = "SELECT ArtistID FROM tbartist WHERE Email ='".$oDatabase->escape_value($sEmail)."'";
		$oResult = $oDatabase->query($sQuery);
		$aArtists = $oDatabase->fetch_array($oResult);

		$oDatabase->close();
	
		if ($aArtists != false){

			$this->load($aArtists["ArtistID"]);
			return true;
		}else {
			return false;
		}

	}

	public function save(){

		$oDatabase = new Database();

		if($this->iArtistID == 0){

			$sQuery = "INSERT INTO tbartist (FirstName, LastName, Region, ProfilePic, PreferredMedium, Education, Awards, Biography, Email, Password)
						VALUES ('".$oDatabase->escape_value($this->sFirstName)."',
								'".$oDatabase->escape_value($this->sLastName)."',
								'".$oDatabase->escape_value($this->sRegion)."',
								'".$oDatabase->escape_value($this->sProfilePic)."',
								'".$oDatabase->escape_value($this->sPreferredMedium)."',
								'".$oDatabase->escape_value($this->sEducation)."',
								'".$oDatabase->escape_value($this->sAwards)."',
								'".$oDatabase->escape_value($this->sBiography)."',
								'".$oDatabase->escape_value($this->sEmail)."',
								'".$oDatabase->escape_value($this->sPassword)."')";

			$oResult = $oDatabase->query($sQuery);

			if($oResult == true){
				$this->iArtistID = $oDatabase->get_insert_id();
			}else{
				die($sQuery . " is invalid");
			}

		}else{

			$sQuery = "UPDATE tbartist
						SET FirstName = '".$oDatabase->escape_value($this->sFirstName)."',
							LastName = '".$oDatabase->escape_value($this->sLastName)."',
							Region = '".$oDatabase->escape_value($this->sRegion)."',
							ProfilePic = '".$oDatabase->escape_value($this->sProfilePic)."',
							PreferredMedium = '".$oDatabase->escape_value($this->sPreferredMedium)."',
							Education = '".$oDatabase->escape_value($this->sEducation)."',
							Awards = '".$oDatabase->escape_value($this->sAwards)."',
							Biography = '".$oDatabase->escape_value($this->sBiography)."'
							WHERE ArtistID = ".$oDatabase->escape_value($this->iArtistID);
							
						
			$oResult = $oDatabase->query($sQuery);
			if($oResult == false){
				die($sQuery . " is invalid");
			}
		}

		$oDatabase->close();

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
			case "Artworks":
				return $this->aArtworks;
				break;
			default:
				die($sProperty . " cannot be read from");
		}
	}

	public function __set($sProperty,$value){

		switch ($sProperty){
			case "FirstName":
				$this->sFirstName = $value;
				break;
			case "LastName":
				$this->sLastName = $value;
				break;
			case "Region":
				$this->sRegion = $value;
				break;
			case "ProfilePic":
				$this->sProfilePic = $value;
				break;
			case "PreferredMedium":
				$this->sPreferredMedium = $value;
				break;
			case "Education":
				$this->sEducation = $value;
				break;
			case "Awards":
				$this->sAwards = $value;
				break;
			case "Biography":
				$this->sBiography = $value;
				break;
			case "Email":
				$this->sEmail = $value;
				break;
			case "Password":
				$this->sPassword = $value;
				break;
			default:
				die($sProperty . " cannot be written to");
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