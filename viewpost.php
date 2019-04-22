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
    <script src="js/ckeditor/ckeditor.js"></script>

</head>



<body>
    <?php
require_once 'admin-header.php';
?>
    <div class="mt-admin-container">
        <?php
require_once "adminsidemenu.php";
require_once "mt-blogpost.php";
require_once "mt-videopost.php";

$blogPost = new BlogPost();
$videoPost = new VideoPost();
?>
        <main class="mt-admin-main">
            <!-- <h2 id="mt-title"></h2> -->
            <h1 class="mt-title">View all your post here</h1>
            <br>
            <hr>
            <div>
                <select class="mt-form-control" id="mt-view-post">
                    <option value="blog" selected>Blog Post</option>
                    <option value="video">Video Post</option>
                </select>
                <br>
                <select class="mt-form-control" id="mt-view-update">
                    <option value="">..Select..</option>
                    <option value="publish">Publish</option>
                    <option value="draft">Draft </option>
                    <option value="close">Close</option>
                    <option value="delete">Delete</option>
                </select>
                <button id="mt-btn-apply">Apply</button>
                <!-- <span id="mt-view-span" style="color:red,display:none,font-size:10px;">Select one please</span> -->
                <br>
                <input type="search" name="" id="mt-search" placeholder="Search you want" class="mt-form-control">
                <input type="checkbox" name="" id="mt-for-del" value="1">
                <label for="mt-for-del">Click here to
                    edit,delete and view</label>

            </div>
            <table border="1" class="mt-table-post" id="mt-blog-table">
                <thead>
                    <tr id="first">
                        <th>
                            <input type="checkbox" id="mt-1-checked"> All
                        </th>
                        <th>Title</th>
                        <th>Categorie</th>
                        <th>Post Date</th>
                        <th>Status</th>
                        <th>View Post</th>
                        <th>Edit</th>
                        <th>Delete
                        </th>
                        <th>Views</th>
                    </tr>
                </thead>
                <tbody id="mt-tbody-blog">

                </tbody>
            </table>
            <table border="1" class="mt-table-post" id="mt-video-table">
                <thead>
                    <tr id="first">
                        <th>
                            <input type="checkbox" id='mt-2-checked'>
                        </th>
                        <th>Title</th>
                        <th>Categorie</th>
                        <th>Post Date</th>
                        <th>Status</th>
                        <th>View Post</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Downloads</th>
                        <th>Price</th>
                        <th>Views</th>
                    </tr>
                </thead>
                <tbody id="mt-tbody-video">

                </tbody>
            </table>
            <br>
            <hr>
            <div id="mt-display">

                <script>
                function show() {

                }
                show();
                </script>
                <p class="mt-last-view">Author:
                </p>
                <p class="mt-last-view">
                    Post Date:
                </p>
                <p class="mt-last-view">
                    Last Update:
                </p>
                <p class="mt-last-view">
                    Categorie
                </p>

                <h2 class="mt-blog-title">
                    Title:-
                </h2>
                <br>
                <div id="mt-view-content">

                </div>


                <?php


if (isset($_GET['pid']) and !empty($_GET['pid'])) {
    $row = $videoPost->getVideoPost($_GET['pid']);
    if ($row != null) {
        ?>
                <script>
                function show() {
                    var display = document.getElementById('mt-display');
                    display.scrollIntoView();
                }
                show();
                </script>
                <p class="mt-last-view">Author:
                    <?php echo " " . $row['username']; ?></p>
                <p class="mt-last-view">
                    Post Date: <?php echo " " . $row['postdate']; ?>
                </p>
                <p class="mt-last-view">
                    Last Update: <?php echo " " . $row['lastupdate']; ?>
                </p>
                <p class="mt-last-view">
                    Categorie:- <?php echo " " . $row['categorie']; ?> Video
                </p>

                <h2 class="mt-blog-title">
                    Title:- <?php echo " " . $row['title']; ?> Video Tutorial
                </h2>
                <br>
                <div id="mt-view-content">
                    <video class="mt-view-video" src="<?php echo $row['content']; ?>" controls
                        poster="<?php echo $row['coverpage']; ?>">
                    </video>
                    <p>The prices is </p>

                </div>
                <?php
}
}
?>
            </div>
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