
<div class="col-md-3">
    <div class="heading"><h2><span class="color">Quick </span> Search</h2></div>
    <div class="outer-search">
									<form class="search-form" name="frm" method="POST" enctype="multipart/form-data" action="search-result.php" >
									<p>
									<select name="CountryName" class="search-input" required onChange="return callState(this.value)">
																	  <option value="">-Select-</option>
																	  <?php  $countryArr=$obj->query("select * from $tbl_country where status=1"); 
																	  while($resultCountry=$obj->fetchNextObject($countryArr)){
																	  ?>
										<option value="<?php echo $resultCountry->country; ?>" ><?php echo $resultCountry->country; ?></option>
																	  <?php } ?>
																	  
																	  </select></p>
									<p id="stateResult">
									<select name="state" required class="search-input">
									<option value=""> Select State</option>
									</select>
									</p>
                                    <p>
									<input value="Enter City" name="city" type="text" required class="search-input"/>
									</p>
									<p>
									<select name="category" required class="search-input">
																	  <option value="">Select Escort Type</option>
																	  <?php  $categoryArr=$obj->query("select * from tbl_category where status=1"); 
																	  while($resultCategory=$obj->fetchNextObject($categoryArr)){
																	  ?>
										<option value="<?php echo $resultCategory->category; ?>" ><?php echo $resultCategory->category; ?></option>
																	  <?php } ?>
																	  
																	  </select></p>
									
									
									   <input value="Submit" type="submit" class="submit">
									</form>
    </div>
    
    <div class="heading"><h2><span class="color">Choose </span> Country</h2></div>
    <div class="outer-search">
    <div class="search-form">
    <ul class="list-style">
	 <?php  $countryArr1=$obj->query("select * from $tbl_country where status=1"); 
		 while($resultCountry1=$obj->fetchNextObject($countryArr1)){
																	  ?>
    <li><a href="search-result.php?country=<?php echo $resultCountry1->country; ?>"><?php echo $resultCountry1->country; ?></a></li>
	<?php }?>
  
    </ul>
    </div>
    </div>
    
    </div>