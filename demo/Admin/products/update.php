<?php
include '../../db/db.php';
$sql_categories="SELECT * from category";
$query = $connect->query($sql_categories);

$query->setFetchMode(PDO::FETCH_OBJ);
$categories    = $query->fetchall();
$id = ( isset( $_REQUEST['id']) && !empty( $_REQUEST['id']))?$_REQUEST['id']:"";
// var_dump($id);

$sql = "SELECT * from products where id=".$id." ";
$productlist = $connect->query($sql);
$productlist->setFetchMode(PDO::FETCH_OBJ);
$row    = $productlist->fetch();
// echo "<pre>";
// print_r($row);
// echo "</pre>";
if($_SERVER['REQUEST_METHOD']=="POST"){
    // echo "<pre>";
    // print_r($_POST);
    // die();
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $content = $_POST['content'];
    $id_category = $_POST['id_category'];
   if($name == "" )
    {
       echo "Vui lòng nhập dữ liệu";
    }
    else
    {
        $sql = "UPDATE products SET name='".$name."',price='".$price."',image='".$image."',content='".$content."',id_category='".$id_category."' where products.id=".$id." ";
        echo $sql;
    
    $productlist = $connect->query($sql);
    
    // trả về dữ liệu
    $productlist->setFetchMode(PDO::FETCH_OBJ);
    $row    = $productlist->fetchAll();

    header("Location: index.php");
   
    }
    
}
?>
<?php include "../layouts/header.php" ?>

<h2 class="text-center"> Cập nhật sản phẩm </h2>

<div class="panel-body">
    <form action="" method="post">
        <div class="form-group">
            <label for="usr">Tên danh mục:</label>
            <input type="text" class="form-control" name="name" value="<?= $row->name; ?>">
        </div>
        <div class="form-group">
            <label for="usr">Giá sản phẩm:</label>
            <input type="number" class="form-control" name="price" value="<?= $row->price; ?>">
        </div>
        <div class="form-group">
            <label for="usr">Hình ảnh:</label>
            <input type="file" class="form-control" name="image" value="<?= $row->image; ?>">
        </div>

        <div class="form-group">
            <label for="usr">Content:</label>
            <textarea type="text" row="5" class="form-control" name="content" id="content"
                value=""><?= $row->content; ?></textarea>
        </div>
        <div class="form-group">
            <label for="usr">Danh mục sản phẩm:</label>
            <select type="text" class="form-control" name="id_category">
                <option>--Lựa chọn danh mục--</option>
                <?php
//Lấy tất cả từ bảng thể loại
  $sql    = "SELECT * FROM category";
 //thực hiện truy vấn
 $categorylist  = $connect->query( $sql ); 
  ?>
                <?php foreach($categories as $key => $category): ?>
                if($category->id == $id_category)
                {<option selected value="<?= $category->id?>"> <?=  $category->name ?></option> }
                else{<option value="<?= $category->id?>"> <?=  $category->name ?></option> }
                <?php endforeach ; ?>

            </select>
        </div>

        <button class="btn btn-success" type="submit">Cập nhật</button>
                </form>

</div>
<script type="text/javascript">
$(function() {
    $('#content').summernote({
        height: 180, // set editor height
        codemirror: {
            theme: 'monokai'
        }
    })
});
</script>
<?php include "../layouts/footer.php"; ?>