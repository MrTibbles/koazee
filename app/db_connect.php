<?php
//Connecting to sql db.
$connect = mysqli_connect("mysql-55.int.mythic-beasts.com'","vaughnmck","ecohraep","vaughnmck");

//Sending form data to sql db.
mysqli_query($connect,"INSERT INTO posts (category, title, contents, tags)
VALUES ('$_POST[post_category]', '$_POST[post_title]', '$_POST[post_contents]', '$_POST[post_tags]')";

?>