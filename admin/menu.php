<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />



<script src="js/jquery-1.7.2.min.js"></script>



<script type="text/javascript" src="ddsmoothmenu.js"></script>



<script type="text/javascript">



ddsmoothmenu.init({



	mainmenuid: "smoothmenu1", //menu DIV id



	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"



	classname: 'ddsmoothmenu', //class added to menu's outer DIV



	//customtheme: ["#1c5a80", "#18374a"],



	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]



})



</script>



<div id="smoothmenu1" class="ddsmoothmenu ">



<ul>



<li><a href="welcome.php" <?php if(basename($_SERVER['SCRIPT_NAME'])=='welcome.php'){?>class="active" <?php } ?>>Dashboard</a></li>



<li><a href="javascript:void(0)" <?php if(basename($_SERVER['SCRIPT_NAME'])=='education-list.php' || basename($_SERVER['SCRIPT_NAME'])=='education-addf.php' || basename($_SERVER['SCRIPT_NAME'])=='eyes-color-list.php' || basename($_SERVER['SCRIPT_NAME'])=='eyes-color-addf.php' || basename($_SERVER['SCRIPT_NAME'])=='hair_color-list.php' || basename($_SERVER['SCRIPT_NAME'])=='hair_color-addf.php' || basename($_SERVER['SCRIPT_NAME'])=='occupation-list.php' || basename($_SERVER['SCRIPT_NAME'])=='occupation-addf.php' || basename($_SERVER['SCRIPT_NAME'])=='religion-list.php' || basename($_SERVER['SCRIPT_NAME'])=='religion-addf.php' || basename($_SERVER['SCRIPT_NAME'])=='sign-list.php' || basename($_SERVER['SCRIPT_NAME'])=='sign-addf.php' || basename($_SERVER['SCRIPT_NAME'])=='town-list.php' || basename($_SERVER['SCRIPT_NAME'])=='town-addf.php' || basename($_SERVER['SCRIPT_NAME'])=='country-list.php' || basename($_SERVER['SCRIPT_NAME'])=='country-addf.php'){?>class="active" <?php } ?>>Catalog</a>



   <!--<ul>



    <li><a href="category-list.php" >Category</a></li>



    <li><a href="eyes-color-list.php" >Eyes Color</a></li>



    <li><a href="hair-color-list.php" >Hair Color</a></li>



    <li><a href="occupation-list.php" >Services</a></li>



    <li><a href="breastcup-list.php" >Breastcup</a></li>   



    <li><a href="origin-list.php" >Origin</a></li>
	
	<li><a href="orientation-list.php" >Sextual Orientation's</a></li>



    <li><a href="country-list.php" >Country</a></li>

<li><a href="state-list.php" >State</a></li>

    <li><a href="town-list.php" >City</a></li>

    </ul>-->

  </li>

<li><a href="content-list.php" <?php if(basename($_SERVER['SCRIPT_NAME'])=='content-list.php' || basename($_SERVER['SCRIPT_NAME'])=='content-addf.php'){?>class="active" <?php } ?>> Page Content</a></li>



<li><a href="banner-list.php" <?php if(basename($_SERVER['SCRIPT_NAME'])=='banner-list.php' || basename($_SERVER['SCRIPT_NAME'])=='banner-addf.php'){?>class="active" <?php } ?>> Banner</a></li>

<?php /*?><li><a href="profile-list.php" <?php if(basename($_SERVER['SCRIPT_NAME'])=='profile-list.php' || basename($_SERVER['SCRIPT_NAME'])=='profile-addf.php'){?>class="active" <?php } ?>> Profile's</a></li>



<li><a href="member-list.php" <?php if(basename($_SERVER['SCRIPT_NAME'])=='member-list.php' || basename($_SERVER['SCRIPT_NAME'])=='member-list.php'){?>class="active" <?php } ?>> Member's</a></li>

<li><a href="add-list.php" <?php if(basename($_SERVER['SCRIPT_NAME'])=='add-list.php' || basename($_SERVER['SCRIPT_NAME'])=='add-list.php'){?>class="active" <?php } ?>> Add's</a></li>

<li><a href="price-list.php" <?php if(basename($_SERVER['SCRIPT_NAME'])=='price-list.php' || basename($_SERVER['SCRIPT_NAME'])=='price-list.php'){?>class="active" <?php } ?>> Membership price</a></li><?php */?>


<li><a href="#" <?php if(basename($_SERVER['SCRIPT_NAME'])=='subscriber-list.php' || basename($_SERVER['SCRIPT_NAME'])=='newsletter_template-list.php' || basename($_SERVER['SCRIPT_NAME'])=='send_newsletter.php'){?>class="active" <?php } ?>> News Letter</a>

<ul>

<li><a href="subscriber-list.php" <?php if(basename($_SERVER['SCRIPT_NAME'])=='subscriber-list.php' ){?>class="active" <?php } ?>> NewsLetter Suscriber</a></li>

<li><a href="newsletter_template-list.php" <?php if(basename($_SERVER['SCRIPT_NAME'])=='newsletter_template-list.php' ){?>class="active" <?php } ?>> NewsLetter Templates</a></li>

<li><a href="send_newsletter.php" <?php if(basename($_SERVER['SCRIPT_NAME'])=='send_newsletter.php' ){?>class="active" <?php } ?>>Send NewsLetter</a></li>

</ul>

</li>



<li><a href="social-list.php" <?php if(basename($_SERVER['SCRIPT_NAME'])=='social-list.php' || basename($_SERVER['SCRIPT_NAME'])=='social-addf.php'){?>class="active" <?php } ?>>Social URLs</a></li>



<li><a href="change-password.php"  <?php if(basename($_SERVER['SCRIPT_NAME'])=='change-password.php'){?>class="active" <?php } ?>>Change Password </a></li>



</ul>



<br style="clear: left" />



</div>