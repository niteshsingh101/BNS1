<?php
session_start();
include("../include/config.php");
include("../include/functions.php"); 
validate_admin();
  
 
    
if($_REQUEST['id']!=''){
$sql=$obj->query("select * from tbl_add where id=".$_REQUEST['id']);
$result=$obj->fetchNextObject($sql);
}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo SITE_TITLE; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/admin.css" rel="stylesheet" type="text/css" />


</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td align="left" valign="middle" class="headingbg bodr text14">
					<em><img src="images/arrow2.gif" width="21" height="21" hspace="10" align="absmiddle" /></em>Admin: Add Details
					</td>
						</tr>
						
						<tr>
							<td height="100" align="left" valign="top" bgcolor="#f7faf9" class="bodr">
						<form name="frm" method="POST" enctype="multipart/form-data" action="" onSubmit="return validate(this)">
						<input type="hidden" name="submitForm" value="yes" />
						<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>" />
							<table width="100%" cellpadding="0" cellspacing="0">
									
									<tr>
										<td width="43%" align="right" class="paddBot11 paddRt14">&nbsp;</td>
										<td width="57%" align="left" class="paddBot11"></td>
									</tr>
									<tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>Membership Name:</strong></td>
									  <td align="left" class="paddBot11"><?php
																		echo stripslashes($result->membership_name);
																		?></td>
							  </tr>
									<tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>Title:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->title);?></td>
							  </tr>
                                  <tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>Location:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->location);?></td>
							  </tr>
                              <tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>Address:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->address);?></td>
							  </tr>
                            
                              <!--<tr>
                                      <td align="right" class="paddBot11 paddRt14"><strong>Send Date:</strong></td>
									  <td align="left" class="paddBot11"><?php// $added_date=explode("-",$result->send_date); if($added_date[0]!='0000'){ echo date("d M Y H:i",strtotime($result->send_date)); }?></td>-->
							  </tr>
								  <tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>Category:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->category);?></td>
							  </tr>	
							  <tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>Description:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->description);?></td>
							  </tr>
							  <tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>Date:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->date);?></td>
							  </tr>
							   
							  
							  
									<tr>
										<td width="43%" align="right" class="paddRt14 paddBot11">&nbsp;</td>
										<td width="57%" align="left" class="paddBot11">
											 	                  	
																				  </td>
									</tr>
								</table>
								</form>
							</td>
						</tr>
						<tr><td align="center">&nbsp;</td></tr>
					</table>
</body>
</html>
