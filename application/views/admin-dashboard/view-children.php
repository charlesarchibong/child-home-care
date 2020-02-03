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
							<!-- DATA TABLE -->
							<h3 class="title-5 m-b-35">Children</h3>
							<div class="table-data__tool">

								<div class="table-data__tool-right">
									<a href="<?= base_url('admin/children/add_child') ?>"
									   class="au-btn au-btn-icon au-btn--green au-btn--small">
										<i class="zmdi zmdi-plus"></i>Register new child
									</a>
								</div>
							</div>
							<?php if ($this->session->flashdata('delete_error')) : ?>
								<div class="alert alert-danger text-center">
									<?= $this->session->flashdata('delete_error') ?>
								</div>
							<?php endif; ?>
							<?php if ($this->session->flashdata('delete_success')) : ?>
								<div class="alert alert-success text-center">
									<?= $this->session->flashdata('delete_success'); ?>
								</div>
							<?php endif; ?>
							<div class="table-responsive table--no-card m-b-30">
								<table id="pinsTable" class="table table-borderless table-striped table-earning">
									<thead>
									<tr style="wordwrap: nowrap;">
										<th>#</th>
										<th>Registration ID</th>
										<th>Name</th>
										<th>Date of Birth</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>

									<?php
									$i = 0;
									foreach ($children as $child) : $i++; ?>
										<tr class="tr-shadow">
											<td><?= $i ?></td>
											<td><?= $child->registration_id ?></td>
											<td><?= $child->name ?></td>
											<td><?= $child->date_of_birth ?></td>
											<td>
												<a href="<?= base_url('admin/children/view_child/') . $child->registration_id ?> "
												   class="btn btn-warning">
													<i class="fa fa-info-circle"></i> View Details
												</a>
												<button type="button" class="btn btn-danger delete_child"
														name="<?= $child->registration_id ?>">
													<i class="fa fa-trash"></i> Remove Child
												</button>
											</td>
										</tr>
										<tr class="spacer"></tr>
									<?php endforeach;
									?>
									</tbody>
								</table>
							</div>
							<!-- END DATA TABLE -->
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
		$('li#childrenPage').addClass("active");
		$('.delete_child').click(function () {
			var id = $(this).attr('name');
			console.log(id);
			if (confirm('Do you want to remove this child??')) {
				window.location.href = '<?php echo base_url('child/home/delete_child/'); ?>' + id;
			}
		});
	});
</script>
</body>

</html>
<!-- end document-->
