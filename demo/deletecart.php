<?php
session_start();
 echo'<pre>';
 print_r($_REQUEST);
 echo'</pre>';
 $id = ( isset( $_REQUEST['id']) && !empty( $_REQUEST['id']))?$_REQUEST["id"]:'';
 unset($_SESSION['cart'][$id]); 
 header('Location: cart.php');
