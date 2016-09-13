<?php 
include("include/config.php");
include("include/functions.php");
if($_SESSION['fhdating_uid']==''){
	header("location:members-login");
	exit();
	}
	$msg='';
?>

<!DOCTYPE>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?php echo SITE_TITLE; ?></title>

<!-- Bootstrap -->

<?php include("head.php"); ?>

</head>

<body>

<header id="top-wrapper">

<?php include("header.php"); ?>

<!-- menu panel end here -->

<!-- banner panel start here -->

<?php include("banner.php");?>

<!-- banner panel end here -->

<!-- Editor -->
<script type="text/javascript" src="include/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
$(document).ready(function(){
CKEDITOR.replace( 'textarea_id', {
 toolbar: [
  
  [ 'Undo', 'Redo' ],   // Defines toolbar group without name.
  { name: 'basicstyles', items: [ 'Bold', 'Italic' ] },
  { name: 'styles', items: [  'Font', 'FontSize' ] },
  { name: 'colors', items: [ 'TextColor', 'BGColor' ] }
 ],  height: 300,
        width: 450
});
})
</script>
</header>

<!-- content area start here -->

<section id="page">

<div class="content-area">

<!-- content left start here -->

    <section class="my-row">
    	<h1 class="profile-heading">My Dshboard</h1>
        <div lass="my-row">
        	<div class="col-xs-6 col-lg-3">
            <?php include("left-inner.php")?>
            </div>
            
            <div class="col-xs-12 col-sm-6 col-lg-9 profile-right-col">
            <div class="user-profile-col">
			<?php 
$Did= $_SESSION['fhdating_uid'];

$detailArr= $obj->query("SELECT * from member where ID= $Did");
$resultDetail= $obj->fetchNextObject($detailArr);

if($_POST['submit']=='Send'){
/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
$ip= $_SERVER['REMOTE_ADDR'];
$receiver_id='Admin';
$subject= mysql_real_escape_string($_POST['subject']);
$message= mysql_real_escape_string($_POST['message']);

$obj->query(" insert into tbl_message set sender_id='$Did',receiver_id='$receiver_id',subject='$subject',message='$message',send_date=now(),ip='$ip',draft_status='0',delete_status='0',status='0' ");
$_SESSION['sess_msg']="Your message has been sent successfully.";

}
else if($_POST['save']=='Save as draft'){

$ip= $_SERVER['REMOTE_ADDR'];
$receiver_id='Admin';
$subject= mysql_real_escape_string($_POST['subject']);
$message= mysql_real_escape_string($_POST['message']);

$obj->query(" insert into tbl_message set sender_id='$Did',receiver_id='$receiver_id',subject='$subject',message='$message',send_date=now(),ip='$ip',draft_status='1',delete_status='0',status='0' ");
$_SESSION['sess_msg']="Your message has been Save as draft successfully.";

}

	

	?>
<form name="register"  method="post" action="">

<!--<input type="hidden" name="submitForm" value="yes">-->

<article class="contact-form-panel">

<div class="contact-form-row">

</div>

<div align="center" style="color:#CC0000;"><?php echo $_SESSION['sess_msg'];$_SESSION['sess_msg']=''; ?></div>


<div class="form-div">

<div class="form-div-left"><p>Subject :</p></div>

<div class="form-div-right"><input type="text" name="subject" class="input" required value=""/></div>

</div>
<div class="form-div">

<div class="form-div-left"><p>Message:</p></div>

<div class="form-div-right"><textarea name="message" id="textarea_id" rows="100" cols="40" class="input" ></textarea></div>

</div>


<div class="form-div">

<div class="form-div-left">&nbsp;</div>

<div class="form-div-right"><input type="submit" name="submit" value="Send" class="prof-search-button"/></div>

</div>

<div class="form-div">

<div class="form-div-left">&nbsp;</div>

<div class="form-div-right"><input type="submit" name="save" value="Save as draft" class="prof-search-button"/></div>

</div>

</article>

</form>
            
            </div>
            
            
            </div>
            
        </div>
    </section>

<!-- content left end here -->

<!-- content right start here -->

<!--<div class="content-right">

<?php //include("content-right.php"); ?>

</div>-->

<!-- content right end here -->

</div>

</section>

<!-- content area end here -->

<!-- footer start here -->

<?php include("footer.php"); ?>