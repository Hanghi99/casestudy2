<?php  
  if (!session_id()) {
    session_start();
}

$product_id = (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) ? $_REQUEST['id'] : "";//13
    // $cart = (isset($_SESSION['cart']) ? $_SESSION['cart'] :[]);
    // $cart[$_REQUEST["id"]] = $_REQUEST["id"];
    // $cart[$_GET["id"]] = $_GET['id'];
    // $_SESSION['cart'] = $cart;
    // header("Location:cart.php?id=".$id."");
    // die();
 

// session_destroy();
// die();
//$product_id = $_REQUEST['product_id'];
$quantity = 1;
$cart = (isset($_SESSION["cart"])) ? $_SESSION["cart"] : [];

/*
[
    [13] => 2,
    [14] => 2
]

[
    [0] => 13,
    [1] => 14
]

13,14
*/

if (isset($cart[$product_id])) {
    // var_dump(123);
    $cart[$product_id] += $quantity;
} else {
    $cart[$product_id] = $quantity;
}
$_SESSION["cart"] = $cart;
// echo "<pre>";
// print_r($_SESSION["cart"]);
// echo "</pre>";
// die();
header("location:cart.php");
die(); 