<?php
if(!ISSET($_SESSION)){
	//Start session
	session_start();
}

date_default_timezone_set('Asia/Dhaka');

//Check whether the session variable SESS_MEMBER_ID is present or not
if(!isset($_SESSION['UP_SESS_MEMBER_ID']) || (trim($_SESSION['UP_SESS_MEMBER_ID']) == '')) {	
header("location:index.php?notify=ad");		
exit();
	}
?>