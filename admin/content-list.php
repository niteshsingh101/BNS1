<?php

	include("../include/config.php");

	include("../include/functions.php"); 

	validate_admin();

	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title><?php echo SITE_TITLE; ?></title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />

<link href="css/admin.css" rel="stylesheet" type="text/css" />

<script>

  

	function checkall(objForm)

    {

	len = objForm.elements.length;

	var i=0;

	for( i=0 ; i<len ; i++){

		if (objForm.elements[i].type=='checkbox') 

		objForm.elements[i].checked=objForm.check_all.checked;

	}

   }

	function del_prompt(frmobj,comb)

		{

		//alert(comb);

			if(comb=='Delete'){

				if(confirm ("Are you sure you want to delete record(s)"))

				{

					frmobj.action = "content-del.php";

					frmobj.what.value="Delete";

					frmobj.submit();

					

				}

				else{ 

				return false;

				}

		}

		else if(comb=='Deactivate'){

			frmobj.action = "content-del.php";

			frmobj.what.value="Deactivate";

			frmobj.submit();

		}

		else if(comb=='Activate'){

			frmobj.action = "content-del.php";

			frmobj.what.value="Activate";

			frmobj.submit();

		}

		

		

	}



</script>



</head>

<body>

<table width="100%" border="0" cellpadding="0" cellspacing="0">

<?php include("header.php") ?>

<tr>

		<td align="right" class="paddRtLt70" valign="top">

			<table width="99%" border="0" cellspacing="0" cellpadding="0">

					<tr>

						

						<td align="right" valign="top">

							<table width="100%" border="0" cellspacing="0" cellpadding="0">

								<tr>

									<td align="left" valign="middle" class="headingbg bodr text14">

									<em><img src="images/arrow2.gif" width="21" height="21" hspace="10" align="absmiddle" /></em>Admin: View Content <span  style="float:right; padding-right:10px;">
									<input type="button" name="add" value="Add Content"  class="button" onclick="location.href='content-addf.php'" /></span>
									
									</td>

								</tr>
								
								

								<form name="frm" method="post" action="content-del.php" enctype="multipart/form-data">

									<tr>

										<td height="100" align="left" valign="top" bgcolor="#FFFFFF" class="bodr">

											<table width="100%" cellpadding="0" cellspacing="0">

											<?php if($_SESSION['sess_msg']){ ?>

											<tr><td  align="center"><font color="#FF0000"><strong><?php echo $_SESSION['sess_msg'];$_SESSION['sess_msg']='';?></strong></font></td></tr>

											

											<?php }?>

												<tr>

														<td align="left">

															<?php 

$where='';



$start=0;

if(isset($_GET['start'])) $start=$_GET['start'];

$pagesize=30;

if(isset($_GET['pagesize'])) $pagesize=$_GET['pagesize'];

$order_by='id';

if(isset($_GET['order_by'])) $order_by=$_GET['order_by'];

$order_by2='asc';

if(isset($_GET['order_by2'])) $order_by2=$_GET['order_by2'];

$sql=$obj->Query("select * from $tbl_content where 1=1 $where order by $order_by $order_by2 limit $start, $pagesize");

$sql2=$obj->query("select * from $tbl_content where 1=1 $where order by $order_by $order_by2",$debug=-1);

$reccnt=$obj->numRows($sql2);



															if($reccnt==0)

															{

															?>

																<table width="100%" border="0" cellspacing="0" cellpadding="0">

																	<tr>

																		<td align="center" valign="middle"><font face="Arial, Helvetica, sans-serif"   color="#FF0000" size="+1">No Record</font></td>

																	</tr>

																</table>

															<?php 

															}

															else

															{

															?>

															<table width="100%" border="0" cellspacing="0" cellpadding="0">

																<tr>

																	<td width="17%" align="left" class="padd5" bgcolor="#f3f4f6"><strong>S No.</strong></td>

																	<td width="24%" align="left" bgcolor="#f3f4f6" class="padd5"><strong>Title</strong></td>

																	

																<td width="24%" align="center" bgcolor="#f3f4f6" class="padd5"><strong>Icon Image</strong></td>

																	<td width="38%" align="left" bgcolor="#f3f4f6" class="padd5"><strong>Content</strong></td> 

															

																	<td width="21%" align="center" class="padd5" bgcolor="#f3f4f6"><strong>Action</strong></td> 

																 <!--<td width="13%" align="center" bgcolor="#f3f4f6" class="padd5" >  <input name="check_all" type="checkbox"   id="check_all" onclick="checkall(this.form)" value="check_all" /></td> -->

																</tr>

																<?php

																$i=0;

																while($line=$obj->fetchNextObject($sql))

																{

																$i++;

															

																

																if($i%2==0)

																{

																$bgcolor = "#f3f4f6";

																}

																else

																{

																$bgcolor = "";

																}

																?>

																	<tr bgcolor="<?php echo $bgcolor;?>">

																		<td class="padd5"><strong><?php echo $i+$start; ?>.</strong></td>

																		<td class="padd5">

																		<?php

																		echo stripslashes($line->title);

																		?>

																		</td>

                                                                        <td align="center" class="padd5"><?php if(is_file("../upload_images/icon/".$line->icon)){?><img src="../upload_images/icon/<?php echo  $line->icon;?>" width="100"   /><?php } ?>

                        </td>

																		 <td align="left" class="padd5">

																	<?php echo substr(strip_tags($line->content),0,300).".."; ?>

                                                                          </td>

																	

																		<!--<td valign="top" class="padd5">

																		<?php if($line->status==1){ echo 'Activated'; } else{ echo 'Deactivatd';}?>

																		

																		

																		</td> -->

																		<td align="center" valign="center" class="padd5">

																		<a href="content-addf.php?id=<?php echo $line->id;?>" ><img src="images/edit3.gif" border="0" title="Edit" /></a>

																		</td>

																		<!--<td align="center" valign="top" class="padd5">

																	<input type="checkbox" name="ids[]" value="<?php echo $line->id;?>" />

																		</td> -->

																	</tr>

																<?php

																

																}

																

																?>

													<tr>

                          <td valign="top" colspan="6"  align="right">&nbsp;

						  

</td>   </tr>    			

	<tr>

                          <td valign="top" colspan="6"  align="right" class="dark_red"><?php include("../include/paging.inc.php"); ?>

						  

</td>   </tr>    			<!--<tr><td align="right"  style="padding-right:80px;" colspan="6"> <input type="hidden" name="what" value="what" />

												    <input type="submit" name="Submit" value="Activate" class="button" onclick="return del_prompt(this.form,this.value)" />

                            <input type="submit" name="Submit" value="Deactivate" class="button" onclick="return del_prompt(this.form,this.value)" />

                        <input type="submit" name="Submit" value="Delete" class="button" onclick="return del_prompt(this.form,this.value)" /></td></tr> -->

															</table><?php }?>

														</td>

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

<tr><td height="100"></td></tr>

<?php include('footer.php'); ?>

</table>

</body>

</html>