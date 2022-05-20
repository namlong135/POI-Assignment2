<?php
  session_start();
  $id = $_POST["delete"];
  $item_num = sizeof($_SESSION["cart"]);
  if($item_num <= 1) {
    unset($_SESSION["cart"]);
    header("Location: index.php");
  }
  else {
    unset($_SESSION["cart"][$id]);
    header("Location: cart.php");
  }
?>