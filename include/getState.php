<?php 

include("config.php");

include("functions.php");
$CountryName=$_REQUEST['CountryName'];


?>

<select name="state" class="search-input"  >

									<option value=""> -Select State-</option>

									  <?php  $stateyArr=$obj->query("select * from tbl_state where CountryName='$CountryName'"); 

									  while($resultState=$obj->fetchNextObject($stateyArr)){

									  ?>

		                             <option value="<?php echo $resultState->state; ?>"><?php echo stripslashes($resultState->state); ?></option>

									  <?php } ?>

									  

									  </select>