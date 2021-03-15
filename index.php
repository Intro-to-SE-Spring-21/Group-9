<?php
include ("header.php");
include ("register.php");
include ("login.php");
?>

    <div class="tableWrapper">
      <table>
        <tr>
          <td width="50%" valign="top">
            <h2>Login</h2>
            <form action="index.php" method="POST">
              <input type="text" name="user_login" size="25" placeholder="username"/><br><br>
              <input type="text" name="password_login" size="25" placeholder="Password"/><br><br>
              <input type="submit" name="login" value="Login"/>
            </form>
          </td>
          <td width="50%" valign="top">
            <h2>Create Account Below</h2>
            <form action="index.php" method="POST">
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
