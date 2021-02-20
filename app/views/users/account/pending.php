<?php
require APPROOT . '/views/includes/head.php';
?>

<?php
require APPROOT . '/views/includes/navigation.php';
?>
<header class="main-header post-head " style="background-image: url(https://c4.wallpaperflare.com/wallpaper/491/190/347/warhammer-40-000-space-marines-logan-grimnar-wallpaper-preview.jpg)">
    <div class="vertical">
        <div class="main-header-content inner">
            <h1 class="post-title">Send <br> succeed</h1>
        </div>
    </div>
</header>
<main class="content" role="main">
    <article class="post tag-fashion tag-art page">
        <section class="post-content center">
            <h2>We sent an email to <?php if(isset($_SESSION['email']))  echo $_SESSION['email'] ?> check your email help recover account</h2>
            <a href="<?php echo URLROOT ?>/users/login">Click the link we sent to create a new password</a>

        </section>
    </article>
</main>
<?php
require APPROOT . '/views/includes/footer.php';
?>