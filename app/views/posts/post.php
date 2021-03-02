<?php
require APPROOT . '/views/includes/head.php';
?>

<?php
require APPROOT . '/views/includes/navigation.php';
?>
<header>
    <a href="<?php echo URLROOT; ?>/index"><img href="<?php echo URLROOT; ?>/"><img src="<?php echo URLROOT ?>/public/img/logo.png"></a>
</header>
<div  class="container">
    <?php if (isset($data)) : ?>

        <section>
            <div class="row">
                <div class="col-md-8">
                    <article class="blog-post">
                        <div class="blog-post-image">
                            <img src="<?php echo URLROOT . '/public/img/' . $data['post']->image; ?>" alt="">
                        </div>
                        <div class="blog-post-body">
                            <h2><?php echo $data['post']->title; ?></h2>
                            <div class="post-meta">
                                <span>by <a href="<?php echo URLROOT . '/users/author/' . $data['user']->id  ?>"><?php echo $data['user']->username ?></a></span>
                                /<span><i class="fa fa-clock-o"></i>
                                    <time class="post-date" datetime="2015-12-13"><?php echo 'Created on : ' . date('F j h:m', strtotime($data['post']->created_at)) ?></time>
                                    <?php if (isset($data['post']->updated_at)) : ?>
                                        <span></span>
                                        / <span> <i class="fa fa-clock-o"></i>
                                            <time class="post-date" datetime="2015-12-13"><?php echo 'Updated on : ' . date('F j h:m', strtotime($data['post']->updated_at)) ?></time></span>
                                    <?php endif; ?></span>
                                /<span><i class="fa fa-comment-o"></i> <a href="#">343</a></span>
                                <span> <i class="far fa-eye"></i> Views:<?php echo $data['post']->views; ?></span>
                            </div>
                            <div class="blog-post-text">
                                <p><?php echo html_entity_decode($data['post']->body) ?>
                            </div>
                        </div>
                        <?php require APPROOT . '/views/posts/comments.php' ?>

                    </article>
                </div>
                <div class="col-md-4 sidebar-gutter">
                    <aside>
                        <!-- sidebar-widget -->
                        <form style="margin-bottom: 50px;" action="<?php echo URLROOT ?>/posts/search" method="post">

                            <input class="form-control" name="title" type="text" placeholder="Search for post..." aria-label="Search">

                        </form>
                        <div class="sidebar-widget">
                            <h3 class="sidebar-title">About Me</h3>
                            <div class="widget-container widget-about">
                                <a href="post.html"><img src="images/author.jpg" alt=""></a>
                                <h4>Jamie Mooz</h4>
                                <div class="author-title">Designer</div>
                                <p>While everyone’s eyes are glued to the runway, it’s hard to ignore that there are major
                                    fashion moments on the front row too.</p>
                            </div>
                        </div>
                        <!-- sidebar-widget -->
                        <div class="sidebar-widget">
                            <h3 class="sidebar-title">Featured Posts</h3>
                            <div class="widget-container">
                                <!-- Featured Posts -->
                                <?php foreach ($data['posts'] as $post) : ?>
                                    <article class="widget-post">
                                        <div class="post-image">
                                            <a href="<?php echo URLROOT . "/posts/post/" . $post->id ?>"><img style="width:90px;height:60px" src="<?php echo URLROOT . '/public/img/' . $post->image; ?>" alt=""></a>
                                        </div>
                                        <div class="post-body">
                                            <h2><a href="<?php echo URLROOT . "/posts/post/" . $post->id ?>">
                                                    <!-- title -->
                                                    <p><?php echo $post->title ?></p>
                                                    <!-- !title -->
                                                </a></h2>
                                            <div class="post-meta">
                                                <span>
                                                    <!-- Time -->
                                                    <i class="fa fa-clock-o"></i>
                                                    <time class="post-date" datetime="2016-12-18">
                                                        <?php echo 'Created on : ' . $post->created_at ?>
                                                    </time>
                                                    <!-- !Time -->
                                                </span>
                                                <!-- comments -->
                                                <span><i class="fa fa-comment-o"></i> 23</a></span>
                                                <!-- !comments -->

                                            </div>
                                        </div>
                                    </article>
                                <?php endforeach; ?>
                                <!-- !Featured Posts -->
                            </div>
                        </div>
                        <!-- sidebar-widget -->
                        <div class="sidebar-widget">
                            <h3 class="sidebar-title">Socials</h3>
                            <div class="widget-container">
                                <div class="widget-socials">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-dribbble"></i></a>
                                    <a href="#"><i class="fa fa-reddit"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- sidebar-widget -->
                        <div class="sidebar-widget">
                            <h3 class="sidebar-title">Topics</h3>
                            <div class="widget-container">
                                <ul>
                                    <?php foreach ($data['topics'] as $topic) : ?>
                                        <li><a href="<?php echo URLROOT . '/topics/topic/' . $topic->id ?>"><?php echo $topic->name ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>

    <?php else : ?>
        <h2>Sorry this author did not exist</h2>
    <?php endif ?>
</div>
<!-- /.container -->
<?php
require APPROOT . '/views/includes/footer.php';
?>