<?php
include('../configs/connect.php');
$sql = "UPDATE tb_member SET user_otp_active = :otp_active WHERE user_otp = :user_otp";
$query = $dbcon->prepare($sql);
$query->bindParam(':otp_active', $otp_active, PDO::PARAM_STR);
$query->bindParam(':user_otp', $user_otp, PDO::PARAM_STR);

$otp_active = "ยินยันเรียบร้อย";
$user_otp = $_POST['otp_send'];

$result = $query->execute();

$sql = "UPDATE tb_member SET user_otp = :user_otp WHERE user_otp_active = :otp_active";
$query = $dbcon->prepare($sql);
$query->bindParam(':otp_active', $otp_active, PDO::PARAM_STR);
$query->bindParam(':user_otp', $user_otp, PDO::PARAM_STR);

$otp_active = "ยินยันเรียบร้อย";
$user_otp = '';

$result = $query->execute();
$result = $query->fetchAll(PDO::FETCH_OBJ);
if ($query->rowCount() > 0) {
    echo "success";
} else {
    echo "error";
}

?>