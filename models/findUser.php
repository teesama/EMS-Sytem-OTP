<?php
include('../configs/connect.php');

$sql = "SELECT * FROM tb_member WHERE mem_id = :id";
$query = $dbcon->prepare($sql);
$query->bindParam(':id', $id, PDO::PARAM_STR);
$id = $_POST['id'];
// $user = "admin";
// $pass = "1234";
$query->execute();
$result = $query->fetchAll(PDO::FETCH_OBJ);
if ($query->rowCount() > 0) {
    foreach($result as $res) {
        echo $res->mem_name;
    }
    // echo "success";
} else {
    // echo $sql;
    echo "ไม่มีข้อมุล";
}