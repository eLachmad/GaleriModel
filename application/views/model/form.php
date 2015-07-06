<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?php echo base_url("assets/fancy_box"); ?>/source/jquery.fancybox.js?v=2.1.4"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/fancy_box"); ?>/source/jquery.fancybox.css?v=2.1.4" media="screen" />
<script>
	$(document).ready(function(){
		$(".fancybox").fancybox();
	});
</script>
<?php
$nama	=  ($id == null) ? (set_value("nama")) : ($model["NAMA"]);
// $path	=  ($id == null) ? (set_value("kondisi")) : ($produksi["KONDISI"]);
$status	=  ($id == null) ? (set_value("status")) : ($model["STATUS"]);
$photo	=  ($id == null || is_null($model["PHOTO"])) ? ("assets/images/noimage.jpg") : ("uploads/" . $model["PHOTO"]);
?>
<section class="panel">
	<header class="panel-heading font-bold bg-danger">Form Model</header>
	<div class="panel-body">
	  <form role="form" method="post" action="<?php echo site_url("model/form/" . $id); ?>" enctype="multipart/form-data" class="form-horizontal">
		<div class="form-group">
		  <label class="col-sm-2 control-label">Nama Model</label>
		  <div class="col-sm-3">
			<input type="text" class="form-control" name="nama" value="<?php echo $nama;  ?>">
		  </div>
		  <?php echo form_error("nama");?>
		</div>
		<div class="line line-dashed line-lg pull-in"></div>
		<div class="form-group">
		  <label class="col-sm-2 control-label">Status</label>
		  <div class="col-sm-3">
			<label class="switch">
			  <input type="checkbox" name="status" value="1" <?php echo ($status == 1) ? ("checked") : ("")?>>
			  <span></span>
			</label>
		  </div>
		  <?php echo form_error("status");?>
		</div>
		<div class="line line-dashed line-lg pull-in"></div>
		<div class="form-group">
		  <label class="col-sm-2 control-label">Foto</label>
		  <div class="col-sm-10">
			<a href="<?php echo base_url($photo); ?>" class="fancybox">
			<img height="200" width="170" style="margin-bottom:10px;" src="<?php echo base_url($photo); ?>">
			</a>
		  </div>
		  <label class="col-sm-2 control-label">&nbsp;</label>
		  <div class="col-sm-3">
			  <input type="file" name="userfile">
		  </div>
		</div>
		<div class="line line-dashed line-lg pull-in"></div>
		 <div class="form-group">
		  <div class="col-sm-4 col-sm-offset-2">
			<button type="submit" class="btn btn-danger">Simpan</button>
			<a href="<?php echo site_url("model"); ?>"><button type="button" class="btn btn-primary">Kembali</button></a>
		  </div>
		</div>
	  </form>
	</div>
</section>
<script language="javascript">
/* function del(id){
	var r = confirm("Apakah anda yakin ingin menghapus gambar ?");
	if(r == true)
		document.location.href="<?php echo base_url("produk/delete"); ?>/" + id;
}
function display(id){
	var r = confirm("Apakah anda yakin ingin menjadikan gambar ini sebagai gambar display ?");
	if(r == true)
		document.location.href="<?php echo base_url("produk/display"); ?>/" + id;
	else
		$("#display" + id).prop("checked",false);
} */
</script>