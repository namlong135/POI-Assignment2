<?php
session_start();
$carData = $_POST;
$rentalDays = 1;
$id = $carData["id"];

$item = $carData;
$item["rentalDays"] = 1;
unset($item['id']);
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array(
        $id => $item,
    );
    $_SESSION["cart"][$id] = $item;
    echo('Add to the cart successfully');
} else if (!isset($_SESSION["cart"][$id])) {
    $_SESSION["cart"][$id] = $item;
    echo('Add to the cart successfully');
} else {
    echo('This car has already been added');
}
return;