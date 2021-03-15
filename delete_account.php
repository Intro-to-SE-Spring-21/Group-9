<?php
include ("header.php");

if ($username) {
if (isset($_POST['no'])) {
    exit("<META HTTP-EQUIV='refresh' CONTENT='0;URL=home.php'>");
}
if (isset($_POST['yes'])) {
    $sql = mysqli_query($conn, "DELETE FROM users WHERE username='$username'");
    echo "Your Account has been deleted.";
    exit("<META HTTP-EQUIV='refresh' CONTENT='4;URL=logout.php'>");
}
}
else {
    die ("You must be logged in to view this page.");
}
?>

<br>
<center>
<form action="delete_account.php" method="POST">
Are you sure you want to delete your account?<br>
<input type="submit" name="no" value="No, take me back.">
<input type="submit" name="yes" value="Yes, I am sure.">
</form>
</center>