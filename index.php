<?php
require_once("data/orderRepository.php");
require_once("helpers/reportGenerator.php");
require_once("models/order.php");

$repo = new orderRepository();

$orders = $repo->getAllOrders();

$generator = new reportGenerator($orders);

$generator->generateReport();