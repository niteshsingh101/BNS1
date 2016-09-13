<?php

function buildURL($url){

	$newurl=strtolower(str_replace("&","",str_replace(" - "," ",str_replace("®","",$url))));

	$myurl=str_replace("--","-",str_replace("%","",str_replace(" ","-",str_replace("-"," ",trim(str_replace("/"," ",str_replace(".","",$newurl)))))));

	return stripslashes($myurl);

}

function calculateDays($fromdate, $todate){

  

  $diff = abs(strtotime($todate) - strtotime($fromdate));

  $days  = floor($diff / (60*60*24));

 

  return ($days);

}

function getYoutubeCode($url){

	$vArr=explode("v=",$url);

	$codeArr=explode("&",$vArr[1]);

	return ($codeArr[0]);

}

function parseInput($val) {

	return mysql_real_escape_string(stripslashes($val));

}

function encryptPassword($val) {

	return sha1($val);

}

function getAdminEmail(){

$sql=mysql_query("select email from tbl_admin  where id=1");

$result=mysql_fetch_assoc($sql);

return ($result['email']);

}

function getLangContent($fetchdata,$field){

 $original_field=$field;	

 if($_SESSION['userlang']=='en' || $_SESSION['mylang']==''){

 $field=$field;

 }

 if($_SESSION['userlang']=='ge' ){

 $field=$field."_ge";

 }

 if($_SESSION['userlang']=='sp' ){

 $field=$field."_sp";

 }

 if($_SESSION['userlang']=='fr' ){

 $field=$field."_fr";

 }

 if($_SESSION['userlang']=='po' ){

 $field=$field."_po";

 }  

 if($fetchdata->$field!=''){

 $data=stripslashes($fetchdata->$field);

 }else{

 $data=stripslashes($fetchdata->$original_field);	 

 }

 return($data);

}



function cutString($content,$start,$length){

	$cont=substr(trim($content),$start,$length);

	$pos=strrpos($cont," ");

	

	$cont=substr($cont,$start,$pos);

	return ($cont);

}

function gePagePhoto($title){

$sql=mysql_query("select photo from tbl_content  where title='".$title."'");

$result=mysql_fetch_assoc($sql);

return ($result['photo']);

}

function getFieldWhere($filed,$tbl,$where,$id){

$sql=mysql_query("select $filed as field from $tbl  where $where='".$id."'");

$result=mysql_fetch_assoc($sql);

return (stripslashes($result['field']));	

}

function getPackagePrice($package_id,$country_id){

$sql=mysql_query("select price as field from tbl_package_price  where package_id='".$package_id."' and country_id='$country_id' ");

$result=mysql_fetch_assoc($sql);

return (stripslashes($result['field']));	

}

function getTotalCredit($user_id){

$sql=mysql_query("select sum(credit_points) as tot_credit from tbl_credit_points  where user_id='".$user_id."'");

$result=mysql_fetch_assoc($sql);

return (stripslashes($result['tot_credit']));

} 

function getOwnerName($owner_id){

$sql=mysql_query("select fname,lname from tbl_owner  where id='".$owner_id."'");

$result=mysql_fetch_assoc($sql);

return (stripslashes($result['fname']." ".$result['lname']));	

}

function getCategory($cat_id){

$sql=mysql_query("select * from tbl_category  where id='".$cat_id."'");

$result=mysql_fetch_assoc($sql);

return (stripslashes($result['category']));

} 

function getTechContact($country_id){

$sql=mysql_query("select techsupport_contact from tbl_country  where id='".$country_id."'");

$result=mysql_fetch_assoc($sql);

return ($result['techsupport_contact']);

}

function getSalesContact($country_id){

$sql=mysql_query("select sales_contact from tbl_country  where id='".$country_id."'");

$result=mysql_fetch_assoc($sql);

return ($result['sales_contact']);

}

function getSubcategory($cat_id){

$sql=mysql_query("select * from tbl_subcategory  where id='".$cat_id."'");

$result=mysql_fetch_assoc($sql);

return (stripslashes($result['subcategory']));

} 

function getFAQCategory($cat_id){

$sql=mysql_query("select * from tbl_faqcategory  where id='".$cat_id."'");

$result=mysql_fetch_assoc($sql);

return (stripslashes($result['faqcategory']));	

}

function getUser($uid){

$sql=mysql_query("select uname from tbl_user  where id='".$uid."'");

$result=mysql_fetch_assoc($sql);

return (stripslashes(ucfirst($result['uname'])));

} 

 

function getContent($title) {

$sql=mysql_query("select * from tbl_content where title='$title' ");

$result=mysql_fetch_assoc($sql);

return (stripslashes($result['content']));

}

function getField($filed,$table,$id) {

	

$sql=mysql_query("select $filed as field from $table where id='$id' ");

$result=mysql_fetch_assoc($sql);

return (stripslashes($result['field']));

}

function getLangField($filed,$table,$id) {

 if($_SESSION['mylang']=='en'){

 $filed=$filed;

 }else{

 $filed=$filed.'_ar';

 }

 $sql=mysql_query("select $filed as field from $table where id='$id' ");

$result=mysql_fetch_assoc($sql);

return (stripslashes($result['field']));

}

function getProjectPrice($project_id){

   $sql=mysql_query("select min(sale_price) as min_price,max(sale_price) as  max_price  from tbl_projectprice where project_id='".$project_id."' ")	;

   if(mysql_num_rows($sql)>0){

   $rs=mysql_fetch_assoc( $sql); 

   if($rs['min_price']!='' && $rs['max_price']!='' && ($rs['min_price']==$rs['max_price'])){

	   $price='AED '.number_format($rs['max_price']);

   }

   if($rs['min_price']!='' && $rs['max_price']!='' && $rs['min_price']<$rs['max_price']){

	   $price='AED '.number_format($rs['min_price'])." to ".number_format($rs['max_price']);

   }

   }else{

	   $price='AED 0';

	   }

   return ($price);

}



function getProjectSize($project_id){

   $sql=mysql_query("select min(size) as min_size,max(size) as  max_size  from tbl_projectprice where project_id='".$project_id."' ")	;

   if(mysql_num_rows($sql)>0){

   $rs=mysql_fetch_assoc( $sql); 

   if($rs['min_size']!='' && $rs['max_size']!='' && ($rs['min_size']==$rs['max_size'])){

	   $price=number_format($rs['max_size'])." Sq. Ft.";

   }

   if($rs['min_size']!='' && $rs['max_size']!='' && $rs['min_size']<$rs['max_size']){

	   $price=number_format($rs['min_size'])." to ".number_format($rs['max_size']).' Sq. Ft.';

   }

   }else{

	   $price='0 Sq. Ft.';

	   }

   return ($price);

}

function getBHK($project_id){

   $sql=mysql_query("select min(bedrooms) as min_bhk,max(bedrooms) as  max_bhk  from tbl_projectprice where project_id='".$project_id."' ")	;

   if(mysql_num_rows($sql)>0){

   $rs=mysql_fetch_assoc( $sql); 

   if($rs['min_bhk']!='' && $rs['max_bhk']!='' && ($rs['min_bhk']==$rs['max_bhk'])){

	   $bhk=$rs['max_bhk']." BHK";

   }

   if($rs['min_bhk']!='' && $rs['max_bhk']!='' && $rs['min_bhk']<$rs['max_bhk']){

	   $bhk=$rs['min_bhk']." - ".$rs['max_bhk'].' BHK';

   }

   }else{

	$bhk='0 BHK';

   }

   return ($bhk);

}



function clearCache() {

	header("Cache-Control: no-cache, must-revalidate");

	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

}

function redirect($url) {

	header("location:$url");

	exit();

}

function validateAdminSession() {

	if(trim($_SESSION["sess_admin_id"])=="" && trim($_SESSION["sess_admin_logged"])!="true") {

		$_SESSION["sess_msg"] = "Session is expire. Please login again to continue";

		redirect("login.php");

	}

}

function showSessionMsg() {

	if(trim($_SESSION["sess_msg"])) {

		echo $_SESSION["sess_msg"];

		$_SESSION["sess_msg"] = "";

	}

}

function validate_user()

{

	if($_SESSION['sess_uid']=='')

	{

		ms_redirect("index.php?back=$_SERVER[REQUEST_URI]");

	}

}

function validate_admin()

{

	if($_SESSION['sess_admin_id']=='')

	{

		ms_redirect("index.php?back=$_SERVER[REQUEST_URI]");

	}

}

function ms_redirect($file, $exit=true, $sess_msg='')

{

	header("Location: $file");

	exit();

	

}

function sort_arrows($column){

	global $_SERVER;

	return '<A HREF="'.$_SERVER['PHP_SELF'].get_qry_str(array('order_by','order_by2'), array($column,'asc')).'"><IMG SRC="images/white_up.gif" BORDER="0"></A> <A HREF="'.$_SERVER['PHP_SELF'].get_qry_str(array('order_by','order_by2'), array($column,'desc')).'"><IMG SRC="images/white_down.gif" BORDER="0"></A>';

}

function sort_arrows1($column){

	global $_SERVER;

	return '<A HREF="'.$_SERVER['PHP_SELF'].get_qry_str(array('order_by','order_by2'), array($column,'asc')).'"><IMG SRC="admin/images/white_up.gif" BORDER="0"></A> <A HREF="'.$_SERVER['PHP_SELF'].get_qry_str(array('order_by','order_by2'), array($column,'desc')).'"><IMG SRC="admin/images/white_down.gif" BORDER="0"></A>';

}



function sort_arrows_front($column,$heading){

	global $_SERVER;

	return '<A HREF="'.$_SERVER['PHP_SELF'].get_qry_str(array('order_by','order_by2'), array($column,'asc')).'"><img src="images/sort_up.gif" alt="Sort Up" border="0" title="Sort Up"></A>&nbsp;'.$heading.'&nbsp;<A HREF="'.$_SERVER['PHP_SELF'].get_qry_str(array('order_by','order_by2'), array($column,'desc')).'"><img src="images/sort_down.gif" alt="Sort Down" border="0" title="Sort Down"></A>';

}

function sort_arrows_front1($column,$heading){

	global $_SERVER;

	return '<A HREF="'.$_SERVER['PHP_SELF'].get_qry_str(array('order_by','order_by2'), array($column,'asc')).'"><img src="admin/images/sort_up.gif" alt="Sort Up" border="0" title="Sort Up"></A>&nbsp;'.$heading.'&nbsp;<A HREF="'.$_SERVER['PHP_SELF'].get_qry_str(array('order_by','order_by2'), array($column,'desc')).'"><img src="admin/images/sort_down.gif" alt="Sort Down" border="0" title="Sort Down"></A>';

}





function get_qry_str($over_write_key = array(), $over_write_value= array())

{

	global $_GET;

	$m = $_GET;

	if(is_array($over_write_key)){

		$i=0;

		foreach($over_write_key as $key){

			$m[$key] = $over_write_value[$i];

			$i++;

		}

	}else{

		$m[$over_write_key] = $over_write_value;

	}

	$qry_str = qry_str($m);

	return $qry_str;

} 
function calculateAge($dob){
  if($dob!=''){
  $today=time();
  $age_time=strtotime($dob);
  $total_diff=$today-$age_time;
  $total_age=floor(($total_diff)/(60*60*24*365));
  $age=$total_age;
  }else{
  $age='N/A';
  }
  return ( $age);
  }



function qry_str($arr, $skip = '')

{

	$s = "?";

	$i = 0;

	foreach($arr as $key => $value) {

		if ($key != $skip) {

			if(is_array($value)){

				foreach($value as $value2){

					if ($i == 0) {

						$s .= "$key%5B%5D=$value2";

					$i = 1;

					} else {

						$s .= "&$key%5B%5D=$value2";

					} 

				}		

			}else{

				if ($i == 0) {

					$s .= "$key=$value";

					$i = 1;

				} else {

					$s .= "&$key=$value";

				} 

			}

		} 

	} 

	return $s;

} 



?>