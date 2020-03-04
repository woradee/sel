<?php
    $conn = new mysqli("127.0.0.1","root","","shoppingmall");
    //IP DB server,User,Pass,ชื่อDB
    if($conn->connect_error){
        die("Connection failed:".$conn->connect_error);
    }
    @date_default_timezone_set("asia/bangkok");
    @mysqli_set_charset($conn,"utf8");
?>