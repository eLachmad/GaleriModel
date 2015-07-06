
<section id="form" style="margin-top:0px;"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="<?php echo site_url("login");?>" method="post">
							<input type="text" name="user" placeholder="Username" />
							<input type="password" name="pwd" placeholder="Password" />
							<span>
								<!--<input type="checkbox" class="checkbox">
								Keep me signed in-->
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-2">
					<div class="signup-form"><!--sign up form-->
						<form action="#" style="vertical-align:center;">
							<a href="<?php echo site_url("signup/member"); ?>" class="fancybox fancybox.ajax"><button type="button" class="btn btn-default col-sm-12" style="margin-top:75px;">Daftar Member</button></a>
							<a href="<?php echo site_url("signup/agency"); ?>" class="fancybox fancybox.ajax"><button type="button" class="btn btn-default col-sm-12" style="margin-top:15px;">Daftar Agency</button></a>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
  </section><!--/form-->