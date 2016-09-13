<?php
include("../include/config.php");
include("../include/functions.php"); 
 validate_admin();
  $social_url=mysql_real_escape_string($_POST['social_url']);
  $title=mysql_real_escape_string($_POST['title']);
  if($_REQUEST['submitForm']=='yes'){
  if($_REQUEST['id']==''){
	  $obj->query("insert into $tbl_social set title='$title',social_url='$social_url',status=1 ");
	  $_SESSION['sess_msg']='Social network URL added sucessfully';  
	  
       }else{ 
	  $obj->query("update $tbl_social set social_url='$social_url' where id=".$_REQUEST['id']);
	  $_SESSION['sess_msg']='Social network URL updated sucessfully';   
        }
   header("location:social-list.php");
   exit();
  }      
	   
	   
if($_REQUEST['id']!=''){
$sql=$obj->query("select * from $tbl_social where id=".$_REQUEST['id']);
$result=$obj->fetchNextObject($sql);
}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo SITE_TITLE; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript">
function validate(obj)
{
if(obj.social_url.value==''){
alert("Please enter URL");
obj.social_url.focus();
return false;
}
}
</script>
</head>
<body>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
<?php include("header.php") ?>
<tr>
	<td align="right" class="paddRtLt70" valign="top">
		<table width="99%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				
				<td align="right" valign="top">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td align="left" valign="middle" class="headingbg bodr text14">
					<em><img src="images/arrow2.gif" width="21" height="21" hspace="10" align="absmiddle" /></em>Admin: <?php if($_REQUEST['id']==''){ ?>Add<?php }else{ ?>Update<?php }?> Social Network URL
					<span  style="float:right; padding-right:10px;">
					<input type="button" name="add" value="View Social Network URL"  class="button" onclick="location.href='social-list.php'" /></span></td>
						</tr>
						<form name="frm" method="POST" enctype="multipart/form-data" action="" onsubmit="return validate(this)">
						<input type="hidden" name="submitForm" value="yes" />
						<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>" />
						<tr>
							<td height="100" align="left" valign="top" class="bodr mainTable">
							<table width="100%" cellpadding="0" cellspacing="0">
									<tr>
										<td align="center" colspan="2" class="paddRt14 paddBot11">
										<font color="#FF0000"><strong><?php echo $_SESSION['sess_msg']; $_SESSION['sess_msg']='';?></strong></font></td>
									</tr>
									<tr>
										<td width="18%" align="right" class="paddBot11 paddRt14">&nbsp;</td>
										<td width="82%" align="left" class="paddBot11"></td>
									</tr>
									
									<tr>
                                      <td align="right" class="paddBot11 paddRt14"><strong>Title:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->title); ?></td>
							  </tr>
										
									<tr>
                                      <td align="right" class="paddBot11 paddRt14"><strong>URL:</strong></td>
									  <td align="left" class="paddBot11"><textarea name="social_url" rows="5" cols="40"><?php echo stripslashes($result->social_url); ?></textarea></td>
							  </tr>
									
									<tr>
										<td width="18%" align="right" class="paddRt14 paddBot11">&nbsp;</td>
										<td width="82%" align="left" class="paddBot11">
											<input type="submit" name="submit" value="Submit"  class="submit" border="0"/> 	                  		 &nbsp;&nbsp;
											<input name="Reset" type="reset" id="Reset" value="Reset" class="submit" border="0" />									  </td>
									</tr>
								</table>
							</td>
						</tr>
						</form>
					</table>
				</td>
			</tr>
		</table>
	</td>
</tr>
<?php include('footer.php'); ?>
</table>
</body>
</html>
