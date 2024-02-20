<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables-responsive/css/responsive.bootstrap4.min.css">

	<title>Sharecode.ID</title>
</head>
<body>
	<div class="container py-4">
		<h1 class="my-4">DataTables Server-side Processing (Sort + Search + Pagination) dengan CodeIgniter 3</h1>
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Data Mahasiswa</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">

				<table id="tblMahasiswa" class="table table-striped table-sm">
					<thead>
						<tr>
							<th width="5%">#</th>
							<th>Nama Lengkap</th>
							<th>TTL</th>
							<th class="text-center">JK</th>
							<th>Agama</th>
							<th>Alamat</th>
						</tr>
					</thead>

				</table>

			</div>
			<!-- /.card-body -->
		</div>
	</div>

	<script src="<?php echo base_url(); ?>assets/jquery/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


	<script type="text/javascript">

		$(document).ready(function() {

			$('#tblMahasiswa').DataTable({ 
				destroy: true,
				processing: true,
				language: {
					processing: "<i class=\"fas fa-spinner fa-pulse fa-3x\"></i>"
				},
				serverSide: true,
				order: [],
				ajax: {
					url: "<?php echo base_url('mahasiswa/data_ajax')?>",
					type: "POST"
				},
				columnDefs: [
    				{ targets: [ 0 ], "orderable": false, "className": "text-center" }
				],

			});

			$('.dataTables_processing').removeClass('card');


		});

	</script>


</body>
</html>