<?php
require_once "mt-blogpost.php";
$blogPost = new BlogPost;

?>
<aside class="mt-course-aside">
    <input type="search" title="Search Anything Avaliable Blog Here" id="mt-blog-search" class="mt-form-control">
    <div id="accordion">
        <?php
$result = $blogPost->getBlogCat();
foreach ($result as $row) {
    echo "<h3>" . $row['categorie'] . " Tutorial</h3>";

    $rows = $blogPost->getBlogByCat($row['categorie']);

    ?>


        <div class="mt-accordion">
            <?php
foreach ($rows as $key) {
        echo "<a href=#pageId=" . $key['pid'] . " data-pid=" . $key['pid'] . " class='mt-page-link'>" . $key['title'] . "</a>";
    }
    ?>
        </div>
        <?php
}
?>
    </div>
</aside>