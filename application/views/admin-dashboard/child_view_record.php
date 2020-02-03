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
										<div style="margin-bottom: 20px;">
											<p style="margin-right: 20px;"><b>Child's Name:</b>
												&nbsp;&nbsp;&nbsp;<?= $this->child_model->get_one($child_id)->name ?></p>
											<p style="margin-right: 20px;"><b>Child's ID:</b>
												&nbsp;&nbsp;&nbsp;<?= $this->child_model->get_one($child_id)->registration_id ?>
											</p>
										</div>
										<div class="card">

											<div class="card-header">Feeding Records</div>
											<div class="card-body">
												<div class="table-responsive table--no-card m-b-30">
													<table id="pinsTable" class="table table-borderless table-striped table-earning">
														<thead>
															<tr style="wordwrap: nowrap;">
																<th>#</th>
																<th>Feeding Method</th>
																<th>Date Recorded</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>

															<?php
															$i = 0;
															foreach ($records as $record) : ?>
																<?php if ($record->type == 'Feeding') : $i++; ?>
																	<tr class="tr-shadow">
																		<td><?= $i ?></td>
																		<td><?= $record->value ?></td>
																		<td><?= $record->date_recorded ?></td>
																		<td>
																			<button type="button" class="btn btn-danger delete_record" name="<?= $record->id ?>">
																				<i class="fa fa-trash"></i> Remove Record
																			</button>
																		</td>
																	</tr>
																	<tr class="spacer"></tr>
																<?php endif; ?>
															<?php endforeach;
															?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="card">
											<div class="card-header">Medical Records</div>
											<div class="card-body">
												<div class="table-responsive table--no-card m-b-30">
													<table id="pinsTable" class="table table-borderless table-striped table-earning">
														<thead>
															<tr style="wordwrap: nowrap;">
																<th>#</th>
																<th>Date Recorded</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>

															<?php
															$i = 0;
															foreach ($records as $record) : ?>
																<?php if ($record->type == 'Medical') : $i++; ?>
																	<tr class="tr-shadow">
																		<td><?= $i ?></td>
																		<td><?= $record->date_recorded ?></td>
																		<td>
																			<button type="button" class="btn btn-danger delete_record" name="<?= $record->id ?>">
																				<i class="fa fa-trash"></i> Remove Record
																			</button>
																			<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#<?= $record->id ?>">
																				<i class="fa fa-info"></i> View Details
																			</button>
																		</td>
																	</tr>
																	<tr class="spacer"></tr>
																<?php endif; ?>
															<?php endforeach;
															?>
														</tbody>
													</table>
												</div>

											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
						<?php $this->load->view('admin-dashboard/fragments/footer'); ?>
					</div>
				</div><?php
						$i = 0;
						foreach ($records as $record) : ?>
					<?php if ($record->type == 'Medical') : $i++; ?>
						<!--Details Record Modal -->
						<div class="modal fade" id="<?= $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Child's Medical Record</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<table>
											<tr>
												<td><span><b>Physician's Name:</b></span> <?= unserialize($record->value)['physician_name'] ?>
												</td>
											</tr>
											<tr>
												<td><span><b>Physician's Address:</b></span> <?= unserialize($record->value)['physician_address'] ?>
												</td>
											</tr>
											<tr>
												<td><span><b>Physician's Gender:</b></span> <?= unserialize($record->value)['physician_gender'] ?>
												</td>
											</tr>
											<tr>
												<td><span><b>Physician's Phone:</b></span> <?= unserialize($record->value)['physician_phone'] ?>
												</td>
											</tr>
											<tr>
												<td><span><b>Physician's Hospital:</b></span> <?= unserialize($record->value)['physician_hospital'] ?>
												</td>
											</tr>
											<tr>
												<td><span><b>No of Checkups:</b></span> <?= unserialize($record->value)['check_ups'] ?>
												</td>
											</tr>
											<tr>
												<td><span><b>Immunization:</b></span> <?= unserialize($record->value)['immunization'] ?>
												</td>
											</tr>
											<tr>
												<td><span><b>Blood Group:</b></span> <?= unserialize($record->value)['blood_group'] ?>
												</td>
											</tr>
											<tr>
												<td><span><b>Genotype:</b></span> <?= unserialize($record->value)['genotype'] ?>
												</td>
											</tr>
											<tr>
												<td><span><b>Disability:</b></span> <?= unserialize($record->value)['disability'] ?>
												</td>
											</tr>
											<?php if (unserialize($record->value)['disability'] == 'Yes') : ?>
												<tr>
													<td><span><b>Disability Details:</b></span> <?= unserialize($record->value)['disability_details'] ?>
													</td>
												</tr>
											<?php endif; ?>
										</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close
										</button>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<!-- END MAIN CONTENT-->
			<!-- END PAGE CONTAINER-->
		</div>

	</div>


	<?php $this->load->view('admin-dashboard/fragments/script'); ?>
	<script>
		$(function() {
			$('li#childRecord').addClass("active");
			$('.delete_record').click(function() {
				var id = $(this).attr('name');
				if (confirm('Do you want to remove this record??')) {
					window.location.href = '<?php echo base_url('admin/children/delete_record/'); ?>' + id;
				}
			});
		});
	</script>

</body>

</html>
<!-- end document-->