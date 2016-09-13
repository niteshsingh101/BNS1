<?php
session_start();
include("../include/config.php");
include("../include/functions.php"); 
validate_admin();
  
 
    
if($_REQUEST['id']!=''){
$sql=$obj->query("select * from $tbl_member where id=".$_REQUEST['id']);
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
					<em><img src="images/arrow2.gif" width="21" height="21" hspace="10" align="absmiddle" /></em>Admin: Member Details
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
									  <td align="right" class="paddBot11 paddRt14"><strong> Name:</strong></td>
									  <td align="left" class="paddBot11"><?php
																		echo stripslashes($result->FirstName);
																		?></td>
							  </tr>
									<tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>Email:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->Email);?></td>
							  </tr>
                                  <tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>Contact:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->CellPhone);?></td>
							  </tr>
                              <tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>About:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->About);?></td>
							  </tr>
                            
                              <!--<tr>
                                      <td align="right" class="paddBot11 paddRt14"><strong>Send Date:</strong></td>
									  <td align="left" class="paddBot11"><?php// $added_date=explode("-",$result->send_date); if($added_date[0]!='0000'){ echo date("d M Y H:i",strtotime($result->send_date)); }?></td>-->
							  </tr>
								  <tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>Age:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->Age);?></td>
							  </tr>	
							  <tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>Birth:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->Birth);?></td>
							  </tr>
							  <tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>Locale:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->Locale);?></td>
							  </tr>
							   <tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>Height:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->Height);?>cm</td>
							  </tr>
							  <tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>Weight:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->Weight);?>kg</td>
							  </tr>
							   <tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>Education:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->Education);?></td>
							  </tr>
							  <tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>Occupation:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->Occupation);?></td>
							  </tr>
							   <tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>Smokes:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->Smokes);?></td>
							  </tr>
							   <tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>Eye:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->Eye);?></td>
							  </tr>
							   <tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>Hair:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->Hair);?></td>
							  </tr>
							   <tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>Children:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->Children);?></td>
							  </tr>
							   <tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>ChildtenCount:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->ChildtenCount);?></td>
							  </tr>
							  <tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>Children With:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->ChildrenWith);?></td>
							  </tr>
							   <tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>Marital Status:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->MaritalStatus);?></td>
							  </tr>
							  <tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>Drink:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->Drink);?></td>
							  </tr>
							   <tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>Russian Skills:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->RussianSkills);?></td>
							  </tr>
							   <tr>
									  <td align="right" class="paddBot11 paddRt14"><strong>Interests:</strong></td>
									  <td align="left" class="paddBot11"><?php echo stripslashes($result->Interests);?></td>
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
