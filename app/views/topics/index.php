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
        <H3>Topics </H3>
        <div class="row grid">
            <!-- Loop through the data and render topic -->
            <?php foreach ($data['topics'] as $topic) : ?>
                <div class="col-sm grid-item item-mod ">
                    <article class="topic">
                        <div class="wrapgriditem">
                            <header class="topic-header">
                                <!-- title -->
                                <h2 class="topic-title"><a href="<?php echo URLROOT . "/topics/topic/" . $topic->id ?>">
                                        <?php echo $topic->name; ?>
                                    </a></h2>
                                <!-- !title -->
                                <!-- Number of Posts -->
                                <?php
                                $num = 0;
                                foreach ($data['posts'] as $post) {
                                    if ($topic->id == $post->topic_id) {
                                        $num++;
                                        
                                    }
                                }
                                echo ' <h4>Posts : ' . $num . '</h4>' ;

                                ?>
                                <!-- !Number of Posts -->
                            </header>
                            <footer class="topic-meta">
                                <time class="topic-date" datetime="2016-12-18">
                                    <?php echo 'Created on : ' . $topic->created_at ?>
                                </time>
                                <?php if (isset($topic->updated_at)) : ?>
                                    <time class="topic-date" datetime="2016-12-18">
                                        <?php echo 'Updated on : ' . $topic->updated_at ?> </time>
                                <?php endif; ?>

                            </footer>
                        </div>
                    </article>
                </div>

            <?php endforeach; ?>
            <!-- !Loop through the data and render topic -->
        </div>
        <span class="page-number">Page 1 of <?php echo  $data['pages'] ?>
        </span>
        <?php echo "total pages:" . $data['total_pages'] ?>

        <nav class="pagination" role="navigation">

            <a class="newer-topics" href="<?php
                                            $pageprev = $data['pages'];
                                            if ($data['pages'] <= 1) {
                                                echo URLROOT . '/topics';
                                            } else {
                                                echo URLROOT . '/topics?pages=' . ($pageprev - 1);
                                            }
                                            ?>"> &larr; Newer topics </a>

            <a class="older-topics" href="<?php
                                            $pagenext = $data['pages'];
                                            if ($data['pages'] >= $data['total_pages']) {
                                                echo URLROOT . '/topics';
                                            } else {
                                                echo URLROOT . '/topics?pages=' . ($pagenext + 1);
                                            }
                                            ?>"> Older topics &rarr; </a>
        </nav>
    </div>
</main>

<?php
require APPROOT . '/views/includes/footer.php';
?>