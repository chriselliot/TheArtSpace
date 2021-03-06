<?php
require_once ('artistClass.php');

class ArtworkView {

	public function render($oCategory){

		$aArtworks = $oCategory->Artworks;

		$sHTML = "";
		$sHTML .= '<h1>'.$oCategory->CategoryName.' Artworks</h1>';   

		$sHTML .= '<div id="fullwidth">
		            <h3>Click on the Artists name for more artwork information or contact details.</h3><p></p>';

		for ($i=0;$i<count($aArtworks);$i++){

			$oCurrentArtwork = $aArtworks[$i];

			if($oCurrentArtwork->Visible == 1){

				$oArtist = new Artist();
				$iID = $oCurrentArtwork->ArtistID;
				$oArtist->load($iID);

				$sHTML .= '<div class="artworks-small">
			                    <h3 class="title">'.$oCurrentArtwork->Title.'</h3>
			                    <div class="artworkphoto"><a href="assets/images/'.$oCurrentArtwork->PhotoLink.'" title="'.$oCurrentArtwork->Title.' by '.$oArtist->FirstName.' '.$oArtist->LastName.'" data-lightbox="assets/images/'.$oCurrentArtwork->PhotoLink.'"><img alt="Artwork Image" src="assets/images/'.$oCurrentArtwork->PhotoLink.'" title="Click for larger image" /></a></div>
			                    <div class="details">
			                        <h3>Artist:</h3>
			                        <p><a href="artistbio.php?ArtistID='.$oArtist->ArtistID.'">'.$oArtist->FirstName.' '.$oArtist->LastName.'</a></p>
			                        <h3>Year:</h3><p>'.$oCurrentArtwork->Year.'</p>
			                        <h3>Materials:</h3><p>'.$oCurrentArtwork->Materials.'</p>
			                        <h3>Size:</h3><p>'.$oCurrentArtwork->Size.'</p>
			                        <h3>Sale Status:</h3><p>'.$oCurrentArtwork->SaleStatus.'</p>
			                        <h3>Price:</h3><p>NZD $'.$oCurrentArtwork->Price.'</p>
				                </div>
				                <div class="clear"></div>
			                </div>';

			}
		
	    }                       

		$sHTML .= '</div><!--end of fullwidth-->';

		return $sHTML;

	}
}

?>

