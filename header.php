<?php
session_start();
include ("connect.php");
if (!isset($_SESSION["user_login"])) {
$username = "";
}
else {
$username = $_SESSION["user_login"];
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
          <div class="headerObject">
            <a href="#">Group 9 </a>
          </div>
          <div class="headerSearch">
            <form action="search.php" method="GET" id="search">
              <input type="text" name="q" size="60" placeholder="Search ..."/>
            </form>
          </div>

          <?php
          if (isset($_SESSION["user_login"])) {
          echo '
          <div class="headerObject">
            <a href="'.$username.'">Profile</a>
            <a href="logout.php">Logout</a>
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