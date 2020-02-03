<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin-dashboard/fragments/head-code'); ?>
</head>

<body class="animsition">
<div class="page-wrapper">

	<?php $this->load->view('admin-dashboard/fragments/mobile-header'); ?>
	<?php $this->load->view('admin-dashboard/fragments/menu-side-bar'); ?>

	<!-- PAGE CONTAINER-->
	<div class="page-container">
		<!-- HEADER DESKTOP-->
		<?php $this->load->view('admin-dashboard/fragments/header'); ?>
		<!-- HEADER DESKTOP-->

		<!-- MAIN CONTENT-->
		<div class="main-content">
			<div class="section__content section__content--p30">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="overview-wrap">
								<h2 class="title-1">overview</h2>
								<a href="<?= base_url('admin/children') ?>" class="au-btn au-btn-icon btn-success">
									<i class="zmdi zmdi-eye"></i>View Children
								</a>
								<a href="<?= base_url('admin/children/add_child') ?>"
								   class="au-btn au-btn-icon au-btn--blue">
									<i class="zmdi zmdi-plus"></i>Add Child
								</a>
							</div>
						</div>
					</div>
					<div class="row m-t-25">
						<div class="col-md-6">
							<div class="overview-item overview-item--c1">
								<div class="overview__inner">
									<div class="overview-box clearfix">
										<div class="icon">
											<i class="zmdi zmdi-account-o"></i>
										</div>
										<div class="text">
											<h2><?= count($admins) ?></h2>
											<span>Total Number of Admin</span>
										</div>
									</div>
									<div class="overview-chart">
										<canvas id="widgetChart1"></canvas>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="overview-item overview-item--c2">
								<div class="overview__inner">
									<div class="overview-box clearfix">
										<div class="icon">
											<i class="zmdi zmdi-account-circle"></i>
										</div>
										<div class="text">
											<h2><?= count($children) ?></h2>
											<span>Total Number of Children</span>
										</div>
									</div>
									<div class="overview-chart">
										<canvas id="widgetChart1"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php $this->load->view('admin-dashboard/fragments/footer'); ?>
				</div>
			</div>
		</div>
		<!-- END MAIN CONTENT-->
		<!-- END PAGE CONTAINER-->
	</div>

</div>


<?php $this->load->view('admin-dashboard/fragments/script'); ?>
<script>
	$(document).ready(function () {
		$('li#homePage').addClass("active");
	});
</script>
</body>

</html>
<!-- end document-->
