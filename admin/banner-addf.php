<?php

include("../include/config.php");

include("../include/functions.php"); 

include("../include/simpleimage.php");

 validate_admin();

  

  if($_REQUEST['submitForm']=='yes'){

      

	 foreach($_POST as $key=>$val){



	   $$key=mysql_real_escape_string($val);



      }

  

      if($_FILES['photo']['size']>0 && $_FILES['photo']['error']==''){

	  $Image=new SimpleImage();

	  $img=time().$_FILES['photo']['name'];

	  move_uploaded_file($_FILES['photo']['tmp_name'],"../upload_images/banner/".$img);

	  copy("../upload_images/banner/".$img,"../upload_images/banner/thumb/".$img);

	  $Image->load("../upload_images/banner/thumb/".$img);

	  $Image->resize(120,60);

	  $Image->save("../upload_images/banner/thumb/".$img);

	  }  

  

  if($_REQUEST['id']==''){

	  $obj->query("insert into $tbl_banner set title='$title',description='$description',target_url='$target_url',photo='$img',status=1 ");

	  $_SESSION['sess_msg']='Banner added sucessfully';  

	  

       }else{ 

	   $sql=" update $tbl_banner set title='$title',description='$description',target_url='$target_url' ";

	   if($img){

	   $imageArr=$obj->query("select photo from $tbl_banner where id=".$_REQUEST['id']);

	   $resultImage=$obj->fetchNextObject($imageArr);

	   @unlink("../upload_images/banner/".$resultImage->photo);

	   @unlink("../upload_images/banner/thumb/".$resultImage->photo);

	    $sql.=" , photo='$img' ";

	   }

	  $sql.=" where id='".$_REQUEST['id']."'";

	

	   $obj->query($sql);

	   $_SESSION['sess_msg']='Banner updated sucessfully';   

        }

   header("location:banner-list.php");

   exit();

  }      

	   

	   

if($_REQUEST['id']!=''){

$sql=$obj->query("select * from $tbl_banner where id=".$_REQUEST['id']);

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

<?php if($_REQUEST['id']==''){ ?>

if(obj.photo.value==''){

alert("Please select image");

obj.photo.focus();

return false;

}

<?php } ?>

}

</script>

</script>



<script type="text/javascript" src="../include/ckeditor/ckeditor.js"></script>



<script type="text/javascript" src="ddtabmenu/ddtabmenufiles/ddtabmenu.js">



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

					<em><img src="images/arrow2.gif" width="21" height="21" hspace="10" align="absmiddle" /></em>Admin: <?php if($_REQUEST['id']==''){ ?>Add<?php }else{ ?>Update<?php }?> Banner<span  style="float:right; padding-right:10px;">

					<input type="button" name="add" value="View Banners"  class="button" onclick="location.href='banner-list.php'" /></span></td>

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



                            



                                    



             <?php 
	 $field1='title';



	 $field2='description';



	 $field3='target_url';

     ?>                       



  <tr>



    <td id="gc" ><table width="100%" cellpadding="0" cellspacing="0">



									



									<tr>



										<td width="20%" align="right" class="paddBot11 paddRt14">&nbsp;</td>



										<td width="80%" align="left" class="paddBot11"></td>



									</tr>



									



									<tr>



                                      <td align="right" class="paddBot11 paddRt14"><strong>Title:</strong></td>



									  <td align="left" class="paddBot11">



                                      <textarea  name="<?php echo $field1;?>"  rows="5" cols="40"  ><?php echo stripslashes($result->$field1);?></textarea>

                      



                                      </td>



							  </tr>

								

								

							  <tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>Banner Image(1024px X 436px):<br/>

                                      </strong></td>

									  <td align="left" class="paddBot11"><input type="file" name="photo"  /><br/>

									  <?php if(is_file("../upload_images/banner/thumb/".$result->photo)){ ?>

									  <img src="../upload_images/banner/thumb/<?php echo $result->photo; ?>" width="120" height="60" /><?php } ?></td>

							  </tr>






									<tr>



									  <td align="right" class="paddRt14 paddBot11"><strong>Description :</strong></td>



									  <td align="left" class="paddBot11"><textarea name="<?php echo $field2;?>"  rows="8" cols="40" ><?php echo stripslashes($result->$field2);?></textarea></td>



							  </tr>

						

                              <tr>



									  <td align="right" class="paddRt14 paddBot11"><strong>Target URL:</strong></td>



									  <td align="left" class="paddBot11"><textarea name="<?php echo $field3;?>"  rows="5" cols="40"><?php echo stripslashes($result->$field3);?></textarea></td>



							  </tr>

							 

                          	</table></td>



  </tr>






  



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

