<?php 


$about='[{
    "id": 1,
	"photo": "images/preview.jpg",
    "about": "Aliquam pharetra. Nulla in tellus eget odio sagittis blandit.Maecenas at nisl. Nullam lorem mi, eleifend a, fringilla vel, semper at, ligula. Mauris eu wisi. Ut ante dui, aliquet nec, congue non, accumsan sit amet, lectus. Mauris et mauris. Duis sed massa id mauris pretium venenatis. Suspendisse cursus velit vel ligula. Mauriselit Aliquam pharetra. Nulla in tellus eget odio sagittis blandit.Maecenas at nisl. Nullam lorem mi, eleifend a, fringilla vel, semper at, ligula. Mauris eu wisi. Ut ante dui, aliquet nec, congue non, accumsan sit amet, lectus. Mauris et mauris. Duis sed massa id mauris pretium venenatis. Suspendisse cursus velit vel ligula. Mauriselit Aliquam pharetra. Nulla in tellus eget odio sagittis blandit.Maecenas at nisl. Nullam lorem mi, eleifend a, fringilla vel, semper at, ligula. Mauris eu wisi. Ut ante dui, aliquet nec, congue non, accumsan sit amet, lectus. Mauris et mauris. Duis sed massa id mauris pretium venenatis. Suspendisse cursus velit vel ligula. Mauriselit Aliquam pharetra. Nulla in tellus eget odio sagittis blandit.Maecenas at nisl. Nullam lorem mi, eleifend a, fringilla vel, semper at, ligula. Mauris eu wisi. Ut ante dui, aliquet nec, congue non, accumsan sit amet, lectus. Mauris et mauris. Duis sed massa id mauris pretium venenatis. Suspendisse cursus velit vel ligula. Mauriselit Aliquam pharetra. Nulla in tellus eget odio sagittis blandit.Maecenas at nisl. Nullam lorem mi, eleifend a, fringilla vel, semper at, ligula. Mauris eu wisi. Ut ante dui, aliquet nec, congue non, accumsan sit amet, lectus. Mauris et mauris. Duis sed massa id mauris pretium venenatis. Suspendisse cursus velit vel ligula. Mauriselit Aliquam pharetra. Nulla in tellus eget odio sagittis blandit.Maecenas at nisl. Nullam lorem mi, eleifend a, fringilla vel, semper at, ligula. Mauris eu wisi. Ut ante dui, aliquet nec, congue non, accumsan sit amet, lectus. Mauris et mauris. Duis sed massa id mauris pretium venenatis. Suspendisse cursus velit vel ligula. Mauriselit"
  }]';
  //echo $about;
include("../include/config.php");

include("../include/functions.php");
		
		
  $query= mysql_query("Select * from tbl_content where id=1");
  $result= array();
  $row= mysql_fetch_assoc($query);
  $result[]= $row;
 //echo json_encode()
 echo strip_tags(json_encode($result));
 
  
  
  
  
  
  
  
  ?>