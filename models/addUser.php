<?php
include('../configs/connect.php');

$sql = "INSERT INTO tb_member (mem_id,mem_name,mem_user,mem_pass,mem_phone,user_otp,user_otp_active,mem_active)VALUES(:id, :name, :user, :pass, :phone, :otp, :otp_active, :active)";

$query = $dbcon->prepare($sql);
$query->bindParam(':id', $id, PDO::PARAM_STR);
$query->bindParam(':name', $name, PDO::PARAM_STR);
$query->bindParam(':user', $user, PDO::PARAM_STR);
$query->bindParam(':pass', $pass, PDO::PARAM_STR);
$query->bindParam(':phone', $phone, PDO::PARAM_STR);
$query->bindParam(':otp', $otp, PDO::PARAM_STR);
$query->bindParam(':otp_active', $otp_active, PDO::PARAM_STR);
$query->bindParam(':active', $active, PDO::PARAM_STR);

$id = uniqid();
$name = $_POST['name'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$phone = $_POST['phone'];
$otp = $_POST['otp'];
$otp_active = "รอยืนยัน";
$active = "พร้อม";

$result = $query->execute();


if ($result) {
    echo "success";
} else {
    echo $result;
}

?>