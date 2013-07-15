<?php

class CategoryView {

	public function render($aCategories){

		$sHTML = "";
		$sHTML .= '<h1>Artwork Categories</h1>';   

		$sHTML .= '<div id="fullwidth">
		            <h3>Click on a category below to view artworks.</h3><p></p>';

		$sHTML .= '<ul id="artwork-nav">';

		for ($i=0;$i<count($aCategories);$i++) {

			$oCurrentCategory = $aCategories[$i];
			$sHTML .= '<li><a class="'.htmlentities($oCurrentCategory->CategoryName).'" href="artworks.php?CategoryID='.htmlentities($oCurrentCategory->CategoryID).'">'.htmlentities($oCurrentCategory->CategoryName).'</a></li>';
		}

		$sHTML .= '</ul>';

		$sHTML .= '</div><!--end of fullwidth-->';

		return $sHTML;

	}
}
?>

