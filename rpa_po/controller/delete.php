<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "rpa_po";

// Create connection
$conn = mysqli_connect($server, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected to database successfully!";


// Create SQL DELETE query
$sql = "DELETE from purchase";

// Execute the query
if (mysqli_query($conn, $sql)) {
    echo "Delete all successfully!";
    header("location:../index.php?mess=success_delete");
} else {
    echo "Error: " . mysqli_error($conn);
}

// Add data to database logic (see next step)


?>