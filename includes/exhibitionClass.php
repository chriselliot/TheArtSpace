<?php 
require_once ('database.php');
require_once ('exArtworkClass.php');

class Exhibition {

	private $iExhibitionID;
	private $iArtistID;
	private $sTitle;
	private $sDescription;
	private $sStartDate;
	private $sEndDate;
	private $aArtworks;

	public function __construct(){

		$this->iExhibitionID = 0;
		$this->iArtistID = 0;
		$this->sTitle = "";
		$this->sDescription = "";
		$this->sStartDate = "";
		$this->sEndDate = "";
		$this->aArtworks = array();

	}

	public function load($iExhibitionID){

		$oDatabase = new Database();

		$sQuery = "SELECT ExhibitionID, ArtistID, ExhibitionTitle, ExhibitionDescription, StartDate, EndDate
				FROM tbexhibition
				WHERE ExhibitionID = ".$iExhibitionID;

		$oResult = $oDatabase->query($sQuery);
		$aExhibitionInfo = $oDatabase->fetch_array($oResult);

		$this->iExhibitionID = $aExhibitionInfo['ExhibitionID'];
		$this->iArtistID = $aExhibitionInfo['ArtistID'];
		$this->sTitle = $aExhibitionInfo['ExhibitionTitle'];
		$this->sDescription = $aExhibitionInfo['ExhibitionDescription'];
		$this->sStartDate = $aExhibitionInfo['StartDate'];
		$this->sEndDate = $aExhibitionInfo['EndDate'];

		$sQuery = "SELECT ExhibitworkID
					FROM tbexhibitwork
					WHERE ExhibitionID = ".$iExhibitionID;

		$oResult = $oDatabase->query($sQuery);

		while ($aRow = $oDatabase->fetch_array($oResult)){

			$oExArtwork = new ExhibitionArtwork();
			$oExArtwork->load($aRow["ExhibitworkID"]);
			$this->aArtworks[] = $oExArtwork;

		}

		$oDatabase-> close();

	}


	public function save(){

		$oDatabase = new Database();

		if($this->iExhibitionID == 0){

			$sQuery = "INSERT INTO tbexhibition (ExhibitionID, ArtistID, ExhibitionTitle, StartDate, EndDate, ExhibitionDescription)
						VALUES ('".$oDatabase->escape_value($this->iExhibitionID)."',
								'".$oDatabase->escape_value($this->iArtistID)."',
								'".$oDatabase->escape_value($this->sTitle)."',
								'".$oDatabase->escape_value($this->sStartDate)."',
								'".$oDatabase->escape_value($this->sEndDate)."',
								'".$oDatabase->escape_value($this->sDescription)."')";

			$oResult = $oDatabase->query($sQuery);

			if($oResult == true){
				$this->iExhibitionID = $oDatabase->get_insert_id();
			}else{
				die($sQuery . " is invalid");
			}

		}else{

			$sQuery = "UPDATE tbexhibition
						SET ExhibitionID = '".$oDatabase->escape_value($this->iExhibitionID)."',
							ArtistID = '".$oDatabase->escape_value($this->iArtistID)."',
							ExhibitionTitle = '".$oDatabase->escape_value($this->sTitle)."',
							StartDate = '".$oDatabase->escape_value($this->sStartDate)."',
							EndDate = '".$oDatabase->escape_value($this->sEndDate)."',
							ExhibitionDescription = '".$oDatabase->escape_value($this->sDescription)."',
							WHERE ExhibitionID = ".$oDatabase->escape_value($this->iExhibitionID);
							
						
			$oResult = $oDatabase->query($sQuery);
			if($oResult == false){
				die($sQuery . " is invalid");
			}
		}

		$oDatabase->close();

	}


	public function __get($sProperty){
		switch ($sProperty){
			case "ExhibitionID":
				return $this->iExhibitionID;
				break;
			case "ArtistID":
				return $this->iArtistID;
				break;
			case "ExhibitionTitle":
				return $this->sTitle;
				break;
			case "StartDate":
				return $this->sStartDate;
				break;
			case "EndDate":
				return $this->sEndDate;
				break;
			case "ExhibitionDescription":
				return $this->sDescription;
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
			case "ExhibitionID":
				$this->iExhibitionID = $value;
				break;
			case "ArtistID":
				$this->iArtistID = $value;
				break;
			case "ExhibitionTitle":
				$this->sTitle = $value;
				break;
			case "StartDate":
				$this->sStartDate= $value;
				break;
			case "EndDate":
				$this->sEndDate = $value;
				break;
			case "ExhibitionDescription":
				$this->sDescription = $value;
				break;
			default:
				die($sProperty . " cannot be written to");
		}
	}
}
/*
$oEx = new Exhibition();
$oEx->load(1);

echo '<pre>';
print_r($oEx);
echo '</pre>';*/

?>