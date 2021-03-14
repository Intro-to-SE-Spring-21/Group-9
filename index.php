<!DOCTYPE html>
<html>
  <head>
    <title>Group 9</title>
    <link rel="stylesheet" type="text/css" href="./mysite/CSS/style.css"/>
  </head>
  <body>
    <div class="header">
      <div class="headerWrapper">
        <div class="headerLogo">
          Group-9
        </div>
        <div class="headerSearch">
          <form action="./PHP/search.php" method="GET" id="search">
            <input type="text" name="q" size="60" placeholder="Search ..."/>
          </form>
        </div>
        <div class="headerMenu">
          <a href="#" >Home</a>
          <a href="#" >About</a>
          <a href="#" >Create Account</a>
          <a href="#" >Sign In</a>
        </div>
      </div>
    </div>

<?php include ("./mysite/PHP/connect.php"); ?>
<?php include ("./mysite/PHP/register.php"); ?>

    <div class="tableWrapper">
      <table>
        <tr>
          <td width="50%" valign="top">
            <h2>Join Group-9 Today</h2>
          </td>
          <td width="50%" valign="top">
            <h2>Create Account Below</h2>
            <form action="#" method="POST">
              <input type="text" name="fname" size="25" placeholder="First Name"/><br><br>
              <input type="text" name="lname" size="25" placeholder="Last Name"/><br><br>
              <input type="text" name="username" size="25" placeholder="username"/><br><br>
              <input type="text" name="password" size="25" placeholder="Password"/><br><br>
              <input type="submit" name="reg" value="Create Account"/>

            </form>
          </td>
        </tr>
      </table>
    </div>
  </body>
</html>