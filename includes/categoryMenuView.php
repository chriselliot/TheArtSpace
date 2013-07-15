<?php 

class MenuView {

	public function render($aCategories){

		$sHTML = '';
		$sHTML .= '<ul id="cat-nav">';

		for ($i=0;$i<count($aCategories);$i++) {

			$oCurrentCategory = $aCategories[$i];
			$sHTML .= '<li><a href="artworks.php?CategoryID='.htmlentities($oCurrentCategory->CategoryID).'">'.htmlentities($oCurrentCategory->CategoryName).'</a></li>';
		}

		$sHTML .= '</ul>';
		return $sHTML;

	}
}

?>