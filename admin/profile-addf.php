<?php
include("../include/config.php");
include("../include/functions.php"); 
include("../include/simpleimage.php");
 validate_admin();
  
  if($_REQUEST['submitForm']=='yes'){
  
    
	  echo "<pre>";
	  print_r($_POST);
	  echo "</pre>"; 
     
	 foreach($_POST as $key=>$val){

	  $$key=mysql_real_escape_string($val);

      }
    /* echo "countryid=".$passport;
	   die;*/
      if($_FILES['photo1']['size']>0 && $_FILES['photo1']['error']==''){
	  $Image=new SimpleImage();
	  $photo1=time().$_FILES['photo1']['name'];
	  move_uploaded_file($_FILES['photo1']['tmp_name'],"../upload_images/profile/".$photo1);
	  copy("../upload_images/profile/".$photo1,"../upload_images/profile/thumb/".$photo1);
	  $Image->load("../upload_images/profile/thumb/".$photo1);
	  $Image->resize(200,130);
	  $Image->save("../upload_images/profile/thumb/".$photo1);
	  }  
//2nd image

  if($_FILES['photo2']['size']>0 && $_FILES['photo2']['error']==''){
	  $Image=new SimpleImage();
	  $photo2=time().$_FILES['photo2']['name'];
	  move_uploaded_file($_FILES['photo2']['tmp_name'],"../upload_images/profile/".$photo2);
	  copy("../upload_images/profile/".$photo2,"../upload_images/profile/thumb/".$photo2);
	  $Image->load("../upload_images/profile/thumb/".$photo2);
	  $Image->resize(200,130);
	  $Image->save("../upload_images/profile/thumb/".$photo2);
	  }  	  
	  
	  //3rd image
	  
	    if($_FILES['photo3']['size']>0 && $_FILES['photo3']['error']==''){
	  $Image=new SimpleImage();
	  $photo3=time().$_FILES['photo3']['name'];
	  move_uploaded_file($_FILES['photo3']['tmp_name'],"../upload_images/profile/".$photo3);
	  copy("../upload_images/profile/".$photo3,"../upload_images/profile/thumb/".$photo3);
	  $Image->load("../upload_images/profile/thumb/".$photo3);
	  $Image->resize(200,130);
	  $Image->save("../upload_images/profile/thumb/".$photo3);
	  }  
	   //photo4
 if($_FILES['photo4']['size']>0 && $_FILES['photo4']['error']==''){
	  $Image=new SimpleImage();
	  $photo4=time().$_FILES['photo4']['name'];
	  move_uploaded_file($_FILES['photo4']['tmp_name'],"../upload_images/profile/".$photo4);
	  copy("../upload_images/profile/".$photo4,"../upload_images/profile/thumb/".$photo4);
	  $Image->load("../upload_images/profile/thumb/".$photo4);
	  $Image->resize(200,130);
	  $Image->save("../upload_images/profile/thumb/".$photo4);
	  }  
	  
	  //photo5
	   if($_FILES['photo5']['size']>0 && $_FILES['photo5']['error']==''){
	  $Image=new SimpleImage();
	  $photo5=time().$_FILES['photo5']['name'];
	  move_uploaded_file($_FILES['photo5']['tmp_name'],"../upload_images/profile/".$photo5);
	  copy("../upload_images/profile/".$photo5,"../upload_images/profile/thumb/".$photo5);
	  $Image->load("../upload_images/profile/thumb/".$photo5);
	  $Image->resize(200,130);
	  $Image->save("../upload_images/profile/thumb/".$photo5);
	  }  
	  
	  //photo6
	   if($_FILES['photo6']['size']>0 && $_FILES['photo6']['error']==''){
	  $Image=new SimpleImage();
	  $photo6=time().$_FILES['photo6']['name'];
	  move_uploaded_file($_FILES['photo6']['tmp_name'],"../upload_images/profile/".$photo6);
	  copy("../upload_images/profile/".$photo6,"../upload_images/profile/thumb/".$photo6);
	  $Image->load("../upload_images/profile/thumb/".$photo6);
	  $Image->resize(200,130);
	  $Image->save("../upload_images/profile/thumb/".$photo6);
	  }  
	  
  
  if($_REQUEST['id']==''){
  
  	   $client= implode(',', $_POST['client']);
	   $language= implode(',',$_POST['language']);
	  $obj->query("insert into $tbl_profile set Created=now(),category_name='$category_name',Name='$Name',maritial_status='$maritial_status',description='$description',sexual_orientation='$sexual_orientation',birth_year='$birth_year',client='$client',ethinic_origin='$ethinic_origin',hair_color='$hair_color',eyes_color='$eyes_color',breastcup='$breastcup',height='$height',weight='$weight',language='$language',website='$website',CountryName='$CountryName',state='$state',city='$city',photo1='$photo1',photo2='$photo2',photo3='$photo3',photo4='$photo4',photo5='$photo5',photo6='$photo6',status=1 ");
	  $_SESSION['sess_msg']='Profile added sucessfully';  
	  
       }else{ 
	   
	   
	   $client= implode(',', $_POST['client']);
	   $language= implode(',',$_POST['language']);
	   
	   $sql=" update $tbl_profile set Created=now(),category_name='$category_name',Name='$Name',maritial_status='$maritial_status',description='$description',sexual_orientation='$sexual_orientation',birth_year='$birth_year',client='$client',ethinic_origin='$ethinic_origin',hair_color='$hair_color',eyes_color='$eyes_color',breastcup='$breastcup',height='$height',weight='$weight',language='$language',website='$website',CountryName='$CountryName',state='$state',city='$city',photo1='$photo1',photo2='$photo2',photo3='$photo3',photo4='$photo4',photo5='$photo5',photo6='$photo6'";
	   if($photo1){
	   $imageArr=$obj->query("select photo1 from $tbl_profile where id=".$_REQUEST['id']);
	   $resultImage=$obj->fetchNextObject($imageArr);
	   @unlink("../upload_images/profile/".$resultImage->photo1);
	   @unlink("../upload_images/profile/thumb/".$resultImage->photo1);
	    $sql.=" , photo1='$photo1' ";
	   }
	   //2nd images
	   	   if($photo2){
	   $imageArr2=$obj->query("select photo2 from $tbl_profile where id=".$_REQUEST['id']);
	   $resultImage=$obj->fetchNextObject($imageArr);
	   @unlink("../upload_images/profile/".$resultImage->photo2);
	   @unlink("../upload_images/profile/thumb/".$resultImage->photo2);
	    $sql.=" , photo2='$photo2' ";
	   }
	   
	   //3rd images
	   
	   	   	   if($photo3){
	   $imageArr=$obj->query("select photo3 from $tbl_profile where id=".$_REQUEST['id']);
	   $resultImage=$obj->fetchNextObject($imageArr);
	   @unlink("../upload_images/profile/".$resultImage->photo3);
	   @unlink("../upload_images/profile/thumb/".$resultImage->photo3);
	    $sql.=" , photo3='$photo3' ";
	   }
  	   //4th images
	   
	   	   	   if($photo4){
	   $imageArr=$obj->query("select photo4 from $tbl_profile where id=".$_REQUEST['id']);
	   $resultImage=$obj->fetchNextObject($imageArr);
	   @unlink("../upload_images/profile/".$resultImage->photo4);
	   @unlink("../upload_images/profile/thumb/".$resultImage->photo4);
	    $sql.=" , photo4='$photo4' ";
	   }
	   
	   //5th images
	   	   
	   
	   	   	   if($photo5){
	   $imageArr=$obj->query("select photo5 from $tbl_profile where id=".$_REQUEST['id']);
	   $resultImage=$obj->fetchNextObject($imageArr);
	   @unlink("../upload_images/profile/".$resultImage->photo5);
	   @unlink("../upload_images/profile/thumb/".$resultImage->photo5);
	    $sql.=" , photo5='$photo5' ";
	   }
	   	   //6th images
	   
	   	   	   if($photo6){
	   $imageArr=$obj->query("select photo6 from $tbl_profile where id=".$_REQUEST['id']);
	   $resultImage=$obj->fetchNextObject($imageArr);
	   @unlink("../upload_images/profile/".$resultImage->photo6);
	   @unlink("../upload_images/profile/thumb/".$resultImage->photo6);
	    $sql.=" , photo6='$photo6' ";
	   }
	   
	   
	  $sql.=" where id='".$_REQUEST['id']."'";
	
	   $obj->query($sql);
	   $_SESSION['sess_msg']='Profile updated sucessfully';   
        }
   header("location:profile-list.php");
   exit();
  }      
	   
	   
if($_REQUEST['id']!=''){
$sql=$obj->query("select * from $tbl_profile where id=".$_REQUEST['id']);
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
if(obj.photo1.value==''){
alert("Please select image");
obj.photo1.focus();
return false;
}
<?php } ?>
}
</script>
</script>

<script type="text/javascript" src="../include/ckeditor/ckeditor.js"></script>

<script type="text/javascript" language="javascript">

function validate(obj)

{

if(obj.town.value==''){

alert("Please enter Town");

obj.town.focus();

return false;

}



}

</script>
<script type="text/javascript">

function callState(CountryName){

  $.ajax({

   url:"getState.php",

   data:{CountryName:CountryName},

   success:function(data){

    $("#resultState").html(data);

   }

  

  })

}

</script>




</head>
<body>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
<?php include("header.php") ?>
<link rel="stylesheet" href="calender/css/jquery-ui.css">
	
	<script src="calender/js/jquery-ui.js"></script>
	<script>
	$(function() {
		$( "#birthdate" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat:'yy-mm-dd',
			yearRange:'1950:<?php echo date('Y')-15; ?>'
		});
	});
	</script>
<tr>
	<td align="right" class="paddRtLt70" valign="top">
		<table width="99%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				
				<td align="right" valign="top">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td align="left" valign="middle" class="headingbg bodr text14">
					<em><img src="images/arrow2.gif" width="21" height="21" hspace="10" align="absmiddle" /></em>Admin: <?php if($_REQUEST['id']==''){ ?>Add<?php }else{ ?>Update<?php }?> Profile<span  style="float:right; padding-right:10px;">
					<input type="button" name="add" value="View Profiles"  class="button" onclick="location.href='profile-list.php'" /></span></td>
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

	 $field1='All_rating';

	 $field2='Name';

	 $field3='Sirname';
	 $field5='Height';
	 $field6='Weight';
	 $field7='Language';
	 $field8='Passport';
	 $field9='marital_status';
	 $field10='Children';
	 $field11='Parameters';
	 $field12='About';
	 $field13='Imagine';
	 $field14='Prefage';
	 $field15='Prefheight';
	 $field16='smoking';
	 $field17='Birth_date';
	
	 $field24='Education_comment';
	 
	 $field26='Occupation';
     ?>                       

  <tr>

    <td id="gc">
	
	<table width="100%" cellpadding="0" cellspacing="0">

									

									<tr>

										<td width="20%" align="right" class="paddBot11 paddRt14">&nbsp;</td>

										<td width="80%" align="left" class="paddBot11"></td>

									</tr>
									
									
									<tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>Category:</strong></td>

									  <td align="left" class="paddBot11">

                                      <select name="category_name" style="width:240px">
									  <option value="">-Select-</option>
									  <?php  $categoryArr=$obj->query("select * from tbl_category where status=1"); 
									  while($resultCategory=$obj->fetchNextObject($categoryArr)){?>
									  <?php echo $resultCategory->category; ?>
									  
<option value="<?php echo $resultCategory->category; ?>" <?php if($resultCategory->category==$result->category_name){?>selected<?php } ?>><?php echo $resultCategory->category; ?></option>
									  <?php }?>
									  
									  </select>
                      

                                      </td>

							  </tr>
							 
							  <tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>Name:</strong></td>

									  <td align="left" class="paddBot11">

                                      <input name="<?php echo $field2;?>"  size="36"  value="<?php echo stripslashes($result->$field2);?>" >
                      

                                      </td>

							  </tr>
							  							<tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>Marital status:</strong></td>

									  <td align="left" class="paddBot11">

                                      <select name="maritial_status" id="maritial_status" style="width:240px">
 									 <option value="Not Married" <?php if($result->maritial_status=='Not Married'){?>selected<?php } ?>>Not Married</option>
 									 <option value="Married" <?php if($result->maritial_status=='Married'){?>selected<?php } ?>>Married</option>
  									<option value="Divorced" <?php if($result->maritial_status=='Divorced'){?>selected<?php } ?>>Divorced</option>
  									<option value="Widowed" <?php if($result->maritial_status=='Widowed'){?>selected<?php } ?>>Widowed</option>
									</select> 

                                      </td>

							  </tr>
							  <tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>Description:</strong></td>

									  <td align="left" class="paddBot11">

                                      <textarea name="description" cols="33" rows="5" value="<?php echo stripslashes($result->description);?>" ><?php echo stripslashes($result->description);?></textarea>
                      

                                      </td>

							  </tr>
							  
							  <tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>Sexual Orientation:</strong></td>

									  <td align="left" class="paddBot11">

                                      <select name="sexual_orientation" style="width:240px">
									  <option value="">-Select-</option>
									  <?php  $orientationArr=$obj->query("select * from tbl_orientation where status=1"); 
									  while($resultOrientation=$obj->fetchNextObject($orientationArr)){?>
									  
									  
<option value="<?php echo $resultOrientation->orientation; ?>" <?php if($resultOrientation->orientation==$result->sexual_orientation){?>selected<?php } ?>><?php echo $resultOrientation->orientation; ?></option>
									  <?php }?>
									  
									  </select>
                      

                                      </td>

							  </tr>
							  <tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>Year of Birth:</strong></td>

									  <td align="left" class="paddBot11">
									  <select name="birth_year" style="width:240px">

									<option>Select</option>

									<?php 

									$y= 1997;

									while($y!=1899){

									?>

									<option value="<?php echo $y;?>" <?php if($y==$result->birth_year){?>selected<?php } ?>><?php echo $y;?></option>

									<?php 

									$y--;

									}

									?></select>
									 

                                      </td>

							  </tr>
							  <tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>Clients:</strong></td>

									  <td align="left" class="paddBot11">
									<input type="checkbox" name="client[]" value="Man" />Man
									<input type="checkbox" name="client[]" value="Woman" />Woman
									<input type="checkbox" name="client[]" value="Couples" />Couples</br>
									  </td>

							  </tr>
							  
							  
							  
							  <tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>Ethinic Origin:</strong></td>

									  <td align="left" class="paddBot11">

                                    <select name="ethinic_origin" style="width:240px">
									  <option value="">-Select-</option>
									  <?php  $originArr=$obj->query("select * from tbl_origin where status=1"); 
									  while($resultOrigin=$obj->fetchNextObject($originArr)){
									  ?>
					<option value="<?php echo $resultOrigin->origin; ?>" <?php if($resultOrigin->origin==$result->ethinic_origin){?>selected<?php } ?>><?php echo $resultOrigin->origin; ?></option>
									  <?php } ?>
									  
									  </select>
                      

                                      </td>

							  </tr>
							  
							  
							  
							  <tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>Hair Color:</strong></td>

									  <td align="left" class="paddBot11">

                                    <select name="hair_color" style="width:240px">
									  <option value="">-Select-</option>
									  <?php  $hairArr=$obj->query("select * from $tbl_hair_color where status=1"); 
									  while($resultHair=$obj->fetchNextObject($hairArr)){
									  ?>
					<option value="<?php echo $resultHair->hair_color; ?>" <?php if($resultHair->hair_color==$result->hair_color){?>selected<?php } ?>><?php echo $resultHair->hair_color; ?></option>
									  <?php } ?>
									  
									  </select>
                      

                                      </td>

							  </tr>
							     <tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>Eye Color:</strong></td>

									  <td align="left" class="paddBot11">

                                      
                      				<select name="eyes_color" style="width:240px">
									  <option value="">-Select-</option>
									  <?php  $eyeArr=$obj->query("select * from $tbl_eyes_color where status=1"); 
									  while($resultEye=$obj->fetchNextObject($eyeArr)){
									  ?>
									  <option value="<?php echo $resultEye->eyes_color; ?>" <?php if($resultEye->eyes_color==$result->eyes_color){?>selected<?php } ?>><?php echo $resultEye->eyes_color; ?></option>
									  <?php } ?>
									  
									  </select>

                                      </td>

							  </tr>
							  <tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>Breastcup:</strong></td>

									  <td align="left" class="paddBot11">

                                      
                      				<select name="breastcup" style="width:240px">
									  <option value="">-Select-</option>
									  <?php  $brestArr=$obj->query("select * from tbl_breastcup where status=1"); 
									  while($resultBrest=$obj->fetchNextObject($brestArr)){
									  ?>
									  <option value="<?php echo $resultBrest->breastcup; ?>" <?php if($resultBrest->breastcup==$result->breastcup){?>selected<?php } ?>><?php echo $resultBrest->breastcup; ?></option>
									  <?php } ?>
									  
									  </select>

                                      </td>

							  </tr>
							  
							  
							  
							  
						
							   <tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>Height:</strong></td>

									  <td align="left" class="paddBot11">
									  
									  <select name="height" style="width:240px">

								<option>Select</option>

									<?php 

									$h= 150;

									while($h!=231){

									?>

									<option value="<?php echo $h;?>"<?php if($h==$result->height){?>selected<?php } ?>><?php echo $h;?></option>

									<?php 

									$h++;

									}

									?></select>
									  
									  

                                    
                                      </td>

							  </tr>
							   <tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>Weight:</strong></td>

									  <td align="left" class="paddBot11">
									  
									  <select name="weight" style="width:240px" >

								<option>Select</option>

									<?php 

									$w= 50;

									while($w!=141){

									?>

									<option value="<?php echo $w;?>"<?php if($w==$result->weight){?>selected<?php } ?>><?php echo $w;?></option>

									<?php 

									$w++;

									}

									?></select>

                                      </td>

							  </tr>
							 
							   <tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>Languages:</strong></td>

									  <td align="left" class="paddBot11">
									  <?php  $langArr=$obj->query("select * from tbl_lang"); 
									  while($resultLang=$obj->fetchNextObject($langArr)){
									  ?>
									  
									<input type="checkbox" name="language[]" value="<?php echo $resultLang->lang; ?>"<?php if($result->language==$resultLang->lang){?> checked="checked"<?php } ?> /><?php echo $resultLang->lang; ?>
									<?php }?>
									  </td>

							  </tr>
							  
							   <tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>Website:</strong></td>

									  <td align="left" class="paddBot11">

                                      <input name="website"  size="36"  value="<?php echo stripslashes($result->website);?>" >
                      

                                      </td>

							  </tr>
							 
							  <tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>Country:</strong></td>

									  <td align="left" class="paddBot11">

                                      <select name="CountryName" style="width:240px" onChange="return callState(this.value)">
									  <option value="">-Select-</option>
									  <?php  $countryArr=$obj->query("select * from $tbl_country where status=1"); 
									  while($resultCountry=$obj->fetchNextObject($countryArr)){
									  ?>
		<option value="<?php echo $resultCountry->country; ?>" <?php if($resultCountry->country==$result->CountryName){?>selected<?php } ?>><?php echo $resultCountry->country; ?></option>
									  <?php } ?>
									  
									  </select>
                      

                                      </td>

							  </tr>
							  
							  <tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>State:</strong></td>

									  <td align="left" class="paddBot11" id="resultState">

                                    <select name="state" style="width:240px"  >

									
									<?php if($_REQUEST['id']!=''){
									$rid=$_REQUEST['id'];
									$stateArr=$obj->query("select * from $tbl_state where id=$rid");
									$resultstate=$obj->fetchNextObject($stateArr);
									?>

									<option value="<?php echo $resultstate->state?>"> <?php echo $resultstate->state?></option>

									  <?php } else {?>
									  
									  <option value=""> Select State</option>
									  <?php }?>

									  </select>
                      

                                      </td>

							  </tr>
							 
								<tr>

									  <td align="right" class="paddRt14 paddBot11"><strong>City :</strong></td>

									  <td align="left" class="paddBot11">

                                      <input type="text" name="city"  size="36"  value="<?php echo stripslashes($result->city);?>" >

                                      </td>

							   </tr>
							   <tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>Image1:<br/>

                                      </strong></td>

									  <td align="left" class="paddBot11"><input type="file" name="photo1" value="<?php echo $result->photo1 ;?>"   /><br/>

									  <?php if(is_file("../upload_images/profile/thumb/".$result->photo1)){ ?>

									  <img src="../upload_images/profile/thumb/<?php echo $result->photo1; ?>" width="120" height="60" /><?php } ?></td>

							  </tr>
							  
							  <tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>Image2:<br/>

                                      </strong></td>

									  <td align="left" class="paddBot11"><input type="file" name="photo2" value="value="<?php echo $result->photo2 ;?>" "  /><br/>

									  <?php if(is_file("../upload_images/profile/thumb/".$result->photo2)){ ?>

									  <img src="../upload_images/profile/thumb/<?php echo $result->photo2; ?>" width="120" height="60" /><?php } ?></td>

							  </tr>
							  
							  <tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>Image3:<br/>

                                      </strong></td>

									  <td align="left" class="paddBot11"><input type="file" name="photo3" value="value="<?php echo $result->photo3 ;?>" "  /><br/>

									  <?php if(is_file("../upload_images/profile/thumb/".$result->photo3)){ ?>

									  <img src="../upload_images/profile/thumb/<?php echo $result->photo3; ?>" width="120" height="60" /><?php } ?></td>

							  </tr>
							  
							  <tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>Image4:<br/>

                                      </strong></td>

									  <td align="left" class="paddBot11"><input type="file" name="photo4" value="<?php echo $result->photo4 ;?>"   /><br/>

									  <?php if(is_file("../upload_images/profile/thumb/".$result->photo4)){ ?>

									  <img src="../upload_images/profile/thumb/<?php echo $result->photo4; ?>" width="120" height="60" /><?php } ?></td>

							  </tr>
							  
							  <tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>Image5:<br/>

                                      </strong></td>

									  <td align="left" class="paddBot11"><input type="file" name="photo5" value="<?php echo $result->photo5;?>"   /><br/>

									  <?php if(is_file("../upload_images/profile/thumb/".$result->photo5)){ ?>

									  <img src="../upload_images/profile/thumb/<?php echo $result->photo5; ?>" width="120" height="60" /><?php } ?></td>

							  </tr>
							  <tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>Image6:<br/>

                                      </strong></td>

									  <td align="left" class="paddBot11"><input type="file" name="photo6" value="<?php echo $result->photo6 ;?>"  /><br/>

									  <?php if(is_file("../upload_images/profile/thumb/".$result->photo6)){ ?>

									  <img src="../upload_images/profile/thumb/<?php echo $result->photo6; ?>" width="120" height="60" /><?php } ?></td>

							  </tr>
							   
							   
                          	</table>
	
	</td>

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
