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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $creator = $_POST["creator"];
    $amount = $_POST["amount"];
    $vendor = $_POST["vendor"];
    $date_requested = $_POST["date_requested"];

    // Create SQL INSERT query
    $sql = "INSERT INTO purchase (name, creator, amount, vendor, request_date) VALUES ('$name', '$creator', '$amount', '$vendor', '$date_requested')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully!";
        header("location:../index.php?mess=success");
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Add data to database logic (see next step)
}

?>