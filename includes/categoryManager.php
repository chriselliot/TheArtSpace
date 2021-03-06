<?php 
require_once ('database.php');
require_once ('categoryClass.php');

class CategoryManager {

	public function getAllCategories(){

		$oDatabase = new Database();

		$sQuery = "SELECT CategoryID FROM tbcategory";
		$oResult = $oDatabase->query($sQuery);

		$aCategories = array();

		while ($aRows = $oDatabase->fetch_array($oResult)){

			$oCategory = new Category();
			$oCategory->load($aRows["CategoryID"]);
			$aCategories[] = $oCategory;
		}

		$oDatabase-> close();

		return $aCategories;

	}


}
/*
$oCatMan = new CategoryManager();
$aAllCat = $oCatMan->getAllCategories();

echo '<pre>';
print_r($aAllCat);
echo '</pre>';*/
?>