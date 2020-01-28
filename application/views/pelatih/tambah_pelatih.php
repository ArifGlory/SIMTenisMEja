<div class="pcoded-content">
						<!-- [ breadcrumb ] start -->
						<div class="page-header">
							<div class="page-block">
								<div class="row align-items-center">
									<div class="col-md-8">
										<div class="page-header-title">
											<h4 class="m-b-10"></h4>
										</div>
										<ul class="breadcrumb">
											<li class="breadcrumb-item">
												<a href="<?php echo base_url();?>">
														<i class="feather icon-home"></i>
													</a>
											</li>
											<li class="breadcrumb-item">
												<a href="#">Tambah Pelatih</a>
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
															<h5>Tambahkan Pelatih Baru</h5>
														</div>
														<div class="card-block">
															<form id="form_tambah" action="<?php echo base_url(); ?>Admin/savePelatih"
																  method="post" enctype="multipart/form-data">
															<div class="form-group">
																<label>Username</label>
																<input required class="form-control" type="text" name="username">
															</div>
															<div class="form-group">
																<label>Nama</label>
																<input required class="form-control" type="text" id="nama" name="nama">
															</div>
															<div class="form-group">
																<label>Password</label>
																<input required class="form-control" type="password" id="password" name="password">
															</div>

															<div class="form-group">
																<button class="btn btn-primary btn-sm" type="submit">Simpan</button>
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

        $(".numeric").keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g,'');
        });

		$("#form_tambah").submit(function (e) {
			e.preventDefault();
			var form = $(this);
			var btnHtml = form.find("[type='submit']").html();
			var url = form.attr("action");
			var data = new FormData(this);

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



		});




	});
</script>
