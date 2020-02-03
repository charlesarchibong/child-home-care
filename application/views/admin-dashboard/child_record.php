<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin-dashboard/fragments/head-code'); ?>
	<style>
		.page-content--bge5 {
			background: transparent;
			height: auto;
		}

		.login-wrap {
			max-width: 65%;
			padding-top: 8vh;
			margin: 0 auto;
		}

		.bannerstick {
			background-color: red;
			position: fixed;
			bottom: 0;
			margin: 0 auto;
			width: 100%;
			right: 0px;
		}
	</style>
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
							<!-- DATA TABLE -->
							<h3 class="title-5 m-b-35">Child Record</h3>
							<?php if ($this->session->flashdata('error')) : ?>
								<div class="alert alert-danger text-center">
									<?= $this->session->flashdata('error') ?>
								</div>
							<?php endif; ?>
							<?php if ($this->session->flashdata('success')) : ?>
								<div class="alert alert-success text-center">
									<?= $this->session->flashdata('success'); ?>
								</div>
							<?php endif; ?>
							<div class="login-form" style="background-color: white; padding: 30px 30px 30px 30px;">
								<div class="col-md-12">
									<div class="card">
										<div class="card-header">Child Record</div>
										<div class="card-body">
											<div class="card-title">
												<h5 class="text-center title-2">Search Child Record</h5>
											</div>
											<form action="" method="post">
												<div class="form-group">
													<label for="cc-payment" class="control-label mb-1">Child's
														Registration ID</label>
													<input id="cc-pament" name="id" value="<?= set_value('id') ?>"
														   type="text"
														   class="form-control" aria-required="true" required>
												</div>
												<div>
													<button id="payment-button" type="submit"
															class="btn btn-lg btn-info btn-block">
														<i class="fa fa-search"></i>&nbsp;
														<span id="payment-button-amount">Search</span>
													</button>
												</div>
											</form>
										</div>
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
	$(function () {
		$('li#childRecord').addClass("active");
	});
</script>
</body>

</html>
<!-- end document-->
