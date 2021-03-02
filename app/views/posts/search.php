<?php
require APPROOT . '/views/includes/head.php';
?>

<?php
require APPROOT . '/views/includes/navigation.php';
?>

<!-- container -->
<div class="container">
    <header>
        <a href="<?php echo URLROOT; ?>/index"><img href="<?php echo URLROOT; ?>/"><img src="<?php echo URLROOT ?>/public/img/logo.png"></a>
    </header>
    <section>
        <div class="row">
            <div class="col-md-8">
                <?php foreach ($data['posts'] as $post) : ?>

                    <!-- Article -->
                    <article class="blog-post">
                        <!-- Image -->
                        <div class="blog-post-image">
                            <?php if ($post->image) : ?>
                                <a href="<?php echo URLROOT . "/posts/post/" . $post->id ?>"><img src="<?php echo URLROOT . '/public/img/' . $post->image; ?>" alt=""></a>
                            <?php endif; ?>
                        </div>
                        <!-- !Image -->
                        <div class="blog-post-body">
                            <!-- Title -->
                            <h2><a href="post.html"> <?php echo $post->title; ?>
                                </a></h2>
                            <!-- !Title -->

                            <div class="post-meta"><span>
                                    <!-- view -->
                                    <span><i class="far fa-eye"></i>Views:<?php echo $post->views; ?></span>
                                    <!-- !view -->
                                    <!-- Time -->
                                    <i class="fa fa-clock-o"></i>
                                    <time class="post-date" datetime="2016-12-18">
                                        <?php echo 'Created on : ' . $post->created_at ?>
                                    </time>
                                    <!-- !Time -->
                                    <!-- Comment -->
                                </span>/<span>
                                    <i class="fa fa-comment-o"></i> <a href="#">343</a></span>
                                <!-- !Comment -->
                            </div>
                            <!-- Summary -->
                            <p><?php echo $post->summary ?></p>
                            <!-- !Summary -->
                            <div class="read-more">
                                <a class="read-more" href="<?php echo URLROOT . "/posts/post/" . $post->id ?>">See more &raquo;</a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>

                <!-- <span class="page-number">Page 1 of <?php echo  $data['pages'] ?>
                </span>
                <?php echo "total pages:" . $data['total_pages'] ?>

                <nav class="pagination" role="navigation">

                    <a class="newer-posts" href="<?php
                                                    $pageprev = $data['pages'];
                                                    if ($data['pages'] <= 1) {
                                                        echo URLROOT . '/posts';
                                                    } else {
                                                        echo URLROOT . '/posts?pages=' . ($pageprev - 1);
                                                    }
                                                    ?>"> &larr; Newer Posts </a>

                    <a class="older-posts" href="<?php
                                                    $pagenext = $data['pages'];
                                                    if ($data['pages'] >= $data['total_pages']) {
                                                        echo URLROOT . '/posts';
                                                    } else {
                                                        echo URLROOT . '/posts?pages=' . ($pagenext + 1);
                                                    }
                                                    ?>"> Older Posts &rarr; </a>
                </nav> -->
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
                            <h4>Nguyen Van Long</h4>
                            <div class="author-title">Back-end developer</div>
                            <p> Back-end developer from Dong Ngac,Ha noi
                                And also a addiction to warhammer 40k</p>
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
                                    <li><a href="<?php echo URLROOT . '/topics/topic/' . $topic->id ?>"><?php echo $topic->name ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
            </div>
            </aside>
        </div>
</div>
</section>
</div>
<!-- /.container -->
<?php
require APPROOT . '/views/includes/footer.php';
?>