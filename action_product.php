<?php
require_once("auth.php");
include("db.php");


//Add New Brand Setup
if(!empty($_POST['name']) && !empty($_POST['price'])){
    
    $name = $_POST['name'];
    $price = $_POST['price'];
    $brand = $_POST['brand'];
    

    $query = $conn->prepare("SELECT * FROM `product` WHERE `name` = '".$name."' AND `brand` = '".$brand."' "); 
    $query->execute();
    if($query->rowCount()>=1){
        print "duplicate";
        exit();
    }
        $query_product = $conn->exec("INSERT INTO `product`
                                                (
                                                    `id`, 
                                                    `name`, 
                                                    `price`, 
                                                    `brand`
                                                ) VALUES 
                                                (
                                                    '0',
                                                    '$name',
                                                    '$price',
                                                    '$brand'
                                                )
                                   "); 
    if($query_product){
        print "success";
           
        }else{
            Print "Something Wrong";

        }
        exit();
}