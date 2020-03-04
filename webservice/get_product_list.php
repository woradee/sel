<?php //include connection

//get_product_list.php

include "../setting/config.php";

?>

<?php

@header("content-type:application/json;charset=utf-8");

@header("Access-Control-Allow-Origin: *");

@header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');

?>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

$content = @file_get_contents('php://input');

//$json_data = @json_decode($content, true);

//$cus_id = @$json_data["cus_id"];

}else{

//$cus_id = $_GET["cus_id"];

//$cus_email = @$_GET["cus_email"];

//$cus_pass = @$_GET["cus_pass"];

}

?>

<?php

$strSQL ="SELECT * FROM product";

$result = @$conn->query($strSQL);

$data=array();

while($row = $result->fetch_assoc()) {

//echo $row['pro_id'];

$data[] = array("pro_id"=>$row["pro_id"],

"pro_name"=>$row["pro_name"],

"pro_detail"=>$row["pro_detail"],

"pro_price"=>$row["pro_price"],

"pro_num"=>$row["pro_num"],

"pro_image"=>"http://127.0.0.1/webservice/image_product/".$row["pro_img"],

);

}

?>

<?php

echo json_encode($data);

?>