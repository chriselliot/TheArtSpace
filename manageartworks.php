<?php 
    require_once('includes/header.php');
    require_once('includes/form.php');
    require_once('includes/artworkClass.php');
    require_once("includes/encoder.php");
    require_once("includes/categoryManager.php");

    $oForm = new Form();

    if(isset($_SESSION["currentUser"]) == false){

        header("Location: login.php"); 
        exit;

    }else{

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
                $oArtwork->save();

                header("Location: artworks.php?CategoryID=$oArtwork->CategoryID"); 
                exit;
            }   
        }
    }

    $oCM = new CategoryManager();
    $aCatObjects = $oCM->getAllCategories();

    $aCategories = array();

    for($iCount=0;$iCount<count($aCatObjects);$iCount++){
        $oCategory = $aCatObjects[$iCount];
        $aCategories[$oCategory->CategoryID]=$oCategory->CategoryName;
    }

    $aSaleStatus = array();
    $aSaleStatus[1] = "For Sale";
    $aSaleStatus[2] = "SOLD";

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
               <h3>Use this form to upload artworks to your biography page</h3><br />
               <p>For the best result, we recommend uploading high-resolution images (max 5mb) in JPEG format only. Both portrait and landscape images are accepted.</p> 
               <p>* Required fields</p>
            </div><!--end of leftcolumn-->
            <div id="rightcolumn">

              <div id="edit">  <?php echo $oForm->html; ?> </div>

            </div><!--end of rightcolumn-->
<?php 
    require_once('includes/footer.php');
?>