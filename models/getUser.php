<?php
include('../configs/connect.php');



$sql = "SELECT * FROM tb_member WHERE mem_user = :user and mem_pass = :pass";
$query = $dbcon->prepare($sql);
$query->bindParam(':user', $user, PDO::PARAM_STR);
$query->bindParam(':pass', $pass, PDO::PARAM_STR);
$user = $_POST['user'];
$pass = $_POST['pass'];
// $user = "admin";
// $pass = "1234";
$obj = new stdClass();


$query->execute();
$result = $query->fetchAll(PDO::FETCH_OBJ);
if ($query->rowCount() > 0) {
    foreach($result as $res) {
        // echo $res->mem_id;

        if ($res->user_otp == "") {

            if ($res->user_otp_active == "ยินยันเรียบร้อย") {
                echo $res->mem_id;
            }
        } else {
            echo "unotp";
        }
        // echo $res->mem_id
        
        // $obj->mem_id = $res->mem_id;
        // $obj->otp = $res->user_otp_active;
        // $obj->status = $res->mem_active;

        
        // echo $obj;
    }
    // echo "success";
} else {
    // echo $sql;
    echo "ไม่มีข้อมุล";
}


