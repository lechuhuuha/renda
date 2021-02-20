<?php
require APPROOT . '/views/includes/head.php';
?>

<?php
require APPROOT . '/views/includes/navigation.php';
?>
<header class="main-header post-head " style="background-image: url(https://c4.wallpaperflare.com/wallpaper/491/190/347/warhammer-40-000-space-marines-logan-grimnar-wallpaper-preview.jpg)">
    <div class="vertical">
        <div class="main-header-content inner">
            <h1 class="post-title">ERROR <br> 404</h1>
        </div>
    </div>
</header>
<main class="content" role="main">
    <article class="post tag-fashion tag-art page">
        <section class="post-content center">
            <h2>Sorry the infomation u looking for is not here</h2>
            <h3>Try to search for another post</h3>
            <!-- Search form -->
            <div style="margin-left: 450px;" class="md-form  mt-0">
                <form action="<?php echo URLROOT ?>/posts/search" method="post">
                    <input class="btn-login" name="title" type="text" placeholder="Search" aria-label="Search">
                </form>
        </section>
    </article>
</main>
<?php
require APPROOT . '/views/includes/footer.php';
?>