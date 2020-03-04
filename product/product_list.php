<?php
    @session_start();
    @session_cache_expire(30);
    //echo $_SESSION['cus_name'];
    //echo $_SESSION['cus_id'];
?>
<?php
    $keypage= @md5(@$_SESSION['cus_id']);
    if(@$_SESSION['key']==$keypage){
        //อยู่ต่อ
    }else{
        //กลับไปหน้า login
        session_destroy();
        echo "<meta  http-equiv='refresh' content='0;URL=../login.php'>"; 	
        exit;
    }
?>
<?php
    include "../setting/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product list</title>
    <script type="text/javascript" src="../setting/jquery-3.4.1.min.js"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">      
    <script>
        function add_cart(obj){
            //alert("MY CART");
            //alert(obj.getAttribute('pro_name') + obj.getAttribute('pro_price'));
            var pro_id = obj.getAttribute('pro_id');
            var pro_name = obj.getAttribute('pro_name');
            var pro_price = obj.getAttribute('pro_price');
            //alert("cmd");
            $.ajax({
			    type: "POST",
				dataType: 'json',
				contentType: 'application/json',
			    async : false,
			    url: "../webservice/add_cart.php",
                data:JSON.stringify({
                    cus_id:"<?php echo @$_SESSION['cus_id'];?>",
                    pro_id:pro_id,
                    pro_name:pro_name,
                    pro_price:pro_price,
                    pro_num:"1"
                }),
                success: function (response){
                    //alert("Hello");
                    var data = response;
                    //alert(json_data.result);
                    document.getElementById("corder").innerHTML = json_data.result;
                }
		    });
		    return false;
        }

        function confirm(){
            var cus_email = document.getElementById("cus_email").value;
            
            $.ajax({
			    type: "POST",
				dataType: 'json',
				contentType: 'application/json',
			    async : false,
			    url: "../webservice/confrim_order.php",
                data:JSON.stringify({
                    cus_id:"<?php echo @$_SESSION['cus_id']?>",
                    cus_email:cus_email,
                    status:"1";
                }),
                success: function (response){
                    var data = response;
                    alert(่json_data.result);
                }
		    });
		    //return false;

            document.forms["cf"].action ="order.php";
            document.forms["cf"].submit();

        }
    </script>
</head>
<body>       
    <h3>รายการสินค้า</h3><br>
    <div align="center"> ตะกร้าสินค้า[<label id = "corder">0</label>] </div>

    <form name="cf" action="order.php" method="POST">
        <div align="center" onclick="confirm()">
            ยืนยันการสั่งซื้อ
        </div>
        </form>
        
    <?php
        $strSQL="SELECT * FROM product ";
        //echo $strSQL;
        $result = @$conn->query($strSQL);
    ?>
    <?php
        if(@$result->num_rows >0){
        while($row = $result->fetch_assoc()){    
    ?>
        <div class ="row">
            <div class="col-sm-2" align="right" style="border:1px solid"><?php echo $row['pro_name']; ?></div>
            <div class="col-sm-2" align="left" style="border:1px solid"> 
                <?php echo $row['pro_detail']; ?>
            </div> 
            <div class="col-sm-2" align="left" style="border:1px solid">
                <label pro_id ="<?php echo $row['pro_id']; ?>" pro_name ="<?php echo $row['pro_name']; ?>" pro_price ="<?php echo $row['pro_price']; ?>" OnClick="add_cart(this)" style="cursor:pointer">สั่งซื้อ</label>
            </div>
        </div>
    <?php }}?>    
</body>
</html>