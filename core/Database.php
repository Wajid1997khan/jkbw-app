<?php
/*
* @AUTOR :WAJID ALI JAVID KHAN
- Created : 16 July 2025
*/
class Database {
    private static $instance = null;
    private $connection;
    
    private $host = "localhost"; // Change this if your database is on another server
    private $dbname = "kbwu"; // Replace with your database name
    private $username = "root"; // Your MySQL username
    private $password = ""; // Your MySQL password

    private function __construct() {
        try {
            $this->connection = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }// Closed Func.

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }//Closed Func.

    public function getConnection() {
        return $this->connection;
    }//Closed Func.
}//End Class
?>
