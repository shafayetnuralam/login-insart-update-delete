<?php
require_once("auth.php");
include("db.php");


//Add New Brand Setup
if(!empty($_POST['user']) && !empty($_POST['password'])){
    
    $user = $_POST['user'];
    $decrypt_password = $_POST['password'];
    $password = md5($decrypt_password);

    $query = $conn->prepare("SELECT * FROM `operator` WHERE `user` = '".$user."' "); 
    $query->execute();
    if($query->rowCount()>=1){
         header("location: Add_User.php?msg=duplicate&user=$user&password=$decrypt_password");
        exit();
    }
        $query_user = $conn->exec("INSERT INTO `operator`
                                                (
                                                    `id`, 
                                                    `user`, 
                                                    `password`, 
                                                    `decrypt_password`
                                                ) VALUES 
                                                (
                                                    '0',
                                                    '$user',
                                                    '$password',
                                                    '$decrypt_password'
                                                )
                                   "); 
    if($query_user){
        header("location: Add_User.php?msg=success");
           
        }else{
            Print "Something Wrong";

        }
        exit();
}