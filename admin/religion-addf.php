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

	  $obj->query("insert into tbl_religion set religion='$religion',religion_ge='$religion_ge',religion_sp='$religion_sp',religion_fr='$religion_fr',religion_po='$religion_po',status=1 ");

	  $_SESSION['sess_msg']='Religion added successfully';  

	  

       }else{ 

	   $sql=" update $tbl_religion set religion='$religion',religion_ge='$religion_ge',religion_sp='$religion_sp',religion_fr='$religion_fr',religion_po='$religion_po' ";

	   $sql.=" where id='".$_REQUEST['id']."'";

	   $obj->query($sql);

	   $_SESSION['sess_msg']='Religion updated sucessfully';   

        }

   header("location:religion-list.php");

   exit();

    

  }

	   

if($_REQUEST['id']!=''){

$sql=$obj->query("select * from $tbl_religion where id=".$_REQUEST['id']);

$result=$obj->fetchNextObject($sql);

}

	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title><?php echo SITE_TITLE; ?></title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8;" />

<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />

<link href="css/admin.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" language="javascript">

function validate(obj)

{

if(obj.religion.value==''){

alert("Please enter Religion");

obj.religion.focus();

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

					<em><img src="images/arrow2.gif" width="21" height="21" hspace="10" align="absmiddle" /></em>Admin: <?php if($_REQUEST['id']==''){ ?>Add<?php }else{ ?>Update<?php }?> Religion<span  style="float:right; padding-right:10px;">

					<input type="button" name="add" value="View Religion"  class="button" onclick="location.href='religion-list.php'" /></span></td>

						</tr>

						

						<tr>

							<td height="100" align="left" valign="top" bgcolor="#f3f4f6" class="bodr">

							<form name="frm" method="POST" enctype="multipart/form-data" action="" onsubmit="return validate(this)">

						<input type="hidden" name="submitForm" value="yes" />

						<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>" />

							<table width="100%" cellpadding="0" cellspacing="0">

									<tr>

										<td align="center" colspan="2" class="paddRt14 paddBot11">

										<font color="#FF0000"><strong><?php echo $_SESSION['sess_msg']; $_SESSION['sess_msg']='';?></strong></font></td>

									</tr>

									<tr>

										<td width="18%" align="right" class="paddBot11 paddRt14">&nbsp;</td>

										<td width="82%" align="left" class="paddBot11"></td>

									</tr>

									

							  <?php $websiteLang=$obj->query("select * from $tbl_websitelang order by id "); 

							  while($resultlang=$obj->fetchNextObject($websiteLang)){

								  

								  $field_name='religion'.$resultlang->sort_name;

								 

								  ?>

										

								<tr>

									  <td align="right" class="paddRt14 paddBot11"><strong>Religion(<?php echo $resultlang->language; ?>):</strong></td>

									  <td align="left" class="paddBot11">

                                      <input name="<?php echo $field_name; ?>"  size="36"  value="<?php echo stripslashes($result->$field_name);?>" >

                                      </td>

							   </tr>

                               <?php } ?> 

									<tr>

									  <td align="right" class="paddRt14 paddBot11">&nbsp;</td>

									  <td align="left" class="paddBot11">&nbsp;</td>

							  </tr>

									<tr>

										<td width="18%" align="right" class="paddRt14 paddBot11">&nbsp;</td>

										<td width="82%" align="left" class="paddBot11">

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

