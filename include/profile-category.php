<div class="right-panel">
    
    <div class="heading"><h2><span class="color">Introduction </span></h2></div>
    <div class="outer-search">
    <div class="search-form">
	<?php 
		 $id=$_REQUEST['id'];
		$detailArr=$obj->query("Select * from tbl_profile where ID='$id'");
		$resultDetail=$obj->fetchNextObject($detailArr);
					?> 
	
    <p><?php echo $resultDetail->description ; ?></p>
    </div>
    </div>
    
    <div class="heading"><h2><span class="color">Profile </span> Data</h2></div>
    <div class="outer-search">
    <div class="search-form">
    <div class="pd-row"><span class="pd-left">Name<font style="float:right;">:</font></span><span class="pd-right"><?php echo $resultDetail->Name ; ?></span></div>
    <div class="pd-row"><span class="pd-left">Ethnicity<font style="float:right;">:</font></span> <span class="pd-right">Caucasian</span></div>
    <div class="pd-row"><span class="pd-left">Location<font style="float:right;">:</font></span> <span class="pd-right">Prague, Praha, Czech Republic
</span></div>
	<div class="pd-row"><span class="pd-left">Experience<font style="float:right;">:</font></span> <span class="pd-right">Some Experience</span></div>
    </div>
    </div>
    
    <div class="heading"><h2><span class="color">Rates </span> </h2></div>
    <div class="outer-search">
    <div class="search-form">
    <ul class="list-style">
    <li><a href="">Athens</a></li>
    <li><a href="">Aitolokarnania</a></li>
    <li><a href="">Arkadia</a></li>
    <li><a href="">Arta</a></li>
    <li><a href="">Ahaia</a></li>
   	<li><a href=""> Viotia</a></li>
    </ul>
    </div>
    </div>
    
    </div>