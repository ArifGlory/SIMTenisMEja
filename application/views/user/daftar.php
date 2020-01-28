<!-- Container-fluid starts -->
<div class="row">
    <div class="container-fluid">
        <div class="col-md-12">
            <br><br>
            <div class="card product-detail-page">
                <div class="card-header">
					<div class="row">
						<div class="col-md-6">
							<h5>Pendaftaran Atlet</h5>
							<span>Silahkan isi form berikut</span>
						</div>
						<div class="col-md-6">
							<a class="pull-right" href="<?php echo base_url();?>">
								<img width="100" height="100" class="img-fluid" src="<?php echo base_url(); ?>asset/assets/images/applogo.png" alt="Theme-Logo" />
							</a>
						</div>
					</div>
                </div>
                <div class="card-block">
                    <div class="j-wrapper j-wrapper-640">
                        <form enctype="multipart/form-data" action="<?php echo base_url();?>Auth/createUser" method="post" class="j-pro" id="j-pro" novalidate="">
                            <div class="j-content">
                                <!-- start name -->
                                <div>
                                    <label class="j-label">Nama</label>
                                    <div class="j-unit">
                                        <div class="j-input">
                                            <label class="j-icon-right" for="name">
                                                <i class="icofont icofont-ui-user"></i>
                                            </label>
                                            <input required type="text" id="nama" name="nama">
                                        </div>
                                    </div>
                                </div>
                                <!-- end name -->
                                <!-- start email -->
                                <div>
                                    <div>
                                        <label class="j-label">Jenis Kelamin</label>
                                    </div>
                                    <div class="j-unit">
                                        <div class="j-input">
                                            <label class="j-icon-right" for="email">
                                                <i class="icofont icofont-user-alt-2"></i>
                                            </label>
											<select name="jenis_kelamin">
												<option value="L">Laki-laki</option>
												<option value="P">Perempuan</option>
											</select>
                                        </div>
                                    </div>
                                </div>
								<div>
									<div>
										<label class="j-label">Jenis Atlet</label>
									</div>
									<div class="j-unit">
										<div class="j-input">
											<label class="j-icon-right" for="email">
												<i class="icofont icofont-user-alt-2"></i>
											</label>
											<select id="jenis" name="kategori">
												<option value="pemula">Pemula (Dibawah 13 tahun)</option>
												<option value="kadet">Kadet (Dibawah 15 tahun)</option>
												<option value="senior">Senior (16 Tahun Keatas)</option>
											</select>
										</div>
									</div>
								</div>
                                <div>
                                    <div>
                                        <label class="j-label">Phone</label>
                                    </div>
                                    <div class="j-unit">
                                        <div class="j-input">
                                            <label class="j-icon-right" for="email">
                                                <i class="icofont icofont-android-tablet"></i>
                                            </label>
                                            <input required type="email" id="phone" name="phone">
                                        </div>
                                    </div>
                                </div>
								<div>
									<label class="j-label">Tanggal Lahir</label>
									<div class="j-unit">
										<div class="j-input">
											<label class="j-icon-right" for="name">
												<i class="icofont icofont-data"></i>
											</label>
											<input class="form-control" required type="date" id="tanggal_lahir" name="tanggal_lahir">
										</div>
									</div>
								</div>
                                <!-- start password -->
								<div>
									<label class="j-label">Username</label>
									<div class="j-unit">
										<div class="j-input">
											<label class="j-icon-right" for="name">
												<i class="icofont icofont-user-alt-4"></i>
											</label>
											<input required type="text" id="username" name="username">
										</div>
									</div>
								</div>
                                <div>
                                    <div>
                                        <label class="j-label ">Password</label>
                                    </div>
                                    <div class="j-unit">
                                        <div class="j-input">
                                            <label class="j-icon-right" for="password">
                                                <i class="icofont icofont-lock"></i>
                                            </label>
                                            <input required type="password" id="password" name="password">
                                        </div>
                                    </div>
                                </div>
                                <!-- end password -->
                                <!-- start response from server -->
                                <div class="j-response"></div>
                                <!-- end response from server -->
                            </div>
                            <!-- end /.content -->
                            <div class="j-footer">
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </div>
                            <!-- end /.footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- end of container-fluid -->


</div>
<script type="text/javascript">
    $(document).ready(function () {
        console.log("ready");

        var nama = $("#nama").val();
        var jenis = $("#jenis").val();
        var phone = $("#phone").val();
        var tanggal_lahir = $("#tanggal_lahir").val();
        var username = $("#username").val();
        var password = $("#password").val();

        $("#j-pro").submit(function (e) {
            e.preventDefault();
            var form = $(this);
            var btnHtml = form.find("[type='submit']").html();
            var url = form.attr("action");
            var data = new FormData(this);

            if ($("#nama").val().length == 0 || $("#jenis").val().length == 0
                || $("#phone").val().length == 0 || $("#tanggal_lahir").val().length == 0
                || $("#username").val().length == 0 || $("#password").val().length == 0)
			{

            console.log("nama = "+$("#nama").val());

        		swal("Oops..", "Semua data harus diiisi !", "error");
			}else{
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
    		}





        });

    });
</script>
