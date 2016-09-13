<?php 
include("../include/config.php");
include("../include/functions.php");
include("../include/simpleimage.php");
validate_admin();
 /************************** Property Image **********************/

	  $Image=new SimpleImage();
	  if($_FILES['photo']['size']>0 && $_FILES['photo']['error']==''){
		  if(!is_dir("../assets/profiles/".$_REQUEST['profile_id'])){
	  @mkdir("../assets/profiles/".$_REQUEST['profile_id']);
	  @mkdir("../assets/profiles/".$_REQUEST['profile_id']."/_resampled");
		  }
	  $fname=$_FILES['photo']['name'];
	  $filename="assets/profiles/".$_REQUEST['profile_id']."/".$_FILES['photo']['name'];
	  
	  $CMSThumbnail="assets/profiles/".$_REQUEST['profile_id']."/_resampled/CMSThumbnail-".$_FILES['photo']['name'];
	  $CroppedImage110165="assets/profiles/".$_REQUEST['profile_id']."/_resampled/CroppedImage110165-".$_FILES['photo']['name'];
	  $SetHeight55="assets/profiles/".$_REQUEST['profile_id']."/_resampled/SetHeight55-".$_FILES['photo']['name'];
	  $SetRatioSize4030="assets/profiles/".$_REQUEST['profile_id']."/_resampled/SetRatioSize4030-".$_FILES['photo']['name'];
	  $stripthumbnail="assets/profiles/".$_REQUEST['profile_id']."/_resampled/stripthumbnail-".$_FILES['photo']['name'];
	  $img=$current_time.$_FILES['photo']['name'];
	  move_uploaded_file($_FILES['photo']['tmp_name'],"../".$filename); 
	  copy("../".$filename,"../".$CMSThumbnail);
	  $Image->load("../".$CMSThumbnail);
	  $Image->resize(100,100);
	  $Image->save("../".$CMSThumbnail);
	  
	  copy("../".$filename,"../".$CroppedImage110165);
	  $Image->load("../".$CroppedImage110165);
	  $Image->resize(110,165);
	  $Image->save("../".$CroppedImage110165);
	  
	  copy("../".$filename,"../".$SetHeight55);
	  $Image->load("../".$SetHeight55);
	  $Image->resize(37,55);
	  $Image->save("../".$SetHeight55);
	  
	  copy("../".$filename,"../".$SetRatioSize4030);
	  $Image->load("../".$SetRatioSize4030);
	  $Image->resize(40,30);
	  $Image->save("../".$SetRatioSize4030);
	  
	  copy("../".$filename,"../".$stripthumbnail);
	  $Image->load("../".$stripthumbnail);
	  $Image->resize(50,50);
	  $Image->save("../".$stripthumbnail);
	  $titleArr=explode(".",$fname);
	  $title=$titleArr[0];
	  $obj->query("insert into  file set ClassName='Image',Filename='$filename',Created=now(),Name='$fname',Title='$title'  ");
	  $ImageID=mysql_insert_id();
	  $obj->query("insert into ProfileImages set ClassName='ProfileImages',Created=now(),LastEdited=now(),SortOrder=1,ImageID='$ImageID',ProfileID='".$_REQUEST['profile_id']."'");
	  
	  }
if($ImageID!=''){
?>
<div class="add-property-cont-left" id="img_<?php echo $ImageID; ?>" >
<img src="../<?php echo $filename;?>"  width="100" height="120"/> <br/>
<input type="text" name=""  value="" onkeyup="return changeTitle('<?php echo $ImageID; ?>',this.value)" style="width:120px;" placeholder="Enter Title"/><br/>
<div align="center"><a href="javascript:void(0)" onClick="return RemoveUploadedImage('<?php echo $ImageID; ?>')" style="text-decoration:none; color:#03F;">Remove</a></div>
</div>
<?php }  ?>