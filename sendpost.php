<?php
include ("connect.php");

$post = $_POST['post'];
if ($post != "") {
$date_added = date("Y-m-d");
$added_by = "test123";
$user_posted_to = "test123";

$sqlCommand = "INSERT INTO posts VALUES(NULL, '$post', '$date_added', '$added_by', '$user_posted_to')";
$query = mysqli_query($conn, $sqlCommand) or die (mysqli_error($conn));
}
else {
echo "You must enter something in the post field before you can sent it.";
}