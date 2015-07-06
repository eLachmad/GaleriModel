<div class="container">
		<h2><span>News</span></h2> 
</div>
<?php
foreach($news as $row){
?>
<div class="container">
	<div class="row">
		<div class="col-sm-9">
			<div class="media commnets">
				<a class="pull-left" href="#">
					<img style="width:136px;height:97px;" class="media-object" src="<?php echo base_url("news/" . $row["PHOTO"]); ?>" alt="">
				</a>
				<div class="media-body">
					<h4 class="media-heading"><?php echo $row["JUDUL"]; ?></h4>
					<p><?php echo $row["ISI"]; ?></p>
				</div>
			</div>
		</div>
	</div>
</div><!--Comments-->
<?php
}
?>