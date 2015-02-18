<?php
$servername = "mysql-55.int.mythic-beasts.com";
$username = "vaughnmck";
$password = "ecohraep";
$dbname = "vaughnmck";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST[email];
$group_size = $_POST[group_size];
$destination = $_POST[destination];
$dates = $_POST[dates];

// /VALUES ($_POST[email], $_POST[group_size], $_POST[destination], $_POST[dates])";
$sql = "INSERT INTO enquiries (user_email, group_size, hol_destination, desired_dates)
VALUES ('$email', '$group_size', '$destination', '$dates')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: http://www.koazee.co");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    header("Location: http://www.koazee.co");
}

mysqli_close($conn);
?>