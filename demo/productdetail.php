<?php 
include_once 'db/db.php';

include 'defines.php' ;
$id = (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) ? $_REQUEST['id'] : "";
if (!$id) {
    header("Location:index.php");
}
// $table_category="category";
// $table_product="products";

// $sql= "SELECT * From $table_category.id=$table_product.id_category AND $table_category.id where id=".$id."";
// $stmt=$connect->query($sql);
// $stmt->setFetchMode(PDO::FETCH_OBJ);
// $rows=$stmt->fetch();



$sql= "SELECT * From products where id=".$id."";
$stmt=$connect->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$product=$stmt->fetch();
$table_product="products";
// echo '<pre>';
// print_r($product);
// echo '</pre>';
$sql="SELECT * FROM products where id_category = $product->id_category AND $table_product.id !=".$id."";
$stmt=$connect->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$categories_id= $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>Sixteen Clothing - About Page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->

    <!-- Page Content -->



    <div class="best-features about-features">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Chi tiết sản phẩm</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-image">
                        <img style="width: 500px;height:500px;"
                            src="<?php echo $root_url.'/assets/images/'. $product->image;?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="left-content">
                        <h4><?php echo $product->name;?></h4>
                        <p><?php echo $product->content; ?></p>
                        <ul class="social-icons">
                            <li><?php echo number_format($product->price)."VNĐ";?> </li>
                        </ul>
                        <a  class="btn btn-success" style='color:white' href="addtocart.php?id=<?=$product->id ;?>" >Mua</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="team-members">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Sản phẩm liên quan</h2>
                    </div>
                </div>
                <?php foreach ($categories_id as $id_category):?>
                <div class="col-md-4">
                    <div class="product-item">
                        <div class="row justify-content-center">
                            <div class="col-md-7 pr-1">
                                <a href="#"><img style="width:200px;height:200px;"
                                        src="<?php echo $root_url.'/assets/images/'. $id_category->image;?>"></a>
                            </div>
                        </div>
                        <div class="down-content">
                            <a href="#">
                                <h4><?= $id_category->name;?></h4>
                            </a>
                            <?= number_format($id_category->price)." VNĐ";?>
                            <button type="submit" class="btn btn-success"><a style='color:white'
                                    href="productdetail.php">Mua</a></button>
                        </div>
                    </div>

                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>












    <?php include 'layout/footer.php'; ?>