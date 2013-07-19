<?php

class ArtistView {

	public function render($aArtists){

		$sHTML = "";
		$sHTML .= '<h1>Artists</h1>';   

		$sHTML .= '<div id="fullwidth">
		            <h3>Click on an Artists name to view their artworks and biography.</h3><p></p>';

		for ($i=0;$i<count($aArtists);$i++){

			$oCurrentArtist = $aArtists[$i];

			$sHTML .= '<div class="artistprofiles">
			                <div class="profilepic"><img alt="Artist Profile pic" src="assets/images/'.$oCurrentArtist->ProfilePic.'"  /></div>
			                <h3><a href="artistbio.php?ArtistID='.$oCurrentArtist->ArtistID.'">'.$oCurrentArtist->FirstName.' '.$oCurrentArtist->LastName.'</a></h3>
			                <p>'.$oCurrentArtist->Region.'</p>
			            </div>';

		}

		$sHTML .= '</div><!--end of fullwidth-->';

		return $sHTML;

	}
}
?>

