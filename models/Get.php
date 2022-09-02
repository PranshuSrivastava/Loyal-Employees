<?php
class Get
{
    // database variables
    private $conn;
    private $table = 'Employees';

    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get Values
    public function read()
    {
        // Create query
        $query =
            'SELECT * FROM ' . $this->table;

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }
}

