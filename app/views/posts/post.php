<?php
require APPROOT . '/views/includes/head.php';
?>

<?php
require APPROOT . '/views/includes/navigation.php';
?>

<div class="post-template">
    <div class="site-wrapper">
        <?php if (isset($data)) : ?>
            <header class="main-header post-head " style="background-image: url('<?php echo URLROOT . '/public/img/' . $data['post']->image; ?>')">
                <div class="vertical">
                    <div class="main-header-content inner">
                        <!-- title -->
                        <h1 class="post-title"><?php echo $data['post']->title; ?></h1>
                        <div class="entry-title-divider">
                            <span></span><span></span><span></span>
                        </div>

                        <!-- !title -->
                        <!-- datetime -->
                        <section class="post-meta">
                            <time class="post-date" datetime="2015-12-13"><?php echo 'Created on : ' . date('F j h:m', strtotime($data['post']->created_at)) ?></time>
                            <?php if (isset($data['post']->updated_at)) : ?>
                                <time class="post-date" datetime="2015-12-13"><?php echo 'Updated on : ' . date('F j h:m', strtotime($data['post']->updated_at)) ?></time>
                            <?php endif; ?>

                        </section>
                        <span style="color: white;">Views:<?php echo $data['post']->views; ?></span>

                        <!-- datetime -->
                    </div>
                </div>
            </header>

            <main id="content" class="content" role="main">
                <div class="wraps">
                    <img src="assets/img/shadow.png" class="wrapshadow" />
                    <article class="post featured">
                        <!-- body -->
                        <section class="post-content">
                            <h2>Summary : </h2>
                            <h3><?php echo $data['post']->summary ?></h3>
                            <p><?php echo html_entity_decode($data['post']->body) ?>
                            </p>
                        </section>
                        <!-- body -->

                        <footer class="post-footer">
                            <figure class="author-image">
                                <img src="<?php echo URLROOT ?>/public/img/gravatar.jpg" alt="">
                                <a class="img" href="#"><span class="hidden"> long van's Picture</span></a>
                            </figure>
                            <section class="author">
                                <h4><a href="<?php echo URLROOT . '/users/author/' . $data['user']->id  ?>"><?php echo $data['user']->username ?></a></h4>
                                <p>
                                    THIS WEBSITE IS DEDICATED TO EMPEROR OF MANKIND.HE IS OUR ONE AND ONLY GODDDDDDDDDDDDDD.
                                    NO ONE IS GREATER THAN HIM,HANDSOME THAN HIM,STRONGER THAN HIM.HE IS THE GODDDDDDDDDDDDDDDDDD
                                </p>
                                <span>For some reason bg image did not working with this page HOW?</span>

                                <div class="author-meta">
                                    <span class="author-location icon-location">Viet Nam</span>

                                </div>
                            </section>
                            <section class="share">
                                <h4>Share this post</h4>
                                <a class="icon-twitter" href="https://twitter.com/intent/tweet?text=Once%20Upon%20a%20Time&amp;url=#" onclick="window.open(this.href, 'twitter-share', 'width=550,height=235');return false;">
                                    <span class="hidden">Twitter</span>
                                </a>
                                <a class="icon-facebook" href="https://www.facebook.com/sharer/sharer.php?u=#" onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;">
                                    <span class="hidden">Facebook</span>
                                </a>
                                <a class="icon-google-plus" href="https://plus.google.com/share?url=#" onclick="window.open(this.href, 'google-plus-share', 'width=490,height=530');return false;">
                                    <span class="hidden">Google+</span>
                                </a>
                            </section>
                        </footer>

                    </article>
                </div>

            </main>

        <?php else : ?>
            <h2>Sorry this author did not exist</h2>
        <?php endif; ?>
    </div>
</div>



<?php
require APPROOT . '/views/includes/footer.php';
?>