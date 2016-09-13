<?php 

include("configuration/config.php");
class Homeclass{

function home(){
echo "hello welcome to class file";
}
 function select_customer_query(){
$query= mysql_query("Select * from sales_enquiry where dstID= 1");
$result= mysql_fetch_array($query);
$m=$result['dstname'];
return $m;

}
}

?>