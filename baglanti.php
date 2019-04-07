<?php
/**
 * Server name, password, db name
 */
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

<style>
a {
  text-decoration: none;
}

a:hover {
  text-decoration: none;
}

table#t01 tr:nth-child(even) { /* Cift sayili row icin renk stili */
  background-color: #eee;
}

table#t01 tr:nth-child(odd) { /* Tek sayili row icin renk stili */
  background-color: #fff;
}

table#t01 th { /* th: TABLE HEADER */
  color: white;
  background-color: black; 
}
</style>