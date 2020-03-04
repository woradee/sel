<?php
    @session_start();
    @session_cache_expire(30);
    //echo $_SESSION['cus_name'];
    //echo $_SESSION['cus_id'];
?>
<?php
    include "../../setting/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>manage>>customer>>edit</title>
</head>
<script>
    function edit_customer(){
        document.forms["cus_edit"].action="cus_edit_process.php";
		document.forms["cus_edit"].submit();	
    }
</script>
<?php 
	$cus_id = trim($_GET['cus_id']);
	$strSQL="SELECT * FROM customer WHERE cus_id='".$cus_id."'";
	$result = @$conn->query($strSQL);
    if(@$result->num_rows >0){
		while($row = $result->fetch_assoc()){
			$cus_id = trim($row['cus_id']);
			$cus_name = trim($row['cus_name']);
			$cus_email = trim($row['cus_email']);
			$cus_tel = trim($row['cus_tel']);
			$cus_pass = trim($row['cus_pass']);
		}
	}
?>
<body>
    <form id="cus_edit" name="cus_edit" method="POST">
    <div align="center">
        <div class="row">
            <div class="col-sm-4" align="right">รหัสลุกค้า</div>
            <div class="col-sm-4" align="left">
				<input type="hidden" id="cus_id" name="cus_id" value="<?php echo $cus_id;?>"/>
                <label><?php echo $cus_id; ?></label>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4" align="right">ชื่อ</div>
            <div class="col-sm-4" align="left">
                <input type="text" id="cus_name" name="cus_name" value="<?php echo $cus_name;?>"/>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4" align="right">เบอร์โทร</div>
            <div class="col-sm-4" align="left">
                <input type="tel" id="cus_tel" name="cus_tel" value="<?php echo $cus_tel;?>"/>
            </div>
        </div>   
        <div class="row">
            <div class="col-sm-4" align="right">อีเมล์</div>
            <div class="col-sm-4" align="left">
                <label><?php echo $cus_email;?></label>
            </div>
        </div> 
        <div class="row">
            <div class="col-sm-4" align="right">รหัสผ่าน</div>
            <div class="col-sm-4" align="left">
                <input type="text" id="cus_pass" name="cus_pass" value="<?php echo $cus_pass;?>"/>
            </div>
        </div>
        <div class="row">   
            <div class="col-sm-4" align="right">
               <!-- blank-->
            </div>          
            <div class="col-sm-4" align="left">
                <label  style="border-style: solid;border-color:pink;border-size:2px;color:pink;cursor:pointer;padding:5px;border-radius: 10px;" >ยกเลิก</label>
                <label onClick="edit_customer()" style="border-style: solid;border-color:green;border-size:2px;color:green;cursor:pointer;padding:5px;border-radius: 10px;">ตกลง</label>
            </div>
        </div>               
    </div>
    </form>
</body>
</html>