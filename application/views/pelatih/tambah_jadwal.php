<div class="pcoded-content">
	<!-- [ breadcrumb ] start -->
	<div class="page-header">
		<div class="page-block">
			<div class="row align-items-center">
				<div class="col-md-8">
					<div class="page-header-title">
						<h4 class="m-b-10">Tambah Jadwal</h4>
					</div>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="<?php echo  base_url()?>Admin">
								<i class="feather icon-home"></i>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a href="#">Jadwal Latihan</a>
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
									<h5>Data Jadwal</h5>

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
													<form id="form_tambah" action="<?php echo base_url(); ?>Jadwal/simpanJadwal"
														  method="post" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12">
															<div class="form-group col-md-12">
																<label>Pilih Hari</label>
																<select style="width: 100%;" id="selectAtlet" class="form-control" name="hari">
																	<option value="Senin">Senin</option>
																	<option value="Selasa">Selasa</option>
																	<option value="Rabu">Rabu</option>
																	<option value="Kamis">Kamis</option>
																	<option value="Jumat">Jumat</option>
																	<option value="Sabtu">Sabtu</option>
																	<option value="Minggu">Minggu</option>
																</select>
															</div>
															<br>
															<div class="form-group">
																<br>
																<label>Pilih Waktu</label>
																<input type="text" class="form-control" id="timepicker" name="waktu" required>
															</div>
															<div class="form-group">
																<button type="submit" class="btn btn-md btn-primary">Simpan Jadwal</button>
															</div>
                                                        </div>
                                                    </div>
													</form>
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
		$('#selectAtlet').select2();

        $('#timepicker').mdtimepicker();

        $(".numeric").keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g,'');
        });

        $("#form_tambah").submit(function (e) {
            e.preventDefault();
            var form = $(this);
            var btnHtml = form.find("[type='submit']").html();
            var url = form.attr("action");
            var data = new FormData(this);

            console.log("diklik");
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
