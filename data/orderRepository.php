<?php
require_once("models/order.php");

class orderRepository
{
    private const DATABASE_HOST = "localhost";
    private const DATABASE_NAME = "sweetwater";
    private const USERNAME = "root";
    private const PASSWORD = "password";

    private PDO $conn;

    public function __construct()
    {
        try
        {
            $this->conn = new PDO("mysql:host=".self::DATABASE_HOST.";dbname=".self::DATABASE_NAME,
                        self::USERNAME,
                self::PASSWORD);
        }
        catch (PDOException $e)
        {
            print("Failed: " . $e->getMessage());
            die();
        }
    }

    public function getAllOrders() : array
    {
        try
        {
            $orders = array();

            $statement = $this->conn->prepare("SELECT * FROM sweetwater_test");
            $statement->execute();

            foreach($statement as $row)
            {
                $orders[] = new order($row["orderid"], $row["comments"], new DateTime($row["shipdate_expected"]));
            }

            return $orders;
        }
        catch (Exception $e)
        {
            print("Failed: " . $e->getMessage());
            die();
        }
    }

    public function updateOrder(order $order) : void
    {
        $query = "UPDATE sweetwater_test SET comments = :comments, shipdate_expected = :shipdate WHERE orderid = :orderid";

        $statement = $this->conn->prepare($query);
        $statement->bindValue(":comments", $order->getComments());
        $statement->bindValue(":shipdate", $order->getShipdateExpected());
        $statement->bindValue(":orderid", $order->getId());

        $statement->execute();
    }
}