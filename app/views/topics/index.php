<?php
require APPROOT . '/views/includes/head.php';
?>

<?php
require APPROOT . '/views/includes/navigation.php';
?>
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