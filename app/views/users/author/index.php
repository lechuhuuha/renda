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
            <?php if(!isLoggedIn()) echo '<h2>Author: ' . $data['user']->username .'</h2>' ?>
            <?php if (isTrueUser($data)) : ?>
                <h2>This is your work place with post you have created</h2>

                <a class="btn green btn-create" href="<?php echo URLROOT ?>/posts/create">
                    <h3>Create some post</h3>
                </a>
            <?php endif; ?>
            <div class="row grid">

                <?php if (empty($data['post']) && empty($_SESSION['user_id'])) : ?>
                    <?php echo "<h2> This author currently have no post. So let's visit another time <a href='http://localhost/mvcframework-Backup8/posts'>Click here to see some post</a>
 </h2>"  ?>
                <?php endif; ?>
                <?php foreach ($data['post'] as $post) : ?>
                    <div class="col-md-4">

                        <a class="btn orange btn-update" href="<?php echo URLROOT . "/posts/update/" . $post->id ?>">
                            Update this post <?php if ((!empty($_SESSION)) && (isset($_SESSION['role']) != $data['user']->role || $_SESSION['user_id'] != $data['user']->id)) echo 'Not allowed' ?>
                        </a>
                        <!-- !Check if this user is delete own post if not it will not show -->
                        <!-- Delete button -->
                        <?php if ((!empty($_SESSION)) && ($_SESSION['user_id'] == $data['user']->id || isAdmin())) : ?>

                            <form action="<?php echo URLROOT . "/posts/delete/" . $post->id ?>" method="post">
                                <input type="submit" name="delete" value="Delete this post" class="btn red btn-delete">
                            </form>
                        <?php endif; ?>
                        <!-- !Delete button -->

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

                                <div class="post-meta">
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
                    </div>

                <?php endforeach; ?>
                <?php if (!empty($data['pages'])) : ?>
                    <span class="page-number">Page 1 of 2</span>
                    <?php echo "page:" . $data['pages'] ?>
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
                    </nav>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>





<?php
require APPROOT . '/views/includes/footer.php';
?>