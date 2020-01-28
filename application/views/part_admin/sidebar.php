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
                                    <a href="<?php echo base_url(); ?>Dashboard" class="waves-effect waves-dark">
											<span class="pcoded-micon">
												<i class="feather icon-home"></i>
											</span>
                                            <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
								<li class="">
									<a href="<?php echo base_url(); ?>Dashboard/evaluasi" class="waves-effect waves-dark">
											<span class="pcoded-micon">
												<i class="feather icon-bookmark"></i>
											</span>
										<span class="pcoded-mtext">Data Evaluasi</span>
									</a>
								</li>
								<li class="">
									<a href="<?php echo base_url(); ?>Dashboard/profil" class="waves-effect waves-dark">
											<span class="pcoded-micon">
												<i class="feather icon-user"></i>
											</span>
										<span class="pcoded-mtext">Profil</span>
									</a>
								</li>
								<li class="">
									<a href="<?php echo base_url(); ?>Jadwal" class="waves-effect waves-dark">
											<span class="pcoded-micon">
												<i class="feather icon-bar-chart"></i>
											</span>
										<span class="pcoded-mtext">Jadwal latihan</span>
									</a>
								</li>
								<li class="">
									<a href="<?php echo base_url(); ?>Dashboard/ranking" class="waves-effect waves-dark">
											<span class="pcoded-micon">
												<i class="feather icon-award"></i>
											</span>
										<span class="pcoded-mtext">Data Ranking</span>
									</a>
								</li>
							</ul>
						</div>
					</nav>
					<!-- [ navigation menu ] end -->
