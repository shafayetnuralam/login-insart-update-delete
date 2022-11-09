<?php
//Start session
session_start();

date_default_timezone_set('Asia/Dhaka');

$mdate=date("Y-m-d");
$mtime=date("h:i:s a");

//Include database connection details
require_once('db.php');

//Function to sanitize values received from the form. Prevents SQL injection

function clean($str) {
$str = trim($str);
if(get_magic_quotes_gpc()) {
$str = stripslashes($str);
}
return addslashes(strip_tags($str));
}

//Sanitize the POST values

$user = clean($_POST['user']);
$password = clean($_POST['password']);


//Create query
$query = $conn->prepare("SELECT * FROM `operator` 
WHERE `user` = '$user' AND `password` = '".md5($password)."'"); 
$query->execute();

//Check whether the query was successful or not
if($query->rowCount()==1){

  //Add Cookie  for 7 Days
setcookie('user_name',$user,time()+60*60*24*7);
setcookie('user_password',$password,time()+60*60*24*7);

#Login Successful
session_regenerate_id();
$member = $query->fetch(PDO::FETCH_ASSOC);
$_SESSION['UP_SESS_MEMBER_ID'] = $member['id'];
session_write_close();
header("location: home.php");
exit();

}
else{

//Login failed
header("location:index.php?notify=login_faield");
exit();
}

### END 

?>