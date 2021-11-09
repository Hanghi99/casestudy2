<?php 
include_once 'db/db.php';
include_once 'layout/header.php';
include 'defines.php' ;

$sql= "SELECT * From products";
$stmt=$connect->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$rows=$stmt->fetchAll();
?>


<div class="products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="filters">
                    <ul>
                        <li class="active" data-filter="*"><a href="#" class="nav-link dropdown-toggle arrow"
                                data-toggle="dropdown">Tất cả</a>
                            <ul class="dropdown-menu">
                                <li><a href="kinhdi.php">Kinh dị</a></li>
                                <li><a href="ngontinh.php">Ngôn tình</a></li>
                                <li><a href="vientuong.php">Khoa học viễn tưởng</a></li>
                                <li><a href="tranh.php">Truyện Tranh</a></li>
                                <li><a href="hai.php">Truyện hài</a></li>
                                <li><a href="tanvan.php">Tản văn</a></li>
                            </ul>
                        </li>
                        <li data-filter=".dev"><a href="sale.php">Khuyến mãi</a></li>
                      
                    </ul>
                </div>
            </div>
            <div class="col-md-12">
                <div class="filters-content">
                    <div class="row grid">
                        <!-- <div class="col-lg-4 col-md-4 all des"> -->
                        <?php foreach ($rows as $key => $products):
          
          ?>
                        <div class="col-lg-4 col-md-4 all des">
                            <div class="product-item">
                                <div class="row justify-content-center">
                                    <div class="col-md-7 pr-1">
                                        <a href="#"><img style="width:200px;height:200px;"
                                                src="<?php echo $root_url.'/assets/images/'. $products->image;?>"></a>
                                    </div>
                                </div>
                                <div class="down-content">
                                <a href="#">
                            <h4><a  href="productdetail.php?id=<?=$products->id ;?>"><?= $products->name;?></a></h4>
                                </a>
                                    <?= number_format($products->price)." VNĐ";?>
                                    <a  class="btn btn-success" style='color:white' href="addtocart.php?id=<?=$products->id ;?>" >Mua</a>
                                </div>
                            </div>

                        </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <ul class="pages">
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<?php include 'layout/footer.php'; ?>
