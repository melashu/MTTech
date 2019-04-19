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
// if($_SESSION['username']==null){
//     header("location: login.php");
// }
require_once 'admin-header.php';
?>
    <div class="mt-admin-container">
        <?php
require_once "adminsidemenu.php";
?>
        <main class="mt-admin-main">
            <div class="mt-cat">
                <div>
                    <form action="" class="mt-admin-form" id="mt-admin-reg-cat" method="post">
                        <h2 class="mt-title">Add Your Post Categorie</h2>
                        <div>
                            <label for="mt-cat">Categorie Name</label>
                            <input required type="text" class="mt-form-control" placeholder="Add Categorie" id="mt-cat">
                        </div>
                        <div class="mt-btn-container">


                            <button type="submit" class="mt-btn" name="saveButton" id="mt-admin-cat">Save<i class="far
                            fa-save"></i></button>

                        </div>

                    </form>
                    <br>
                    <p id="mt-reg-mess"></p>
                </div>
                <div>

                    <?php
require_once "mt-categorie.php";
$cat = new ShowCat();
$cname = "";
$cid = "";
if (isset($_GET['updatecid'])) {
 
                     $result=$cat->getCat($_GET['updatecid']);
                        $cname = $result['cname'];
                        $cid = $result['cid'];

                        }
                        ?>
                    <form action="" class="mt-admin-form" id="mt-admin-update-cat" method="post">
                        <h2 class="mt-title">Update Your Post Categorie</h2>
                        <div>
                            <label for="mt-cat-update">Categorie Name</label>
                            <input type="text" value="<?php echo $cname ?>" id="mt-cat-update" class="mt-form-control"
                                placeholder="Update Categorie">
                            <input type="hidden" value="<?php echo $cid ?>" id="mt-hidden">
                        </div>
                        <div class="mt-btn-container">

                            <button type="submit" class="mt-btn" name="updateButton" id="mt-admin-up">Update<i class="far
                            fa-save"></i></button>

                        </div>
                    </form>

                    <p id="mt-up-mess"></p>
                </div>
            </div>
            <hr>

            <div class="mt-table-container">
                <table border="1">
                    <tr id="first">
                        <th>ID</th>
                        <th>Categorie</th>
                        <th>Edit</th>
                        <th>Remove</th>
                    </tr>
                    <?php

$result = $cat->getCat("");
foreach ($result as $row) {
    $display = "<tr>
 <td>" . $row['cid'] . "</td>
 <td>" . $row['cname'] . "</td>
 <td><a href=categorie.php?updatecid=" . $row['cid'] . " class='catlink'>Edit</a></td>
 <td><a href=" . "categorie.php?deletecid=" . $row['cid'] . " class='catlink'>Remove</a></td>
 </tr>
 ";
    echo $display;
}
if(isset($_GET['deletecid']) and !empty($_GET['deletecid'])){
$cat = new ShowCat();
$check=$cat->deleteCat($_GET['deletecid']);
if($check){
    ?>

                    <script>
                    var message = document.getElementById('mt-up-mess');
                    message.innerText = "Successfuly Delete post categorie ";
                    message.style.color = "green";
                    setTimeout(function() {
                        location = "categorie.php";
                    }, 2000);
                    </script>

                    <?php
                 }else{ 

                     ?>

                    <script>
                    var message = document.getElementById('mt-up-mess');
                    message.innerText = "Successfuly Delete post categorie ";
                    message.style.color = "red";
                    </script>

                    <?php
                 } 
                }
                 ?>

                </table>
            </div>
            <br>
            <hr>
        </main>
        <!-- <footer class="mt-footer">


        </footer> -->
        <script src="js/jQuery.js"></script> scrip
        <script src=" js/mt-mttech1.js"> </script>
        <script src="js/mt-mttech2.js"></script>
        <script src="js/mt-mttech3.js"></script>

</body>

</html>