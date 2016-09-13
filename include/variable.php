<?php

$tbl_admin='tbl_admin';

$tbl_banner='tbl_banner';

$tbl_content='tbl_content';

$tbl_country='tbl_country';

$tbl_education='tbl_education';

$tbl_eyes_color='tbl_eyes_color';

$tbl_hair_color='tbl_hair_color';

$tbl_lang='tbl_lang';

$tbl_occupation='tbl_occupation';

$tbl_profile='tbl_profile';

$tbl_religion='tbl_religion';

$tbl_sign='tbl_sign';

$tbl_social='tbl_social';

$tbl_town='tbl_town';

$tbl_websitelang='tbl_websitelang';

$tbl_newsletter='tbl_newsletter';

$tbl_newsletter_template='tbl_newsletter_template';

$tbl_subscriber='tbl_subscriber';

$tbl_enquiry='tbl_enquiry';

$tbl_video='tbl_video';

$tbl_member='member';

$tbl_page='tbl_page';

$tbl_additional_services='tbl_additional_services';

$tbl_appartments='tbl_appartments';

$tbl_video_category='tbl_video_category';

$tbl_videosubscription='tbl_videosubscription';

$tbl_payment='tbl_payment';

$tbl_appointment='tbl_appointment';

$tbl_state='tbl_state';





include("lang-eng.php");

if($_SESSION['userlang']==''){

	$_SESSION['userlang']='en';

	include("lang-eng.php");

}

if($_SESSION['userlang']=='ge'){

	include("lang-ge.php");

}

if($_SESSION['userlang']=='po'){

	include("lang-po.php");

}

if($_SESSION['userlang']=='sp'){

	include("lang-sp.php");

}

if($_SESSION['userlang']=='fr'){

	include("lang-fr.php");

}

//print_r($_SESSION);

$SitemonthsArr=array(1=>$lang_January,2=>$lang_February,3=>$lang_March,4=>$lang_April,5=>$lang_May,6=>$lang_June,7=>$lang_July,8=>$lang_Auguest,9=>$lang_September,10=>$lang_October,11=>$lang_November,12=>$lang_December);

?>