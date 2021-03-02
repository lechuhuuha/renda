<?php
require APPROOT . '/views/includes/head.php';
?>

<?php
require APPROOT . '/views/includes/navigation.php';
?>
<style>
    .contain {
        margin: 100px;
    }
</style>
<div class="contain center">
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
            <span> Your Topics : </span>

            <select name="topic_name">
                <?php foreach ($data['topics'] as $topic) : ?>
                    <option value="<?php echo $topic->id ?>"><?php echo $topic->name ?></option>
                <?php endforeach;  ?>

            </select>
            <br>

            <span> All Topics : </span>

            <select name="new_topic">
                <?php foreach ($data['allTopics'] as $allTopic) : ?>
                    <option value="<?php echo $allTopic->id ?>"><?php echo $allTopic->name ?></option>
                <?php endforeach;  ?>

            </select>
            <br>
        </div>
        <br>
        <div class="form-item">
            <input style="width: 400px; margin-bottom:20px " value="<?php echo $data['post']->summary ?>" type="text" name="summary" placeholder="Summary...">
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
            <span>Image : </span>
            <img style="width: 500px;" src="<?php echo URLROOT . '/public/img/' . $data['post']->image; ?>" alt="">
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