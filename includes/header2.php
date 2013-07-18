<?php
ob_start();
session_start();

require_once('artistClass.php');

if(isset($_SESSION["currentUser"]) == true){
         $oArtist = new Artist();
        $oArtist->load($_SESSION["currentUser"]);           
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta name="description" content="The online space for both Artists and Art Lovers." />
        <meta name="keywords" content="Art, New Zealand Art, Painting, Sculpture, Photography, Print, Mixed Media, Drawing, Jewellery, Digital Art" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>The Art Space | For Artists and Art Lovers</title>
        <link href="assets/css/main.css" rel="stylesheet" type="text/css" />
        <link href="assets/fonts/fonts.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="assets/images/favicon.ico" />
    </head>
    
<body>
    <div id="container">
        <div id="header">
            <div id="user-nav">
            <?php
                if(isset($_SESSION["currentUser"]) == true){
                    echo    '<ul>
                                <li>Hi, <span>'.$oArtist->FirstName.'</span></li>
                                <li><a href="myartworks.php">MANAGE ARTWORKS </a> |</li>
                                <li><a href="editartistbio.php">UPDATE MY BIO </a> |</li>
                                <li><a href="artistbio.php?ArtistID='.$oArtist->ArtistID.'">MY BIO  </a> |</li>
                            </ul>';
                }
            ?>    
            </div>
            <div id="logo"><a href="index.php"></a></div>
            <ul id="nav">
                <li><a href="artists.php">ARTISTS</a></li>
                <li><a href="categories.php">ARTWORKS</a></li>
                <li><a href="exhibition.php">VIRTUAL EXHIBITION</a></li>
                <li><a href="register.php">REGISTER</a></li>
                <li><a href="contact.php">CONTACT</a></li>

                <?php
                if(isset($_SESSION["currentUser"]) == false){
                    echo '<li id="login"><a href="login.php">LOGIN</a></li>';
                }else{
                    echo '<li id="logout"><a href="logout.php">LOGOUT</a></li>';
                } 
            ?>

            </ul>
        </div><!--end of header-->
    <div>
