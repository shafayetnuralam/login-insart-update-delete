<?php
require_once('auth.php');

//Unset the variables stored in session
unset($_SESSION['UP_SESS_MEMBER_ID']);

setcookie('user_name',$un,time()-1);
setcookie('user_password',$pass,time()-1);
header("location: index.php?notify=logout");
?>