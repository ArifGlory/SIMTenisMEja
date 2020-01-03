<div class="pcoded-content">
	<!-- [ breadcrumb ] start -->
	<div class="page-header">
		<div class="page-block">
			<div class="row align-items-center">
				<div class="col-md-8">
					<div class="page-header-title">
						<h4 class="m-b-10">Tambah Evaluasi</h4>
					</div>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="<?php echo  base_url()?>Admin">
								<i class="feather icon-home"></i>
							</a>
						</li>
						<li class="breadcrumb-item">
							<a href="#">Evaluasi Atlet</a>
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
													<form id="form_tambah" action="<?php echo base_url(); ?>Admin/updateEvaluasi"
														  method="post" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12">
															<div class="form-group">
																<label>Nama Atlet</label>
																<h4><?php echo $evaluasi['nama']; ?></h4>
															</div>
															<br>
															<input name="idevaluasi" value="<?php echo $evaluasi['idevaluasi']; ?>" type="hidden">
															<div class="form-group">
																<h4>Drive Forehand</h4>
																<div class="row">
																	<div class="col-md-3">
																		<label>Memegang Blade</label>
																		<input value="<?php echo $driveforehand[0]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="driveforehand_memegangblade" required>
																	</div>
																	<div class="col-md-2">
																		<label>Cara memukul bola</label>
																		<input value="<?php echo $driveforehand[1]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="driveforehand_memukulbola" required>
																	</div>
																	<div class="col-md-2">
																		<label>Penempatan Bola</label>
																		<input value="<?php echo $driveforehand[2]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="driveforehand_penempatanbola" required>
																	</div>
																	<div class="col-md-2">
																		<label>Kecepatan</label>
																		<input value="<?php echo $driveforehand[3]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="driveforehand_kecepatan" required>
																	</div>
																	<div class="col-md-2">
																		<label>Timing</label>
																		<input value="<?php echo $driveforehand[4]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="driveforehand_timing" required>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<h4>Drive Backhand</h4>
																<div class="row">
																	<div class="col-md-3">
																		<label>Memegang Blade</label>
																		<input value="<?php echo $drivebackhand[0]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="drivebackhand_memegangblade" required>
																	</div>
																	<div class="col-md-2">
																		<label>Cara memukul bola</label>
																		<input value="<?php echo $drivebackhand[1]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="drivebackhand_memukulbola" required>
																	</div>
																	<div class="col-md-2">
																		<label>Penempatan Bola</label>
																		<input value="<?php echo $drivebackhand[2]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="drivebackhand_penempatanbola" required>
																	</div>
																	<div class="col-md-2">
																		<label>Kecepatan</label>
																		<input value="<?php echo $drivebackhand[3]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="drivebackhand_kecepatan" required>
																	</div>
																	<div class="col-md-2">
																		<label>Timing</label>
																		<input value="<?php echo $drivebackhand[4]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="drivebackhand_timing" required>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<h4>Push Forehand</h4>
																<div class="row">
																	<div class="col-md-3">
																		<label>Memegang Blade</label>
																		<input value="<?php echo $pushforehand[0]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="pushforehand_memegangblade" required>
																	</div>
																	<div class="col-md-2">
																		<label>Cara memukul bola</label>
																		<input value="<?php echo $pushforehand[1]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="pushforehand_memukulbola" required>
																	</div>
																	<div class="col-md-2">
																		<label>Penempatan Bola</label>
																		<input value="<?php echo $pushforehand[2]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="pushforehand_penempatanbola" required>
																	</div>
																	<div class="col-md-2">
																		<label>Kecepatan</label>
																		<input value="<?php echo $pushforehand[3]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="pushforehand_kecepatan" required>
																	</div>
																	<div class="col-md-2">
																		<label>Timing</label>
																		<input value="<?php echo $pushforehand[4]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="pushforehand_timing" required>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<h4>Push Backhand</h4>
																<div class="row">
																	<div class="col-md-3">
																		<label>Memegang Blade</label>
																		<input value="<?php echo $pushbackhand[0]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="pushbackhand_memegangblade" required>
																	</div>
																	<div class="col-md-2">
																		<label>Cara memukul bola</label>
																		<input value="<?php echo $pushbackhand[1]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="pushbackhand_memukulbola" required>
																	</div>
																	<div class="col-md-2">
																		<label>Penempatan Bola</label>
																		<input value="<?php echo $pushbackhand[2]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="pushbackhand_penempatanbola" required>
																	</div>
																	<div class="col-md-2">
																		<label>Kecepatan</label>
																		<input value="<?php echo $pushbackhand[3]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="pushbackhand_kecepatan" required>
																	</div>
																	<div class="col-md-2">
																		<label>Timing</label>
																		<input value="<?php echo $pushbackhand[4]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="pushbackhand_timing" required>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<h4>Smash Forehand</h4>
																<div class="row">
																	<div class="col-md-3">
																		<label>Memegang Blade</label>
																		<input value="<?php echo $smashforehand[0]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="smashforehand_memegangblade" required>
																	</div>
																	<div class="col-md-2">
																		<label>Cara memukul bola</label>
																		<input value="<?php echo $smashforehand[1]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="smashforehand_memukulbola" required>
																	</div>
																	<div class="col-md-2">
																		<label>Penempatan Bola</label>
																		<input value="<?php echo $smashforehand[2]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="smashforehand_penempatanbola" required>
																	</div>
																	<div class="col-md-2">
																		<label>Kecepatan</label>
																		<input value="<?php echo $smashforehand[3]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="smashforehand_kecepatan" required>
																	</div>
																	<div class="col-md-2">
																		<label>Timing</label>
																		<input value="<?php echo $smashforehand[4]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="smashforehand_timing" required>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<h4>Smash Backhand</h4>
																<div class="row">
																	<div class="col-md-3">
																		<label>Memegang Blade</label>
																		<input value="<?php echo $smashbackhand[0]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="smashbackhand_memegangblade" required>
																	</div>
																	<div class="col-md-2">
																		<label>Cara memukul bola</label>
																		<input value="<?php echo $smashbackhand[1]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="smashbackhand_memukulbola" required>
																	</div>
																	<div class="col-md-2">
																		<label>Penempatan Bola</label>
																		<input value="<?php echo $smashbackhand[2]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="smashbackhand_penempatanbola" required>
																	</div>
																	<div class="col-md-2">
																		<label>Kecepatan</label>
																		<input value="<?php echo $smashbackhand[3]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="smashbackhand_kecepatan" required>
																	</div>
																	<div class="col-md-2">
																		<label>Timing</label>
																		<input value="<?php echo $smashbackhand[4]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="smashbackhand_timing" required>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<h4>Block Forehand</h4>
																<div class="row">
																	<div class="col-md-3">
																		<label>Memegang Blade</label>
																		<input value="<?php echo $blockforehand[0]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="blockforehand_memegangblade" required>
																	</div>
																	<div class="col-md-2">
																		<label>Cara memukul bola</label>
																		<input value="<?php echo $blockforehand[1]; ?>"  onchange="handleChange(this);" type="number" class="form-control numeric" name="blockforehand_memukulbola" required>
																	</div>
																	<div class="col-md-2">
																		<label>Penempatan Bola</label>
																		<input value="<?php echo $blockforehand[2]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="blockforehand_penempatanbola" required>
																	</div>
																	<div class="col-md-2">
																		<label>Kecepatan</label>
																		<input value="<?php echo $blockforehand[3]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="blockforehand_kecepatan" required>
																	</div>
																	<div class="col-md-2">
																		<label>Timing</label>
																		<input value="<?php echo $blockforehand[4]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="blockforehand_timing" required>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<h4>Block Backhand</h4>
																<div class="row">
																	<div class="col-md-3">
																		<label>Memegang Blade</label>
																		<input value="<?php echo $blockbackhand[0]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="blockbackhand_memegangblade" required>
																	</div>
																	<div class="col-md-2">
																		<label>Cara memukul bola</label>
																		<input value="<?php echo $blockbackhand[1]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="blockbackhand_memukulbola" required>
																	</div>
																	<div class="col-md-2">
																		<label>Penempatan Bola</label>
																		<input value="<?php echo $blockbackhand[2]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="blockbackhand_penempatanbola" required>
																	</div>
																	<div class="col-md-2">
																		<label>Kecepatan</label>
																		<input value="<?php echo $blockbackhand[3]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="blockbackhand_kecepatan" required>
																	</div>
																	<div class="col-md-2">
																		<label>Timing</label>
																		<input value="<?php echo $blockbackhand[4]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="blockbackhand_timing" required>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<h4>Chop Forehand</h4>
																<div class="row">
																	<div class="col-md-3">
																		<label>Memegang Blade</label>
																		<input value="<?php echo $chopforehand[0]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="chopforehand_memegangblade" required>
																	</div>
																	<div class="col-md-2">
																		<label>Cara memukul bola</label>
																		<input value="<?php echo $chopforehand[1]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="chopforehand_memukulbola" required>
																	</div>
																	<div class="col-md-2">
																		<label>Penempatan Bola</label>
																		<input value="<?php echo $chopforehand[2]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="chopforehand_penempatanbola" required>
																	</div>
																	<div class="col-md-2">
																		<label>Kecepatan</label>
																		<input value="<?php echo $chopforehand[3]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="chopforehand_kecepatan" required>
																	</div>
																	<div class="col-md-2">
																		<label>Timing</label>
																		<input value="<?php echo $chopforehand[4]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="chopforehand_timing" required>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<h4>Chop Backhand</h4>
																<div class="row">
																	<div class="col-md-3">
																		<label>Memegang Blade</label>
																		<input value="<?php echo $chopbackhand[0]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="chopbackhand_memegangblade" required>
																	</div>
																	<div class="col-md-2">
																		<label>Cara memukul bola</label>
																		<input value="<?php echo $chopbackhand[1]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="chopbackhand_memukulbola" required>
																	</div>
																	<div class="col-md-2">
																		<label>Penempatan Bola</label>
																		<input value="<?php echo $chopbackhand[2]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="chopbackhand_penempatanbola" required>
																	</div>
																	<div class="col-md-2">
																		<label>Kecepatan</label>
																		<input value="<?php echo $chopbackhand[3]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="chopbackhand_kecepatan" required>
																	</div>
																	<div class="col-md-2">
																		<label>Timing</label>
																		<input value="<?php echo $chopbackhand[4]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="chopbackhand_timing" required>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<h4>Service Forehand</h4>
																<div class="row">
																	<div class="col-md-3">
																		<label>Memegang Blade</label>
																		<input value="<?php echo $serviceforehand[0]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="serviceforehand_memegangblade" required>
																	</div>
																	<div class="col-md-2">
																		<label>Cara memukul bola</label>
																		<input value="<?php echo $serviceforehand[1]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="serviceforehand_memukulbola" required>
																	</div>
																	<div class="col-md-2">
																		<label>Penempatan Bola</label>
																		<input value="<?php echo $serviceforehand[2]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="serviceforehand_penempatanbola" required>
																	</div>
																	<div class="col-md-2">
																		<label>Kecepatan</label>
																		<input value="<?php echo $serviceforehand[3]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="serviceforehand_kecepatan" required>
																	</div>
																	<div class="col-md-2">
																		<label>Timing</label>
																		<input value="<?php echo $serviceforehand[4]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="serviceforehand_timing" required>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<h4>Service Backhand</h4>
																<div class="row">
																	<div class="col-md-3">
																		<label>Memegang Blade</label>
																		<input value="<?php echo $servicebackhand[0]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="servicebackhand_memegangblade" required>
																	</div>
																	<div class="col-md-2">
																		<label>Cara memukul bola</label>
																		<input value="<?php echo $servicebackhand[1]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="servicebackhand_memukulbola" required>
																	</div>
																	<div class="col-md-2">
																		<label>Penempatan Bola</label>
																		<input value="<?php echo $servicebackhand[2]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="servicebackhand_penempatanbola" required>
																	</div>
																	<div class="col-md-2">
																		<label>Kecepatan</label>
																		<input value="<?php echo $servicebackhand[3]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="servicebackhand_kecepatan" required>
																	</div>
																	<div class="col-md-2">
																		<label>Timing</label>
																		<input value="<?php echo $servicebackhand[4]; ?>" onchange="handleChange(this);" type="number" class="form-control numeric" name="servicebackhand_timing" required>
																	</div>
																</div>
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

        $(".numeric").keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g,'');
        });

        $('.mySelect2').on('change',function () {
            var jenis = $(this).val();
            $('#loader').show();
            $.ajax({
                url : "<?php echo base_url();?>Admin/getFilterAtlet/"+"/"+jenis,
                method : "GET",
                /*data : {id: id},*/
                async : true,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].iduser+'">'+data[i].nama+'</option>';
                    }
                    $('#selectAtlet').html(html);
                    $('#selectAtlet').select2();
                    $('#loader').hide();

                }
            });

        })


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
