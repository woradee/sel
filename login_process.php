<?php
    include "setting/config.php";
?>
<?php
    $cus_email = trim($_POST['cus_email']);
    $cus_pass = trim($_POST['cus_pass']);
    //echo $cus_email."<br>";
    //echo $cus_pass."<br>";
?>
<?php
    function gen_key($str){
        $key=md5($str);
        return $key;
    }
?>
<?php
    $strSQL="SELECT * FROM customer WHERE cus_email= '".$cus_email."'  ";
    $result = @$conn->query($strSQL);

    if(@$result->num_rows >0){
        //เข้าได้
        while ($row = $result->fetch_assoc()){
            $pass = $row['cus_pass'];
            if(trim($cus_pass) == trim($pass)){
                //เข้าได้
                echo "เข้าระบบได้";
                @session_start();
                $_SESSION['cus_id'] = $row['cus_id'];
                $_SESSION['key'] = gen_key($row['cus_id']);
                $_SESSION['cus_name'] = $row['cus_name'];
                $_SESSION['cus_tel'] = $row['cus_tel'];
                $_SESSION['cus_email'] = $row['cus_email'];
                echo "<meta  http-equiv='refresh' content='0;URL=product/product_list.php'>"; 	

            }else{
                //เข้าไม่ได้่
                echo "password ผิดพลาด";
                echo "<meta  http-equiv='refresh' content='0;URL=login.php'>"; 	
            }            
        }
    }else{
        //เข้าไม่ได้
       echo "email ผิดพลาด";
       echo "<meta  http-equiv='refresh' content='0;URL=login.php'>"; 	
    }
?>


