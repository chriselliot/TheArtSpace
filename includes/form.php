<?php

class Form {

	private $sHTML;
	private $aData;
	private $aErrors;
	private $aFiles;

	public function __construct(){

		$this->sHTML = '<form action="" method="post" enctype="multipart/form-data"><fieldset>';
		$this->aData = array();
		$this->aErrors = array();
		$this->aFiles = array();

	}

	public function makeFileUpload($sControlName,$sLabel){


		$sError = "";
		if(isset($this->aErrors[$sControlName])){
			$sError = $this->aErrors[$sControlName];
		}

		$this->sHTML .='
			<label for="'.$sControlName.'">'.$sLabel.'</label>
            <input type="file" name="'.$sControlName.'" id="'.$sControlName.'" />
			<div class="message">'.$sError.'</div><div class="clear"></div>';
	}

	public function makeInput($sControlName,$sLabel){

		$sData = "";
		if(isset($this->aData[$sControlName])){ 
			$sData = $this->aData[$sControlName];
		}

		$sError = "";
		if(isset($this->aErrors[$sControlName])){
			$sError = $this->aErrors[$sControlName];
		}

		$this->sHTML .= '
			<label for="'.$sControlName.'">'.$sLabel.'</label>
            <input type="text" name="'.$sControlName.'" id="'.$sControlName.'" value="'.$sData.'"/>
			<div class="message">'.$sError.'</div><div class="clear"></div>';

	}

	public function makeTextArea($sControlName,$sLabel){

		$sData = "";
		if(isset($this->aData[$sControlName])){ 
			$sData = $this->aData[$sControlName];
		}

		$sError = "";
		if(isset($this->aErrors[$sControlName])){
			$sError = $this->aErrors[$sControlName];
		}

		$this->sHTML .= '
			<label for="'.$sControlName.'">'.$sLabel.'</label>
            <textarea name="'.$sControlName.'" id="'.$sControlName.'">'.$sData.'</textarea><div class="message">'.$sError.'</div>
			<div class="clear"></div>';
	}

	public function makePass($sControlName,$sLabel){

		$sData = "";
		if(isset($this->aData[$sControlName])){ 
			$sData = $this->aData[$sControlName];
		}

		$sError = "";
		if(isset($this->aErrors[$sControlName])){
			$sError = $this->aErrors[$sControlName];
		}

		$this->sHTML .= '
			<label for="'.$sControlName.'">'.$sLabel.'</label>
            <input type="password" name="'.$sControlName.'" id="'.$sControlName.'" value="'.$sData.'"/>
			<div class="message">'.$sError.'</div><div class="clear"></div>';

	}

	public function makeSelect($sControlName,$sLabel,$aOptions){

		$sData = "";
		if(isset($this->aData[$sControlName])){ 
			$sData = $this->aData[$sControlName];
		}

		$sError = "";
		if(isset($this->aErrors[$sControlName])){
			$sError = $this->aErrors[$sControlName];
		}

		$this->sHTML .= '
					<label for="'.$sControlName.'" id="'.$sControlName.'">'.$sLabel.'</label>
                    <select name="'.$sControlName.'" id="'.$sControlName.'">'."\n";
        $this->sHTML .= '<option value="0" selected="selected">--- Choose ---</option>';

        	foreach($aOptions as $key=>$value){

        		if($key==$sData){
        			//sticky option
        			$this->sHTML .= '<option value="'.$key.'" selected="selected">'.$value.'</option>'."\n";

        		}else{

        			$this->sHTML .= '<option value="'.$key.'">'.$value.'</option>'."\n";

        		}
        	}
            
         $this->sHTML .= '</select>';
         $this->sHTML .= '<div class="message">'.$sError.'</div><div class="clear"></div>';
	}

	public function makeSelectFixed($sControlName,$sLabel,$aOptions){

		$sData = "";
		if(isset($this->aData[$sControlName])){ 
			$sData = $this->aData[$sControlName];
		}

		$sError = "";
		if(isset($this->aErrors[$sControlName])){
			$sError = $this->aErrors[$sControlName];
		}

		$this->sHTML .= '
					<label for="'.$sControlName.'" id="'.$sControlName.'">'.$sLabel.'</label>
                    <select name="'.$sControlName.'" id="'.$sControlName.'">'."\n";
        $this->sHTML .= '<option value="0" selected="selected" >--- Choose ---</option>';

        		foreach($aOptions as $key=>$value){

        		if($key==$sData){
        			//sticky option
        			$this->sHTML .= '<option value="'.$value.'" selected="selected">'.$value.'</option>'."\n";

        		}else{

        			$this->sHTML .= '<option value="'.$value.'">'.$value.'</option>'."\n";

        		}
        	}
            
         $this->sHTML .= '</select>';
         $this->sHTML .= '<div class="message">'.$sError.'</div><div class="clear"></div>';
	}

	public function makeRadio ($sControlName,$sLabel,$aOptions){

		$sData = "";
		if(isset($this->aData[$sControlName])){ 
			$sData = $this->aData[$sControlName];
		}

		$sError = "";
		if(isset($this->aErrors[$sControlName])){
			$sError = $this->aErrors[$sControlName];
		}

		$this->sHTML .= '<fieldset>';
		$this->sHTML .= '<legend>'.$sLabel.'</legend>';
    	foreach($aOptions as $key=>$value){
    		$id = $sControlName ."_". $key;
	
			$this->sHTML .= '<input type="radio" name="'.$sControlName.'" value="'.$key.'" id="'.$id.'" /><label for="'.$id.'">'.$value.'</label>'."\n";
    		
    	} 
     	$this->sHTML .= '</fieldset>';
	}


	public function makeSubmit($sControlName,$sLabel){

		$this->sHTML .= '<input name="'.$sControlName.'" id="'.$sControlName.'" type="submit" value="'.$sLabel.'" />
						<div class="clear"></div>';	
	}


	public function checkRequired($sControlName){

		$sData = "";

		if(isset($this->aData[$sControlName])){
			$sData = trim($this->aData[$sControlName]); 
		}

		if(strlen($sData)==0){
			$this->aErrors[$sControlName] = "* Required field"; 
		}

	}

	public function checkRequiredSelect($sControlName){

		$sData = "";

		if(isset($this->aData[$sControlName])){
			$sData = trim($this->aData[$sControlName]); 
		}

		if($sData == "0"){
			$this->aErrors[$sControlName] = "* Required field"; 
		}

	}


	public function checkEmail($sControlName){

		$sData = "";

		if(isset($this->aData[$sControlName])){
			$sData = trim($this->aData[$sControlName]); 
		}

		if(strlen($sData)==0){
			$this->aErrors[$sControlName] = "* Required field"; 
		}else{

			if(filter_var($sData, FILTER_VALIDATE_EMAIL) == false){
				$this->aErrors[$sControlName] = "* Email is invalid"; 
			}
		}	

	}

	public function checkImageUpload($sControlName){

		$aFile = $this->aFiles[$sControlName];

		$sError = "";

		if((!empty($aFile)) && ($aFile['error'] == 0)) {
		  $filename = basename($aFile['name']);
		  $ext = substr($filename, strrpos($filename, '.') + 1);
		  if (($ext == "jpg") && ($aFile["type"] == "image/jpeg") && 
			($aFile["size"] < 5000000)) {   
		  } else {
		     $sError =  "Error: Only JPEG images under 5mb are accepted for upload";
		  }
		} else {
		 $sError = "* No file uploaded";
		}
		if($sError != ""){
			$this->aErrors[$sControlName] = $sError; 
		}
	}

	public function checkImageUploadOptional($sControlName){

		$aFile = $this->aFiles[$sControlName];

		$sError = "";

		if((!empty($aFile)) && ($aFile['error'] == 0)) {
		  $filename = basename($aFile['name']);
		  $ext = substr($filename, strrpos($filename, '.') + 1);
		  if (($ext == "jpg") && ($aFile["type"] == "image/jpeg") && 
			($aFile["size"] < 5000000)) {   
		  } else {
		     $sError =  "Error: Only .jpg images under 5mb are accepted for upload";
		  }
		} /*else {
		 $sError = "* No file uploaded";
		}*/
		if($sError != ""){
			$this->aErrors[$sControlName] = $sError; 
		}
	}

	public function moveFile($sControlName,$sNewName){
		
		$aFile = $this->aFiles[$sControlName];

		$sNewName = dirname(__FILE__).'/../assets/images/'.$sNewName;
		move_uploaded_file($aFile['tmp_name'],$sNewName);

	}

	public function raiseCustomError($sControlName,$sErrorMessage) {

		$this->aErrors[$sControlName] = $sErrorMessage;
		
	}


	public function __get($sProperty){

		switch ($sProperty) {

			case 'html':
				return $this->sHTML . "</fieldset></form>";
				break;
			case 'valid':
				if(count($this->aErrors)==0){
					return true;
				}else{
					return false;
				}
				break;
			default:
				die($sProperty . " is restricted");
		}
	}


	public function __set($sProperty,$value){

		switch ($sProperty) {
			case 'data':
				$this->aData = $value;
				break;
			case 'files':
				$this->aFiles = $value;
				break;	
			default:
				die($sProperty . " is unable to be written to");
		}
	}

}