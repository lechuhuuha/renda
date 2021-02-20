<?php
require APPROOT . '/views/includes/head.php';
?>
    <?php
    require APPROOT . '/views/includes/navigation.php';
    ?>

<div class="container center">
    <h1>Update Author</h1>
    <form style="text-align: center;" action="<?php echo URLROOT ?>/users/admin/update_author/<?php echo $data['user']->id ?>" method="POST">
        <div class="form-item">
            <input style="width: 400px;" type="text" disabled value="<?php echo $data['user']->id ?>">
        </div>
        <div class="form-item">
            <input style="width: 400px;" type="text" name="username" value="<?php echo $data['user']->username ?>">
        </div>
        <span class="invalidFeedback">
            <?php echo $data['usernameError']; ?>
        </span>
        <div class="form-item">
            <input style="width: 400px;" type="text" name="email" value="<?php echo $data['user']->email ?>">
        </div>
        <span class="invalidFeedback">
            <?php echo $data['emailError']; ?>
        </span>
        <div class="form-item">
        <select name="role" value="<?php echo $data['role']->role?>">
                <option  value="1" id="">Admin</option>
                <option  value="0" id="">Author</option>
            </select>        </div>
        <span class="invalidFeedback">
            <?php echo $data['roleError']; ?>
        </span>
        <button class="btn green" name="submit" type="submit">Update</button>
    </form>
</div>
<?php
   require APPROOT . '/views/includes/footer.php';
?>