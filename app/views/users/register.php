<?php
require APPROOT . '/views/includes/head.php';
?>
<?php
require APPROOT . '/views/includes/navigation.php';
?>
<style>
    .box {
        width: 500px;
        padding: 40px;
        position: absolute;
        top: 50%;
        left: 50%;
        background: #191919;
        ;
        text-align: center;
        transition: 0.25s;
        margin-top: 100px
    }

    .box input[type="text"],
    .box input[type="password"],
    .box input[type="email"] {
        border: 0;
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        border: 2px solid #3498db;
        padding: 10px 10px;
        width: 250px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.25s
    }

    .box h1 {
        color: white;
        text-transform: uppercase;
        font-weight: 500
    }

    .box input[type="text"]:focus,
    .box input[type="password"]:focus {
        width: 300px;
        border-color: #2ecc71
    }

    .box input[type="submit"] {
        border: 0;
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        border: 2px solid #2ecc71;
        padding: 14px 40px;
        outline: none;
        color: white;
        border-radius: 24px;
        transition: 0.25s;
        cursor: pointer
    }

    .box input[type="submit"]:hover {
        background: #2ecc71
    }

    .forgot {
        text-decoration: underline
    }

    ul.social-network {
        list-style: none;
        display: inline;
        margin-left: 0 !important;
        padding: 0
    }

    ul.social-network li {
        display: inline;
        margin: 0 5px
    }

    .social-network a.icoFacebook:hover {
        background-color: #3B5998
    }

    .social-network a.icoTwitter:hover {
        background-color: #33ccff
    }

    .social-network a.icoGoogle:hover {
        background-color: #BD3518
    }

    .social-network a.icoFacebook:hover i,
    .social-network a.icoTwitter:hover i,
    .social-network a.icoGoogle:hover i {
        color: #fff
    }

    a.socialIcon:hover,
    .socialHoverClass {
        color: #44BCDD
    }

    .social-circle li a {
        display: inline-block;
        position: relative;
        margin: 0 auto 0 auto;
        border-radius: 50%;
        text-align: center;
        width: 50px;
        height: 50px;
        font-size: 20px
    }

    .social-circle li i {
        margin: 0;
        line-height: 50px;
        text-align: center
    }

    .social-circle li a:hover i,
    .triggeredHover {
        transform: rotate(360deg);
        transition: all 0.2s
    }

    .social-circle i {
        color: #fff;
        transition: all 0.8s;
        transition: all 0.8s
    }
</style>
<?php if (!isLoggedIn()) : ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <form class="box" action="<?php echo URLROOT; ?>/users/register" method="POST">
                        <input type="text" placeholder="UserName *" value="<?php echo $data['username'] ? '' : $data['username'] ?>" name="username" required>
                        <span class="invalidFeedback">
                            <?php echo $data['usernameError']; ?>
                        </span>
                        <input type="email" placeholder="Email *" value="<?php echo $data['email'] ? '' : $data['email'] ?>" name="email" required>
                        <span class="invalidFeedback">
                            <?php echo $data['emailError']; ?>
                        </span>

                        <input type="password" placeholder="PassWord *" value="<?php echo $data['password'] ? '' : $data['password'] ?>" name="password" required>
                        <span class="invalidFeedback">
                            <?php echo $data['passwordError']; ?>
                        </span>

                        <input type="password" placeholder="ConfirmPassword *" value="<?php echo $data['confirmPass'] ? '' : $data['confirmPass'] ?>" name="confirmPass" required>
                        <span class="invalidFeedback">
                            <?php echo $data['confirmPassError']; ?>
                        </span>
                        <input id="submit" type="submit" value="submit">

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php elseif (isLoggedIn()) : ?>
    <h1>u have already loggin.Need to logout first </h1>
    <a href="<?php echo URLROOT ?>/pages/index">Click here to back to home page</a>
<?php endif; ?>