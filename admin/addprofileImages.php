<?php
include("../include/config.php");
include("../include/functions.php"); 
include("../include/simpleimage.php");
 validate_admin();
 if($_REQUEST['profile_id']==''){
 header("location:profile-list.php");
 exit();
 }

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo SITE_TITLE; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8;" />
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
<link href="css/admin.css" rel="stylesheet" type="text/css" />

</head>
<body>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
<script src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
function FileUpload(obj){
	
	 var form_data = new FormData();  
	 form_data.append('photo', $(obj).prop('files')[0]); 
	 //alert(form_data);
	 form_data.append('profile_id', <?php echo $_REQUEST['profile_id']; ?>); 
	 var browse_button="#browse_button";
	   $.ajax({
                url: 'upload_profileimage.php', // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
				beforeSend:function(){
				$(browse_button).hide();	
				$(".loader").show();
				$(browse_button).hide();
					},
                success: function(php_script_response){
					$("#image_area").prepend(php_script_response); // display response from the PHP script, if any 
					//alert(php_script_response);
					$(".loader").hide();
					$(browse_button).show();						
                }
     });
	
	}

</script>
<script type="text/javascript">
function RemoveUploadedImage(imageID){
	  if(imageID!=''){
		  var divid='#img_'+imageID;
		   $.ajax({
			 url:"deleteProfileImage.php", 
			 data:{imageID:imageID},
			 success:function(){
				 $(divid).remove();
				 }			  
		   })
		  }	
	}
</script>
<script type="text/javascript">
function changeTitle(imageID,title){
	if(imageID!=''){
		  $.ajax({
			 url:"updateprofileImageTitle.php", 
			 data:{imageID:imageID,"Title":title},
			 success:function(){
				
				 }			  
		   })
		 }	
	
	}
</script>
<tr>
	<td align="right" class="paddRtLt70" valign="top">
		<table width="99%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				
				<td align="right" valign="top">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td align="left" valign="middle" class="headingbg bodr text14">
					<em><img src="images/arrow2.gif" width="21" height="21" hspace="10" align="absmiddle" /></em>Admin: <?php if($_REQUEST['id']==''){ ?>Add<?php }else{ ?>Image<?php }?> Gallery</td>
						</tr>
						
						<tr>
							<td height="100" align="left" valign="top" bgcolor="#f3f4f6" class="bodr">
							<form name="frm" method="POST" enctype="multipart/form-data" action="" onsubmit="return validate(this)">
						<input type="hidden" name="submitForm" value="yes" />
						<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>" />
                        <input type="hidden" name="profile_id" value="<?php echo $_REQUEST['profile_id'];?>" />
							<table width="100%" cellpadding="0" cellspacing="0">
									<tr>
										<td align="center" colspan="2" class="paddRt14 paddBot11">
										<font color="#FF0000"><strong><?php echo $_SESSION['sess_msg']; $_SESSION['sess_msg']='';?></strong></font></td>
									</tr>
                               
									<tr>
									  <td colspan="2"  class="paddRt14 paddBot11"><div class="tabcontent_area"  id="image_area" >
<?php 
$total_photo=0;
$photoArr=$obj->query("select *,ProfileImages.Title as imagetitle from ProfileImages join file on file.ID=ProfileImages.ImageID where ProfileImages.ProfileID=".$_REQUEST['profile_id'],$debug=-1);
$total_photo=$obj->numRows($photoArr);
  while($resultPhoto=$obj->fetchNextObject($photoArr)){?>
  <div class="add-property-cont-left" id="img_<?php echo $resultPhoto->ImageID; ?>" >

<img src="../<?php echo $resultPhoto->Filename;?>"  width="100" height="120"/> <br/>
<input type="text" name=""  value="<?php echo stripslashes($resultPhoto->imagetitle);?>" onkeyup="return changeTitle('<?php echo $resultPhoto->ImageID; ?>',this.value)" style="width:120px;" placeholder="Enter Title"/><br/>
<div align="center"><a href="javascript:void(0)" onClick="return RemoveUploadedImage('<?php echo $resultPhoto->ImageID; ?>')" style="text-decoration:none; color:#03F;">Remove</a></div>
</div>
  <?php } ?>
<div class="add-property-cont-left"   style="position:relative;">
<span class='loader'></span>
<div class="myLabel" id="bathroom_browse">
    <input type="file"  onchange="return FileUpload(this)" id="browse_button"  />
    <span>Add Photo</span>
</div>
</div>
</div></td>
							  </tr>
									<tr>
										<td width="18%" align="right" class="paddRt14 paddBot11">&nbsp;</td>
										<td width="82%" align="left" class="paddBot11">&nbsp;&nbsp;</td>
									</tr>
								</table>
								</form>
							</td>
						</tr>
						
					</table>
				</td>
			</tr>
		</table>
	</td>
</tr>
</table>
</body>
</html>