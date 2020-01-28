<?php $level =  $this->session->userdata()['level'] ?>
<div class="pcoded-content">
	<!-- [ breadcrumb ] start -->
	<div class="page-header">
		<div class="page-block">
			<div class="row align-items-center">
				<div class="col-md-8">
					<div class="page-header-title">
						<h4 class="m-b-10">Jadwal</h4>
					</div>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="<?php  echo base_url()?>Admin">
								<i class="feather icon-home"></i>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a href="#">Data Jadwal</a>
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
									<h5>Data Semua Jadwal</h5>

									<div class="card-header-right">
										<?php
											if ($level == "pelatih"){ ?>
												<a href="<?php echo base_url()?>Jadwal/addJadwal" style="color: white;" class="btn btn-sm btn-primary">Tambah Jadwal</a>
											<?php }
										?>
									</div>
								</div>
								<div class="card-block">
									<div class="table-responsive">
										<div class="row">
											<div class="col-xs-12 col-sm-12">
												<table id="table_user" class="table table-hover">
													<thead>
														<tr role="row">
															<th>Hari</th>
															<th>Waktu</th>
															<?php
															if ($level == "pelatih"){ ?>
															<th>Aksi</th>
															<?php }
															?>
														</tr>
													</thead>
													<tbody>
														<?php foreach($jadwal as $val){
                                                           ?>
														<tr>
															<td>
                                                                <?php echo $val->hari; ?>
															</td>
															<td>
																<?php echo "Pukul ". $val->waktu; ?>
															</td>
															<?php
															if ($level == "pelatih"){ ?>
																<td>

																	<button data-id_jadwal="<?php echo $val->idjadwal; ?>"
																			class="btn btn-round btn-sm btn-danger"
																			id="hapusJadwal"
																			title="Hapus Jadwal"
																			data-toggle="modal" data-target="#modalDelete"><i class="icofont icofont-ui-delete"></i></button>

																</td>
															<?php }
															?>
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
                                <form id="form_delete" action="<?php echo base_url(); ?>Jadwal/hapusJadwal"
                                      method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Hapus Jadwal</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <h4>Anda yakin menghapus jadwal ini ?</h4>
                                                <input  type="hidden" name="idjadwal" class="form-control idjadwal">
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


        $("#table_user	").on("click", "#hapusJadwal", function(event) {
            $(".idjadwal").val($(this).attr('data-id_jadwal'));
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
