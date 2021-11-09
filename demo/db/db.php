<?php 
   $username = 'root'; //tên đăng nhập CSDL
   $password = ''; // mật khẩu
   $options  = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
   //kết nối tới CSDL
   $connect = new PDO('mysql:host=localhost;dbname=casetudy2', $username, $password,$options);