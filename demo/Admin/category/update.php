<?php
include '../../db/db.php';
$id = ( isset( $_REQUEST['id']) && !empty( $_REQUEST['id']))?$_REQUEST['id']:"";
// var_dump($id);

$sql = "SELECT * from category where id=".$id." ";
$categorylist = $connect->query($sql);
$categorylist->setFetchMode(PDO::FETCH_OBJ);
$row    = $categorylist->fetch();
// echo "<pre>";
// print_r($row);
// echo "</pre>";
if($_SERVER['REQUEST_METHOD']=="POST"){
    // echo "<pre>";
    // print_r($_POST);
    // die();
    $name = $_POST['name'];
   if($name == "" )
    {
       echo "Vui lòng nhập dữ liệu";
    }
    else
    {
    $sql = "UPDATE category SET name='".$name."' where id=".$id." ";
    echo $sql;
    
    $categorylist = $connect->query($sql);
    
    // trả về dữ liệu
    $categorylist->setFetchMode(PDO::FETCH_OBJ);
    $row    = $categorylist->fetch();

    header("Location: index.php");
   
    }
    
}
?>
<?php include "../layouts/header.php" ?>
                <h2 class="text-center"> Cập nhật danh mục </h2>
            </div>
            <div class="panel-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="usr">Tên danh mục:</label>
                        <input type="text" class="form-control" name="name" value="<?= $row->name; ?>">
                    </div>

                    <button class="btn btn-success" type="submit">Cập nhật</button>
            </div>
           
    </div>
<?php include '../layouts/footer.php'?>