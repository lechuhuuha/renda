		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						</li>
						<li class="active"><a href="<?php echo URLROOT; ?>/index">Home</a></li>
						<li><a href="<?php echo URLROOT; ?>/pages/about">About Me</a></li>
						<li><a href="<?php echo URLROOT; ?>/posts">Blog</a></li>
						<li><a href="<?php echo URLROOT; ?>/topics">Topic</a></li>
						<?php if (isAdmin()) : ?>
							<li><a href="<?php echo URLROOT; ?>/users/admin">Admin</a></li>
						<?php endif; ?>
						<?php if (isset($_SESSION['user_id'])) : ?>
							<li><a href="<?php echo URLROOT . '/users/author/' . $_SESSION['user_id'] ?>">Your blog</a></li>
						<?php endif; ?>

					</ul>

					<ul class="nav navbar-nav navbar-right">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
						<li><a href="#"><i class="fa fa-reddit"></i></a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">

						<?php if (isLoggedIn()) : ?>
							<li>
								<a href="<?php echo URLROOT; ?>/users/logout">Log Out</a>
							</li>
						<?php else : ?>
							<li>
								<a href="<?php echo URLROOT; ?>/users/login">Login</a>
							</li>
							
							<li>
								<a href="<?php echo URLROOT; ?>/users/register">  Register</a>

							</li>

						<?php endif; ?>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
		</nav>