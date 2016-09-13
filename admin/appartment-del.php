<?php 
include("../include/config.php");
include("../include/functions.php"); 
validate_admin();
$arr =$_POST['ids'];
//print_r($_REQUEST);

$Submit =$_POST['what'];



if(count($arr)>0){

	$str_rest_refs=implode(",",$arr);

	if($Submit=='Delete')

	{

	     $imageArr=$obj->query("select photo, photo2, photo3 from $tbl_appartments where id  in ($str_rest_refs)");

		 while($resultImage=$obj->fetchNextObject($imageArr)){
		

		 @unlink("../upload_images/appartments/".$resultImage->photo);

		 @unlink("../upload_images/appartments/thumb/".$resultImage->photo);
		 
		  @unlink("../upload_images/appartments/".$resultImage->photo2);

		 @unlink("../upload_images/appartments/thumb/".$resultImage->photo2);
		 
		  @unlink("../upload_images/appartments/".$resultImage->photo3);

		 @unlink("../upload_images/appartments/thumb/".$resultImage->photo3);

		   }

		

	    $sql="delete from $tbl_appartments where id in ($str_rest_refs)"; 

		$obj->query($sql);

		

		$sess_msg='Selected record(s) deleted successfully';

		$_SESSION['sess_msg']=$sess_msg;

    }

	elseif($Submit=='Activate')

	{	

		$sql="update $tbl_appartments set status=1 where id in ($str_rest_refs)";

		$obj->query($sql);

		$sess_msg='Selected record(s) activated successfully';

		$_SESSION['sess_msg']=$sess_msg;

	}

	elseif($Submit=='Deactivate')

	{		

		 $sql="update $tbl_appartments set status=0 where id in ($str_rest_refs)";

		$obj->query($sql);

		$sess_msg='Selected record(s) deactivated successfully';

		$_SESSION['sess_msg']=$sess_msg;

	}

		

	}

	

else{

	$sess_msg="Please select check box";

	$_SESSION['sess_msg']=$sess_msg;

	header("location: ".$_SERVER['HTTP_REFERER']);

	exit();

	}

	header("location: appartment-list.php");

	exit();

	

?>

