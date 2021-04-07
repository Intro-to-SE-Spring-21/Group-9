<?php
$reg = @$_POST['reg'];
$fn = ""; // First Name
$ln = ""; // Last Name
$un = ""; // Username
$pswd = ""; // Password

$u_check = ""; // Check if username exists
// Registration form
$fn = strip_tags(@$_POST['fname']);
$ln = strip_tags(@$_POST['lname']);
$un = strip_tags(@$_POST['username']);
$pswd = strip_tags(@$_POST['password']);

if ($reg) {
$u_check = mysqli_query($conn, "SELECT username FROM users WHERE username='$un'");
$check = mysqli_num_rows($u_check);
if ($check == 0) {
if ($fn&&$ln&&$un&&$pswd) {
if (strlen($un)>25||strlen($fn)>25||strlen($ln)>25) {
echo '<script>alert("The maximum limit for username/first name/last name is 25 characters.")</script>';
}
else {
if (strlen($pswd)>30||strlen($pswd)<5) {
echo '<script>alert("Your password must be between 5 and 30 characters long.")</script>';
}
else {
$pswd = md5($pswd);
$query = mysqli_query($conn, "INSERT INTO users VALUES (NULL, '$un', '$fn', '$ln', '$pswd')");
die("<h2>Welcome to Group-9</h2>Login to your account to get started.
    <META HTTP-EQUIV='refresh' CONTENT='2;URL=index.php'>");
}
}
}
else {
echo '<script>alert("Please fill in all of the fields.")</script>';
}
}
else {
echo '<script>alert("Username already taken.")</script>';
}
}