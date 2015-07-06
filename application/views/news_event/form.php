<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?php echo base_url("assets/fancy_box"); ?>/source/jquery.fancybox.js?v=2.1.4"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/fancy_box"); ?>/source/jquery.fancybox.css?v=2.1.4" media="screen" />
<script>
	$(document).ready(function(){
		$(".fancybox").fancybox();
	});
</script>
<?php
$judul	=  ($id == null) ? (set_value("judul")) : ($news_event["JUDUL"]);
$isi	=  ($id == null) ? (set_value("isi")) : ($news_event["ISI"]);
$jenis	=  ($id == null) ? (set_value("jenis")) : ($news_event["JENIS"]);
$status	=  ($id == null) ? (set_value("status")) : ($news_event["STATUS"]);
$photo	=  ($id == null || is_null($news_event["PHOTO"])) ? ("assets/images/noimage.jpg") : ("news/" . '/' . $news_event["PHOTO"]);
?>
<section class="panel">
	<header class="panel-heading font-bold bg-danger">Form Model</header>
	<div class="panel-body">
	  <form role="form" method="post" action="<?php echo site_url("news_event/form/" . $id); ?>" enctype="multipart/form-data" class="form-horizontal">
		<div class="form-group">
		  <label class="col-sm-2 control-label">Judul</label>
		  <div class="col-sm-3">
			<input type="text" class="form-control" name="judul" value="<?php echo $judul;  ?>">
		  </div>
		  <?php echo form_error("judul");?>
		</div>
		<div class="form-group">
		  <label class="col-sm-2 control-label">Isi</label>
		  <div class="col-sm-3">
			<textarea class="form-control" name="isi"><?php echo $isi; ?></textarea>
		  </div>
		  <?php echo form_error("isi");?>
		</div>
		<div class="line line-dashed line-lg pull-in"></div>
		<div class="form-group">
		  <label class="col-sm-2 control-label">Jenis</label>
		  <div class="col-sm-3">
			<select name="jenis" class="form-control">
				<option value="">Pilih Jenis</option>
				<option value="1" <?php echo (($jenis == 1) ? ("selected") : ("")); ?>>News</option>
				<option value="2" <?php echo (($jenis == 2) ? ("selected") : ("")); ?>>Event</option>
			</select>
		  </div>
		  <?php echo form_error("jenis");?>
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
			<a href="<?php echo site_url("news_event"); ?>"><button type="button" class="btn btn-primary">Kembali</button></a>
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