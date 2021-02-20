<?php
require APPROOT . '/views/includes/head.php';
?>

    <?php
    require APPROOT . '/views/includes/navigation.php';
    ?>

<div class="container center">
    <!-- Check if the user has login or not if not the create button will not show 
    (using function in heplers file) 
    -->
    <h2>Topics</h2>
    <?php if (isLoggedIn()) : ?>
        <a class="btn green" href="<?php echo URLROOT ?>/posts/create">
            Create
        </a>
    <?php endif; ?>
    <!-- Loop through the data and render post -->
    <?php foreach ($data['posts'] as $post) : ?>
        <div class="container-item">
            <!-- Check if this user is delete own post if not it will not show -->
            <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post->user_id) : ?>
                <a class="btn orange" href="<?php echo URLROOT . "/posts/update/" . $post->id ?>">
                    Update
                </a>
                <!-- !Check if this user is delete own post if not it will not show -->
                <!-- Delete button -->
                <form action="<?php echo URLROOT . "/posts/delete/" . $post->id ?>" method="post">
                    <input type="submit" name="delete" value="delete" class="btn red">
                </form>
                <!-- !Delete button -->
            <?php endif; ?>
            <h2><?php echo $post->title; ?></h2>
            <span>Views:<?php echo $post->views; ?></span>
            <?php if($post->image) : ?>
            <img src="<?php echo URLROOT . $post->image; ?>" style="width: 120px;" alt="">
            <?php endif; ?>
            <h3><?php echo 'Created on : ' . $post->created_at ?></h3>
            <h3><?php echo 'Updated on : ' . $post->updated_at?></h3>
            <p><?php echo $post->body ?></p>
            <a href="<?php echo URLROOT . "/posts/post/" . $post->id ?>">Read more</a>
        </div>

    <?php endforeach; ?>
    <!-- !Loop through the data and render post -->

</div>