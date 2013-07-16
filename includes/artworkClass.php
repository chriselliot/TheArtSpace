<?php 
require_once ('database.php');

class Artwork {

	private $iArtworkID;
	private $iCategoryID;
	private $iArtistID;
	private $sTitle;
	private $sDescription;
	private $iYear;
	private $sMaterials;
	private $sSize;
	private $sSaleStatus;
	private $iPrice;
	private $sPhotoLink;
	private $iVisible;

	public function __construct(){

		$this->iArtworkID = 0;
		$this->iCategoryID = 0;
		$this->iArtistID = 0;
		$this->sTitle = "";
		$this->sDescription = "";
		$this->iYear = 0;
		$this->sMaterials = "";
		$this->sSize = "";
		$this->sSaleStatus = "";
		$this->iPrice = 0;
		$this->sPhotoLink = "";
		$this->iVisible = 0;

	}

	public function load($iArtworkID){

		$oDatabase = new Database();
		$sQuery = "SELECT ArtworkID, CategoryID, ArtistID, Title, Description, Year, Materials, Size, SaleStatus, Price, PhotoLink, Visible 
					FROM tbartwork
					WHERE ArtworkID = ".$iArtworkID;

		$oResult = $oDatabase->query($sQuery);
		$aArtworkInfo = $oDatabase->fetch_array($oResult);

		$this->iArtworkID = $aArtworkInfo['ArtworkID'];
		$this->iCategoryID = $aArtworkInfo['CategoryID'];
		$this->iArtistID = $aArtworkInfo['ArtistID'];
		$this->sTitle = $aArtworkInfo['Title'];
		$this->sDescription = $aArtworkInfo['Description'];
		$this->iYear = $aArtworkInfo['Year'];
		$this->sMaterials = $aArtworkInfo['Materials'];
		$this->sSize = $aArtworkInfo['Size'];
		$this->sSaleStatus = $aArtworkInfo['SaleStatus'];
		$this->iPrice = $aArtworkInfo['Price'];
		$this->sPhotoLink = $aArtworkInfo['PhotoLink'];
		$this->iVisible = $aArtworkInfo['Visible'];

		$oDatabase-> close();

	}

	public function save(){

	}

	public function __get($sProperty){
		switch ($sProperty){
			case "ArtworkID":
				return $this->iArtworkID;
				break;
			case "CategoryID":
				return $this->iCategoryID;
				break;
			case "ArtistID":
				return $this->iArtistID;
				break;
			case "Title":
				return $this->sTitle;
				break;
			case "Description":
				return $this->sDescription;
				break;
			case "Year":
				return $this->iYear;
				break;
			case "Materials":
				return $this->sMaterials;
				break;
			case "Size":
				return $this->sSize;
				break;
			case "SaleStatus":
				return $this->sSaleStatus;
				break;
			case "Price":
				return $this->iPrice;
				break;
			case "PhotoLink":
				return $this->sPhotoLink;
				break;
			case "Visible":
				return $this->iVisible;
				break;
			default:
				die($sProperty . " cannot be read from");
		}
	}

	public function __set($sProperty,$value){
		switch ($sProperty){
			case "CategoryID":
				$this->iCategoryID = $value;
				break;
			case "ArtistID":
				$this->iArtistID = $value;
				break;
			case "Title":
				$this->sTitle = $value;
				break;
			case "Description":
				$this->sDescription = $value;
				break;
			case "Year":
				$this->iYear = $value;
				break;
			case "Materials":
				$this->sMaterials = $value;
				break;
			case "Size":
				$this->sSize = $value;
				break;
			case "SaleStatus":
				$this->sSaleStatus = $value;
				break;
			case "Price":
				$this->iPrice = $value;
				break;
			case "PhotoLink":
				$this->sPhotoLink = $value;
				break;
			default:
				die($sProperty . " cannot be written to");
		}
	}

}