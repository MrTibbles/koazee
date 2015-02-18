
<?php
$servername = "mysql-55.int.mythic-beasts.com";
$username = "vaughnmck";
$password = "ecohraep";
$dbname = "vaughnmck";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
var_dump($conn);
die();

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO enquiries (email, group, destination, dates)
VALUES ('$_POST[email]', '$_POST[group_size]', '$_POST[destination]', '$_POST[dates]')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>