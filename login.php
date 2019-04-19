<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="image/logo3.png" rel="shourtcut icon">
    <link rel="stylesheet" href="css/mt-style1.css">
    <link rel="stylesheet" href="css/mt-login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mt-icon-font.css">

</head>

<body>
    <?php
require_once 'header.php';
?>

    <main class="mt-main">
        <!-- <div class="mt-login"> -->

        <form action="" method="post" class="mt-login-form">

            <h3 class="mt-title">Login Here</h3>
            <br>
            <hr>
            <br>

            <div>
                <lable for="mt-un">User Name:</lable>
                <input type="text" required name="username" placeholder="Enter UserName" id="mt-un"
                    class="mt-form-control">
            </div>
            <div>
                <lable for="mt-pass">Password:</lable>
                <input type="password" required name="password" placeholder="Enter Password" id="mt-pass"
                    class="mt-form-control">
            </div>
            <div>
                <a href="register.php" class="mt-sign-link">Sign Up Here</a>
                <button type=" submit" class="mt-btn" name="loginButton">Login
                    <i class="fas fa-sign-in-alt"></i>
                </button>
                <br>
                <hr>
                <br>
                <lable></lable><a href="forgot.php" class="mt-link">Forgot Password?</a>
            </div>
        </form>
        <!-- <div> -->
    </main>


    <footer class="mt-footer">

        <?php require_once "footer.php"; ?>

    </footer>
    <script src="js/mt-mttech1.js"></script>
    <script src="js/mt-mttech2.js"></script>
    <script src="js/mt-mttech3.js"></script>

</body>

</html>