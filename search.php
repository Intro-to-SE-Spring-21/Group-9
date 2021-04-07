<?php
    include ("connect.php");

    $search = $_POST['q'];

    $searchquery = mysqli_query($conn, "SELECT * FROM users WHERE username='$search'");
    $searchnum = mysqli_num_rows($searchquery);

    if ($searchnum) {
        exit("<META HTTP-EQUIV='refresh' CONTENT='0;URL={$search}'>");
    }
    else {
        header("location:javascript://history.go(-1)");
        exit();
    }
?>