<div class="pcoded-content">
						<!-- [ breadcrumb ] start -->
						<div class="page-header">
							<div class="page-block">
								<div class="row align-items-center">
									<div class="col-md-8">
										<div class="page-header-title">
											<h4 class="m-b-10">Sample page</h4>
										</div>
										<ul class="breadcrumb">
											<li class="breadcrumb-item">
												<a href="<?php echo base_url();?>">
														<i class="feather icon-home"></i>
													</a>
											</li>
											<li class="breadcrumb-item">
												<a href="#">Ganti Password</a>
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
															<h5>Ganti Password</h5>
														</div>
														<div class="card-block">
															<form id="form_edit" action="<?php echo base_url(); ?>Auth/changePassword"
																  method="post" enctype="multipart/form-data">
															<?php if ($this->session->userdata('level') == "atlet"){ ?>
																<div class="form-group">
																	<input class="form-control" type="hidden" name="idatlet" value="<?php echo $profil['idatlet']; ?>">
																</div>
															<?php }else{ ?>
																<div class="form-group">
																	<input class="form-control" type="hidden" name="idadmin" value="<?php echo $profil['idadmin']; ?>">
																</div>
															<?php } ?>
															<div class="form-group">
																<label>Ketikkan Password Lama Anda</label>
																<input required class="form-control" type="password" name="passwordlama" value="">
															</div>
															<div class="form-group">
																<label>Ketikkan Password Baru Anda</label>
																<input required class="form-control" type="password" id="passnew" name="passwordbaru" value="">
															</div>
															<div class="form-group">
																<label>Ketikkan kembali Password Baru Anda</label>
																<input required class="form-control" type="password" id="passnew2" value="">
															</div>
															<div class="form-group">
																<button class="btn btn-primary btn-sm" type="submit">Simpan Perubahan</button>
															</div>
															</form>
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

		$("#form_edit").submit(function (e) {
			e.preventDefault();
			var form = $(this);
			var btnHtml = form.find("[type='submit']").html();
			var url = form.attr("action");
			var data = new FormData(this);

			console.log("diklik");
			var passnew = $("#passnew").val();
			var passnew2 = $("#passnew2").val();

			if (passnew == passnew2){
				$.ajax({

					beforeSend: function () {
						form.find("[type='submit']").addClass("disabled").html("Loading ... ");
					},
					cache: false,
					processData: false,
					contentType: false,
					type: "POST",
					url: url,
					data: data,
					dataType: 'JSON',
					success: function (response) {
						form.find("[type='submit']").removeClass("disabled").html(btnHtml);
						if (response.status == "success") {
							swal("Berhasil", response.message, "success");
							console.log(response);
							setTimeout(function () {
								swal.close();
								window.location.replace(response.redirect);
							}, 1000);

						} else {
							swal("Gagal", response.message, "error");
						}
					}

				});
			}else{
				swal("Gagal", "Konfirmasi Password tidak valid", "error");
			}



		});




	});
</script>
