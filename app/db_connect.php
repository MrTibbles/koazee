<?  $connect = mysql_connect('mysql-55.int.mythic-beasts.com', 'vaughnmck', 'ecohraep');
    if (!$connect) {
        die('could not connect to database:'.mysql_error());    
    }
    mysql_select_db('vaughnmck',$connect);
?>


<?php
// $servername = "mysql-55.int.mythic-beasts.com";
// $username = "vaughnmck";
// $password = "ecohraep";
// $dbname = "vaughnmck";
// $tableName = "enquiries";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 

// // INSERT INTO  `vaughnmck`.`enquiries` (`email` ,`group` ,`destination` ,`date`)

// $sql = "INSERT INTO 'vaughnmck'.'enquiries' (email, group, destination, date)
// VALUES ('test@testing.com', '12', 'val_t', '4/04/2015')";

// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();
?>