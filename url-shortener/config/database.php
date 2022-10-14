<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'Amy');
define('DB_PASS', '123456');
define('DB_NAME', 'tiny_url');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($conn->connect_error) {
    die('Connection Failed ' . $conn->connect_error);
}


// class Database {
//     private $host;
//     private $dbname;
//     private $user;
//     private $pass;

//     function __construct(string $host, string $dbname, string $user, string $pass) {
//         $this->host = $host;
//         $this->dbname = $dbname;
//         $this->user = $user;
//         $this->pass = $pass;
//     }

//     public function connect() {
//         $conn_str = "mysql:host=". $this->host .";dbname". $this->dbname;

//         try {
//             $conn = new PDO($conn_str, $this->user, $this->pass);
//             $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//             echo "Connected successfully";

//             return $conn;
//         } catch (PDOException $e) {
//             echo "Connection failed: " .$e->getMessage();
//         }
//     }
// }