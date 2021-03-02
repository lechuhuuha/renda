<?php
require APPROOT . '/views/includes/head.php';
?>

<?php
require APPROOT . '/views/includes/navigation.php';
?>

<div class="container">
    <header>
        <a href="<?php echo URLROOT; ?>/index"><img href="<?php echo URLROOT; ?>/"><img src="<?php echo URLROOT ?>/public/img/logo.png"></a>

    </header>
    <section class="post-content center">
        <h2>We sent an email to <?php if (isset($_SESSION['email']))  echo $_SESSION['email'] ?> check your email help recover account</h2>
        <a href="<?php echo URLROOT ?>/users/login">Click the link we sent to create a new password</a>

    </section>
</div>
<?php
require APPROOT . '/views/includes/footer.php';
?>