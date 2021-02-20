<?php
require APPROOT . '/views/includes/head.php';
?>

<?php
require APPROOT . '/views/includes/navigation.php';
?>
<header class="main-header " style="background-image: url(https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/7e0cf033-9c86-40bd-9040-391f4df623be/d7vsx4m-d592f069-8c67-4f96-a631-299fce7433c2.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOiIsImlzcyI6InVybjphcHA6Iiwib2JqIjpbW3sicGF0aCI6IlwvZlwvN2UwY2YwMzMtOWM4Ni00MGJkLTkwNDAtMzkxZjRkZjYyM2JlXC9kN3ZzeDRtLWQ1OTJmMDY5LThjNjctNGY5Ni1hNjMxLTI5OWZjZTc0MzNjMi5qcGcifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6ZmlsZS5kb3dubG9hZCJdfQ.rlZtL91F_xk2izTTkpMXbjTy8Gk39K4LwTO2HyU5ER0)">
    <div class="vertical">
        <div class="main-header-content inner">
            <h1 class="page-title">Topic :</h1>
            <div class="entry-title-divider">
                <span></span><span></span><span></span>
            </div>
            <h2 class="page-description"> <?php echo $data['topic']->name ?></h2>
        </div>
    </div>
    <a class="scroll-down icon-arrow-left" href="#content" data-offset="-45"><span class="hidden">Scroll Down</span></a>
</header>
<main id="content" class="content" role="main">
    <div class="wraps">
    <h3>For the angel</h3>
        <div class="row grid">
            <!-- Loop through the data and render post -->
            <?php foreach ($data['posts'] as $post) : ?>
                <div class="col-sm grid-item item-mod ">
                    <article class="post">
                        <!-- image -->
                        <?php if ($post->image) : ?>
                            <a class="link-post" href="<?php echo URLROOT . "/posts/post/" . $post->id ?>"><img class="img-posts" style="width:255;height:190px" src="<?php echo URLROOT . '/public/img/' . $post->image; ?>"></a>
                        <?php endif; ?>
                        <!-- !image -->
                        <div class="wrapgriditem">
                            <header class="post-header">
                                <!-- title -->
                                <h2 class="post-title"><a href="<?php echo URLROOT . "/posts/post/" . $post->id ?>">
                                        <?php echo $post->title; ?>
                                    </a></h2>
                                <!-- !title -->
                                <!-- view -->
                                <span>Views:<?php echo $post->views; ?></span>
                                <!-- view -->
                            </header>
                            <!-- body -->
                            <section class="post-excerpt">
                                <p><?php echo $post->summary ?></p>
                                <a class="read-more" href="<?php echo URLROOT . "/posts/post/" . $post->id ?>">See more &raquo;</a>
                            </section>
                            <!-- !body -->
                            <footer class="post-meta">
                                <img class="author-thumb" src="<?php echo URLROOT ?>/public/img/gravatar.jpg" alt="David" nopin="nopin" />
                                <?php foreach ($data['users'] as $user) : ?>
                                    <?php if ($user->id == $post->user_id) : ?>

                                        <a href="<?php echo URLROOT . '/users/author/' . $user->id  ?>"><?php echo $user->username; ?></a>

                                    <?php endif; ?>
                                <?php endforeach;  ?>
                                <time class="post-date" datetime="2016-12-18">
                                    <?php echo 'Created on : ' . $post->created_at ?>
                                </time>
                                <?php if (isset($post->updated_at)) : ?>
                                    <time class="post-date" datetime="2016-12-18">
                                        <?php echo 'Updated on : ' . $post->updated_at ?> </time>
                                <?php endif; ?>

                            </footer>
                        </div>
                    </article>
                </div>

            <?php endforeach; ?>
            <!-- !Loop through the data and render post -->
        </div>
        <span class="page-number">Page 1 of <?php echo  $data['pages'] ?>
        </span>
        <?php echo "total pages:" . $data['total_pages'] ?>

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
</main>

<?php
require APPROOT . '/views/includes/footer.php';
?>