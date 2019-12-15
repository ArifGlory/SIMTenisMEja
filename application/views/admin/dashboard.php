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
												<a href="index.html">
														<i class="feather icon-home"></i>
													</a>
											</li>
											<li class="breadcrumb-item">
												<a href="#"> Home </a>
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
                                                <div class="card table-card">
                                                    <div class="card-header">
                                                        <h5>Data Evaluasi terbaru</h5>
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
                                                        <div class="table-responsive">
                                                            <table class="table table-hover">
                                                                <thead>
                                                                <tr>
                                                                    <th>Tanggal Evaluasi</th>
                                                                    <th>Total Nilai</th>
                                                                    <th class="text-right">Pesan Evaluasi</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php foreach($evaluasi as $val){
                                                                     ?>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="d-inline-block align-middle">
                                                                                <img src="<?php echo base_url(); ?>asset/assets/images/<?php echo $foto; ?>"
                                                                                     alt="user image"
                                                                                     class="img-radius img-40 align-top m-r-15">
                                                                                <div class="d-inline-block">
                                                                                    <h6><?php echo $val->nama_pelanggan; ?></h6>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td><?php echo $val->phone; ?></td>
                                                                        <td class="text-right"><?php echo $val->alamat; ?></td>
                                                                    </tr>
                                                                <?php } ?>
                                                                </tbody>
                                                            </table>
                                                            <div class="text-right m-r-20">
                                                                <a href="<?php echo base_url(); ?>Dashboard/evaluasi" class=" b-b-primary text-primary">Lihat
                                                                    Semua Data Evaluasi</a>
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
