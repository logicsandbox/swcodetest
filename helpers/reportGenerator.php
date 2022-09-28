<?php
require_once("models/order.php");

class reportGenerator
{
    /** @var order[] */
    private array $orders;

    private const CANDY_REPORT_TITLE = "Candy";
    private const CALL_REPORT_TITLE = "Call Me / Do Not Call Me";
    private const REFERRAL_REPORT_TITLE = "Referrals";
    private const SIGNATURE_REPORT_TITLE = "Signature Requests";
    private const MISC_REPORT_TITLE = "Miscellaneous";

    private const CANDY_PATTERN = "/\bcandy|candies\b/";
    private const CALL_PATTERN = "/\bcalls?\b/";
    private const REFERRAL_PATTERN = "/\brefer/";
    private const SIGNATURE_PATTERN = "/\bsign/";

    public function __construct(array $orders)
    {
        if (!isset($orders)) {
            throw new \http\Exception\InvalidArgumentException("orders must be an array");
        }

        $this->orders = $orders;
    }

    public function generateReport()
    {
        $ordersDictionary = array(
            new dictionaryItem(self::CANDY_REPORT_TITLE, self::CANDY_PATTERN),
            new dictionaryItem(self::CALL_REPORT_TITLE, self::CALL_PATTERN),
            new dictionaryItem(self::REFERRAL_REPORT_TITLE, self::REFERRAL_PATTERN),
            new dictionaryItem(self::SIGNATURE_REPORT_TITLE, self::SIGNATURE_PATTERN),
        );

        foreach ($this->orders as $order)
        {
            $comments = $order->getComments();

            foreach ($ordersDictionary as $dictionaryItem)
            {
                //Don't break on match in case a comment fulfills multiple requirements
                if (preg_match($dictionaryItem->pattern, $comments)){
                    $dictionaryItem->orderList[$order->getId()] = $order;
                }
            }
        }

        print_r($ordersDictionary);
    }

}

class dictionaryItem
{
    public function __construct(public string $reportTitle, public string $pattern, public array $orderList = array()) { }
}