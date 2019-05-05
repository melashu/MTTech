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
                    <option value="published">Published</option>
                    <option value="draft">Draft </option>
                    <option value="closed">Closed</option>
                    <option value="deleted">Deleted</option>
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
                        <th>Package Price</th>
                        <th>Views</th>
                    </tr>
                </thead>
                <tbody id="mt-tbody-video">

                </tbody>
            </table>


            <br>
            <hr>
            <div id="mt-display">

                <div id="mt-review-blog">
                    <p class=" mt-last-view" id="mt-author">
                    </p>
                    <p class="mt-last-view" id="mt-post-date">

                    </p>
                    <p class="mt-last-view" id="mt-last-update">

                    </p>
                    <p class="mt-last-view" id="mt-post-categorie">

                    </p>
                    <br>
                    <h2 class="mt-blog-title" id="mt-blog-title">

                    </h2>
                    <br>
                    <div id="mt-view-content">

                    </div>
                </div>
                <div id="mt-review-video">
                    <p class="mt-last-view" id="mt-video-author">
                    </p>
                    <p class="mt-last-view" id="mt-video-post-date">

                    </p>
                    <p class="mt-last-view" id="mt-video-last-update">

                    </p>
                    <p class="mt-last-view" id="mt-video-post-categorie">

                    </p>

                    <h2 class="mt-blog-title" id="mt-video-blog-title">

                    </h2>
                    <br>
                    <div id="mt-view-content">
                        <video class="mt-view-video" id="mt-preview-video" controls>
                        </video>
                        <p>The prices is </p>

                    </div>
                </div>

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