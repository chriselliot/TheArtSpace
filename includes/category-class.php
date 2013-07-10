<?php 
require_once ('db-wrapper.php');
require_once ('artwork-class.php');

class Category {

	private $iCategoryID;
	private $sCategoryName;

	public function __construct(){

		$this->iCategoryID = 0;
		$this->sCategoryName = "";
		$this->aArtworks = array();

	}

	public function load($iCategoryID){

		$oDatabase = new Database();

		$sQuery = "SELECT CategoryID, CategoryName 
					FROM tbcategory 
					WHERE CategoryID = ".$iCategoryID;
		
		$oResult = $oDatabase->query($sQuery);
		$aCategoryInfo = $oDatabase->fetch_array($oResult);

		$this->iCategoryID = $aCategoryInfo['CategoryID'];
		$this->sCategoryName = $aCategoryInfo['CategoryName'];

		$sQuery = "SELECT ArtworkID
					FROM tbartwork
					WHERE CategoryID = ".$iCategoryID;

		$oResult = $oDatabase->query($sQuery);

		while($aRow = $oDatabase->fetch_array($oResult)){

			$oArtwork = new Artwork();
			$oArtwork->load($aRow["ArtworkID"]);
			$this->aArtworks[] = $oArtwork;
		}

		$oDatabase-> close();
	}

	public function __get($sProperty){
		switch ($sProperty){
			case "CategoryID":
				return $this->iCategoryID;
				break;
			case "CategoryName":
				return $this->sCategoryName;
				break;
			case "Artworks":
				return $this->aArtworks;
				break;
			default:
				die($sProperty . " cannot be read from");
		}
	}
}

$oCat = new Category();
$oCat->load(1);

echo '<pre>';
print_r($oCat);
echo '</pre>';
?>