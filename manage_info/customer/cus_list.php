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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer list</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">      
	<script>
		function edit_customer(cus_id){
			//alert("x");
			document.forms["cus_edit"].action="cus_edit.php?cus_id="+cus_id;
			document.forms["cus_edit"].submit();	
		}		
	</script>
</head>
<body>     
	<form id="cus_edit" name="cus_edit" method="POST">
    <h3>รายชื่อลูกค้า</h3><br>
    <?php
        $strSQL="SELECT cus_id,cus_name,cus_email,cus_tel FROM customer ";
        //echo $strSQL;
        $result = @$conn->query($strSQL);
    ?>
    <?php
        if(@$result->num_rows >0){
        while($row = $result->fetch_assoc()){    
    ?>
        <div class ="row" style="height:100px">
            <div class="col-sm-4" align="left" style="border:1px solid">
				<div style="padding:5px 5px 5px 5px"><?php echo $row['cus_id']; ?></div>
                <div style="padding:5px 5px 5px 5px"><?php echo $row['cus_name']; ?> <?php echo $row['cus_email']; ?></div>
                <div style="padding:10px 10px 10px 10px"><label onClick="edit_customer('<?php echo $row['cus_id'];?>')" style="border-style: solid;border-color:green;border-size:2px;color:green;cursor:pointer;padding:5px;border-radius: 10px;">แก้ไข</label></div>
            </div>
        </div>
    <?php }}?>
    </form>
</body>
</html>