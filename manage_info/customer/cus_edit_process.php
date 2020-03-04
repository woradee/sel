<?php
/** cus_edit_process.php */
//----- LIB config
    include "../../setting/config.php";
//----- DATA 
	$cus_id=trim($_POST['cus_id']);
    $cus_name=trim($_POST['cus_name']);
    $cus_tel=trim($_POST['cus_tel']);
    $cus_pass=trim($_POST['cus_pass']);

//---- UPDATE2BASE
    
     // update
     $strSQL="UPDATE customer SET cus_name='".$cus_name."',cus_tel='".$cus_tel."',cus_pass='".$cus_pass."' WHERE cus_id='".$cus_id."' ";
     //echo  $strSQL;
     $result_update = @$conn->query($strSQL);
	if($result_update){
		// update ได้แจ้ง alert
		$result_update= true;
	}else{
		// update ไม่ได้แจ้ง alert
		$result_update= true;	
	}
    

// ---- Direct next page
    if($result_update){
        echo "<script> alert('UPDATE CUSTOMER'); </script>";
        echo "<meta  http-equiv='refresh' content='0;URL=cus_list.php'>"; 	
    }else{
        echo "<script> alert('FAIL UPDATE CUSTOMER'); </script>";
        echo "<meta  http-equiv='refresh' content='0;URL=cus_list.php'>"; 	
    }

?>