<?php


class ExhibitionView {

	public function render($oExhibition){


		$sHTML = "";
		$sHTML .= '<div id="virtual">
			            <h1>Virtual Exhibition</h1>
			            <h1 id="virtual-heading">JAMES FISHER - <span>'.$oExhibition->ExhibitionTitle.'</span></h1>
			              <h2>Exhibition Description</h2>
			              <p>'.$oExhibition->ExhibitionDescription.'</p>
			                <img width="580" height="400" alt="James Fisher Artwork" src="assets/images/artwork2.png" />
			                <img width="580" height="400" alt="James Fisher Artwork" src="assets/images/artwork3.png" />
			                <img width="580" height="400" alt="James Fisher Artwork" src="assets/images/artwork3.png" />
			                <img width="580" height="400" alt="James Fisher Artwork" src="assets/images/artwork2.png" />
			                <div class="clear"></div>
			         </div> ';   

		return $sHTML;

	}
}

?>

