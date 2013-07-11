<?php 
    require_once('includes/header.php');
    require_once('includes/artistManager.php');
    $oArtistMan = new ArtistManager();
    $aAllArtists = $oArtistMan->getAllArtists();
?>

        <h1>Artists</h1>

        <div id="leftcolumn">
            <h2>New Members</h2>
            <p>Our creative new Artists.</p>
            <div class="artistprofiles">
                <img id="profilepic" width="130" height="170" alt="profile pic" src="assets/images/profiles/jamesfisher1.jpg" />
                <h3><a href="">James Fisher</a></h3>
                <p>Wellington</p>
            </div>
            <div class="artistprofiles">
                <img id="profilepic" width="130" height="170" alt="profile pic" src="assets/images/profiles/jamesfisher1.jpg" />
                <h3><a href="">James Fisher</a></h3>
                <p>Wellington</p>
            </div>
            <div class="artistprofiles">
                <img id="profilepic" width="130" height="170" alt="profile pic" src="assets/images/profiles/jamesfisher1.jpg" />
                <h3><a href="">James Fisher</a></h3>
                <p>Wellington</p>
            </div>
        </div><!--end of leftcolumn-->
        <div id="rightcolumn">
            <h2>Our Artists</h2>
            <p>Click on an Artist's name to view their artworks and biography.</p>
            <div class="artistprofiles">
                <img id="profilepic" width="130" height="170" alt="profile pic" src="assets/images/profiles/jamesfisher1.jpg" />
                <h3><a href="">James Fisher</a></h3>
                <p>Wellington</p>
            </div>
            <div class="artistprofiles">
                <img id="profilepic" width="130" height="170" alt="profile pic" src="assets/images/profiles/jamesfisher1.jpg" />
                <h3><a href="">James Fisher</a></h3>
                <p>Wellington</p>
            </div>
            <div class="artistprofiles">
                <img id="profilepic" width="130" height="170" alt="profile pic" src="assets/images/profiles/jamesfisher1.jpg" />
                <h3><a href="">James Fisher</a></h3>
                <p>Wellington</p>
            </div>
        </div><!--end of rightcolumn-->


<?php 
    require_once('includes/footer.php');
    echo '<pre>'; 
    print_r($aAllArtists); 
    echo '</pre>';
?>












                    