<?php include '../../db/db.php' ?>
<?php 

    if ($_SERVER['REQUEST_METHOD']=='POST')
{

    // echo "<pre>";
    // print_r($_REQUEST);
    // echo "</pre>";
    $name = $_POST['name'];
    
    if($name == "" )
    {
      
        echo "Vui lòng nhập dữ liệu";
         
        }
    else
    {
        $created_at= $update_at = date('Y:m:d H:s:i');
        // lưu vào database
        $sql    = " INSERT INTO category(name,created_at,updated_at) VALUES ('".$name."','".$created_at."', '".$update_at."'  ) ";
        $categorylist = $connect->query($sql);
        echo $sql;
    
    
    
    // trả về dữ liệu
    $categorylist->setFetchMode(PDO::FETCH_OBJ);
    $row    = $categorylist->fetch();
    header("Location: index.php");
    }
 } ?>


<?php include "../layouts/header.php"?>
                <h2 class="text-center">Thêm mới danh mục </h2>
            </div>
            <div class="panel-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="usr">Tên danh mục:</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <button class="btn btn-success" type="submit">Lưu</button>
            </div>
            </form>
        </div>
        </tbody>
        </table>

    </div>
<?php include '../layouts/footer.php'?>