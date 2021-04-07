<?php
include ("header.php");

if ($user) {
if (isset($_POST['no'])) {
    exit("<META HTTP-EQUIV='refresh' CONTENT='0;URL={$user}'>");
}
if (isset($_POST['yes'])) {
    mysqli_query($conn, "DELETE FROM users WHERE username='$user'");
    mysqli_query($conn, "DELETE FROM posts WHERE added_by='$user'");
    mysqli_query($conn, "DELETE FROM posts WHERE user_posted_to='$user'");
    mysqli_query($conn, "DELETE FROM likes WHERE username='$user'");

    $allposts = mysqli_query($conn, "SELECT * FROM posts");

    while ($row = mysqli_fetch_assoc($allposts)) {
        $rowid = $row['id'];
        $likes = mysqli_query($conn, "SELECT * FROM likes WHERE postid=$rowid");
        $likesnum = mysqli_num_rows($likes);
        mysqli_query($conn, "UPDATE posts SET likes=$likesnum WHERE id=$rowid");
    }

    $alllikes = mysqli_query($conn, "SELECT * FROM likes");

    while ($rowlikes = mysqli_fetch_assoc($alllikes)) {
        $postid = $rowlikes['postid'];
        $exists = mysqli_query($conn, "SELECT * FROM posts WHERE id=$postid");
        $existsrows = mysqli_num_rows($exists);
        if ($existsrows == 0) {
            mysqli_query($conn, "DELETE FROM likes WHERE postid=$postid");
        }
        else {
            continue;
        }
    }

    echo "Your Account has been deleted.";
    exit("<META HTTP-EQUIV='refresh' CONTENT='2;URL=logout.php'>");
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