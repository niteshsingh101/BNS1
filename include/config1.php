<?php   ob_start();

		@session_start();

       error_reporting(0);

     	$host = 'creatsoftwebcom.ipagemysql.com';

		$username = 'greece_dba';

		$password ='asdf@1234';

		$db_name = 'greece';

	

ini_set('date.timezone', 'Asia/Kolkata');

require_once("db.class.php");



$obj = new DB($db_name, $host, $username, $password);

mysql_query("SET NAMES utf8;");

mysql_query("SET CHARACTER_SET utf8;");

define(SITE_URL,"hhttp://localhost/r1");

define(SITE_TITLE,"GreeceHotLady123");

require_once("variable.php");
if($_COOKIE[fhdating_uid]!=''){
	
	       $uArr=$obj->query("select * from member where ID='".$_COOKIE[fhdating_uid]."'  ",$debug=-1);

		if($obj->numRows($uArr)>0){
			$resultuser=$obj->fetchNextObject($uArr);
	        $_SESSION['fhdating_uid']=$resultuser->ID;

            $_SESSION['fhdating_fname']=$resultuser->FirstName;

            $_SESSION['fhdating_lname']=$resultuser->Surname;

            $_SESSION['fhdating_email']=$resultuser->Email;
		}
	
	}
?>