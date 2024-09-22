<!--Ojales, paul daniel AND Basa, dave jamir-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
</head>
<body>

    <?php

    require_once "database.php";
    require_once "dentalclasses.php";
    $addUser = new User;

    if(isset($_POST["login"])){
        $addUser->email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $addUser->password = filter_var($_POST['password'], FILTER_SANITIZE_EMAIL);
        $addUser->loginUser($addUser->password, $addUser->email);
    }
    ?>

<nav class="navbar navbar-expand-lg bg-body-tertiary py-3 fixed-top">
    <div class="container">
        <img src="assets/imgs/logo.jpeg" alt="Logo"/>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>

                <li class="nav-item"><a class="nav-link" href="#">Help</a></li>

            </ul>
        </div>
    </div>
</nav>


<section class="box-container">
    <form action="login.php" method="post">
        <h1 id="Title">Login to your account</h1>
        <h4 id="T-para">Login in now to find out the best dental service.</h4>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" placeholder="Enter your email" required><br>
        <label for="password">Password</label>
        <input type="password" id="password_bar" name="password" placeholder="Enter your password" required><br>
        <div class="forgot-remember">
                <div class="fpass">
                    <a href="forgot.html">Forgot Password?</a>
                </div>
                <div class="remember">
                    <input id="remember" type="checkbox">
                    <label for="remember">Remember Me</label>
                </div>
        </div>
        <button type="submit" name = "login" id="Login_button">Login</button>
        <div class="dha">
                <p>Dont Have an Account? <a href="client-reg.html">Signup</a></p>
        </div>
    </form>
</section>


</body>
</html>