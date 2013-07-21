<?php 
require_once ('database.php');

class ExhibitionArtwork {

	private $iExhibitworkID;
	private $iExhibitionID;
	private $iArtworkID;

	public function __construct(){

		$this->iExhibitworkID = 0;
		$this->iExhibitionID = 0;
		$this->iArtworkID = 0;

	}

	public function load($iExhibitworkID){

		$oDatabase = new Database();
		$sQuery = "SELECT ExhibitworkID, ExhibitionID, ArtworkID
					FROM tbexhibitwork
					WHERE ExhibitworkID = ".$iExhibitworkID;

		$oResult = $oDatabase->query($sQuery);
		$aExArtworkInfo = $oDatabase->fetch_array($oResult);

		$this->iExhibitworkID = $aExArtworkInfo['ExhibitworkID'];
		$this->iExhibitionID = $aExArtworkInfo['ExhibitionID'];
		$this->iArtworkID = $aExArtworkInfo['ArtworkID'];

		$oDatabase-> close();

	}

	public function save(){

		$oDatabase = new Database();

		if($this->iExhibitworkID == 0){

			$sQuery = "INSERT INTO tbexhibitwork (ExhibitworkID, ExhibitionID, ArtworkID)
						VALUES ('".$oDatabase->escape_value($this->iExhibitworkID)."',
								'".$oDatabase->escape_value($this->iExhibitionID)."',
								'".$oDatabase->escape_value($this->iArtworkID)."')";

			$oResult = $oDatabase->query($sQuery);

			if($oResult == true){
				$this->iExhibitworkID = $oDatabase->get_insert_id();
			}else{
				die($sQuery . " is invalid");
			}

		}else{

			$sQuery = "UPDATE tbexhibitwork
						SET ExhibitworkID = '".$oDatabase->escape_value($this->iExhibitworkID)."',
							ExhibitionID = '".$oDatabase->escape_value($this->iExhibitionID)."',
							ArtworkID = '".$oDatabase->escape_value($this->iArtworkID)."',
							WHERE ExhibitworkID = ".$oDatabase->escape_value($this->iExhibitworkID);
							
						
			$oResult = $oDatabase->query($sQuery);
			if($oResult == false){
				die($sQuery . " is invalid");
			}
		}

		$oDatabase->close();

	}

	public function __get($sProperty){
		switch ($sProperty){
			case "ExhibitworkID":
				return $this->iExhibitworkID;
				break;
			case "ExhibitionID":
				return $this->iExhibitionID;
				break;
			case "ArtworkID":
				return $this->iArtworkID;
				break;
			default:
				die($sProperty . " cannot be read from");
		}
	}

	public function __set($sProperty,$value){
		switch ($sProperty){
			case "ExhibitworkID":
				$this->iExhibitworkID = $value;
				break;
			case "ExhibitionID":
				$this->iExhibitionID = $value;
				break;
			case "ArtworkID":
				$this->iArtworkID = $value;
				break;
			default:
				die($sProperty . " cannot be written to");
		}
	}

}