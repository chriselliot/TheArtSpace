<?php

class ArtistBioView {

	public function render($oArtist, $oForm){

		$aArtworks = $oArtist->Artworks;

		$sHTML = "";
		$sHTML .= '<h1>'.$oArtist->FirstName.' '.$oArtist->LastName.'</h1>
		            <div id="leftcolumn">
		                <div class="profilepic"><img alt="Artist Profile pic" src="assets/images/profiles/'.$oArtist->ProfilePic.'" /></div>
		                <h3>Region:</h3>
		                <p>'.$oArtist->Region.'</p>
		                <h3>Preferred Media:</h3>
		                <p>'.$oArtist->PreferredMedium.'</p>
		                <h3>Education:</h3>
		                <p>'.$oArtist->Education.'</p>
		                <h3>Awards:</h3>
		                <p>'.$oArtist->Awards.'</p>

		                <h2>Contact Artist</h2>';

		$sHTML .= $oForm->html;

		$sHTML .=   '</div>
		            
		            <div id="rightcolumn">
	                <h2>Biography</h2>
	                <p>'.$oArtist->Biography.'</p>
	                <h2>Artworks</h2>';
	                
	    for ($i=0;$i<count($aArtworks);$i++){

		$oCurrentArtwork = $aArtworks[$i];

		$sHTML .= '<div class="artworks">
	                    <h3 class="title">'.$oCurrentArtwork->Title.'</h3>
	                    <div class="artworkphoto"><a href=""><img alt="Artwork image" src="assets/images/artworks/'.$oCurrentArtwork->PhotoLink.'" title="Click for larger image" /></a></div>
	                    <div class="details">
	                        <h3>Description:</h3>
	                        <p class="description">'.$oCurrentArtwork->Description.'</p>
	                        <h3>Year:</h3><p>'.$oCurrentArtwork->Year.'</p>
	                        <h3>Materials:</h3><p>'.$oCurrentArtwork->Materials.'</p>
	                        <h3>Size:</h3><p>'.$oCurrentArtwork->Size.'</p>
	                        <h3>Sale Status:</h3><p>'.$oCurrentArtwork->SaleStatus.'</p>
	                        <h3>Price:</h3><p>NZD $'.$oCurrentArtwork->Price.'</p>
		                </div>
		                <div class="clear"></div>
	                </div>';
	    }                          
	                   
	    $sHTML .=  '</div>';   

		return $sHTML;

	}
}

?>

