<?php
session_start();
require_once '../classes/Auth.php';
//if(isset($_SESSION['id'])){
//    header("location: http://localhost:8080/crudoop/views/book/index.php");
//}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$authObj = new Auth();
$user = $authObj->login('*', 'users', ["email" => $_POST["email"]],$_POST['psw']);
// print_r($user);exit;
if (password_verify($_POST['psw'], $user->password)) {
    $_SESSION['id'] = $user->id;
    $_SESSION['email'] = $user->email;
    header("location: http://localhost:8080/crudoop/views/book/index.php");
} else {
    header("location: http://localhost:8080/crudoop/views/login.php");
}

}
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Login Form </title>
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>
    <body>
        <h2 class="login">Login Form</h2>
        <span><?php (isset($_SESSION['success'])) ? $_SESSION['success'] : ''; ?></span>
<!--            <div class="alert alert-success" role="alert">
              This is a success alert—check it out!
            </div>-->
        
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post" class="login-form">
            <span><?php (isset($_SESSION['success'])) ? $_SESSION['success'] : ''; ?></span>
            <div class="container">
                <label for="uname"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <button type="submit">Login</button>
                <div class="signupLink"> <b> Already logged in!  </b>
                    <a href="signup.php" class="signup_link">Sign Up!</a>
                </div>
            </div>

        </form>
    </body>
</html>