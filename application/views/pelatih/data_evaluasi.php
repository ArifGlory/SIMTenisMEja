<div class="pcoded-content">
	<!-- [ breadcrumb ] start -->
	<div class="page-header">
		<div class="page-block">
			<div class="row align-items-center">
				<div class="col-md-8">
					<div class="page-header-title">
						<h4 class="m-b-10">Evaluasi</h4>
					</div>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="<?php  echo base_url()?>Admin">
								<i class="feather icon-home"></i>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a href="#">Data Evaluasi</a>
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
									<h5>Data Semua Evaluasi</h5>

									<div class="card-header-right">
										<a href="<?php echo base_url()?>Admin/addEvaluasi" style="color: white;" class="btn btn-sm btn-primary">Tambah Evaluasi</a>
									</div>
								</div>
								<div class="card-block">
									<div class="table-responsive">
										<div class="row">
											<div class="col-xs-12 col-sm-12">
												<table id="table_user" class="table table-hover">
													<thead>
														<tr role="row">
															<th>Nama Atlet</th>
															<th>Tanggal Evaluasi</th>
															<th>Total Nilai</th>
															<th>Kategori Nilai</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach($evaluasi as $val){
                                                           ?>
														<tr>
															<td>
                                                                <?php echo $val->nama; ?>
															</td>
															<td>
																<?php echo date( 'F j, Y', strtotime($val->tanggal)); ?>
															</td>
															<td>
																<?php echo $val->total_nilai; ?>
															</td>
															<td>
																<?php echo $val->kategori_nilai; ?>
															</td>
															<td>
																<a href="<?php echo base_url()?>Admin/editEvaluasi/<?php echo $val->idevaluasi; ?>" class="btn btn-round btn-sm btn-primary"
																		title="Edit Evaluasi"><i class="icofont icofont-pencil"></i></a>

                                                                <button data-id_evaluasi="<?php echo $val->idevaluasi; ?>"
                                                                        class="btn btn-round btn-sm btn-danger"
                                                                        id="hapusEvaluasi"
                                                                        title="Hapus Evaluasi"
                                                                        data-toggle="modal" data-target="#modalDelete"><i class="icofont icofont-ui-delete"></i></button>
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


                    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form id="form_delete" action="<?php echo base_url(); ?>Admin/hapusEvaluasi"
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
                                                <input  type="hidden" name="idevaluasi" class="form-control idevaluasi">
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


        $("#table_user").on("click", "#hapusEvaluasi", function(event) {
            $(".idevaluasi").val($(this).attr('data-id_evaluasi'));
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
