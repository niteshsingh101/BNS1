<?php 

include("../include/config.php");

include("../include/functions.php");
		
		
  $query= mysql_query("Select * from tbl_content where id=2");
  $result= array();
  $row= mysql_fetch_assoc($query);
  $result[]= $row;
 //echo json_encode()
 echo strip_tags(json_encode($result));
 
  
  
  
  
  
  
  
  ?>