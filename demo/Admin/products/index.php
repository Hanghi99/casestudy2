<?php session_start(); ?>
<?php include '../../db/db.php' ;?>
<?php include '../../defines.php' ;?>
<?php include_once '../layouts/header.php'?>
<?php if (isset($_SESSION['success'])) : ?>
<p><?= $_SESSION['success']; unset($_SESSION['success']); ?></p>
<?php endif; ?>

<?php if (isset($_SESSION['error'])) : ?>
<p><?= $_SESSION['error']; unset($_SESSION['error']);  ?></p>
<?php endif; ?>

<h2 class="text-center"> Quản Lý Sản Phẩm </h2>
</div>

<?php //Lấy tất cả từ bảng thể loại
 $sql    = "SELECT products.id, products.name, products.price, products.image, products.updated_at, category.name categoryname from products left join category on products.id_category=category.id";
 //thực hiện truy vấn
 $productlist  = $connect->query( $sql );
 //tùy chọn kiểu trả về
 $productlist->setFetchMode(PDO::FETCH_OBJ);
 //lấy tất cả kết quả
 $rows   = $productlist->fetchAll();?>
<a class="btn btn-success" href="create.php">Thêm danh mục </a>
<table class="table">
    <thead>
        <tr class="p-3 mb-2 bg-danger text-white">
            <th scope="col" width="50px">ID</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">CategoryName</th>
            <th scope="col">Updated_at</th>
            <th scope="col">Action</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach($rows as  $products): ?>

        <tr>
            <td> <?php echo $products->id ;   ?> </td>
            <td> <img style="width:100px;height:100px; " src="<?php echo $root_url.'/assets/images/'. $products->image ; ?>" /> </td>
            <td> <?php echo $products->name ; ?> </td>
            <td> <?php echo number_format($products->price , 0, ',', '.'). "VNĐ"; ?> </td>
          

            <td> <?php echo $products->categoryname ; ?> </td>
            <td> <?php echo $products->updated_at ; ?> </td>
            </td>
            <td style="display: flex">
        <a class="btn btn-primary" style="width: 103px;" href="update.php?id=<?= $products->id ;?>">Cập nhật</a> <a class="btn btn-danger"
                    href="delete.php?id=<?= $products->id ;?>" onclick="return confirm('Bạn có chắc muốn xoá không?');">Xoá</a>
            </td>
        </tr>
        <?php endforeach ; ?>
        </div>
    </tbody>
</table>

</div>
<?php include_once '../layouts/footer.php'?>