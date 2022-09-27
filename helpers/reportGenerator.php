<?php
require_once("models/order.php");

class reportGenerator
{
    private array $orders;

    public function __construct(array $orders)
    {
        if (!isset($orders)){
            throw new \http\Exception\InvalidArgumentException("orders must be an array");
        }
        
        $this->orders;
    }

    public function generateReport(?array $options)
    {
        if ($options["candy"] ?? FALSE)
        {
            //TODO: Get "candy" comments
        }

        if ($options["callme"] ?? FALSE)
        {
            //TODO: Get "callme" comments
        }

        if ($options["referral"] ?? FALSE)
        {
            //TODO: Get "referral" comments
        }

        if ($options["signature"] ?? FALSE)
        {
            //TODO: Get "signature" comments
        }

        if ($options["misc"] ?? FALSE)
        {
            //TODO: Get the remaining comments
        }

        //TODO: Generate report based on options provided above
    }

}