
<?php

$host = "localhost";
$user = "root";
$pass = "";
$database = "ems_db";

try {
    $dbcon = new PDO("mysql:host=$host;dbname=$database", $user, $pass);
    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOEXCEPTION $e) {
    $e->getMessage();
}


$sql = "SELECT * FROM tb_orders WHERE order_id = :id";
$query = $dbcon->prepare($sql);
$query->bindParam(':id', $id, PDO::PARAM_STR);
$id = $_POST['tricket_id'];

$query->execute();
$result = $query->fetchAll(PDO::FETCH_OBJ);





$tricket_id = $_POST['tricket_id'];


?>

<div class="col-md-12">
        <table class="table table-hover">
            <thead>
                <tr>
                    <td id="vh1" class="vkk1">สินค้า</td>
                    <td>จำนวน</td>
                    <td>ผู้ส่ง</td>
                    <td>Location ต้นทาง</td>
                    <td>ผู้รับ</td>
                    <td>Location ปลายทาง</td>
                    <td>สถานะ</td>
                </tr>
            </thead>
            <tbody>
            <?php
            if ($query->rowCount() > 0) {
                foreach($result as $res) { ?>
                    <tr>
                        <td><?php echo $res->product_name; ?></td>
                        <td><?php echo $res->product_amout; ?></td>
                        <td><?php echo $res->mem_id; ?></td>
                        <td><?php echo $res->location_in; ?></td>
                        <td><?php echo $res->to_name; ?></td>
                        <td><?php echo $res->location_out; ?></td>
                        <td><?php echo $res->order_active; ?></td>
                    </tr>
                <?php }
                // echo "success";
            } else {
                // echo $sql;
                echo "ไม่มีข้อมุล";
            }
            
            
            ?>
                
            </tbody>
        </table>
    </div>
</div>