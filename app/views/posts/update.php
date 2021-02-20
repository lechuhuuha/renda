<?php
require APPROOT . '/views/includes/head.php';
?>

<?php
require APPROOT . '/views/includes/navigation.php';
?>

<div class="container center">
    <h1>
        Update post
    </h1>
    <form style="text-align: center;" method="POST" enctype="multipart/form-data" action="<?php echo URLROOT ?>/posts/update/<?php echo $data['post']->id ?>">
        <div class="form-item">
            <input style="width: 400px;" type="text" name="title" value="<?php echo $data['post']->title ?>">
            <br>
            <span class="invalidFeedback">
                <?php echo $data['titleError']; ?>
            </span>
        </div>
        <br>
        <div class="form-item">
            <input style="width: 400px;" value="<?php echo $data['post']->summary ?>" type="text" name="summary" placeholder="Summary...">
            <br>
            <span class="invalidFeedback">
                <?php echo $data['summaryError']; ?>
            </span>
        </div>
        <br>
        <div class="form-item">
            <textarea name="body" placeholder="Enter ur post...">
            <?php echo $data['post']->body ?>

            </textarea>
            <br>
            <span class="invalidFeedback">
                <?php echo $data['bodyError']; ?>
            </span>
        </div>
        <br>
        <div class="form-item">
            <input style="height:auto;" type="file" name="image">
            <img style="width: 100px;" src="<?php echo URLROOT . '/public/img/' . $data['post']->image; ?>" alt="">
            <br>
            <span class="invalidFeedback">
                <?php echo $data['imageError']; ?>
            </span>
        </div>
        <br>
        <button class="btn green" name="submit" type="submit">Submit</button>
    </form>
</div>
<script>
    CKEDITOR.replace('body');
</script>
<?php
require APPROOT . '/views/includes/footer.php';
?>