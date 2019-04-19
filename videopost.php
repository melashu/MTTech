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

</head>

<body>
    <?php
session_start();
$_SESSION['username'] = "meshu";
// if($_SESSION['username']==null){
//     header("location: login.php");
// }
require_once 'admin-header.php';
require_once "mt-categorie.php";

?>
    <div class="mt-admin-container">
        <?php
require_once "adminsidemenu.php";
?>
        <main class="mt-admin-main">
            <div class="mt-add-post">
                <h3 class="mt-title">Upload Your Video Post</h3>

                <p id="mt-upload-mess">

                </p>

                <form action="" method="post" enctype="multipart/form-data" class="mt-add-post" id="mt-add-videopost">

                    <div>
                        <lable for="mt-title">Video Title</lable>
                        <input type="text" required name="title" placeholder="Enter Video Title" id="mt-title"
                            class="mt-form-control">
                        <span>*</span>
                    </div>
                    <div>
                        <lable for="mt-cat">Categorie: </lable>
                        <select name="cat" id="mt-cat" class="mt-form-control" required>
                            <option value="">..select..</option>
                            <?php
$cat = new ShowCat();
$result = $cat->getCat("");
foreach ($result as $row) {
    $display = "<option value=" . $row['cname'] . ">" . $row['cname'] . "</option>";
    echo $display;
}
;
?>
                        </select>
                        <span>*</span>
                        <button id="mt-btn-add-cat">Add Cat</button>
                    </div>
                    <div>
                        <lable for="mt-status">Post Status: </lable>
                        <select name="status" id="mt-status" required class="mt-form-control">
                            <option value="approve">Approve</option>
                            <option value="draft" selected>Draft</option>
                        </select>
                        <span>*</span>
                    </div>
                    <div>
                        <lable for="mt-type">Video Type: </lable>
                        <select name="type" id="mt-type" required class="mt-form-control">
                            <option value="Free" selected>Free</option>
                            <option value="Pro">Pro</option>
                        </select>
                        <span>*</span>
                    </div>
                    <div id="mt-video-price">
                        <lable for=" mt-price">Video Prices</lable>
                        <input type="number" disabled name="pro" placeholder="Enter Video Price" id="mt-price" value="0"
                            class="mt-form-control">
                        <span>*</span>
                    </div>
                    <div>
                        <lable for="mt-photo"> Cover Photo</lable>
                        <input type="file" required name="photo" accept="image/*" id="mt-photo" class="mt-form-control">
                        <span class="option">*</span>
                    </div>
                    <div>
                        <lable for="mt-video"> Upload Video</lable>
                        <input type="file" required name="video" accept="video/*" id="mt-video" class="mt-form-control">
                        <span class="option">*</span>
                    </div>
                    <div class="mt-post-editor">
                        <lable for="mt-content">Video Desciption</lable>
                        <textarea name="content" id="mt-content" required rows="10" cols="80">
            </textarea>
                        <!-- <script>
                        // Replace the <textarea id="editor1"> with a CKEditor
                        // instance, using default configuration.
                        CKEDITOR.replace('editor1');
                        </script> -->
                    </div>
                    <div class="mt-btn-container">
                        <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>"
                            id="mt-username">
                        <input type="hidden" value="0" id="mt-pro">
                        <button type=" submit" class="mt-btn" name="saveButton" id="mt-btn-upload">Upload<i class="far
                            fa-save"></i></button>
                    </div>
                </form>
                <script>
                CKEDITOR.replace('content');
                </script>
            </div>
            <hr>
        </main>

        <script src="js/mt-mttech1.js"></script>
        <script src="js/mt-mttech2.js"></script>
        <script src="js/mt-mttech3.js"></script>

</body>

</html>


<!-- <input name="cat" id="mt-cat" class="mt-form-control" required list="cat">
<datalist id="cat" class="mt-form-control">
    <?php
// $cat = new ShowCat();
// $result = $cat->getCat("");
// foreach ($result as $row) {
//     $display = "<option value=" . $row['cname'] . ">" . $row['cname'] . "</option>";
//     echo $display;
//}
;
?>

</datalist> -->