<?php 
if (isset($_POST["user_login"]) && isset($_POST["password_login"])) {
	$user_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["user_login"]); // filter everything but numbers and letters
    $password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password_login"]); // filter everything but numbers and letters
	$md5password_login = md5($password_login);
    $sql = mysqli_query($conn, "SELECT username FROM users WHERE username='$user_login' AND password='$md5password_login'"); // query the person
	//Check for their existance
	$userCount = mysqli_num_rows($sql); //Count the number of rows returned
	if ($userCount == 1) {
		while($row = mysqli_fetch_array($conn, $sql)){ 
             $un = $row["username"];
	    }
		$_SESSION["user_login"] = $user_login;
        header("location: home.php");
        exit("<meta http-equiv=\"refresh\" content=\"0\">");
	} else {
		echo 'That information is incorrect, try again';
	}
}
?>