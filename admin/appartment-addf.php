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
	  move_uploaded_file($_FILES['photo']['tmp_name'],"../upload_images/appartments/".$img);
	  copy("../upload_images/appartments/".$img,"../upload_images/appartments/thumb/".$img);
	  $Image->load("../upload_images/appartments/thumb/".$img);
	  $Image->resize(120,60);
	  $Image->save("../upload_images/appartments/thumb/".$img);
	  }  
	  
	     if($_FILES['photo2']['size']>0 && $_FILES['photo2']['error']==''){
	  $Image=new SimpleImage();
	  $img2=time().$_FILES['photo2']['name'];
	  
	  move_uploaded_file($_FILES['photo2']['tmp_name'],"../upload_images/appartments/".$img2);
	  copy("../upload_images/appartments/".$img2,"../upload_images/appartments/thumb/".$img2);
	  $Image->load("../upload_images/appartments/thumb/".$img2);
	  $Image->resize(120,60);
	  $Image->save("../upload_images/appartments/thumb/".$img2);
	  }
	  
	     if($_FILES['photo3']['size']>0 && $_FILES['photo3']['error']==''){
	  $Image=new SimpleImage();
	  $img3=time().$_FILES['photo3']['name'];
	  
	  move_uploaded_file($_FILES['photo3']['tmp_name'],"../upload_images/appartments/".$img3);
	  copy("../upload_images/appartments/".$img3,"../upload_images/appartments/thumb/".$img3);
	  $Image->load("../upload_images/appartments/thumb/".$img3);
	  $Image->resize(120,60);
	  $Image->save("../upload_images/appartments/thumb/".$img3);
	  }
	  
	  
	  
	  
  
  if($_REQUEST['id']==''){
	  $obj->query("insert into $tbl_appartments set title='$title',title_ge='$title_ge',title_sp='$title_sp',title_fr='$title_fr',title_po='$title_po',description='$description',description_ge='$description_ge',description_sp='$description_sp',description_fr='$description_fr',description_po='$description_po',photo='$img',photo2='$img2',photo3='$img3',latitude='$latitude',longitude='$longitude',address='$address',status=1 ");
	  $_SESSION['sess_msg']='Appartments added sucessfully';  
	  
       }else{ 
	   $sql=" update $tbl_appartments set title='$title',title_ge='$title_ge',title_sp='$title_sp',title_fr='$title_fr',title_po='$title_po',description='$description',description_ge='$description_ge',description_sp='$description_sp',description_fr='$description_fr',description_po='$description_po',latitude='$latitude',longitude='$longitude',address='$address'";
	   if($img){
	   $imageArr=$obj->query("select photo from $tbl_appartments where id=".$_REQUEST['id']);
	   $resultImage=$obj->fetchNextObject($imageArr);
	   @unlink("../upload_images/appartments/".$resultImage->photo);
	   @unlink("../upload_images/appartments/thumb/".$resultImage->photo);
	    $sql.=" , photo='$img' ";
	   }
	   	   if($img2){
	   $imageArr2=$obj->query("select photo2 from $tbl_appartments where id=".$_REQUEST['id']);
	   $resultImage2=$obj->fetchNextObject($imageArr2);
	   @unlink("../upload_images/appartments/".$resultImage2->photo2);
	   @unlink("../upload_images/appartments/thumb/".$resultImage2->photo2);
	    $sql.=" , photo2='$img2' ";
	   }
	   
	   if($img3){
	   $imageArr3=$obj->query("select photo3 from $tbl_appartments where id=".$_REQUEST['id']);
	   $resultImage3=$obj->fetchNextObject($imageArr3);
	   @unlink("../upload_images/appartments/".$resultImage3->photo3);
	   @unlink("../upload_images/appartments/thumb/".$resultImage3->photo3);
	    $sql.=" , photo3='$img3' ";
	   }
	   
	   
	  $sql.=" where id='".$_REQUEST['id']."'";
	
	   $obj->query($sql);
	   $_SESSION['sess_msg']='Appartments updated sucessfully';   
        }
   header("location:appartment-list.php");
   exit();
  }      
	   
	   
if($_REQUEST['id']!=''){
$sql=$obj->query("select * from $tbl_appartments where id=".$_REQUEST['id']);
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


<link rel="stylesheet" type="text/css" href="ddtabmenu/ddtabmenufiles/glowtabs.css" />
<script type="text/javascript">

ddtabmenu.definemenu("ddtabs", 0) //initialize Tab Menu #2 with 2nd tab selected

</script>






</head>
<body>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
<?php include("header.php") ?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>

<script type="text/javascript">

      var map;

      var geocoder;

      var mapOptions = { center: new google.maps.LatLng(0.0, 0.0), zoom: 2,

        mapTypeId: google.maps.MapTypeId.ROADMAP };

      var placeSearch, autocomplete;

      function initialize() {

var myOptions = {

	            <?php 

				$lat=55.18174069999998;

				$lng=25.0476643;

				$zoom=5;

				if($result->latitude!='' && $result->longitude!=''){

					$lat=$result->latitude;

					$lng=$result->longitude;

					$zoom=14;

				 } ?>

                center: new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $lng; ?>),

                zoom: <?php echo $zoom; ?>,

                mapTypeId: google.maps.MapTypeId.ROADMAP

            };



            geocoder = new google.maps.Geocoder();

            var map = new google.maps.Map(document.getElementById("map"),

            myOptions);

			var marker = new google.maps.Marker({

             position: map.getCenter(),

             map: map,

	         draggable: true

    

            });

			google.maps.event.addListener(marker, 'dragend', function(event) {

                    placeMarker(event.latLng);

                       });

            google.maps.event.addListener(map, 'click', function(event) {

				placeMarker(event.latLng);

            });

			

  

  autocomplete = new google.maps.places.Autocomplete((document.getElementById('autocomplete')),{ types: ['geocode'] });

  google.maps.event.addListener(autocomplete, 'place_changed', function() {

	  var place = autocomplete.getPlace();

	  var location=place.geometry.location;

	  map.setZoom(14);

	  map.setCenter(location);

	  placeMarker(location); 

   

  });

function geolocate() {

  if (navigator.geolocation) {

    navigator.geolocation.getCurrentPosition(function(position) {

      var geolocation = new google.maps.LatLng(

          position.coords.latitude, position.coords.longitude);

      autocomplete.setBounds(new google.maps.LatLngBounds(geolocation,

          geolocation));

    });

  }

}

   





            function placeMarker(location) {

				

                if(marker){ //on vérifie si le marqueur existe

                    marker.setPosition(location); //on change sa position

                }else{

                    marker = new google.maps.Marker({ //on créé le marqueur

                        position: location, 

                        map: map,

						draggable: true

                    });

					google.maps.event.addListener(marker, 'dragend', function(event) {

                    placeMarker(event.latLng);

                       });

                }

                document.getElementById('lat').value=location.lat();

                document.getElementById('lng').value=location.lng();

                getAddress(location);

            }

           

      function getAddress(latLng) {

        geocoder.geocode( {'latLng': latLng},

          function(results, status) {

			

            if(status == google.maps.GeocoderStatus.OK) {

              if(results[0]) {

				document.getElementById("autocomplete").value = results[0].formatted_address;

				$.each(results[0].address_components, function(i,v) {

				if ( v.types[0] == "administrative_area_level_1" || 

					 v.types[0] == "administrative_area_level_2" ) {

					$('#state').val(v.long_name);

				} else if ( v.types[0] == "country") {

					$('#country').val(v.long_name);

				}else if(v.types[0]=="locality"){

					$('#city').val(v.long_name);

				}else if(v.types[0]=="postal_code"){

					$('#postal_code').val(v.long_name);

				}

				

			  });

				

              }

              else {

                document.getElementById("autocomplete").value = "No results";

              }

            }

            else {

              document.getElementById("autocomplete").value = status;

            }

          });

        }

      }

	 

      google.maps.event.addDomListener(window, 'load', initialize);

	



                        

		

</script>
<tr>
	<td align="right" class="paddRtLt70" valign="top">
		<table width="99%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				
				<td align="right" valign="top">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td align="left" valign="middle" class="headingbg bodr text14">
					<em><img src="images/arrow2.gif" width="21" height="21" hspace="10" align="absmiddle" /></em>Admin: <?php if($_REQUEST['id']==''){ ?>Add<?php }else{ ?>Update<?php }?> Appartment<span  style="float:right; padding-right:10px;">
					<input type="button" name="add" value="View Appartments"  class="button" onclick="location.href='appartment-list.php'" /></span></td>
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

	 $field1='title'.$resultlang->sort_name;

	 $field2='description'.$resultlang->sort_name;

	 $field3='latitude'.$resultlang->sort_name;
	 
	 $field4='longitude'.$resultlang->sort_name;
     ?>                       

  <tr>

    <td id="gc<?php  echo $resultlang->id;?>" <?php if($i!=1){?>style='display:none;'<?php } ?>><table width="100%" cellpadding="0" cellspacing="0">

									

									<tr>

										<td width="20%" align="right" class="paddBot11 paddRt14">&nbsp;</td>

										<td width="80%" align="left" class="paddBot11"></td>

									</tr>

									

									<tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>Title( <?php echo $resultlang->language;?> ):</strong></td>

									  <td align="left" class="paddBot11">

                                      <textarea  name="<?php echo $field1;?>"  rows="5" cols="40"  ><?php echo stripslashes($result->$field1);?></textarea>
                      

                                      </td>

							  </tr>
								<?php if($i==1){ ?>
								
							  <tr>
                                      <td align="right" class="paddBot11 paddRt14"><strong>Appartment Image1:<br/>
                                      </strong></td>
									  <td align="left" class="paddBot11"><input type="file" name="photo"  /><br/>
									  <?php if(is_file("../upload_images/appartments/thumb/".$result->photo)){ ?>
									  <img src="../upload_images/appartments/thumb/<?php echo $result->photo; ?>" width="120" height="60" /><?php } ?></td>
							  </tr>
							  <tr>
                                      <td align="right" class="paddBot11 paddRt14"><strong>Appartment Image2:<br/>
                                      </strong></td>
									  <td align="left" class="paddBot11"><input type="file" name="photo2"  /><br/>
									  <?php if(is_file("../upload_images/appartments/thumb/".$result->photo2)){ ?>
									  <img src="../upload_images/appartments/thumb/<?php echo $result->photo2; ?>" width="120" height="60" /><?php } ?></td>
							  </tr>
							  <tr>
                                      <td align="right" class="paddBot11 paddRt14"><strong>Appartment Image3:<br/>
                                      </strong></td>
									  <td align="left" class="paddBot11"><input type="file" name="photo3"  /><br/>
									  <?php if(is_file("../upload_images/appartments/thumb/".$result->photo3)){ ?>
									  <img src="../upload_images/appartments/thumb/<?php echo $result->photo3; ?>" width="120" height="60" /><?php } ?></td>
							  </tr>
							  
							  <tr><td colspan="2">

                               <table width="100%" border="0">

  <tr>

    <td width="50%" ><table width="100%" border="0">

                                   <tr>

									  <td width="36%" align="right" class="paddRt14 paddBot11"><strong>Geographical Address :</strong></td>

									  <td width="64%" align="left" class="paddBot11"><textarea name="address" rows="5" cols="40" id="autocomplete" onFocus="geolocate()"><?php echo stripslashes($result->address);?></textarea><br/><br/>

                                      

                                      <strong>Note:</strong> Drag and drop marker on map to select actual location of project. </td>
							  </tr>

                            

 

    <input type="hidden" id="city" name="city"  value="<?php echo stripslashes($result->city); ?>">

    <input type="hidden" id="state" name="state"  value="<?php echo stripslashes($result->state); ?>">

    <input type="hidden" id="country" name="country"  value="<?php echo stripslashes($result->country); ?>">

    <input type="hidden" id="postal_code" name="pincode"  value="<?php echo stripslashes($result->pincode); ?>">

</table>

</td>

    <td> <div id="map" style="width: 500px; height:300px;"></div></td>

  </tr>

</table>







                              

                              </td></tr>
							  
							  
							  
							  <tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>latitude:</strong></td>
									  <td align="left" class="paddBot11">
									   <input type="text" id="lat" name="latitude" value="<?php echo stripslashes($result->latitude); ?>" size="10">
                                   </td>
							  </tr>
							   <tr>

                                      <td align="right" class="paddBot11 paddRt14"><strong>longitude:</strong></td>
									  <td align="left" class="paddBot11">
									     <input type="text" id="lng" name="longitude" size="10" value="<?php echo stripslashes($result->longitude); ?>">
									
                                   </td>
							  </tr>
							  
							  
							  
							  <?php }?>

									<tr>

									  <td align="right" class="paddRt14 paddBot11"><strong>Description( <?php echo $resultlang->language;?> ):</strong></td>

									  <td align="left" class="paddBot11"><textarea name="<?php echo $field2;?>"  rows="8" cols="40" ><?php echo stripslashes($result->$field2);?></textarea></td>

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
