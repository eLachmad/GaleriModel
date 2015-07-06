<link rel="stylesheet" href="<?php echo base_url(); ?>assets/todo_admin/js/fuelux/fuelux.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/todo_admin/js/datatables/datatables.css" type="text/css" />
  <br>
  <section class="panel">
	<header class="panel-heading btn-success">
	  Daftar Agency
	  <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
	</header>
	<div class="table-responsive">
	  <table id="MyStretchGrid" class="table table-striped datagrid m-b-sm">
		<thead>
		  <tr>
			<th>
			  <div class="row">
				<div class="col-sm-8 m-t-xs m-b-xs">
					<!--<a href="<?php echo site_url("news_event/form"); ?>"><button class="btn btn-primary" type="button"><span class="fa fa-plus"></span> Tambah Event & News</button></a>-->
				</div>
				<div class="col-sm-4 m-t-xs m-b-xs">
				  <div class="input-group search datagrid-search">
					<input type="text" class="input-sm form-control" placeholder="Search">
					<div class="input-group-btn">
					  <button class="btn btn-white btn-sm"><i class="fa fa-search"></i></button>
					</div>
				  </div>
				</div>
			  </div>
			</th>
		  </tr>
		</thead>
		<tfoot>
		  <tr>
			<th class="row">
			  <div class="datagrid-footer-left col-sm-6 text-center-xs m-l-n" style="display:none;">
				<div class="grid-controls m-t-sm">
				  <span>
					<span class="grid-start"></span> -
					<span class="grid-end"></span> of
					<span class="grid-count"></span>
				  </span>
				  <div class="select grid-pagesize dropup" data-resize="auto">
					<button data-toggle="dropdown" class="btn btn-sm btn-white dropdown-toggle">
					  <span class="dropdown-label"></span>
					  <span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
					  <li data-value="5"><a href="#">5</a></li>
					  <li data-value="10"><a href="#">10</a></li>
					  <li data-value="20" data-selected="true"><a href="#">20</a></li>
					  <li data-value="50"><a href="#">50</a></li>
					  <li data-value="100"><a href="#">100</a></li>
					</ul>
				  </div>
				  <span>Per Page</span>
				</div>
			  </div>
			  <div class="datagrid-footer-right col-sm-6 text-right text-center-xs" style="display:none;">
				<div class="grid-pager m-r-n">
				  <button type="button" class="btn btn-sm btn-white grid-prevpage"><i class="fa fa-chevron-left"></i></button>
				  <span>Page</span>
				  <div class="inline">
					<div class="input-group dropdown combobox">
					  <input class="input-sm form-control" type="text">
					  <div class="input-group-btn dropup">
						<button class="btn btn-sm btn-white" data-toggle="dropdown"><i class="caret"></i></button>
						<ul class="dropdown-menu pull-right"></ul>
					  </div>
					</div>
				  </div>
				  <span>of <span class="grid-pages"></span></span>
				  <button type="button" class="btn btn-sm btn-white grid-nextpage"><i class="fa fa-chevron-right"></i></button>
				</div>
			  </div>
			</th>
		  </tr>
		</tfoot>
	  </table>
	</div>
  </section>
</div>
<script language="javascript">
function verify(id){
	r=confirm("Verifikasi agency ini ?");
	if(r == true)
		document.location.href="<?php echo site_url("user/verify"); ?>/" + id;
}
$(document).ready(function() {
	// fuelux datagrid
	var DataGridDataSource = function (options) {
		this._formatter = options.formatter;
		this._columns = options.columns;
		this._delay = options.delay;
	};

	DataGridDataSource.prototype = {

		columns: function () {
			return this._columns;
		},

		data: function (options, callback) {
			var url = '<?php echo site_url("user/grid_json_agency"); ?>';
			var self = this;

			setTimeout(function () {

				var data = $.extend(true, [], self._data);

				$.ajax(url, {
					dataType: 'json',
					async: true,
					type: 'GET'
				}).done(function (response) {

					data = response.geonames;
					// SEARCHING
					if (options.search) {
						data = _.filter(data, function (item) {
							var match = false;

							_.each(item, function (prop) {
								if (_.isString(prop) || _.isFinite(prop)) {
									if (prop.toString().toLowerCase().indexOf(options.search.toLowerCase()) !== -1) match = true;
								}
							});

							return match;
						});
					}
					
					var count = data.length;

					// SORTING
					if (options.sortProperty) {
						data = _.sortBy(data, options.sortProperty);
						if (options.sortDirection === 'desc') data.reverse();
					}

					// PAGING
					var startIndex = options.pageIndex * options.pageSize;
					var endIndex = startIndex + options.pageSize;
					var end = (endIndex > count) ? count : endIndex;
					var pages = Math.ceil(count / options.pageSize);
					var page = options.pageIndex + 1;
					var start = startIndex + 1;

					data = data.slice(startIndex, endIndex);

					if (self._formatter) self._formatter(data);

					callback({ data: data, start: start, end: end, count: count, pages: pages, page: page });
				}).fail(function(e){

				});
			}, self._delay);
		}
	};
	$('#MyStretchGrid').each(function() {
    	$(this).datagrid({
	        dataSource: new DataGridDataSource({
			    // Column definitions for Datagrid
			    columns: [
					{
						property: 'NO',
						label: 'No.',
						sortable: true
					},
					{
						property: 'USERNAME',
						label: 'Username',
						sortable: true
					},
					{
						property: 'EMAIL',
						label: 'Email',
						sortable: true
					},
					{
						property: 'NAMA_USER',
						label: 'Nama',
						sortable: true
					},
					{
						property: 'ALAMAT',
						label: 'Alamat',
						sortable: true
					},
					{
						property: 'STATUS',
						label: 'Status',
						sortable: true
					},
					{
						property: 'BUTTON',
						label: 'Approval',
						sortable: true
					}
				],

		  })
	    });
	});
});
</script>
<!-- fuelux -->
<script src="<?php echo base_url(); ?>assets/todo_admin/js/fuelux/fuelux.js"></script>
<script src="<?php echo base_url(); ?>assets/todo_admin/js/libs/underscore-min.js"></script>
<!-- datatables -->
<script src="<?php echo base_url(); ?>assets/todo_admin/js/datatables/jquery.dataTables.min.js"></script>