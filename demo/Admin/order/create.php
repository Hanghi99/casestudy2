<?php include '../../db/db.php' ?>
<?php 

    if ($_SERVER['REQUEST_METHOD']=='POST')
{

    // echo "<pre>";
    // print_r($_REQUEST);
    // echo "</pre>";
    $customer_id = $_POST['customer_id'];
    $email = $_POST['email'];
    $total = $_POST['total'];
    
    if($customer_id == "" ||$email == "" ||$password == "")
    {
      
        echo "Vui lòng nhập dữ liệu";
         
        }
    else
    {
        $order_date= date('Y:m:d');
        // lưu vào database
        $sql    = " INSERT INTO orders(customer_id,email,total,order_date) VALUES ('".$customer_id."','".$email."', '".$total."','".$order_date."'  ) ";
        $connect->query($sql);
        echo $sql;
    
    
    
    
    
    header("Location: index.php");
    }
 } ?>


<?php include "../layouts/header.php"?>
                <h2 class="text-center">Thêm mới danh mục </h2>
            </div>
            <div class="panel-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="usr">Customer_id:</label>
                        <input type="text" class="form-control" name="customer_id">
                    </div>
                    <div class="form-group">
                        <label for="usr">Email:</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="usr">Total:</label>
                        <input type="text" class="form-control" name="total">
                    </div>
                    
                   

                    <button class="btn btn-success" type="submit">Lưu</button>
            </div>
            </form>
        </div>
        </tbody>
        </table>

    </div>
<?php include '../layouts/footer.php'?>