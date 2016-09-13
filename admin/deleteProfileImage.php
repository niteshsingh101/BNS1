<?php 
include("../include/config.php");
include("../include/functions.php");
validate_admin();
  
       if($_REQUEST['imageID']!=''){
	   $photoArr=$obj->query("select * from ProfileImages join file on file.ID=ProfileImages.ImageID where ProfileImages.ImageID='".$_REQUEST['imageID']."'",$debug=-1);
	   $resultImage=$obj->fetchNextObject($photoArr);
	   @unlink("../assets/profiles/".$resultImage->ProfileID."/".$resultImage->Name);
	   @unlink("../assets/profiles/".$resultImage->ProfileID."/_resampled/CMSThumbnail-".$resultImage->Name);
	   @unlink("../assets/profiles/".$resultImage->ProfileID."/_resampled/CroppedImage110165-".$resultImage->Name);
	   @unlink("../assets/profiles/".$resultImage->ProfileID."/_resampled/SetHeight55-".$resultImage->Name);
	   @unlink("../assets/profiles/".$resultImage->ProfileID."/_resampled/SetRatioSize4030-".$resultImage->Name);
	   @unlink("../assets/profiles/".$resultImage->ProfileID."/_resampled/stripthumbnail-".$resultImage->Name);
	   $obj->query("delete from file where id='".$_REQUEST['imageID']."' ");
	   $obj->query("delete from ProfileImages where imageID='".$_REQUEST['imageID']."' ");	   
	   }
?>