<?php
require APPROOT . '/views/includes/head.php';
?>

<?php
require APPROOT . '/views/includes/navigation.php';
?>
<header class="main-header " style="background-image: url(https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/7e0cf033-9c86-40bd-9040-391f4df623be/d7vsx4m-d592f069-8c67-4f96-a631-299fce7433c2.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOiIsImlzcyI6InVybjphcHA6Iiwib2JqIjpbW3sicGF0aCI6IlwvZlwvN2UwY2YwMzMtOWM4Ni00MGJkLTkwNDAtMzkxZjRkZjYyM2JlXC9kN3ZzeDRtLWQ1OTJmMDY5LThjNjctNGY5Ni1hNjMxLTI5OWZjZTc0MzNjMi5qcGcifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6ZmlsZS5kb3dubG9hZCJdfQ.rlZtL91F_xk2izTTkpMXbjTy8Gk39K4LwTO2HyU5ER0)">
    <div class="vertical">
        <div class="main-header-content inner">
            <h1 class="page-title">FOR THE EMPEROR</h1>
            <div class="entry-title-divider">
                <span></span><span></span><span></span>
            </div>
            <h2 class="page-description">BLOOD FOR THE GOD EMPEROR</h2>
        </div>
    </div>
    <a class="scroll-down icon-arrow-left" href="#content" data-offset="-45"><span class="hidden">Scroll Down</span></a>
</header>

<main id="content" class="content" role="main">
    <div class="wraps">
        <H3>This is what you search by the power of the emperor </H3>
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
                                <a class="read-more" href="<?php echo URLROOT . "/posts/post/" . $post->id ?>">&raquo;</a>
                            </section>
                            <!-- body -->
                            <footer class="post-meta">
                                <img class="author-thumb" src="<?php echo URLROOT ?>/public/img/gravatar.jpg" alt="David" nopin="nopin" />
                                <a href="#">Long Van</a>
                                <time class="post-date" datetime="2016-12-18">
                                    <?php echo 'Created on : ' . $post->created_at ?>
                                </time>
                                <time class="post-date" datetime="2016-12-18">
                                    <?php if (isset($post->updated_at)) echo 'Updated on : ' . $post->updated_at ?> </time>
                            </footer>
                        </div>
                    </article>
                </div>

            <?php endforeach; ?>
            <!-- !Loop through the data and render post -->
        </div>
        <?php if (isset($data['pages'])) : ?>
            <span class="page-number">Page 1 of <?php echo  $data['pages'] ?>

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
                <?php endif; ?>
                </nav>
    </div>
</main>
<?php
require APPROOT . '/views/includes/footer.php';
?>