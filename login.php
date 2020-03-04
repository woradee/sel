<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<script>
    function login(){
        document.forms["flogin"].action="login_process.php";
		document.forms["flogin"].submit();	
    }
</script>
<body>
    <form id="flogin" name="flogin" method="POST">
    <div align="center" style="margin:50px 0 0 0">
        <div class="row">
            <div class="col-sm-4" align="right">Email</div>
            <div class="col-sm-4" align="left">
                <input type="email" id="cus_email" name="cus_email"/>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4" align="right">Password</div>
            <div class="col-sm-4" align="left">
                <input type="text" id="cus_pass" name="cus_pass"/>
            </div>
        </div> 
        <div class="row">   
            <div class="col-sm-4" align="right">
               <!-- blank-->
            </div>          
            <div class="col-sm-4" align="left">
                <label OnClick="login()"  style="border-style: solid;border-color:green;border-size:2px;color:green;cursor:pointer;padding:5px;border-radius: 10px;">เข้าสู่ระบบ</label>
            </div>
        </div>               
    </div>               
    </div>
    </form>
</body>
</html>