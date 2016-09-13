<?php
	 
	include("../include/config.php");
	include("../include/functions.php");
  	validate_admin();
	
$old_password=mysql_real_escape_string($_POST['old_password']);
$new_password=mysql_real_escape_string($_POST['new_password']);
        $query=$obj->query("select * from $tbl_admin where id=".$_SESSION['sess_admin_id'],$debug=-1);
	    $result=$obj->fetchNextObject($query);
        if ($_POST['submitForm'] == "yes") {
        if($old_password!=$result->password){ 
		$_SESSION['sess_msg']='Old Password is Wrong';
		}
		else{
		$obj->query("update $tbl_admin set password='$new_password' where id=".$_SESSION['sess_admin_id']);
		$_SESSION['sess_msg']='Your password has been updated successfully';
		}
}
if($_SESSION['sess_admin_id']){
$sql=$obj->query("select * from $tbl_admin where id=".$_SESSION['sess_admin_id']);
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
<script language="JavaScript" type="text/javascript">
function validate_password(obj)
{
   if(obj.old_password.value=='')
		{
		alert("Please enter old password");
		obj.old_password.focus();
		return false;
		}
		else if(obj.new_password.value=='')
		{
		alert("Please enter new password");
		obj.new_password.focus();
		return false;
		}
		else if(obj.confirm_password.value=='')
		{
		alert("Please enter confirm password");
		obj.confirm_password.focus();
		return false;
		}
		else if((obj.new_password.value)!=(obj.confirm_password.value))
		{
		alert("New and confirm passwords must be same");
		obj.new_password.focus();
		return false;
		}
		else{
      return true;
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
					<em><img src="images/arrow2.gif" width="21" height="21" hspace="10" align="absmiddle" /></em>Admin: Change Password </td>
						</tr>
						<form name="frm" method="POST" enctype="multipart/form-data" action="" onsubmit="return validate_password(this)">
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
										<td width="18%" align="right" class="paddBot11 paddRt14"><strong>Username:</strong></td>
										<td width="82%" align="left" class="paddBot11"><?php echo $result->username;?></td>
									</tr>
									<tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>Old  Password:</strong></td>
									  <td align="left" class="paddBot11"><input name="old_password" type="password" id="old_password" size="36" /></td>
							  </tr>
									<tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>New Password: </strong> </td>
									  <td align="left" class="paddBot11"><input name="new_password" type="password" id="new_password" size="36" /></td>
							  </tr>
									<tr>
										<td width="18%" align="right" class="paddBot11 paddRt14"><strong>Confirm Password:</strong></td>
										<td width="82%" align="left" class="paddBot11"><input name="confirm_password" type="password" id="confirm_password" size="36" /></td>
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


