<?php
include ("header.php");
echo "Hello, ".$username;
echo "<br> Would you like to logout? <a href='logout.php'>Logout</a>";
?>

<form action="delete_account.php" method="POST">
    <p>DELETE ACCOUNT:</p><br>
    <input type="submit" name="deleteaccount" id="deleteaccount" value="Delete My Account"/>
</form>