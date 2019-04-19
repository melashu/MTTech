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
        <div class="mt-reg">
            <h3 class="mt-title">Sign up and start learning</h3>

            <hr>

            <form action="" method="post" class="mt-reg-form" id="mt-reg-form">
                <p id="mt-reg-mess"></p>
                <a href="login.php" id="mt-reg-link">Sign in Here</a>
                <div>
                    <lable for="mt-full">Full Name:</lable>
                    <input type="text" required name="firstname" placeholder="Enter Full Name" id="mt-full"
                        class="mt-form-control">
                    <span>*</span>
                </div>
                <div>
                    <lable for="mt-email">Email:</lable>
                    <input type="email" name="email" placeholder="Enter Email Address" id="mt-email"
                        class="mt-form-control">
                    <span>*</span>
                </div>
                <div>
                    <lable for="mt-sex">Sex: </lable>
                    <select name="sex" id="mt-sex" class="mt-form-control">
                        <option value="">..select..</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>

                    </select>
                    <span>*</span>
                </div>
                <div>
                    <lable for="mt-phone"> Phone No:</lable>
                    <input type="tel" required name="phone" placeholder="Enter Phone Number" id="mt-phone"
                        class="mt-form-control">
                    <span>*</span>

                </div>
                <div>
                    <lable for="mt-un">User Name:</lable>
                    <input type="text" required name="username" placeholder="Enter UserName" id="mt-un"
                        class="mt-form-control">
                    <span>*</span>

                </div>
                <div>
                    <lable for="mt-pass">Password:</lable>
                    <input type="password" required name="password" placeholder="Enter Password" id="mt-pass"
                        class="mt-form-control">
                    <span>*</span>

                </div>
                <div>
                    <lable for="mt-confirm">Confirm Password:</lable>
                    <input type="password" required name="confirm" placeholder="Enter Password Again" id="mt-confirm"
                        class="mt-form-control">
                    <span>*</span>
                </div>
                <div>
                    <lable for="mt-prof">Proffession: </lable>
                    <select name="prof" id="mt-prof" class="mt-form-control">
                        <option value="">..select..</option>
                    </select>
                    <span>*</span>
                </div>
                <div>
                    <lable for="mt-apply">Apply For: </lable>
                    <select name="apply" id="mt-apply" class="mt-form-control">
                        <option value="">..select..</option>
                    </select>
                    <span>*</span>
                </div>
                <div class="mt-btn-container">

                    <button type="submit" class="mt-btn" name="saveButton" id="mt-btn-reg">Save<i class="far
                            fa-save"></i></button>


                </div>

            </form>
            <hr>
            <div class="mt-reg-footer">
                <span>Have you alrady account?</span> <a class="mt-sign-link" href="login.php">Sign in Here</a>
            </div>
            <div>
    </main>


    <footer class="mt-footer">

        <?php require_once "footer.php";?>

    </footer>
    <script src="js/mt-mttech1.js"></script>
    <script src="js/mt-mttech2.js"></script>
    <script src="js/mt-mttech3.js"></script>

</body>

</html>