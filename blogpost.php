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
                <h3 class="mt-title">Add Your Blog Post</h3>
                <p id="mt-upload-mess">

                </p>
                <form enctype="multipart/form-data" class="mt-add-post" id="mt-add-blogpost">
                    <input type="hidden" name="hidden" value="insert" id="mt-insert-update">
                    <div>
                        <lable for=" mt-title">Blog Title:</lable>
                        <input type="text" required name="title" placeholder="Enter Blog Title" id="mt-title"
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
                            <option value="publish">Published</option>
                            <option selected value="draft">Draft </option>
                            <option value="close">Closed</option>
                            <option value="delete">Deleted</option>
                        </select>
                        <span>*</span>
                    </div>
                    <div>
                        <lable for="mt-photo"> Cover Photo</lable>
                        <input type="file" name="photo" accept="image/*" id="mt-photo" class="mt-form-control">
                        <span class="option">(Optional)</span>
                        <img src="" class="form-control" alt="Sorry, there is no image" id="preview">
                    </div>
                    <div class="mt-post-editor">
                        <lable for="mt-content">Content</lable>
                        <textarea name="content" id="mt-content" rows="10" cols="80">
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
                        <button type="submit" class="mt-btn" name="saveButton" id="mt-btn-reg">Save<i class="far
                            fa-save"></i></button>
                    </div>
                    <input type="hidden" name="" id="mt-pid">
                </form>
                <script>
                CKEDITOR.replace('content');
                </script>
            </div>
            <hr>
        </main>
        <script src="js/jQuery.js"></script> scrip
        <script src="js/mt-mttech1.js"></script>
        <script src="js/mt-mttech2.js"></script>
        <script src="js/mt-mttech3.js"></script>
        <?php
if(isset($_GET['pid']) and !empty($_GET['pid'])){
        ?>
        <script>
        var ajaxEditBlogPost = (result, role) => {
            /***
            $('mt-insert-update').val('update'); is used to avoid 
            conflict with save button
                            **/
            $('#mt-insert-update').val('update');
            $('#mt-pid').val(result);

            $('#mt-btn-reg').html("Update <i class='fas fa-edit'> </i>");
            $.ajax({
                url: 'mt-blogpost.php',
                data: {
                    'row': result,
                    'data': role
                },
                type: 'POST',
                dataType: 'text'
            }).done((data) => {
                if (data === 'noEdit') {
                    alert('There may be error please try again ' + data);
                } else {
                    var row = JSON.parse(data);
                    $('#mt-title').val(row['title']);
                    CKEDITOR.instances['mt-content'].setData(row['content']);
                    $('#mt-cat').val(row['categorie']);
                    $('#mt-status').val(row['poststatus']);
                    $('img#preview').attr('src', row['coverpage']);
                    $('img#preview').show();
                    /***
                     * I don't know it is not working for some pid 
                     */
                    // alert(row['poststatus']);

                }
            }).fail(function(responseTxt, statusTxt, xhr) {
                alert(statusTxt);
            })

        }

        ajaxEditBlogPost(<?php echo $_GET['pid']; ?>, 'edit');
        </script>

        <?php }?>
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