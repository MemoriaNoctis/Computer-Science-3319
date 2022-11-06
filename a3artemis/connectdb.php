<!--
    File: connectdb.php
    Description:  file used to connect to the database built for this assignment. Code is modified from the "connectdb.php" file from the PHP workshop from week 7.
-->

<?php
$dbhost = "localhost";
$dbuser= "root";
$dbpass = "cs3319";
$dbname = "assign2db";

$connection = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname);

if (mysqli_connect_errno()) {
     die("database connection failed :" .
     mysqli_connect_error() .
     "(" . mysqli_connect_errno() . ")"
         );
    }
?>
