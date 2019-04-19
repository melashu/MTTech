 <?php
require_once "mt-blogpost.php";
require_once "mt-videopost.php";

$blogPost = new BlogPost;
$videoPost = new VideoPost;
?>
 <nav class="mt-nav" id="mt-nav">
     <ul>
         <li>
             <a href="register.php" title="Register Here">Sign Up Here</a>
         </li>
         <li>
             <a href="login.php" title="Login Here">Sign in</a>
             <i class="fas fa-sign-in-alt"></i>
         </li>
         <ul>
 </nav>
 <header class="mt-header">
     <a href="index.php"> <img src="image/logo3.png" alt=""></a>
 </header>

 <nav class="mt-nav" id="mt-nav">
     <ul>
         <li id="mt-course-menu">
             <a href="admin.php" title="Avaliable Courses">All Courses</a>
             <div class="mt-course-menu">
                 <?php
$result = $blogPost->getBlogCat();
foreach ($result as $row) {
    echo "<a href=course.php?courseCategorie=" . $row['categorie'] . ">" . $row['categorie'] . " Tutorial</a>";
}
?>
             </div>
         </li>
         <li id="mt-video-menu">
             <a href="video.php" title="Video Material">Video Tutorial</a>
             <div class="mt-video-menu">
                 <?php
$result = $videoPost->getVideoCat();
foreach ($result as $row) {
    echo "<a href=video.php?videoCategorie=" . $row['categorie'] . ">" . $row['categorie'] . " Video Tutorial</a>";
}
?>
             </div>
         </li>
         <li>
             <a href="quiz.php" title="Avaliable Quiz">Avaliable Quiz</a>
         </li>
         <li>
             <a href="forum.php" title="Our Fourm">Fourm</a>
         </li>
         <li>
             <a href="tips.php" title="How To Do ...">Tips</a>
         </li>
         <li>
             <a href="faq.php" title="FAQ ...">FAQ</a>
         </li>

         <ul>
 </nav>