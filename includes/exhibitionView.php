<?php
require_once ('artistClass.php');
require_once ('exArtworkClass.php');
require_once ('artworkClass.php');

class ExhibitionView {

	public function render($oExhibition){

		$oExArtist = new Artist();
		$oExArtist->load($oExhibition->ArtistID);
		$aWorks = $oExhibition->Artworks;

		$sHTML = "";
		$sHTML .= '<div id="virtual">
			            <h1>Virtual Exhibition</h1>
			            <h1 id="virtual-heading">'.strtoupper($oExArtist->FirstName).' '.strtoupper($oExArtist->LastName).'<span> - '.strtoupper($oExhibition->ExhibitionTitle).'</span></h1>
			            <div id="left-nav"><h2>Exhibition Description</h2><p>'.$oExhibition->ExhibitionDescription.'</p></div>
			              <div id="main">';

		for($i=0;$i<count($aWorks);$i++){

			$oCurrentExArtwork = $aWorks[$i];
			$oExArtwork = new ExhibitionArtwork();
			$ID = $oCurrentExArtwork->ArtworkID;
			$oExArtwork->load($ID);
			
			$oArtwork = new Artwork();
			$oArtwork->load($oCurrentExArtwork->ArtworkID);

			$sHTML .= '<div class="virtual-artwork">
						<a href="assets/images/'.$oArtwork->PhotoLink.'" title="'.$oArtwork->Title.' by '.$oExArtist->FirstName.' '.$oExArtist->LastName.'" data-lightbox="assets/images/'.$oArtwork->PhotoLink.'">
						<img alt="Artwork Image" src="assets/images/'.$oArtwork->PhotoLink.'" title="Click for larger image" /></a>
						<h3 class="title">'.$oArtwork->Title.' - '.$oArtwork->Year.'</h3>
						</div>';
		}

		$sHTML .=	 '<div class="clear"></div>
			         </div>
			         </div> ';   

		return $sHTML;

	}
}

?>

