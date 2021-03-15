<?php
include ("connect.php");

$post = $_POST['post'];
if ($post != "") {
$date_added = date("Y-m-d");
$post_username = "test123";

$sqlCommand = "INSERT INTO posts VALUES(NULL, '$post', '$date_added', '$post_username')";
$query = mysqli_query($conn, $sqlCommand) or die (mysqli_error($conn));
}
else {
echo "You must enter something in the post field before you can sent it.";
}