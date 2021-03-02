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
<?php if (!isLoggedIn() && isset($_SESSION['email'])) : ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <form class="box" action="<?php echo URLROOT; ?>/users/account/authEmail" method="POST">
                        <h1>New Pass</h1>
                        <p class="text-muted"> Please enter your new password and confirm your new password!</p>
                        <input type="password" value="<?php if (isset($data['password'])) echo $data['password'] ?>" name="password">
                        <span class="invalidFeedback">
                            <?php echo $data['passwordError']; ?>
                        </span>
                        <input type="password" name="cfPassWord">
                        <br>
                        <span class="invalidFeedback">
                            <?php echo $data['cfPassWordError']; ?>
                        </span>
                        <input id="submit" type="submit" value="submit">

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="container-login">
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
    </div> -->
<?php elseif (isLoggedIn()) : ?>
    <h1>u have already loggin.Need to logout first </h1>
    <a href="<?php echo URLROOT ?>/pages/index">Click here to back to home page</a>
<?php endif; ?>