<?php
require APPROOT . '/views/includes/head.php';
?>

<?php
require APPROOT . '/views/includes/navigation.php';
?>
<!-- tinymce -->
<!-- <script src="https://cdn.tiny.cloud/1/onx8cc52njnijcl48hrkc5x8d1o5qj6si95kitf7px6tc4y3/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
<!-- !tinymce -->

<style>
    .contain {
        margin: 100px;
    }
</style>
<div class="contain center">
    <h1>
        Create new post
    </h1>
    <form class="box" style="text-align: center;" method="POST" enctype="multipart/form-data" action="<?php echo URLROOT ?>/posts/create">
        <div class="form-item">
            <input style="width: 400px;" value="<?php echo $data['title'] ?>" type="text" name="title" placeholder="Title...">
            <br>
            <span class="invalidFeedback">
                <?php echo $data['titleError']; ?>
            </span>
        </div>
        <br>
        <div class="form-item">
            <span>Topics : </span>

            <select name="topic_name">
                <?php foreach ($data['topics'] as $topic) : ?>
                    <option value="<?php echo $topic->id ?>"><?php echo $topic->name ?></option>
                <?php endforeach;  ?>

            </select>
            <br>
            <span class="invalidFeedback">
                <?php echo $data['topicError']; ?>
            </span>
        </div>
        <br>
        <div class="form-item">
            <input style="width: 400px; margin-bottom:20px" value="<?php echo $data['summary'] ?>" type="text" name="summary" placeholder="Summary...">
            <br>
            <span class="invalidFeedback">
                <?php echo $data['summaryError']; ?>
            </span>
        </div>
        <div class="form-item">
            <textarea name="body" placeholder="Enter ur post...">
            <?php echo $data['body'] ?>
        </textarea>
            <br>
            <span class="invalidFeedback">
                <?php echo $data['bodyError']; ?>
            </span>
        </div>
        <br>
        <div class="form-item">
            <input style="height:auto;" type="file" name="image">
            <br>
            <span class="invalidFeedback">
                <?php echo $data['imageError']; ?>
            </span>
        </div>
        <br>
        <button class="btn green" name="submit" type="submit">Submit</button>
    </form>
    <script>
        CKEDITOR.replace('body');
    </script>
    <!-- <script>
    tinymce.init({
      selector: 'textarea'
    });
  </script> -->
</div>
<?php
require APPROOT . '/views/includes/footer.php';
?>