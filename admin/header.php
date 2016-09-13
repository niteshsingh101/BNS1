<tr>
    <td height="90" align="center" valign="top" class="header"><table width="100%" height="60" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="49%" align="left" valign="middle" ><a href="welcome.php" style="font-family:Tahoma, Geneva, sans-serif; color:#2982ec; font-size:24px; padding-left:10px; text-decoration:none;"><?php echo SITE_TITLE;?>  <span style="font-size:18px; vertical-align:middle;" >Admin Panel</span> </a></td>
        <td width="51%" align="right" valign="middle" class="paddRt">
		<?php 
		if($_SESSION['sess_admin_id']!='')
		{
		?>
		<table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center" valign="middle"></td>
            <td align="center" class="paddRtLt13" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style=" padding-right:20px;">Logged in as <?php echo ucfirst($_SESSION['sess_admin_username']); ?></td>
    <td style=" padding-right:20px;"><?php echo date("l,F  d"); ?></td>
    <td> <a href="logout.php" class="logoutbutton" style="color:#FFF;" ><strong>Logout</strong></a></td>
  </tr>
</table>

           </td>
            <td align="center" valign="middle"></td>
          </tr>
        </table>
        <?php
		} 
		?>
		</td>
      </tr>
    </table></td>
  </tr>
  <?php if(basename($_SERVER['SCRIPT_NAME'])!='index.php'){ ?>
 <tr><td><?php include("menu.php"); ?></td></tr>
 <?php } ?>
 