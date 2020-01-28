<div class="pcoded-content">
	<!-- [ breadcrumb ] start -->
	<div class="page-header">
		<div class="page-block">
			<div class="row align-items-center">
				<div class="col-md-8">
					<div class="page-header-title">
						<h4 class="m-b-10">Atlet</h4>
					</div>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="index.html">
								<i class="feather icon-home"></i>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a href="sample-page.html#!">Data Atlet</a>
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
									<h5>Data Semua Atlet</h5>

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
															<th>Nama</th>
															<th>NIK</th>
															<th>Kategori Atlet</th>
															<th>Jenis Kelamin</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach($atlet as $val){
                                                           ?>
														<tr>
															<td>
                                                                <?php echo $val->nama; ?>
															</td>
															<td>
																<?php echo $val->nik; ?>
															</td>
															<td>
																<?php echo $val->kategori; ?>
															</td>
															<td>
																<?php
																	if ($val->jenis_kelamin == "L"){
																		$jeniskelamin = "Laki-laki";
																		echo "Laki-laki";
																	}else{
																		$jeniskelamin = "Perempuan";
																		echo "Perempuan";
																	}
																	$tanggal_lahir = date( 'F j, Y', strtotime($val->tanggal_lahir));
																?>
															</td>
															<?php if ($this->session->userdata()['level'] == "pelatih") { ?>
																<td>
																	<button data-id_user="<?php echo $val->idatlet; ?>"
																			data-nama="<?php echo $val->nama; ?>"
																			data-username="<?php echo $val->username; ?>"
																			data-nik="<?php echo $val->nik; ?>"
																			data-jenis="<?php echo $val->kategori; ?>"
																			data-jenis_kelamin="<?php echo $jeniskelamin; ?>"
																			data-tanggal_lahir="<?php echo $tanggal_lahir; ?>"
																			data-phone="<?php echo $val->phone; ?>"
																			class="btn btn-round btn-sm btn-primary"
																			id="detailAtlet"
																			title="Detail Atlet"
																			data-toggle="modal" data-target="#modalDetail"><i class="icofont icofont-eye"></i></button>
																	<button data-id_user="<?php echo $val->idatlet; ?>"
																			class="btn btn-round btn-sm btn-danger"
																			id="hapusAtlet"
																			title="Hapus Atlet"
																			data-toggle="modal" data-target="#modalDelete"><i class="icofont icofont-ui-delete"></i></button>
																</td>
															<?php } ?>

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


                    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form id="form_delete" action="<?php echo base_url(); ?>Admin/hapusAtlet"
                                      method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Hapus Atlet</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <h4>Anda yakin menghapus atlet ini ?</h4>
                                                <input  type="hidden" name="idatlet" class="form-control idatlet">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect "
                                                data-dismiss="modal">Batal</button>
                                        <button type="submit"
                                                class="btn btn-danger waves-effect waves-light">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

					<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Detail Atlet</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Username</label>
													<h4 id="username"></h4>
												</div>
												<div class="form-group">
													<label>Nama Atlet</label>
													<h5 id="nama"></h5>
												</div>
												<div class="form-group">
													<label>NIK</label>
													<h5 id="nik"></h5>
												</div>
												<div class="form-group">
													<label>Kategori Atlet</label>
													<h5 id="jenis"></h5>
												</div>
												<div class="form-group">
													<label>Jenis Kelamin</label>
													<h5 id="jenis_kelamin"></h5>
												</div>
												<div class="form-group">
													<label>Telepon</label>
													<h5 id="phone"></h5>
												</div>
												<div class="form-group">
													<label>Tanggal Lahir</label>
													<h5 id="tanggal_lahir"></h5>
												</div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default waves-effect "
												data-dismiss="modal">Close</button>
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
		var myTable = $("#table_user").DataTable();
        var kode_produk;


        $("#table_user	").on("click", "#hapusAtlet", function(event) {
            $(".idatlet").val($(this).attr('data-id_user'));
        });
        $("#table_user	").on("click", "#detailAtlet", function(event) {
            $("#username").text($(this).attr('data-username'));
            $("#nama").text($(this).attr('data-nama'));
            $("#nik").text($(this).attr('data-nik'));
            $("#jenis").text($(this).attr('data-jenis'));
            $("#jenis_kelamin").text($(this).attr('data-jenis_kelamin'));
            $("#phone").text($(this).attr('data-phone'));
            $("#tanggal_lahir").text($(this).attr('data-tanggal_lahir'));
        });


        $("#form_delete").submit(function (e) {
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
