<?php
session_start();
 include_once "db/db.php";
    $alert = "";
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
     $email     = $_REQUEST['email'];
     $password  = $_REQUEST['password'];
    //  echo '<pre>';
    //  print_r($_REQUEST);
    //  die();
    //  echo $email ;
    $sql =  "SELECT * FROM users where email = '$email' AND password = '$password'";
    // echo $sql;
    // die();
    $stmt = $connect->query($sql);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    // var_dump($stmt);
    //lấy tất cả kết quả
    $row   = $stmt->fetch();
    //  var_dump($row);
    // var_dump($stmt->rowCount());
    if($row){
        $_SESSION['user'] = $row;
        $alert = "Đăng nhập thành công";
        header("Location:index.php");
    }else {
        $alert = "Vui lòng kiểm tra lại Email và Password";
    }
 }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body
    style="background-image: url('img/login.jpg'); background-size: cover; background-repeat: no-repeat">
    <div class="container">
        <div class="panel panel-primary"
            style="width:450px; margin:0px Auto; margin-top : 50px; background-color : white; padding :10px; border-radius:15px; box-shadow: 5px 10px #9966FF">
            <div class="panel-heading">
                <h2 class="text-center">Login</h2>
            </div>
            <div class="panel-body">
                <form method="post">

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input required="true" type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <labyel for="pwd">Password:</label>
                        <input required="true" type="password" class="form-control" id="password" name="password"
                            minlength="6">
                    </div>

                <p>Click <a href="register.php">here </a> to register </p>
                    <button class="btn btn-success" >Login</button>
                </form>
            </div>
        </div>
    </div>


</body>

</html>