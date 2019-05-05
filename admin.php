<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="image/logo3.png" rel="shourtcut icon">
    <link rel="stylesheet" href="css/mt-style1.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mt-icon-font.css">

</head>

<body>
    <?php
   //echo 'meshu with tgt';
require_once 'admin-header.php';
?>
    <div class="mt-admin-container">
        <?php
require_once "adminsidemenu.php";
require_once "mt-blogpost.php";
?>
        <main class="mt-admin-main">
            <h1>On development....by </h1>
        </main>
    </div>
    <footer class="mt-footer">

        <?php require_once "footer.php";?>

    </footer>
    <script src="js/jQuery.js"></script>
    <script src="js/mt-mttech1.js"></script>
    <script src="js/mt-mttech2.js"></script>
    <script src="js/mt-mttech3.js"></script>

</body>

</html>