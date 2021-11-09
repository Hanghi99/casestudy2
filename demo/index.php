<?php 
include_once 'db/db.php';
include_once 'layout/header.php';
include 'defines.php' ;

$sql= "SELECT * From products";
$stmt=$connect->query($sql);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$rows=$stmt->fetchAll();
?>

<div class="latest-products">
    <div class="container">
        <div class="row">
            
            <?php foreach ($rows as $key => $products):
          
            ?>
            <div class="col-md-4">
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


<div class="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-content">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>Creative &amp; Unique <em>Sixteen</em> Products</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite
                                author nulla.</p>
                        </div>
                        <div class="col-md-4">
                            <a href="#" class="filled-button">Purchase Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'layout/footer.php'?>