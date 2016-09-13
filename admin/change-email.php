<?php
	include("../include/config.php");
	include("../include/functions.php");
    validate_admin();
$email=mysql_real_escape_string($_POST['email']);
if($_POST['submitForm']=="yes"){
$obj->query("update $tbl_admin set email='$email' where id=".$_SESSION['sess_admin_id']);
$_SESSION['sess_msg']='Email updated sucessfully';
}
if($_SESSION['sess_admin_id']){
$sql=$obj->query("select * from $tbl_admin where id=".$_SESSION['sess_admin_id'],$debug=-1);
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
<script type="text/javascript" src="editor/ckeditor.js"></script>
<script>
	function  valid(obj)
	{
	if(obj.email.value=='')
	{
	alert("Please enter email.");
	return false;
	}
	else if(!obj.email.value.match(/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/))
	{
	alert("Please enter valid email.");
	return false;
	}
	else return true;
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
					<em><img src="images/arrow2.gif" width="21" height="21" hspace="10" align="absmiddle" /></em>Admin: Change Email </td>
						</tr>
						<form name="frm" method="POST" enctype="multipart/form-data" action="" onsubmit="return valid(this)">
						<input type="hidden" name="submitForm" value="yes" />
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
									  <td align="right" class="paddBot11 paddRt14"><strong>Email:</strong></td>
									  <td align="left" class="paddBot11"><input name="email" type="text" id="email" size="36"  value="<?php echo stripslashes($result->email);?>"/></td>
							  </tr>
									
									
									<tr>
										<td width="18%" align="right" class="paddRt14 paddBot11">&nbsp;</td>
										<td width="82%" align="left" class="paddBot11">
											<input type="submit" name="submit" value="Submit"  class="submit" border="0"/> 	                  		 &nbsp;&nbsp;</td>
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
<tr><td height="200"></td></tr>
<?php include('footer.php'); ?>
</table>
</body>
</html>


