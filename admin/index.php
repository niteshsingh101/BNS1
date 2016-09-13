<?php 
include('../include/config.php');
include("../include/functions.php");
 
if($_SESSION['sess_admin_id']!=''){
header("location:welcome.php");	
exit();	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
<title><?php echo SITE_TITLE; ?></title>
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="js/admin.js"></script>
<script>
function LoginValidate(obj)
{
if(obj.username.value=='')
{
alert("Please enter username.");
obj.username.focus();
return false;
}
else if(obj.password.value=='')
{
alert("Please enter password.");
obj.password.focus();
return false;
}
}
</script>
</head>
<body >
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
<?php include("header.php") ?>
<tr>
	<td align="center" class="paddRtLt70" valign="top">
		<table width="590" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="14" align="left" valign="top"><img src="images/boxlt.gif" width="14" height="80" /></td>
							<td align="left" class="boxbg paddTopBot20" valign="top">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td width="32" align="left" valign="top"><img src="images/arrow2.gif" width="23" height="23" hspace="5" /></td>
										<td align="left" valign="top"><span class="text18">Welcome to <?php echo SITE_TITLE; ?> Admin Panel </span><br />
										Please enter a valid username and password to gain access to the administration console.</td>
									</tr>
								</table>
							</td>
							<td width="14" align="left" valign="top"><img src="images/boxrt.gif" width="14" height="80" /></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td align="right" class="loginLt" valign="middle">
							<form name="loginform" method="post" action="login.php" onsubmit="return LoginValidate(this);">
							<input type="hidden" name="logged" value="yes" />
                            <input type="hidden" name="back" value="<?php echo $_REQUEST['back']; ?>" />
								<table width="90%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td align="left" valign="middle">
											<table width="98%" border="0" cellspacing="0" cellpadding="0">
											<?php if($_SESSION['sess_msg']){?>
											<tr>
													<td align="left" valign="middle" colspan="2" class="error" style="color:#FF0000;"><?php echo $_SESSION['sess_msg'];$_SESSION['sess_msg']='';?></td>
												</tr>
												<?php } ?>
												<tr>
													<td align="left" valign="middle">&nbsp;</td>
												</tr>
												<tr>
													<td align="left" valign="middle"><strong>Username</strong><br />
													<input name="username" type="text" value="" class="inp" size="35" id="username" />  
													<br /><span id="ceck_username"></span></td>
												</tr>
												<tr>
													<td align="left" class="paddTop10" valign="middle"><strong>Password</strong><br />
													<input  name="password" id="userpass" type="password" value="" class="inp" size="35" /><br />
													<span id="check_pass"></span>
													</td>
												</tr>
												<tr>
												  <td align="left" class="paddTop10" valign="middle">&nbsp;</td>
												</tr>
												<tr>
												<td align="left" class="paddTop10" valign="middle">
												<input type="submit" name="submit" value="Login"  class="submit" border="0"/>
												</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</form>
							</td>
							<td width="255" align="right" valign="top"><img src="images/loginrt.gif" width="255" height="275" /></td>
						</tr>
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
