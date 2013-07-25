<?php 
    require_once('includes/header.php');
    require_once('includes/form.php');
    require_once('includes/artworkClass.php');
    require_once("includes/encoder.php");
    require_once("includes/categoryManager.php");

    //--------Set up main form------------------------------------------------------------------------------

    $oForm = new Form();

    //-------Check to see if logged in----------------------------------------------------------------------

    if(isset($_SESSION["currentUser"]) == false){

        header("Location: login.php"); 
        exit;

    }else{

        //-------If logged in process main form--------------------------------------------------------------

        $iUserID = $_SESSION["currentUser"];

        if(isset($_POST["Submit"])){

        $oForm->data = $_POST;
        $oForm->files = $_FILES;
        $oForm->checkRequired("Title");
        $oForm->checkRequired("Description");
        $oForm->checkRequiredSelect("Category");
        $oForm->checkImageUpload("PhotoLink");
        $oForm->checkRequiredSelect("SaleStatus");
            
            if($oForm->valid==true){

                $sNewName = "artworks/".time().".jpg";
                $oForm->moveFile("PhotoLink",$sNewName);
                
                $oArtwork = new Artwork();
                $oArtwork->ArtistID = $iUserID;
                $oArtwork->Title = $_POST["Title"];
                $oArtwork->Description = $_POST["Description"];
                $oArtwork->CategoryID = $_POST["Category"];
                $oArtwork->Year = $_POST["Year"];
                $oArtwork->PhotoLink = $sNewName;
                $oArtwork->Materials = $_POST["Materials"];
                $oArtwork->Size = $_POST["Size"];
                $oArtwork->SaleStatus = $_POST["SaleStatus"];
                $oArtwork->Price = $_POST["Price"];
                $oArtwork->Visible = 1;
                $oArtwork->save();

                header("Location: manageartworks.php"); 
                exit;
            }   
        }
    }

    //--------Setting up all categories for drop down----------------------------------------------------------

    $oCM = new CategoryManager();
    $aCatObjects = $oCM->getAllCategories();

    $aCategories = array();

    for($iCount=0;$iCount<count($aCatObjects);$iCount++){
        $oCategory = $aCatObjects[$iCount];
        $aCategories[$oCategory->CategoryID]=$oCategory->CategoryName;
    }

    //-------Hard coding values for sale status drop down-------------------------------------------------------

    $aSaleStatus = array();
    $aSaleStatus[1] = "For Sale";
    $aSaleStatus[2] = "SOLD";

    //-------Hard coding values for visibility radio buttons-----------------------------------------------------

    $aWorkStatus = array();
    $aWorkStatus[1] = "Visible";
    $aWorkStatus[0] = "Hidden";

    //--------Load the current artist and array of artworks-------------------------------------------------------

    $iUserID = $_SESSION["currentUser"];
    $oArtist = new Artist();
    $oArtist->load($iUserID);
    $aArtObjects = $oArtist->Artworks;

    //-------Sticky Data for radio buttons-----------------------------------------------------------------------

    $aVisibleData = array();
    for($i=0;$i<count($aArtObjects);$i++){
        $oCurrentArtwork = $aArtObjects[$i];
        $aVisibleData["artwork".$oCurrentArtwork->ArtworkID] = $oCurrentArtwork->Visible; 
    }

    //-------Set up form for visibility radio buttons-------------------------------------------------------------

    $oFormRadio = new Form();
    $oFormRadio->data = $aVisibleData;

    //---------Processing data for visibility radio buttons-------------------------------------------------------

    if(isset($_POST["VisibleSubmit"])){
         $oFormRadio->data = $_POST;

        foreach ($_POST as $controlName => $controlValue){

            if(strpos($controlName ,'artwork') !== false){

                $ArtworkID = substr($controlName,7);

                $oCurrentArtwork = new Artwork();
                $oCurrentArtwork->load($ArtworkID);
                $oCurrentArtwork->Visible = $_POST[$controlName];
                $oCurrentArtwork->save();
            } 
        } 
    }

    //---------Create the radio button form objects--------------------------------------------------------------

    for($i=0;$i<count($aArtObjects);$i++){
        $oCurrentArtwork = $aArtObjects[$i];
        $oFormRadio->makeRadio("artwork".$oCurrentArtwork->ArtworkID,$oCurrentArtwork->Title." - ".$oCurrentArtwork->Year,$aWorkStatus);
    }

    $oFormRadio->makeSubmit("VisibleSubmit", "Upload");

    //---------Create the main form------------------------------------------------------------------------------

    $oForm->makeInput("Title","Title *");
    $oForm->makeInput("Description","Description *");
    $oForm->makeSelect("Category", "Category *", $aCategories);
    $oForm->makeInput("Year","Year");
    $oForm->makeFileUpload("PhotoLink","Artwork Image *");
    $oForm->makeInput("Materials","Materials");
    $oForm->makeInput("Size", "Size");
    $oForm->makeSelectFixed("SaleStatus", "Sale Status *",$aSaleStatus);
    $oForm->makeInput("Price", "Price");
    $oForm->makeSubmit("Submit", "Upload");

?>
            
            <h1>Manage Artworks</h1>
            <div id="leftcolumn">
               <h3>Use this form to upload artworks to your biography page. By default uploaded works are visible. To hide an artwork, select hidden.</h3><br />
               <p>For the best result, we recommend uploading high-resolution images (max 5mb) in JPEG format only. Both portrait and landscape images are accepted.</p> 
               <p>* Required fields</p>
            </div><!--end of leftcolumn-->
            <div id="rightcolumn">

               <h2>Upload New Artworks</h2>
                <div id="edit">  <?php echo $oForm->html; ?> </div>

                <h2>My Current Artworks</h2>
                <div id="edit"><div id="radio"><?php echo $oFormRadio->html; ?></div></div>

            </div><!--end of rightcolumn-->
<?php 
    require_once('includes/footer.php');
?>