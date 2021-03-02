<?php
require APPROOT . '/views/includes/head.php';
?>

<?php
require APPROOT . '/views/includes/navigation.php';
?>
<div class="container">
    <header>
        <a href="<?php echo URLROOT; ?>/index"><img href="<?php echo URLROOT; ?>/"><img src="<?php echo URLROOT ?>/public/img/logo.png"></a>
    </header>
    <section>

        <div class="row">
            <div class="center">
                <h2>Topic : <?php echo $data['topic']->name ?></h2>

            </div>
            <br>
            <div class="row grid">
                <div class="col-md-8">
                    <!-- Loop through the data and render post -->
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

                                <div class="post-meta"><span>by <?php foreach ($data['users'] as $user) : ?>
                                            <?php if ($user->id == $post->user_id) : ?>

                                                <a href="<?php echo URLROOT . '/users/author/' . $user->id  ?>"><?php echo $user->username; ?></a>

                                            <?php endif; ?>
                                        <?php endforeach;  ?></span>/<span>
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
                    <!-- !Loop through the data and render post -->

                    <nav class="pagination" role="navigation">

                        <a class="newer-posts" href="<?php
                                                        $pageprev = $data['pages'];
                                                        if ($data['pages'] <= 1) {
                                                            echo URLROOT . '/topics';
                                                        } else {
                                                            echo URLROOT . '/topics?pages=' . ($pageprev - 1);
                                                        }
                                                        ?>"> &larr; Newer Posts </a>

                        <a class="older-posts" href="<?php
                                                        $pagenext = $data['pages'];
                                                        if ($data['pages'] >= $data['total_pages']) {
                                                            echo URLROOT . '/topics';
                                                        } else {
                                                            echo URLROOT . '/topics?pages=' . ($pagenext + 1);
                                                        }
                                                        ?>"> Older Posts &rarr; </a>
                    </nav>
                </div>

            </div>
        </div>
    </section>

</div>

<?php
require APPROOT . '/views/includes/footer.php';
?>