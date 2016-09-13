<?php
include("../include/config.php");
include("../include/functions.php");
include("../include/simpleimage.php"); 
 validate_admin();
  if($_REQUEST['submitForm']=='yes'){
	  
	 foreach($_POST as $key=>$val){
	   $$key=mysql_real_escape_string($val);
      }
  if($_REQUEST['id']==''){
	  
	   $obj->query("insert into $tbl_videosubscription set 
	   reg_mem_discount='$reg_mem_discount',
	   aff_mem_discount='$aff_mem_discount',
	   pre_mem_discount='$pre_mem_discount',
	   gold_mem_discount='$gold_mem_discount',
	   reg_mem_pkg_price='$reg_mem_pkg_price',
	   aff_mem_pkg_price='$aff_mem_pkg_price',
	   pre_mem_pkg_price='$pre_mem_pkg_price',
	   gold_mem_pkg_price='$gold_mem_pkg_price',
	   pkg_title='$pkg_title',
	   pkg_title_ge='$pkg_title_ge',
	   pkg_title_sp='$pkg_title_sp',
	   pkg_title_fr='$pkg_title_fr',      
	   pkg_title_po='$pkg_title_po',	   
	   pkg_short_desc='$pkg_short_desc',
	   pkg_short_desc_ge='$pkg_short_desc_ge',
	   pkg_short_desc_sp='$pkg_short_desc_sp',
	   pkg_short_desc_fr='$pkg_short_desc_fr',
	   pkg_short_desc_po='$pkg_short_desc_po',status=1");
	   $_SESSION['sess_msg']='Subscription package added sucessfully';  
	  
       }else{ 
	   
	   $sql=" update $tbl_videosubscription set 
	   reg_mem_discount='$reg_mem_discount',
	   aff_mem_discount='$aff_mem_discount',
	   pre_mem_discount='$pre_mem_discount',
	   gold_mem_discount='$gold_mem_discount',
	   reg_mem_pkg_price='$reg_mem_pkg_price',
	   aff_mem_pkg_price='$aff_mem_pkg_price',
	   pre_mem_pkg_price='$pre_mem_pkg_price',
	   gold_mem_pkg_price='$gold_mem_pkg_price',
	   pkg_title='$pkg_title',
	   pkg_title_ge='$pkg_title_ge',
	   pkg_title_sp='$pkg_title_sp',
	   pkg_title_fr='$pkg_title_fr',      
	   pkg_title_po='$pkg_title_po',	   
	   pkg_short_desc='$pkg_short_desc',
	   pkg_short_desc_ge='$pkg_short_desc_ge',
	   pkg_short_desc_sp='$pkg_short_desc_sp',
	   pkg_short_desc_fr='$pkg_short_desc_fr',
	   pkg_short_desc_po='$pkg_short_desc_po' ";
		
		$sql.=" where id='".$_REQUEST['id']."'";
		
		$obj->query($sql);
		$_SESSION['sess_msg']='Subscription package updated successfully';   
		
		}      
		header("location:videosubscription-list.php");
		exit();
 }	   
	   
if($_REQUEST['id']!=''){
$sql=$obj->query("select * from $tbl_videosubscription where id=".$_REQUEST['id'],$debug=-1);
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
if(obj.pkg_title.value==''){
alert("Please enter package name");
obj.pkg_title.focus();
return false;
}
if(obj.pkg_short_desc.value==''){
alert("Please enter short description");
obj.pkg_short_desc.focus();
return false;
}
}
</script>
<script type="text/javascript" src="ddtabmenu/ddtabmenufiles/ddtabmenu.js"></script>
<!-- CSS for Tab Menu #2 -->
<link rel="stylesheet" type="text/css" href="ddtabmenu/ddtabmenufiles/glowtabs.css" />
<script type="text/javascript">
ddtabmenu.definemenu("ddtabs", 0) //initialize Tab Menu #2 with 2nd tab selected
</script>
</head>
<body>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
<?php include("header.php"); ?>
<tr>
	<td align="right" class="paddRtLt70" valign="top">
		<table width="99%" border="0" cellspacing="0" cellpadding="0">
			<tr>
			
				<td align="right" valign="top">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td align="left" valign="middle" class="headingbg bodr text14">
					<em><img src="images/arrow2.gif" width="21" height="21" hspace="10" align="absmiddle" /></em>Admin: <?php if($_REQUEST['id']==''){ ?>Add<?php }else{ ?>Update<?php }?> Video Subscription Package
                    <span  style="float:right; padding-right:10px;">
					<input type="button" name="add" value="View Video Subscription"  class="button" onclick="location.href='videosubscription-list.php'" /></span>
                    </td>
						</tr>
						
						<tr>
							<td height="100" align="left" valign="top" bgcolor="#f3f4f6" class="bodr">
                            
                            <form name="frm" method="POST" enctype="multipart/form-data" action="" onsubmit="return validate(this)">
						<input type="hidden" name="submitForm" value="yes" />
						<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>" />
                            <table width="100%" border="0">
                            <tr>
										<td align="center" colspan="2" class="paddRt14 paddBot11">
										<font color="#FF0000"><strong><?php echo $_SESSION['sess_msg']; $_SESSION['sess_msg']='';?></strong></font></td>
							</tr>
                            <tr>
										<td align="center" colspan="2"  >
                                        <div id="ddtabs" class="glowingtabs" >
<ul style="padding-left:200px;">
<?php $websiteLang=$obj->query("select * from $tbl_websitelang order by id "); 
 while($resultlang=$obj->fetchNextObject($websiteLang)){?>
<li><a href="javascript:void(0)" rel="gc<?php  echo $resultlang->id;?>"><span><?php echo stripslashes($resultlang->language); ?></span></a></li>
<?php } ?>
</ul>
</div>
										</td>
							</tr>
                                    
             <?php $websiteLang=$obj->query("select * from $tbl_websitelang order by id "); 
			 $i=1;
 while($resultlang=$obj->fetchNextObject($websiteLang)){
	 $field1='pkg_title'.$resultlang->sort_name;
	 $field2='pkg_short_desc'.$resultlang->sort_name;
	 
	
	 ?>                       
  <tr>
    <td id="gc<?php  echo $resultlang->id;?>" <?php if($i!=1){?>style='display:none;'<?php } ?>><table width="100%" cellpadding="0" cellspacing="0">
									
									<tr>
									  <td width="24%" align="right" class="paddBot11 paddRt14">&nbsp;</td>
									  <td width="76%" align="left" class="paddBot11">&nbsp;</td>
						    </tr>					  
							  
							 
									
								<tr>
									  <td align="right" class="paddRt14 paddBot11"><strong>Package Name(<?php echo $resultlang->language; ?>):</strong></td>
									  <td align="left" class="paddBot11">
                                      <input name="<?php echo $field1; ?>"  size="36"  value="<?php echo stripslashes($result->$field1);?>" >
                                      </td>
							   </tr>
                               <tr>
									  <td align="right" class="paddRt14 paddBot11"><strong>Short Description(<?php echo $resultlang->language; ?>):</strong></td>
									  <td align="left" class="paddBot11">
                                      <input name="<?php echo $field2; ?>"  size="36"  value="<?php echo stripslashes($result->$field2);?>" >
                                      </td>
							   </tr>
							<?php if($i==1){?>
                            
                              <tr>
                                <td align="right" class="paddRt14 paddBot11"><h2>Registered Member</h2></td>
                                <td align="left" class="paddBot11">&nbsp;</td>
                              </tr>
                              <tr>
									  <td align="right" class="paddRt14 paddBot11"><strong>Discount:</strong></td>
									  <td align="left" class="paddBot11">
                                      <input name="reg_mem_discount"  size="36"  value="<?php echo stripslashes($result->reg_mem_discount);?>" >
                                      </td>
							   </tr>
                               <tr>
									  <td align="right" class="paddRt14 paddBot11"><strong>Price:</strong></td>
									  <td align="left" class="paddBot11">
                                      <input name="reg_mem_pkg_price"  size="36"  value="<?php echo stripslashes($result->reg_mem_pkg_price);?>" >
                                      </td>
							   </tr> 
                                <tr>
                                <td align="right" class="paddRt14 paddBot11"><h2>Affiliate Member</h2></td>
                                <td align="left" class="paddBot11">&nbsp;</td>
                              </tr>
                                <tr>
									  <td align="right" class="paddRt14 paddBot11"><strong>Discount:</strong></td>
									  <td align="left" class="paddBot11">
                                      <input name="aff_mem_discount"  size="36"  value="<?php echo stripslashes($result->aff_mem_discount);?>" >
                                      </td>
							   </tr>
                                <tr>
									  <td align="right" class="paddRt14 paddBot11"><strong>Price :</strong></td>
									  <td align="left" class="paddBot11">
                                      <input name="aff_mem_pkg_price"  size="36"  value="<?php echo stripslashes($result->aff_mem_pkg_price);?>" >
                                      </td>
							   </tr> 
                                <tr>
                                <td align="right" class="paddRt14 paddBot11"><h2>Premium Member</h2></td>
                                <td align="left" class="paddBot11">&nbsp;</td>
                              </tr>
                                <tr>
									  <td align="right" class="paddRt14 paddBot11"><strong>Discount:</strong></td>
									  <td align="left" class="paddBot11">
                                      <input name="pre_mem_discount"  size="36"  value="<?php echo stripslashes($result->pre_mem_discount);?>" >
                                      </td>
							   </tr>
                                  <tr>
									  <td align="right" class="paddRt14 paddBot11"><strong>Price:</strong></td>
									  <td align="left" class="paddBot11">
                                      <input name="pre_mem_pkg_price"  size="36"  value="<?php echo stripslashes($result->pre_mem_pkg_price);?>" >
                                      </td>
							   </tr> 
                                <tr>
                                <td align="right" class="paddRt14 paddBot11"><h2>Gold Member</h2></td>
                                <td align="left" class="paddBot11">&nbsp;</td>
                              </tr>
                                <tr>
									  <td align="right" class="paddRt14 paddBot11"><strong>Discount:</strong></td>
									  <td align="left" class="paddBot11">
                                      <input name="gold_mem_discount"  size="36"  value="<?php echo stripslashes($result->gold_mem_discount);?>" >
                                      </td>
							   </tr>          
                             
                                <tr>
									  <td align="right" class="paddRt14 paddBot11"><strong>Price:</strong></td>
									  <td align="left" class="paddBot11">
                                      <input name="gold_mem_pkg_price"  size="36"  value="<?php echo stripslashes($result->gold_mem_pkg_price);?>" >
                                      </td>
							   </tr> 
                                
                            <?php } ?>
									
								</table></td>
  </tr>
  <?php $i++;} ?>
  
  <tr>
										<td  colspan="2" align="center">
											<input type="submit" name="submit" value="Submit"  class="submit" border="0"/> 	                  		 &nbsp;&nbsp;
											<input name="Reset" type="reset" id="Reset" value="Reset" class="submit" border="0" />									  </td>
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
<?php include('footer.php'); ?>
</table>
</body>
</html>