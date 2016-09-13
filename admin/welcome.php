<?php
include('../include/config.php');
include("../include/functions.php");
validate_admin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ucfirst(SITE_TITLE);?></title>
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
<link href="css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
  <?php include("header.php") ?>
    <td align="right" class="paddRtLt70" valign="top">
		<table width="99%" border="0" cellspacing="0" cellpadding="0">
        
		<td align="right" valign="top">
			<table width="100%" height="" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="middle" class="headingbg bodr text14"><em><img src="images/arrow2.gif" width="21" height="21" hspace="10" align="absmiddle" /></em>Welcome to <?php echo SITE_TITLE;?> Administration control Panel			</td>
          </tr>
          <form name="frm" method="post" enctype="multipart/form-data">
          <tr>
            <td height="300" align="left" valign="top" class="bodr mainTable">
            <table width="100%" cellpadding="0" cellspacing="0">
            	<tr>
                	<td align="center" class="paddTop10 text14"><h2>Welcome User !</h2></td>
                </tr>
                <tr>
                	<td align="center" class="paddTop5 paddBot11 text14">Please select any action from the top menu.</td>
                </tr>
            	<tr>
            <td align="left" valign="top" class="contentbox"><table width="100%" border="0" cellspacing="8" cellpadding="0">
            
                
            <tr>
                
                <td width="25%">
                  
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="dashbox">
                        <div class="dashboxleftback">
                          <div class="dashboxrightback">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td valign="top" class="dashcontainer" width="50"><img src="images/cms.jpg" width="50" style="border:1px solid #ccc; padding:2px; background:#fff;" /></td>
                                <td class="dashcontainer1" valign="top" align="left"  style="padding-left:5px;">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td> <h4><a href="content-list.php">Page Contents ( <?php $candArr=$obj->query("select count(*) as cs from $tbl_content ");
	$rs=$obj->fetchNextObject($candArr);
	echo $rs->cs;?> )</a></h4></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

                                
                                  

                                  </td>
                                </tr>
                              </table>
  </div>
                          </div>
                        </td>
                      </tr>
                    </table>
                  
                  
                </td>
                <?php /*?><td width="25%" class="dashbox">
                <div class="dashboxleftback">
                  <div class="dashboxrightback">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td valign="top" class="dashcontainer" width="50"><img src="images/pages.png" width="50" style="border:1px solid #ccc; padding:2px; background:#fff;" /></td>
                        <td class="dashcontainer1" valign="top" align="left"  style="padding-left:5px;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>  <h4><a href="profile-list.php">Girs Profile( 
      <?php $candArr=$obj->query("select count(*) as cs from $tbl_profile ");
	$rs=$obj->fetchNextObject($candArr);
	echo $rs->cs;?>
   
    )</a></h4></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

                        
                        
                       
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div></td><?php */?>
                <td width="25%" class="dashbox">
                <div class="dashboxleftback">
                  <div class="dashboxrightback">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td valign="top" class="dashcontainer" width="50"><img src="images/social_icon.png" width="50" style="border:1px solid #ccc; padding:2px; background:#fff;" /></td>
                        <td class="dashcontainer1" valign="top" align="left"  style="padding-left:5px;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>  <h4><a href="social-list.php">Social Links( 
      <?php $candArr=$obj->query("select count(*) as cs from $tbl_social ");
	$rs=$obj->fetchNextObject($candArr);
	echo $rs->cs;?>
   
    )</a></h4></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

                        
                        
                       
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div></td>
                <td width="25%">
                  
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="dashbox">
                        <div class="dashboxleftback">
                          <div class="dashboxrightback">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td valign="top" class="dashcontainer" width="50"><img src="images/change_password.png" width="50" style="border:1px solid #ccc; padding:2px; background:#fff;" /></td>
                                <td class="dashcontainer1" valign="top" align="left"  style="padding-left:5px;">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td> <h4><a href="change-password.php">Change Password</a></h4></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

                                
                                  

                                  </td>
                                </tr>
                              </table>
  </div>
                          </div>
                        </td>
                      </tr>
                    </table>
                  
                  
                </td>
                </tr>
                         
              
              
              </table></td>
          </tr>
          
            </table>
            </td>
          </tr>
		  </form>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <?php include('footer.php'); ?>
</table>
</body>
</html>
