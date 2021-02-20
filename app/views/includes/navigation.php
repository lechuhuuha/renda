<nav class="main-nav overlay clearfix">
    <a class="blog-logo" href="<?php echo URLROOT; ?>/"><img src="<?php echo URLROOT ?>/public/img/logo.png" alt="Fashion Critiques" /></a>
    <ul class="nav-ul" id="menu">
        <li class="nav-link nav-home" role="presentation"><a href="<?php echo URLROOT; ?>/index">Home</a></li>
        <li class="nav-link nav-article-example" role="presentation"><a href="<?php echo URLROOT; ?>/pages/about">About</a></li>
        <li class="nav-link nav-blog-page" role="presentation"><a href="<?php echo URLROOT; ?>/posts">Blog</a></li>
        <li class="nav-link nav-blog-page" role="presentation"><a href="<?php echo URLROOT; ?>/topics">Topic</a></li>
        <?php if (isAdmin()) : ?>
            <li class="nav-link nav-author-page" role="presentation"><a href="<?php echo URLROOT; ?>/users/admin">Admin</a></li>
        <?php endif; ?>
        <?php if (isset($_SESSION['user_id'])) : ?>
        <li class="nav-link nav-author-page" role="presentation"><a href="<?php echo URLROOT .'/users/author/' .$_SESSION['user_id'] ?>">Your blog</a></li>
        <?php endif; ?>
        <span class="socialheader">
            <a href="#"><span class='symbol'>circletwitterbird</span></a>
            <a href="#"><span class='symbol'>circlefacebook</span></a>
            <a href="#"><span class='symbol'>circlegoogleplus</span></a>
            <a href="mailto:lechuhuuha@gmail.com"><span class='symbol'>circleemail</span></a>
        </span>
        <li class="nav-link nav-search-page" role="presentation">
            <!-- Search form -->
            <div class="md-form mt-0">
                <form action="<?php echo URLROOT ?>/posts/search" method="post">
                    <input class="btn-login" name="title" type="text" placeholder="Search" aria-label="Search">
                </form>

            </div>
        </li>
        <li class="nav-link nav-author-page" role="presentation">
            <?php if (isLoggedIn()) : ?>
                <a class="btn-login" href="<?php echo URLROOT; ?>/users/logout">Log Out</a></li>
    <?php else : ?>
        <a class="btn-login" href="<?php echo URLROOT; ?>/users/login">Login</a></li>
    <?php endif; ?>
    </ul>
</nav>
