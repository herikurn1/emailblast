@extends('layouts.template')

@section('js')
	<script type="text/javascript">
		var kd_unit 		= "{{ session('kd_unit') }}";
		var kd_lokasi 		= "{{ session('kd_lokasi') }}";

		var no 				= 1;
		var thn_anggaran 	= {!! $dt['thn_anggaran'] !!};
		var data_user 		= {!! $dt['data_user'] !!};

		var last_thn_anggaran = '';

		$(function() {
			$.each(thn_anggaran, function(x, y) {
				var o = new Option(y.thn_anggaran, y.thn_anggaran);
				$(o).html(y.thn_anggaran);
				$('#thn_anggaran').append(o);

				last_thn_anggaran = y.thn_anggaran;
			});

			$('#thn_anggaran').val(last_thn_anggaran).trigger("change");

			show_all();
		});

		function show_all() {
			show_bod();
			show_complete();
		}

		function save_dt() {
			var data_all = $('#frm_approval_bod').serializeArray();

			$('#v_loading').show();
			$.ajax({
				type 	: 'POST',
				url 	: 'approval_bod/save',
				data 	: data_all,
				success : function(msg) {
					$('#v_loading').hide();
					show_all();
				},
				error 	: function(xhr) {
					$('#v_loading').hide();
					read_error(xhr);
				}
			});
		}

		function show_bod() {
			var thn_anggaran = $('#thn_anggaran').val();

			$.ajax({
				type 	: 'POST',
				url 	: 'approval_bod/show_bod',
				data 	: {
					"thn_anggaran" 	: thn_anggaran,
					"kd_unit"		: kd_unit,
					"_token"		: '{{ csrf_token() }}'
				},
				success : function(msg) {
					var tbl = get_header_bod();

					$('#budget-tabContent-bod').html(tbl);

					$.each(msg, function(x, y) {
						var row = ''+
							'<tr>'+
								'<td>'+y.no_pengajuan+'</td>'+
								'<td>'+date_id(y.tgl_entry)+'</td>'+
								'<td>'+y.kd_departemen+' - '+y.nm_departemen+'</td>'+
								'<td>'+y.user_entry+' - '+y.nm_entry+'</td>'+
								'<td><button type="button" class="btn btn-primary btn-sm" onclick="show_barang(\''+y.no_pengajuan+'\', \'F\')">Lihat</button></td>'+
								'<td><input type="checkbox" name="no_pengajuan[]" value="'+y.no_pengajuan+'" /></td>'+
							'</tr>'+
						'';

						$('#tbl_bod').append(row);
					});
				},
				error 	: function(xhr) {
					read_error(xhr);
				}
			});
		}

		function show_complete() {
			var thn_anggaran = $('#thn_anggaran').val();

			$.ajax({
				type 	: 'POST',
				url 	: 'approval_bod/show_complete',
				data 	: {
					"thn_anggaran" 	: thn_anggaran,
					"kd_unit"		: kd_unit,
					"_token"		: '{{ csrf_token() }}'
				},
				success : function(msg) {
					var tbl = get_header_complete();

					$('#budget-tabContent-complete').html(tbl);

					$.each(msg, function(x, y) {
						var row = ''+
							'<tr>'+
								'<td>'+y.no_pengajuan+'</td>'+
								'<td>'+date_id(y.tgl_entry)+'</td>'+
								'<td>'+y.kd_departemen+' - '+y.nm_departemen+'</td>'+
								'<td>'+y.user_entry+' - '+y.nm_entry+'</td>'+
								'<td><button type="button" class="btn btn-primary btn-sm" onclick="show_barang(\''+y.no_pengajuan+'\', \'B\')">Lihat</button></td>'+
							'</tr>'+
						'';

						$('#tbl_complete').append(row);
					});
				},
				error 	: function(xhr) {
					read_error(xhr);
				}
			});
		}

		function show_barang(id, status_approval) {
			if(id != undefined){
				$('#sys-modal-default-helper-1').val(id);
				$('#sys-modal-default-helper-2').val(status_approval);
			}

			var keyword 		= $('#sys-modal-default-keyword').val();
			var no_pengajuan 	= $('#sys-modal-default-helper-1').val();
			var status_approval = $('#sys-modal-default-helper-2').val();

			var btn_save_barang = '';
			var btn_del_barang 	= '';
			var btn_edit_barang = 'readonly';
			if(status_approval == "F"){
				btn_save_barang = '<button type="button" class="btn btn-info btn-sm btn-flat" onclick="save_barang()" >Simpan</button>';
				btn_edit_barang = '';
			}

			$.ajax({
				type 	: 'POST',
				url 	: 'approval_kabag/show_barang',
				data 	: {
					"no_pengajuan"	: no_pengajuan,
					"_token"		: '{{ csrf_token() }}'
				},
				success : function(msg) {
					var tbl = ''+
						'<form id="frm_barang" autocomplete="off" onsubmit="return save_barang();">'+
							'<div class="row">'+
					          	'<div class="col-12">'+
					            	'<div class="card">'+
					              		'<div class="card-header">'+
					                		'<h3 class="card-title">Item CAPEX</h3>'+
					                		'<div class="card-tools">'+
					                			btn_save_barang+
					                		'</div>'+
					              		'</div>'+

					              		'<div class="card-body table-responsive p-0" style="height: 300px;">'+
											'<table class="table table-sm table-head-fixed text-nowrap">'+
												'<thead>'+
													'<tr>'+
														'<th>No.</th>'+
														'<th>Nama CAPEX</th>'+
														'<th>Qty Req.</th>'+
														'<th>Harga</th>'+
														'<th>Total</th>'+
														'<th>Qty FA</th>'+
														'<th>Qty BOD</th>'+
														'<th>Kategori</th>'+
														'<th>Jenis</th>'+
														'<th>Urgency</th>'+
														'<th>Catatan</th>'+
													'</tr>'+
												'</thead>'+
												'<tbody>'+
					'';

					var i = 1;
					$.each(msg, function(x, y){
						var qty_final_default 	= y.qty_finance;
						var qty_final_readonly 	= '';

						if(y.qty_final != null){
							qty_final_default = y.qty_final;
						}

						if(y.qty_final == "0"){
							qty_final_readonly = 'readonly';
						}

						if(status_approval == "F"){
							btn_del_barang = '<button class="btn btn-warning btn-flat btn-sm" type="button" onclick="hapus_qty_final(\''+y.rowid+'\')"><i class="fas fa-times"></i></button>';
						}

						tbl += ''+
													'<tr>'+
														'<td class="align-middle">'+i+'.</td>'+
														'<td class="align-middle">'+y.kd_barang+' - '+y.nm_barang+'</td>'+
														'<td class="align-middle" align="center">'+y.qty+'</td>'+
														'<td class="align-middle" align="right">'+
															number_format_id(y.harga)+
														'</td>'+
														'<td class="align-middle" align="right">'+
															number_format_id(y.jumlah_harga)+
														'</td>'+
														'<td class="align-middle" align="center">'+y.qty_finance+'</td>'+
														'<td class="align-middle">'+
															'<div class="input-group input-group-sm">'+
																'<input type="hidden" name="rowid[]" value="'+y.rowid+'" />'+
																'<input type="text" class="form-control form-control-sm rounded-0" id="qty_final_'+y.rowid+'" name="qty_final[]" style="width: 80px; text-align: center;" value="'+qty_final_default+'" min="1" '+qty_final_readonly+' '+btn_edit_barang+' />'+
																'<div class="input-group-append">'+
																	btn_del_barang+
																'</div>'+
															'</div>'+
															
														'</td>'+
														'<td class="align-middle">'+y.nm_kategori_budget+'</td>'+
														'<td class="align-middle">'+y.nm_jenis+'</td>'+
														'<td class="align-middle">'+y.nm_urgency+'</td>'+
														'<td class="align-middle">'+y.catatan+'</td>'+
													'</tr>'+
						'';

						i++;
					});

					tbl += ''+
												'</tbody>'+
											'</table>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>'+
						'</form>'+
					'';

					$('#sys-modal-default-body').html(tbl);
					$('#sys-modal-default-btn-search').attr('onclick', 'show_barang()');
					$('#sys-modal-default').modal("show");
				},
				error 	: function(xhr) {
					read_error(xhr);
				}
			});
		}

		function hapus_qty_final(id) {
			var qty_final_status = $('#qty_final_'+id).attr('readonly');

			if(!qty_final_status){
				var ans = confirm('Apakah anda yakin ingin menolak item ini ?');
				if(ans){
					$('#qty_final_'+id).val('0');
					$('#qty_final_'+id).attr('readonly', true);
				}
			}
		}

		function save_barang() {
			var data_all 		= $('#frm_barang').serializeArray();
			var no_pengajuan 	= $('#sys-modal-default-helper-1').val();
			data_all.push({name : "no_pengajuan", value : no_pengajuan});
			data_all.push({name : "_token", value : '{{ csrf_token() }}' });

			$.ajax({
				type 	: 'POST',
				url 	: 'approval_bod/save_barang',
				data 	: data_all,
				success : function(msg) {
					$('#sys-modal-default').modal("hide");
				},
				error 	: function(xhr) {
					read_error(xhr);
				}
			});

			return false;
		}

		function get_header() {
			var tbl = ''+
							'<th>No Pengajuan</th>'+
			              	'<th>Tgl</th>'+
			              	'<th>Departemen</th>'+
			              	'<th>Pembuat</th>'+
			              	'<th>Detail</th>'+
			'';

			return tbl;
		}

		function get_header_bod() {
			var tbl = ''+
				'<table id="tbl_bod" class="table table-sm table-head-fixed text-nowrap">'+
					'<thead>'+
	                    '<tr>'+
	        '';

	        tbl += get_header();

	        tbl += ''+
	        				'<th>Approve</th>'+
	                    '</tr>'+
	              	'</thead>'+
					'<tbody>'+
	            	'</tbody>'+
	            '</table>'+
			'';

			return tbl;
		}

		function get_header_complete() {
			var tbl = ''+
				'<table id="tbl_complete" class="table table-sm table-head-fixed text-nowrap">'+
					'<thead>'+
	                    '<tr>'+
	        '';

	        tbl += get_header();

	        tbl += ''+
	                    '</tr>'+
	              	'</thead>'+
					'<tbody>'+
	            	'</tbody>'+
	            '</table>'+
			'';

			return tbl;
		}
	</script>
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="card card-primary card-outline">
		      	<div class="card-header">
		        	<h3 class="card-title">
		        		{!! $dt['button'] !!}
		        	</h3>
		        	<div class="float-right">
		        		<select name="thn_anggaran" class="form-control" id="thn_anggaran" name="thn_anggaran" onchange= "show_all(this)">
				        	<option value="">Tahun Anggaran</option>
				        </select>
		        	</div>
		      	</div>

		      	<form class="form-horizontal" id="frm_approval_bod" autocomplete="off" onsubmit="return save_process()">
			        <div class="card-body">
			        	<div class="form-group row">
							<div class="col-sm-12">
					          	<div class="card card-primary card-outline card-outline-tabs">
				              		<div class="card-header p-0 border-bottom-0">
										<ul class="nav nav-tabs" id="budget-tab" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" id="budget-tab-bod" data-toggle="pill" href="#budget-tabContent-bod" role="tab" aria-controls="budget-tabContent-bod" aria-selected="true">Menunggu Approval BOD</i></a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="budget-tab-complete" data-toggle="pill" href="#budget-tabContent-complete" role="tab" aria-controls="budget-tabContent-complete" aria-selected="true">Complete</i></a>
											</li>
										</ul>
				              		</div>

					              	<div class="card-body table-responsive p-0" >
						                <div class="tab-content" id="budget-tabContent">
						                  	<div class="tab-pane fade show active" id="budget-tabContent-bod" role="tabpanel" aria-labelledby="budget-tab-bod" style="padding: 10px;">
						                     	
						                  	</div>
						                  	<div class="tab-pane fade show" id="budget-tabContent-complete" role="tabpanel" aria-labelledby="budget-tab-complete" style="padding: 10px;">
						                     	
						                  	</div>
						                </div>
					              	</div>
				            	</div>
				            </div>
		            	</div>
			        </div>
					<button type="submit" id="btn_save" style="display: none;">Save</button>
					@csrf
		      	</form>
		      	<div id="v_loading" class="overlay" style="display: none;">
					<i class="fas fa-2x fa-sync-alt fa-spin"></i>
				</div>
	    	</div>
		</div>
	</div>
@endsection