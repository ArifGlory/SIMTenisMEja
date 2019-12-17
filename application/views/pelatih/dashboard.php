<div class="pcoded-content">
	<!-- [ breadcrumb ] start -->
	<div class="page-header">
		<div class="page-block">
			<div class="row align-items-center">
				<div class="col-md-8">
					<div class="page-header-title">
						<h4 class="m-b-10">Dashboard Pelatih SIM TTC</h4>
					</div>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="#">
								<i class="feather icon-home"></i>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a href="<?php echo base_url(); ?>Admin">Dashboard Pelatih</a>
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
							<div class="card table-card">
								<div class="card-header">
									<h5>Data Evaluasi Terbaru</h5>
									<div class="card-header-right">
										<ul class="list-unstyled card-option" style="width: 30px;">
											<li class="first-opt" style=""><i
													class="feather open-card-option icon-chevron-left"></i></li>
											<li><i class="feather icon-minus minimize-card"></i></li>
											<!-- <li><i class="feather icon-refresh-cw reload-card"></i></li> -->
										</ul>
									</div>
								</div>
								<div class="card-block">

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
