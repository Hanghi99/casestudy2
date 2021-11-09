<?php 
include 'db/db.php';
if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    
    $fullname   = $_REQUEST['fullname'];
    $email      = $_REQUEST['email'];
    $password   = $_REQUEST['password'];
    // echo "<pre>";
    // print_r($_REQUEST);
    // die();
    if($fullname == "" && $email == "" && $password == "")
    {
      
        echo "Vui lòng nhập dữ liệu";
         
        }
    else
    {
        $created_at= $updated_at = date('Y-m-d H:s:i');//2021-11-02 08:26:00
        // lưu vào database
        $sql    = " INSERT INTO 
        users(fullname,email,role_id,created_at,`password`,updated_at) 
        VALUES 
        ('".$fullname."','".$email."',2,'".$created_at."','".$password."', '".$updated_at."'  ) 
        ";
       
        //thuc thi
        $connect->query($sql);
        //redirect
        header("Location: login.php");

 }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
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
                <h2 class="text-center">Register</h2>
            </div>
            <div class="panel-body">
            <form method="post" onsubmit="return validateForm();"> 
                <div class="form-group">
                    <label for="usr">FullName:</label>
                    <input required="true" type="text" class="form-control" id="usr" name="fullname">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input required="true" type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input required="true" type="password" class="form-control" id="password" name="password" minlength="6">
                </div>
                <div class="form-group">
                    <label for="confirmation_pwd">Confirmation Password:</label>
                    <input required="true" type="password" class="form-control" id="confirmation_pwd">
                </div>
                 <p>
                     <a href="login.php" >Tôi đã có tài khoản</a>
                </p>
                <button class="btn btn-success">Register</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){
            $password = $('#password').val();
            $confirmpwd = $('#confirmation_pwd').val();
            if($password != $confirmpwd){
                alert ("Password does not match, please check again ");
                return false
            }
            return true


        }
    </script>
 
</body>

</html>