<div class="pcoded-content">
	<!-- [ breadcrumb ] start -->
	<div class="page-header">
		<div class="page-block">
			<div class="row align-items-center">
				<div class="col-md-8">
					<div class="page-header-title">
						<h4 class="m-b-10">Edit Evaluasi</h4>
					</div>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="<?php echo  base_url()?>Admin">
								<i class="feather icon-home"></i>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a href="#">Edit Evaluasi Atlet</a>
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
									<h5>Data Evaluasi</h5>

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
													<form id="form_update" action="<?php echo base_url(); ?>Admin/updateEvaluasi"
														  method="post" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12">
															<div class="form-group col-md-12">
																<label>Nama Atlet</label>
																<h3><?php echo $evaluasi['nama']; ?></h3>
															</div>
															<div class="form-group">
																<input name="idevaluasi" type="hidden" value="<?php echo $evaluasi['idevaluasi']; ?>">
																<br>
																<label>Backhand</label>
																<input value="<?php echo $evaluasi['backhand']; ?>" onchange="handleChange(this);" type="text" class="form-control numeric" name="backhand" required>
															</div>
															<div class="form-group">
																<label>Forehand</label>
																<input value="<?php echo $evaluasi['forehand']; ?>" onchange="handleChange(this);" type="text" class="form-control numeric" name="forehand" required>
															</div>
															<div class="form-group">
																<label>Chop</label>
																<input value="<?php echo $evaluasi['chop']; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="chop" required>
															</div>
															<div class="form-group">
																<label>Blok</label>
																<input value="<?php echo $evaluasi['blok']; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="blok" required>
															</div>
															<div class="form-group">
																<label>Spin</label>
																<input value="<?php echo $evaluasi['spin']; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="spin" required>
															</div>
															<div class="form-group">
																<label>Gerakan Kaki</label>
																<input value="<?php echo $evaluasi['gerakankaki']; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="gerakankaki" required>
															</div>
															<div class="form-group">
																<label>Fisik</label>
																<input value="<?php echo $evaluasi['fisik']; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="fisik" required>
															</div>
															<div class="form-group">
																<button type="submit" class="btn btn-md btn-primary">Simpan Perubahan</button>
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

    function handleChange(input) {
        if (input.value < 0) input.value = 0;
        if (input.value > 100) input.value = 100;
    }


    $(document).ready(function () {
		$('#selectAtlet').select2();

        $(".numeric").keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g,'');
        });


        $("#form_update").submit(function (e) {
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
