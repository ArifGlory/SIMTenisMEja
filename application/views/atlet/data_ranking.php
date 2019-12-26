<?php $level =  $this->session->userdata()['level'] ?>
<div class="pcoded-content">
	<!-- [ breadcrumb ] start -->
	<div class="page-header">
		<div class="page-block">
			<div class="row align-items-center">
				<div class="col-md-8">
					<div class="page-header-title">
						<h4 class="m-b-10">Ranking</h4>
					</div>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="<?php  echo base_url()?>Admin">
								<i class="feather icon-home"></i>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a href="#">Data Ranking</a>
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
									<h5>Data Ranking</h5>

									<div class="card-header-right">

									</div>
								</div>
								<div class="card-block">
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
</div>
</div>
</div>
</div>


<script type="text/javascript">
	$(document).ready(function () {
		var myTable = $("#table_user").DataTable();

	});
</script>
