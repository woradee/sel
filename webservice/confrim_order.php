<?php
    include "../setting/config.php";
?>
<?php //header
    @header("content-type:application/json;charset=utf-8");
    @header("Access-Control-Allow-Origin: *");
    @header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');
?>
<?php //input
     if($_SERVER["REQUEST_METHOD"] == "POST"){
        $content = @file_get_contents('php://input'); 
        $json_data = @json_decode($content, true);
        $status = $json_data['status'];  
        $cus_email = $json_data['cus_email']; 
     }else{
        $status = "1"; //ค่าทดสอบ 
        $cus_id = "CUS0007"; //ค่าทดสอบ
     }
?>
<?php //process
    //insert order
    $cus_id = "XXX";
    $ord_id = rand(234567,999999);
    $strSQL = "INSERT INTO orders (cus_id,ord_id,ord_datetime,cus_email) VALUES ('".$cus_id."','".$ord_id."','".date("Y-m-d H:i:s")."','".$cus_email."')";
    $result = @$conn->query($strSQL);

    //insert order_detail
    $strSQL = "SELECT * FROM temp_order"
    $result = @$conn->query($strSQL);
    while($row = $result->fetch_assoc()){
        $tor_id = $row['tor_id'];
        $cus_id = $row['cus_id'];
        $pro_id = $row['pro_id'];
        $pro_name = $row['pro_name'];
        $pro_price = $row['pro_price'];
        $pro_num = $row['pro_num'];
        $strSQL_2 = "INSERT INTO order_detail(ord_id,pro_id,pro_name,pro_price,pro_num) VALUES ('".$ord_id."','".$pro_id."','".$pro_name."','".$pro_price."','".$pro_num."')";
        $result_2 = @$conn->query($strSQL_2);
    }
?>
<?php //ouptput - response
    $strSQL_3 = "DELETE FROM temp_order WHERE cus_id='".cus_id."'";
    $strSQL_3 = @$conn->query($strSQL_3)
    echo json_encode(array("result"=>"200"));
?>

<?php //log
    $ip = $_SERVER['REMOTE_ADDR'];
    $date = @date("d/m/Y H:i:s");
    $objFopen= @fopen("log_confirm_order.log","a+");
    $str = $date." |-> IP:".$ip." |->คำสั่ง ".@$strSQL."\n";
    @fwrite($objFopen,$str);
    @fclose($objFopen);
?>