<?php
/** cus_add_process.php */
//----- LIB config
    include "../../setting/config.php";
//----- DATA 
    $cus_name=trim($_POST['cus_name']);
    $cus_tel=trim($_POST['cus_tel']);
    $cus_email=trim($_POST['cus_email']);
    $cus_pass=trim($_POST['cus_pass']);

//---- GEN cus_id
    $strSQL="SELECT MAX(cus_no) As cus_no FROM customer";
    $result_new_cus_id = @$conn->query($strSQL);
    if(@$result_new_cus_id->num_rows > 0){
        while($row_new_cus_id = $result_new_cus_id->fetch_assoc()){
            $cus_no = $row_new_cus_id['cus_no'];
            //$cus_id = "cus00".($cus_no+1)."-".rand(0,9);
            $cus_id = sprintf("CUS%05s",($cus_no+1))."-".rand(0,9);
        }
    }else{
        $cus_id = sprintf("CUS%05s",1)."-".rand(0,9);     
    }    
    

//---- CHECK Email Duplicate
    $strSQL="SELECT cus_id FROM customer WHERE cus_email ='".$cus_email."' ";
    $result_chk_email = @$conn->query($strSQL); 
    if(@$result_chk_email->num_rows > 0){
        // email ใช้ไม่ได้
        $chk_email = false;
    }else{
        // email ใช้ได้
        $chk_email = true;
    }
    
//---- INSERT2BASE
    if($chk_email){
        // insert
        $strSQL="INSERT INTO customer (cus_id,cus_name,cus_tel,cus_email,cus_pass) VALUES ('".$cus_id."','".$cus_name."','".$cus_tel."','".$cus_email."','".$cus_pass."') ";
        //echo  $strSQL;
        $result_insert = @$conn->query($strSQL);
    }else{
        // ไม่ทำแจ้งเตือน
        $result_insert= false;
    }

// ---- Direct next page
    if($result_insert){
        echo "<script> alert('INSERT NEW CUS ID'); </script>";
        echo "<meta  http-equiv='refresh' content='0;URL=cus_add.php'>"; 	
    }else{
        echo "<script> alert('FAIL INSERT'); </script>";
        echo "<meta  http-equiv='refresh' content='0;URL=cus_add.php'>"; 	
    }

?>