<?php
require_once("data/orderRepository.php");
require_once("helpers/orderParser.php");
require_once("models/order.php");

$repo = new orderRepository();

$orders = $repo->getAllOrders();

//Task 1
$generator = new orderParser($orders);

print($generator->generateOrderCommentReport());

//Task 2

