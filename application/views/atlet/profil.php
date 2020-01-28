<div class="pcoded-content">
	<!-- [ breadcrumb ] start -->
	<div class="page-header">
		<div class="page-block">
			<div class="row align-items-center">
				<div class="col-md-8">
					<div class="page-header-title">
						<h4 class="m-b-10">Profil  Saya</h4>
					</div>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="<?php echo  base_url()?>">
								<i class="feather icon-home"></i>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a href="#">Profil User</a>
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
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<div class="row">
										<div class="col-md-6">
											<h5>Data Atlet</h5>
										</div>
										<div class="col-md-6">
											<div class="text-right">
												<a class="btn btn-sm btn-primary" href="<?php echo base_url();?>Auth/editProfiluser">Edit Profil</a>
											</div>
										</div>
									</div>

								</div>
								<div class="card-block">
                                    <div class="table-responsive">
                                        <div class="table-content">
                                            <div class="project-table">
                                                <div id="e-product-list_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-sm-12 col-md-6"></div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12">
															<div class="form-group">
																<label>Username</label>
																<h4> <?php echo $profil['username'];?></h4>
															</div>
															<div class="form-group">
																<label>Nama</label>
																<h5> <?php echo $profil['nama'];?></h5>
															</div>
															<div class="form-group">
																<label>NIK</label>
																<h5> <?php echo $profil['nik'];?></h5>
															</div>
															<div class="form-group">
																<label>Tanggal Lahir</label>
																<h5> <?php echo date( 'F j, Y', strtotime($profil['tanggal_lahir']));?></h5>
															</div>
															<div class="form-group">
																<label>Jenis Atlet</label>
																<h5> <?php echo $profil['kategori'];?></h5>
															</div>
															<div class="form-group">
																<label>Jenis Kelamin</label>
																<h5>
																	<?php if ($profil['jenis_kelamin'] == "L"){
																		echo "Laki-laki";
																	}else{
																		echo "Perempuan";
																	} ?>
																</h5>
															</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								</div>
							</div>
						</div>
					</div>



				</div>
			</div>
		</div>
	</div>


</div>
</div>
</div>
</div>
</div>


<script type="text/javascript">
	$(document).ready(function () {



	});
</script>
