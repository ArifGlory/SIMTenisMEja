<div class="pcoded-content">
	<!-- [ breadcrumb ] start -->
	<div class="page-header">
		<div class="page-block">
			<div class="row align-items-center">
				<div class="col-md-8">
					<div class="page-header-title">
						<h4 class="m-b-10">Evaluasi Saya</h4>
					</div>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="<?php  echo base_url()?>Admin">
								<i class="feather icon-home"></i>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a href="#">Data Evaluasi Saya</a>
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
									<h5>Data Semua Evaluasi Saya</h5>
								</div>
								<div class="card-block">
									<div class="table-responsive">
										<div class="row">
											<div class="col-xs-12 col-sm-12">
												<table id="table_user" class="table table-hover">
													<thead>
														<tr role="row">
															<th>Tanggal Evaluasi</th>
															<th>Total Nilai</th>
															<th>Kategori Nilai</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach($evaluasi as $val){
                                                           ?>
														<tr>
															<td>
																<?php echo date( 'F j, Y', strtotime($val->tanggal)); ?>
															</td>
															<td>
																<?php echo $val->total_nilai; ?>
															</td>
															<td>
																<?php echo $val->kategori_nilai; ?>
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
</div>
</div>
</div>
</div>


<script type="text/javascript">
	$(document).ready(function () {
		var myTable = $("#table_user").DataTable();
        var kode_produk;


	});
</script>
