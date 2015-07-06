<div class="container">	
	<div class="row">
		<h2>Event</h2>
	</div>
</div>
<?php
foreach($event as $row){
?>
<div class="container">	
	<div class="row">
		<div class="col-sm-9">
			<div class="media commnets" style="padding:10px;">
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