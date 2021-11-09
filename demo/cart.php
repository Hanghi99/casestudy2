<?php 
session_start();
// session_destroy();
// die();
include_once 'db/db.php';
include 'defines.php' ;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // echo "<pre>"; print_r($_REQUEST);die();
    $_SESSION["cart"] = $_REQUEST['quantity'];
}
$cart       = (isset($_SESSION["cart"])) ? $_SESSION["cart"] : [];
$cart_ids   = array_keys($cart);
$cart_ids   = implode(",",$cart_ids);
if(!$cart){
    header("Location:index.php");
}

if (!$cart_ids) {
    header("location:index.php");
}


// echo "<pre>"; print_r($cart_ids);

$sql = "SELECT * FROM `products` WHERE id IN (".$cart_ids.")";
// echo $sql;die();


$stmt=$connect->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$products=$stmt->fetchAll();
// echo '<pre>';print_r($product);
// die();
?>
 
 
<?php include 'layoutfk/header.php';?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>cart</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

     <!-- jQuery library -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

     <!-- Popper JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

     <!-- Latest compiled JavaScript -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
 </head>

 <body>
     <h1 class="text-center">Giỏ Hàng</h1>
     <form method="post" action="">
        <div class="container" style= "margin-top:45px;">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Ảnh </th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col">Xoá</th>
                    </tr>
                </thead>
                
                <?php 
                $total_price = 0;
                foreach ($products as $key => $product) :
                $quantity = $cart[$product->id];
                $total_price += $product->price * $quantity;
                ?>

                <tbody>
                    <tr>
                        <th><?= $product->id ; ?></th>
                        <td><?= $product->name ; ?></td>
                        <td><img style="width: 100px;height:100px;"src="<?= $root_url.'/assets/images/'. $product->image;?>"></td>
                        <td><?= number_format($product->price)." VNĐ"; ?></td>
                        <td><input type="number" name="quantity[<?= $product->id ; ?>]" value="<?= $quantity; ?>"/></td>
                        <td><?= number_format($product->price * $quantity)." VNĐ"; ?></td>
                        <td><a class="btn btn-danger"href="deletecart.php?id=<?= $product->id ; ?>">Xoá</a></td>
                    </tr>
                    
                </tbody>
                <?php endforeach; ?>
            </table>

            <input type="submit" value="Cập nhật"/>
        </div>
    </form>

 <?php include 'layoutfk/footer.php'; ?>