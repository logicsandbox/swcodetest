<?php

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
        //TODO: return all orders in table
        throw new BadMethodCallException();
    }

    public function searchOrdersByComment(string $commentSearchString) : array
    {
        //TODO: return orders with comments matching search string
        throw new BadMethodCallException();
    }
}