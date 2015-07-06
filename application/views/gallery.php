<div class="container">
<div class="row">
<div class="col-sm-9">
	<div class="features_items"><!--features_items-->
		
		<?php
		foreach($user as $row){
		$model = $this->m_model->get_by(array("ID_USER"=>$row["ID_USER"]));
		?>
		<h2><?php echo $row["NAMA_USER"]; ?></h2>
		<?php
		foreach($model as $row2){
		?>
		<div class="col-sm-4">
			<div class="product-image-wrapper">
				<div class="single-products">
						<div class="productinfo text-center">
							<img width="255" height="255" src="<?php echo base_url("uploads/" . $row2["PHOTO"]); ?>" alt="" />
							<p><?php echo $row2["NAMA"]; ?></p>
							<a onclick="add_to_cart(<?php echo $row2["ID_MODEL"]; ?>)" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Booking</a>
						</div>
						<div class="product-overlay">
							<div class="overlay-content">
								<p><?php echo $row2["NAMA"]; ?></p>
								<a onclick="add_to_cart(<?php echo $row2["ID_MODEL"]; ?>)" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Booking</a>
							</div>
						</div>
				</div>
			</div>
		</div>
		<?php
		}
		}
		?>
	</div><!--features_items-->
</div>
</div>
</div>