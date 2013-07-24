<?php
require_once ('exhibitionClass.php');
require_once ('artistClass.php');

class IndexView {

	public function render(){

		$oEX = new Exhibition();
		$oEX->loadCurrent();
		$oExArtist = new Artist();
		$oExArtist->load($oEX->ArtistID);

		$sHTML = "";
		$sHTML .= '<h1 id="homeheading">The online space for <br /><span>Artists</span> &amp; <span>Art Enthusiasts</span></h1>
		            <div id="leftcolumn">
		                <h2>New Artworks</h2>
		                <img alt="new artwork" src="assets/images/artworks/mixedmedia1.jpg" width="138" height="180" />
		                <h3><a href="">Untitled #7</a></h3>
		                <p>James Fisher</p>
		                <h2>New Members</h2>
		                <img id="profilepic" width="130" height="170" alt="profile pic" src="assets/images/profiles/jamesfisher1.jpg" />
		                <h3><a href="">James Fisher</a></h3>
		                <p>Wellington</p>
		                <h2>What is a Virtual Exhibition?</h2>
		                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit sem lectus, ac tristique urna venenatis nec. Praesent aliquet, nisl venenatis vestibulum facilisis, odio purus hendrerit eros, vel tincidunt leo diam suscipit tellus.</p>
		            </div><!--end of leftcolumn-->
		            <div id="rightcolumn">
		                <h2>About The Art Space</h2>
		                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit sem lectus, ac tristique urna venenatis nec. Praesent aliquet, nisl venenatis vestibulum facilisis, odio purus hendrerit eros, vel tincidunt leo diam suscipit tellus. Pellentesque quis dictum lacus, et pellentesque quam. Quisque nec lectus purus.</p>
		                
		                <h5>Current Virtual Exhibition:</h5>
		                <h4><a href="exhibition.php">'.strtoupper($oExArtist->FirstName).' '.strtoupper($oExArtist->LastName).'<span> - '.strtoupper($oEX->ExhibitionTitle).'</span></a></h4>
		                <img width="580" height="400" alt="James Fisher Artwork" src="assets/images/artwork2.png" />
		                <p>'.$oEX->ExhibitionDescription.'</p>
		            </div><!--end of rightcolumn-->';   

		return $sHTML;

	}
}

?>

