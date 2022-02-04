<?php
session_start();
require_once '../classes/Auth.php';
if (isset($_SESSION['id'])) {
    header("location: index.php");
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $auth = new Auth();
    $post = array(
        "name" => $_POST['name'],
        "username" => $_POST['username'],
        "email" => $_POST['email'],
        "password" => password_hash($_POST['password'], PASSWORD_DEFAULT),
    );
    $result = $auth->registerUser($post);
    if ($result) {
        $_SESSION['success']="registration Succeful!";
        header("location: login.php");
    } else {
        header("location: ".$_SESSION['PHP_SELF']);
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

        <form action="<?= $_SERVER['PHP_SELF'] ?>" class="signupform" method="POST" >
            <div class="container">
                <h1>Sign Up</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>

                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="Enter Email" name="name" required>

                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter Email" name="username" required>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="pswRepeat" required>


                <div class="clearfix">
                    <button type="submit" class="signupbtn">Sign Up</button>
                </div>
            </div>
        </form>

    </body>
</html>