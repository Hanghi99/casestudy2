<?php session_start(); ?>
<?php include '../../db/db.php'?>
<?php include "../layouts/header.php"?>
<?php if (isset($_SESSION['success'])) : ?>
<p><?= $_SESSION['success']; unset($_SESSION['success']); ?></p>
<?php endif; ?>

<?php if (isset($_SESSION['error'])) : ?>
<p><?= $_SESSION['error']; unset($_SESSION['error']);  ?></p>
<?php endif; ?>
<h2 class="text-center"> Quản Lý Danh Mục </h2>
</div>

<?php //Lấy tất cả từ bảng thể loại
 $sql    = "SELECT * FROM category";
 //thực hiện truy vấn
 $categorylist  = $connect->query( $sql );
 //tùy chọn kiểu trả về
 $categorylist->setFetchMode(PDO::FETCH_OBJ);
 //lấy tất cả kết quả
 $rows   = $categorylist->fetchAll();?>
<a class="btn btn-success" href="create.php">Thêm danh mục </a>
<table class="table">
    <thead>
        <tr class="p-3 mb-2 bg-danger text-white">
            <th scope="col">ID</th>
            <th scope="col">CategoryName</th>
            <th scope="col">Action</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach($rows as $key => $category): ?>

        <tr>
            <td> <?php echo $category->id ;   ?> </td>
            <td> <?php echo $category->name ; ?> </td>
           
            <td>
                <a class="btn btn-primary" href="update.php?id=<?= $category->id ;?>">Cập nhật</a>
                <a class="btn btn-danger" href="delete.php?id=<?= $category->id ;?>"  onclick="return confirm('Are you sure?');" >Xoá</a>
            </td>
        </tr>
        <?php endforeach ; ?>
        </div>
    </tbody>
</table>

</div>
<?php include '../layouts/footer.php'; ?>