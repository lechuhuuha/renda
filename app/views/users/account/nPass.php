<?php
require APPROOT . '/views/includes/head.php';
?>
<?php
require APPROOT . '/views/includes/navigation.php';
?>
<?php if (!isLoggedIn() && isset($_SESSION['email'])) : ?>
    <div class="container-login">
        <div class="wrapper-login">
            <h2>New Pass </h2>
            <form action="<?php echo URLROOT; ?>/users/account/nPass" method="POST">
                <label for="pass">Password</label>
                <input type="password" value="<?php if (isset($data['password'])) echo $data['password'] ?>" name="password">
                <span class="invalidFeedback">
                    <?php echo $data['passwordError']; ?>
                </span>
                <br>
                <label for="password">Confirm Password</label>
                <input type="password" name="cfPassWord">
                <br>
                <span class="invalidFeedback">
                    <?php echo $data['cfPassWordError']; ?>
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