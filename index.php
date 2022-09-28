<?php
require_once("data/orderRepository.php");
require_once("helpers/orderParser.php");
require_once("models/order.php");

$repo = new orderRepository();

$orders = $repo->getAllOrders();

//Task 1
$parser = new orderParser($orders);

print($parser->generateOrderCommentReport());

//Task 2
$updatedOrders = $parser->parseAndUpdateExpectedShippingDates();

foreach ($updatedOrders as $order)
{
    $repo->updateOrder($order);
}

$repo->disconnect();