<?php
session_start();
include ("connect.php");
if (!isset($_SESSION["user_login"])) {
$user = "";
}
else {
$user = $_SESSION["user_login"];
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Group 9</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
  </head>
  <body>
    <div class="header">
        <div class="headerWrapper">
          <div id="headerTitle">
            <a href="index.php">Group 9 </a>
          </div>
          
          <div class="headerSearch">
            <form action="search.php" method="POST" id="search">
              <input type="text" name="q" size="60" placeholder="Search for user ..."/>
              <input type="submit" name="qsubmit" value="">
            </form>
          </div>
          

          <?php
          if (isset($_SESSION["user_login"])) {
          echo '
          <div class="headerObject">
            <a href="'.$user.'">Profile</a>
            <a href="logout.php">Logout</a>
            <form action="delete_account.php" method="POST">
              <input type="submit" name="deleteaccount" value="Delete Account" style="font-size: 22px;"/>
            </form>
          </div>
          ';
          }
          else
          {
            echo '
            <div class="headerObject">
              <a href="index.php">Create Account </a>
              <a href="index.php">Login </a>
            </div>
            ';
          }
          ?>

        </div>
      </div>
    </div>