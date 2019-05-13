<?php
/**
 * Server name, password, db name
 */
// $servername = "www.remotemysql.com";
// $username = "S0STwKnucp";
// $password = "UcufjA165k";
// $dbname = "S0STwKnucp";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn,"utf8");
?>