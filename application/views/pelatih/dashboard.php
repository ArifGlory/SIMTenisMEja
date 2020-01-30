<div class="pcoded-content">
	<!-- [ breadcrumb ] start -->
	<div class="page-header">
		<div class="page-block">
			<div class="row align-items-center">
				<div class="col-md-8">
					<div class="page-header-title">
						<h4 class="m-b-10">Dashboard</h4>
					</div>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="#">
								<i class="feather icon-home"></i>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a href="<?php echo base_url(); ?>Admin">Dashboard</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- [ breadcrumb ] end -->
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-body">
					<!-- [ page content ] start -->
					<div class="row">
						<div class="col-md-12 col-xl-4">
							<div class="card">
								<div class="card-block text-center">
									<i class="feather icon-user text-c-blue d-block f-40"></i>
									<h4 class="m-t-20"><span class="text-c-blue"><?php echo $jml_atlet; ?></span> Atlet</h4>
									<p class="m-b-20">Data Alumni</p>
									<a href="<?php echo base_url(); ?>Admin/atlet" class="btn btn-primary btn-sm btn-round">Kelola</a>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xl-4">
							<div class="card">
								<div class="card-block text-center">
									<i class="feather icon-file-text text-c-green d-block f-40"></i>
									<h4 class="m-t-20"><span class="text-c-green"><?php echo $jml_evaluasi; ?></span> Evaluasi</h4>
									<p class="m-b-20">Data Evaluasi</p>
									<a href="<?php echo base_url(); ?>Admin/evaluasi" class="btn btn-success btn-sm btn-round">Kelola</a>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<h5>Data Ranking</h5>

									<div class="card-header-right">

									</div>
								</div>
								<div class="card-block">
									<div class="row">
										<div class="col-md-8">
											<form id="form_tanggal" action="<?php echo base_url(); ?>Admin/rankByTanggal"
												  method="post" enctype="multipart/form-data">
												<div class="form-group">
													<label>Pilih Tanggal</label>
													<input name="tanggal" class="form-control" type="date">
												</div>
												<div class="form-group">
													<button class="btn btn-sm btn-primary" type="submit">Pilih</button>
												</div>
											</form>
										</div>
									</div>
									<br><br>
									<div class="table-responsive">
										<div class="row">
											<div class="col-xs-12 col-sm-12">
												<table id="table_user" class="table table-hover">
													<thead>
													<tr role="row">
														<th>No.</th>
														<th>Nama</th>
														<th>Total Nilai</th>
													</tr>
													</thead>
													<tbody>
													<?php
													$no = 1;
													foreach($rank as $val){
														?>
														<tr>
															<td><?php echo $no++;?></td>
															<td>
																<?php echo $val->nama; ?>
															</td>
															<td>
																<?php echo "Total Nilai ". $val->totalnya; ?>
															</td>
														</tr>
													<?php }?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- [ page content ] end -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ style Customizer ] start -->
<!-- <div id="styleSelector">
					</div> -->
<!-- [ style Customizer ] end -->
</div>
</div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var myTable = $("#table_user").DataTable();

    });
</script>
