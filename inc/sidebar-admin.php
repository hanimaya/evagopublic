		<?php 
			$halaman = $_GET['mod'];
			if ($halaman == 'emiten'){
				$emiten = "active";
			}  else if ($halaman == 'sbi'){
				$sbi = "active";
			} else if ($halaman == 'ihs'){
				$ihs = "active";
			}  else {
				$dashboard = "active";
			}

		 ?>
		<!-- BEGIN SIDEBAR -->
		<aside class="left-side sidebar-offcanvas">
			<section class="sidebar">
				<div class="user-panel">
					<div class="pull-left image">
						<img src="../assets/front-end/images/logo.png" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p><strong><?php echo $_SESSION['username'];?></strong></p>
						<a href="#"><i class="fa fa-circle text-green"></i> Online</a>
					</div>
				</div>
				<form action="#" method="get" class="sidebar-form">
					<div class="input-group">
						<input type="text" name="search" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
							<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
						</span>
					</div>
				</form>
				<ul class="sidebar-menu">
					<li class="<?php echo $dashboard;?>">
						<a href="index.php">
							<i class="fa fa-bar-chart-o"></i><span>Dashboard</span>
						</a>
					</li>
					<li class="menu <?php echo $emiten;?>">
						<a href="#">
							<i class="fa fa-building"></i><span>Emiten</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="sub-menu">
							<li><a href="index.php?mod=emiten&pg=data_emiten">Data Emiten</a></li>
						</ul>
					</li>
					<li class="menu <?php echo $sbi;?>">
						<a href="#">
							<i class="fa fa-dollar"></i><span>SBI</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="sub-menu">
							<li><a href="index.php?mod=sbi&pg=data_sbi">Data SBI</a></li>
						</ul>
					</li>
					<li class="menu <?php echo $ihs;?>">
						<a href="#">
							<i class="fa fa-dollar"></i><span>IHS</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="sub-menu">
							<li><a href="index.php?mod=ihs&pg=data_ihs">Data IHS</a></li>
						</ul>
					</li>
					<li class="menu <?php echo $user;?>">
						<a href="#">
							<i class="fa fa-align-left"></i><span>User</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="sub-menu">
							<li><a href="index.php?mod=user&pg=data_user">Data User</a></li>
						</ul>
					</li>
					
				</ul>
			</section>
		</aside>
		<!-- END SIDEBAR -->
		
		