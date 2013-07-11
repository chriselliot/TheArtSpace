<?php
ob_start();
session_start();

require_once ('categoryMenuView.php');
require_once('categoryManager.php');

$oMV = new MenuView();
$oCM = new CategoryManager();
$aAllCategories = $oCM->getAllCategories();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta name="description" content="The online space for both Artists and Art Lovers." />
        <meta name="keywords" content="Art, New Zealand Art, Painting, Sculpture, Photography, Print, Mixed Media, Drawing, Jewellery, Digital Art" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>The Art Space</title>
        <link href="assets/css/main.css" rel="stylesheet" type="text/css" />
        <link href="assets/fonts/fonts.css" rel="stylesheet" type="text/css" />
    </head>
    
<body>
    <div id="container">
        <div id="header">
            <div id="logo"><a href="index.php"></a></div>
            <ul id="nav">
                <li><a href="artists.php">ARTISTS</a></li>
                <li><a href="artworks.php">ARTWORKS</a></li>
                <li><a href="exhibition.php">VIRTUAL EXHIBITION</a></li>
                <li><a href="register.php">REGISTER</a></li>
                <li><a href="contact.php">CONTACT</a></li>
                <li id="login"><a href="login.php">LOGIN</a></li>
            </ul>
        </div><!--end of header-->
        <div id="left-nav">
            <h2>Art Category</h2>
            
            <?php echo $oMV->render($aAllCategories); ?>

        </div><!--end of left-nav-->
        <div id="search-box">
            <h2>Find Art or Artists</h2>
            <form method="post" action="">
                <fieldset>
                    <label for="artistsearch">Search by Artist</label>
                    <input type="text" placeholder="e.g. Colin McCahon" name="artistsearch" id="artistsearch" />
                    <input type="submit" class="submit" value="find" />
                </fieldset>
            </form>
            <form method="post" action="">
                <fieldset>
                    <label for="keywordsearch">Search by Keyword</label>
                    <input type="text" placeholder="e.g. Landscape" name="keywordsearch" id="keywordsearch" />
                    <input type="submit" class="submit" value="find" />
                </fieldset>
            </form>
        </div><!--end of search-box-->
        <div id="banner"><a href="exhibition.php"></a></div><!--end of banner-->
        <div id="main">