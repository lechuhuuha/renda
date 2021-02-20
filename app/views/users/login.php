<?php
require APPROOT . '/views/includes/head.php';
?>
<?php
require APPROOT . '/views/includes/navigation.php';
?>
<?php if (!isLoggedIn()) : ?>
    <div class="container-login">
        <div class="wrapper-login">
            <h2>Sign In </h2>
            <form action="<?php echo URLROOT; ?>/users/login" method="POST">
                <label for="username">Username</label>
                <input type="text" placeholder="UserName *" value="<?php echo $data['username'] ? '' : $data['username'] ?>" name="username">
                <span class="invalidFeedback">
                    <?php echo $data['usernameError']; ?>
                </span>
                <label for="password">Password</label>
                <input type="password" placeholder="PassWord *" value="<?php echo $data['password'] ? '' : $data['password'] ?>"  name="password">
                <span class="invalidFeedback">
                    <?php echo $data['passwordError']; ?>
                </span>
                <div class="opt">
                    Remember Me <input type="checkbox" name="remember">
                </div>
                <div class="opt">
                    <button id="submit" type="submit" value="submit">Submit</button>
                    
                    <p class="options">Not Registered yet <a href="<?php echo URLROOT; ?>/users/register">Create an account!</a></p>
                    <a href="<?php echo URLROOT; ?>/users/account/authEmail">Forgot your password</a>

                </div>
            </form>
        </div>
    </div>
<?php elseif (isLoggedIn()) : ?>
    <h1>u have already loggin.Need to logout first </h1>
    <a href="<?php echo URLROOT ?>/pages/index">Click here to back to home page</a>
<?php endif; ?>
