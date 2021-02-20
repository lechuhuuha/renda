<?php
require APPROOT . '/views/includes/head.php';
?>
<?php
require APPROOT . '/views/includes/navigation.php';
?>
<?php if (!isLoggedIn()) : ?>
    <div class="container-login">
        <div class="wrapper-login">
            <h2>Recover Email </h2>
            <form action="<?php echo URLROOT; ?>/users/account/authEmail" method="POST">
                <label for="email">Email</label>
                <input type="email" value="<?php if(isset($data['email'])) echo $data['email'] ?>" placeholder="example@gmail.com *" name="email">
                <span class="invalidFeedback">
                    <?php echo $data['emailError']; ?>
                </span>
                <br>
                <label for="email">Confirm Email</label>
                <input type="email" placeholder="example@gmail.com *" name="cfEmail">
                <br>
                <span class="invalidFeedback">
                    <?php echo $data['cfEmailError']; ?>
                </span>

                <div class="opt">
                    <button id="submit" type="submit" value="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
<?php elseif (isLoggedIn()) : ?>
    <h1>u have already loggin.Need to logout first </h1>
    <a href="<?php echo URLROOT ?>/pages/index">Click here to back to home page</a>
<?php endif; ?>
