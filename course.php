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
    <script src="js/ckeditorBasic/ckeditor.js"></script>
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/jquery-ui.structure.css">
    <link rel="stylesheet" href="css/jquery-ui.theme.css">
</head>

<body>
    <?php
//echo 'meshu with tgt';
require_once 'header.php';
?>
    <div class="mt-admin-container">
        <?php
require_once 'coursemenu.php';
?>
        <main class="mt-course-main">

            <!--  <main class="mt-admin-main"> -->
            <h1><i class="fas fa-hand-scissors"></i> Search the content you want</h1>
            <h3 class="mt-course-title"></h3>
            <hr>
            <p class="mt-course-author"></p>
            <p class="mt-course-postdate"></p>
            <p class="mt-course-lastupdate"></p>
            <hr class="mt-hr">

            <img class="mt-coverimage" alt="Sorry the image could display now">
            <section class="mt-course-content">

            </section>
            <hr class="mt-hr">
            <section>
                <form class="mt-blog-comment">
                    <div>
                        <label for="mt-email">Your Email</label>
                        <input type="email" required name="" id="mt-email" class="mt-form-control"
                            placeholder="Your Email">
                    </div>
                    <div>
                        <label for="mt-comment">Your Message</label>
                        <textarea placheholder="Your Message" id="mt-comment" cols="30" rows="10"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="mt-btn" name="saveButton" id="mt-btn-reg">Send<i class="far
                            fa-save"></i></button>

                    </div>
                </form>
            </section>

        </main>
    </div>
    <script>
    CKEDITOR.replace('mt-comment');
    </script>
    <footer class=" mt-footer">

        <?php require_once "footer.php";?>

    </footer>
    <script src="js/jQuery.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/mt-mttech1.js"></script>
    <script src="js/mt-mttech2.js"></script>
    <script src="js/mt-mttech3.js"></script>

</body>

</html>