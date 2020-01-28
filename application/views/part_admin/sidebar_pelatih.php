<?php
$session = $this->session->userdata();
$level = $session['level'];
?>
<div class="pcoded-main-container">
				<div class="pcoded-wrapper">
					<!-- [ navigation menu ] start -->
					<nav class="pcoded-navbar">
						<div class="pcoded-inner-navbar main-menu">
							<div class="">
								<div class="main-menu-header">
									<img class="img-menu-user" src="<?php echo base_url();  ?>asset/assets/images/applogo.png" alt="User-Profile-Image">
									<div class="user-details">
									
									</div>
								</div>
							</div>
							<div class="pcoded-navigation-label">Menu</div>
							<ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="<?php echo base_url(); ?>Admin" class="waves-effect waves-dark">
											<span class="pcoded-micon">
												<i class="feather icon-home"></i>
											</span>
                                            <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
								<li class="">
									<a href="<?php echo base_url(); ?>Admin/atlet" class="waves-effect waves-dark">
											<span class="pcoded-micon">
												<i class="feather icon-users"></i>
											</span>
										<span class="pcoded-mtext">Data Atlet</span>
									</a>
								</li>
								<li class="">
									<a href="<?php echo base_url(); ?>Admin/evaluasi" class="waves-effect waves-dark">
											<span class="pcoded-micon">
												<i class="feather icon-bookmark"></i>
											</span>
										<span class="pcoded-mtext">Data Evaluasi</span>
									</a>
								</li>
								<li class="">
									<a href="<?php echo base_url(); ?>Jadwal" class="waves-effect waves-dark">
											<span class="pcoded-micon">
												<i class="feather icon-bar-chart"></i>
											</span>
										<span class="pcoded-mtext">Data Jadwal</span>
									</a>
								</li>
								<li class="">
									<a href="<?php echo base_url(); ?>Admin/ranking" class="waves-effect waves-dark">
											<span class="pcoded-micon">
												<i class="feather icon-award"></i>
											</span>
										<span class="pcoded-mtext">Data Ranking</span>
									</a>
								</li>
								<?php if ($level == "admin"){ ?>
									<li class="">
										<a href="<?php echo base_url(); ?>Admin/listPelatih" class="waves-effect waves-dark">
											<span class="pcoded-micon">
												<i class="icofont icofont-user-suited"></i>
											</span>
											<span class="pcoded-mtext">Data Pelatih</span>
										</a>
									</li>
								<?php } ?>
							</ul>
						</div>
					</nav>
					<!-- [ navigation menu ] end -->
