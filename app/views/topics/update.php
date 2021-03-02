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
        Update topic
    </h1>
    <form style="text-align: center;" method="POST" enctype="multipart/form-data" action="<?php echo URLROOT ?>/topics/update/<?php echo $data['topic']->id ?>">
        <div class="form-item">
            <input style="width: 400px;" value="<?php echo $data['topic']->name  ?>" type="text" name="name" placeholder="Topic name...">
            <br>
            <span class="invalidFeedback">
                <?php echo $data['nameError']; ?>
            </span>
        </div>
        <br>
        <button class="btn green" name="submit" type="submit">Submit</button>
    </form>

</div>
<?php
require APPROOT . '/views/includes/footer.php';
?>