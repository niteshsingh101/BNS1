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

	  $obj->query("insert into $tbl_page set 

	   parrent_id='$parrent_id',page_name='$page_name',page_name_ge='$page_name_ge', page_name_sp='$page_name_sp',page_name_fr='$page_name_fr',page_name_po='$page_name_po'

	  ,content='$content',content_ge='$content_ge',content_sp='$content_sp',content_fr='$content_fr',content_po='$content_po',disclaimer='$disclaimer',disclaimer_ge='$disclaimer_ge',disclaimer_sp='$disclaimer_sp',disclaimer_fr='$disclaimer_fr',disclaimer_po='$disclaimer_po'

	  ,meta_title='$meta_title',meta_description='$meta_description',meta_keywords='$meta_keywords'

	  ,meta_title_ge='$meta_title_ge',meta_description_ge='$meta_description_ge',meta_keywords_ge='$meta_keywords_ge'

	  ,meta_title_sp='$meta_title_sp',meta_description_sp='$meta_description_sp',meta_keywords_sp='$meta_keywords_sp'

	  ,meta_title_fr='$meta_title_fr',meta_description_fr='$meta_description_fr',meta_keywords_fr='$meta_keywords_fr'

	  ,meta_title_po='$meta_title_po',meta_description_po='$meta_description_po',meta_keywords_po='$meta_keywords_po',status=1");

	  $_SESSION['sess_msg']='Content added sucessfully';  

	  

       }else{ 



		$sql=" update $tbl_page set  parrent_id='$parrent_id', page_name='$page_name', page_name_ge='$page_name_ge', page_name_sp='$page_name_sp',page_name_fr='$page_name_fr',page_name_po='$page_name_po'
,content='$content',content_ge='$content_ge',content_sp='$content_sp',content_fr='$content_fr',content_po='$content_po',disclaimer='$disclaimer',disclaimer_ge='$disclaimer_ge',disclaimer_sp='$disclaimer_sp',disclaimer_fr='$disclaimer_fr',disclaimer_po='$disclaimer_po'
	
	  ,meta_title='$meta_title',meta_description='$meta_description',meta_keywords='$meta_keywords'

	  ,meta_title_ge='$meta_title_ge',meta_description_ge='$meta_description_ge',meta_keywords_ge='$meta_keywords_ge'

	  ,meta_title_sp='$meta_title_sp',meta_description_sp='$meta_description_sp',meta_keywords_sp='$meta_keywords_sp'

	  ,meta_title_fr='$meta_title_fr',meta_description_fr='$meta_description_fr',meta_keywords_fr='$meta_keywords_fr'

	  ,meta_title_po='$meta_title_po',meta_description_po='$meta_description_po',meta_keywords_po='$meta_keywords_po' ";

		

		$sql.=" where id='".$_REQUEST['id']."'";

		$obj->query($sql);

		$_SESSION['sess_msg']='Content updated successfully';   

		

		}      

		header("location:page-list.php");

		exit();

 }	   

	   

if($_REQUEST['id']!=''){

$sql=$obj->query("select * from $tbl_page where id=".$_REQUEST['id']);

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

if(obj.title.value==''){

alert("Please enter title");

obj.title.focus();

return false;

}



}

</script>

<script type="text/javascript" src="../include/ckeditor/ckeditor.js"></script>

<script type="text/javascript" src="ddtabmenu/ddtabmenufiles/ddtabmenu.js">

</script>

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

					<em><img src="images/arrow2.gif" width="21" height="21" hspace="10" align="absmiddle" /></em>Admin: <?php if($_REQUEST['id']==''){ ?>Add<?php }else{ ?>Update<?php }?> Content 

                    <span  style="float:right; padding-right:10px;">

					<input type="button" name="add" value="View Pages"  class="button" onclick="location.href='page-list.php'" /></span>

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

	 $field1='page_name'.$resultlang->sort_name;

	 $field2='content'.$resultlang->sort_name;
	 
	 $field6='disclaimer'.$resultlang->sort_name;

	 $field3='meta_title'.$resultlang->sort_name;

	 $field4='meta_keywords'.$resultlang->sort_name;

	 $field5='meta_description'.$resultlang->sort_name;

	 ?>                       

  <tr>

    <td id="gc<?php  echo $resultlang->id;?>" <?php if($i!=1){?>style='display:none;'<?php } ?>><table width="100%" cellpadding="0" cellspacing="0">

									<?php if($i==1){?>
									<tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>Country:</strong></td>

									  <td align="left" class="paddBot11">

                                      <select name="parrent_id" style="width:240px">
									  <option value="">-Select-</option>
									  <?php  $contentArr=$obj->query("select * from $tbl_content where status=1"); 
									  while($resultContent=$obj->fetchNextObject($contentArr)){
									  ?>
		<option value="<?php echo $resultContent->id; ?>" <?php if($resultContent->id==$result->parrent_id){?>selected<?php } ?>><?php echo $resultContent->title; ?></option>
									  <?php } ?>
									  
									  </select>
                      

                                      </td>

							  </tr>
							  
							  
							  
							  
							  <?php }?>

									
									
									
									<tr>

										<td width="20%" align="right" class="paddBot11 paddRt14">&nbsp;</td>

										<td width="80%" align="left" class="paddBot11"></td>

									</tr>

									

									<tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>Title( <?php echo $resultlang->language;?> ):</strong></td>

									  <td align="left" class="paddBot11">

                                      <input name="<?php echo $field1;?>"  size="36"  value="<?php echo stripslashes($result->$field1);?>" >

                                      

                                      </td>

							  </tr>

							  

								

									<tr>

									  <td align="right" class="paddRt14 paddBot11"><strong>Content( <?php echo $resultlang->language;?> ):</strong></td>

									  <td align="left" class="paddBot11"><textarea name="<?php echo $field2;?>"  rows="8" cols="40"  class="ckeditor"><?php echo stripslashes($result->$field2);?></textarea></td>

							  </tr>
							  
							  <tr>

									  <td align="right" class="paddRt14 paddBot11"><strong>Disclaimer( <?php echo $resultlang->language;?> ):</strong></td>

									  <td align="left" class="paddBot11"><textarea name="<?php echo $field6;?>"  rows="8" cols="40"  class="ckeditor"><?php echo stripslashes($result->$field6);?></textarea></td>

							  </tr>

                              <tr>

									  <td align="right" class="paddRt14 paddBot11"><strong>Meta Title( <?php echo $resultlang->language;?> ):</strong></td>

									  <td align="left" class="paddBot11"><textarea name="<?php echo $field3;?>"  rows="5" cols="40"><?php echo stripslashes($result->$field3);?></textarea></td>

							  </tr>

                              <tr>

									  <td align="right" class="paddRt14 paddBot11"><strong>Meta Keywords( <?php echo $resultlang->language;?> ):</strong></td>

									  <td align="left" class="paddBot11"><textarea name="<?php echo $field4;?>" rows="5" cols="40" ><?php echo stripslashes($result->$field4);?></textarea></td>

							  </tr>

                              <tr>

									  <td align="right" class="paddRt14 paddBot11"><strong>Meta Description( <?php echo $resultlang->language;?> ):</strong></td>

									  <td align="left" class="paddBot11"><textarea name="<?php echo $field5;?>" rows="5" cols="40" ><?php echo stripslashes($result->$field5);?></textarea></td>

							  </tr>

									

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