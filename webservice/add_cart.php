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
        $cus_id = $json_data['cus_id'];  
        $pro_id = $json_data['pro_id'];  
        $pro_name = $json_data['pro_name'];   
        $pro_price = $json_data['pro_price'];   
        $pro_num = $json_data['pro_num'];  
     }else{
        $cus_id = "sarawut_030263"; //ค่าทดสอบ 
        $pro_id = "P0001"; //ค่าทดสอบ 
        $pro_name = "prox1"; //ค่าทดสอบ 
        $pro_price = "2000"; //ค่าทดสอบ 
        $pro_num = "1"; //ค่าทดสอบ
     }
?>
<?php //process
     
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
     // gen tor_id     
         $tor_id =$cus_id."-".date("dmYHi")."-".rand(10000,99999);
     // tor_datetime
        $tor_datetime = date("Y-m-d H:i:s");
     // insert
        $strSQL="INSERT INTO temp_order (tor_id,cus_id,pro_id,pro_name,pro_price,pro_num,tor_datetime)  VALUE ('".$tor_id."','".$cus_id."','".$pro_id."','".$pro_name."','".$pro_price."','".$pro_num."','".$tor_datetime."') ";
        $result = @$conn->query($strSQL); 
    }
          
?>
<?php //ouptput - response
    $strSQL = "SELECT COUNT(tor_no) As corder FROM temp_order";
    $result = @$conn->query($strSQL);
    while($row = $result->fetch_assoc()){
        $corder = $row['corder'];
    }
    $total_num = $corder;
    echo json_encode(array("result"=>$total_num));
	//$detail=array("val1"=>20,"val2"=>30);
	//$detail_list[]=array("listval1"=>150,"listval2"=>1000);
	//$detail_list[]=array("listval1"=>250,"listval2"=>2000);
	//$detail_list[]=array("listval1"=>350,"listval2"=>3000);
    //echo json_encode(array("result"=>$total_num,"detail"=>$detail,"list"=>$detail_list));
?>

<?php //log
    $ip = $_SERVER['REMOTE_ADDR'];
    $date = @date("d/m/Y H:i:s");
    $objFopen= @fopen("log_add_cart.log","a+");
    $str = $date." |-> IP:".$ip." |->คำสั่ง ".@$strSQL."\n";
    @fwrite($objFopen,$str);
    @fclose($objFopen);
?>