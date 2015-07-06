<section id="form"style="margin-top:0px;"><!--form-->
	<div class="row">
		<div class="container" style="width:500px;">
			<div class="login-form col-md-8"><!--login form-->
				<h2>Daftar Agency</h2>
				<form action="<?php echo site_url("signup/agency");?>" method="post">
					<input type="text" name="user" placeholder="Username" />
					<input type="email" name="email" placeholder="Email" />
					<textarea name="alamat" rows="3" placeholder="Alamat"></textarea>
					<br>
					<br>
					<input type="password" name="pwd" placeholder="Password" />
					<input type="password" name="pwd_c" placeholder="Konfirmasi Password" />
					<span>
						<!--<input type="checkbox" class="checkbox"> 
						Keep me signed in-->
					</span>
					<button type="submit" class="btn btn-default">Daftar</button>
				</form>
			</div><!--/login form-->
		</div>
	</div>
</section><!--/form-->