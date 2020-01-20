<?php
// $mysql_hostname = "localhost";
// $mysql_user = "root";
// $mysql_password = "";
// $mysql_database = "dbgadget";
// $prefix = "";
// $bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password,$mysql_database) //or die("Could not connect database");
// mysql_select_db(, $bd) or die("Could not select database");

// $servername = "localhost";
// $username = "root";
// $password = "";

// try {
//     $conn = new PDO("mysql:host=$servername;dbname=dbgadget", $username, $password);
//     // set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Connected successfully";
//     }
// catch(PDOException $e)
//     {
//     echo "Connection failed: " . $e->getMessage();
//     }

$servername = "localhost";
$username = "root";
$password = "";
$mysql_database = "dbgadget";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $mysql_database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";


?>