<?php
include("../include/config.php");
include("../include/functions.php"); 
include("../include/simpleimage.php");
 validate_admin();
 if($_REQUEST['imageID']!=''){
	 $Title=mysql_real_escape_string($_REQUEST['Title']);
	 $obj->query("update ProfileImages set Title='$Title' where ImageID='".$_REQUEST['imageID']."' ");	 
	 
	 }

?>