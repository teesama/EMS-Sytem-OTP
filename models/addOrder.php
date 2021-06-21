<?php
include('../configs/connect.php');

$sql = "INSERT INTO tb_orders (order_id,product_name,product_amout,mem_id,date_time,location_in,location_out,to_name,order_active) VALUES 
(:id, :product_name, :product_amout, :mem_id, :vdate, :local_in, :local_out, :to_name, :order_active);";
$query = $dbcon->prepare($sql);
$query->bindParam(':id', $id, PDO::PARAM_STR);
$query->bindParam(':product_name', $product_name, PDO::PARAM_STR);
$query->bindParam(':product_amout', $product_amout, PDO::PARAM_STR);
$query->bindParam(':mem_id', $mem_id, PDO::PARAM_STR);
$query->bindParam(':vdate', $vdate, PDO::PARAM_STR);
$query->bindParam(':local_in', $local_in, PDO::PARAM_STR);
$query->bindParam(':local_out', $local_out, PDO::PARAM_STR);
$query->bindParam(':to_name', $to_name, PDO::PARAM_STR);
$query->bindParam(':order_active', $order_active, PDO::PARAM_STR);


$id = uniqid();
$product_name = $_POST['product_name'];
$product_amout = $_POST['product_amout'];
$mem_id = $_POST['mem_id'];
$vdate = date("Y-m-d");
$local_in = $_POST['local_in'];
$local_out = $_POST['local_out'];
$to_name = $_POST['toname'];
$order_active = "กำลังดำเนินการ";

$result = $query->execute();

echo uniqid();

if ($result) {
    echo "success";
} else {
    echo $result;
}
?>