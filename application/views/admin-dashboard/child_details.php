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
							<h3 class="title-5 m-b-35">Child Details</h3>
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
								<?php if (validation_errors()) : ?>
									<div class="alert alert-danger" style="text-align: center;">
										<?= validation_errors(); ?>
									</div>
								<?php endif; ?>

								<form action="<?= base_url('admin/children/update_child/' . $registration_id); ?>"
									  method="post">
									<div class="child-session">
                                            <span>
                                                <h4 style="margin-bottom: 20px;">Child Information</h4>
                                            </span>
										<div class="form-row">
											<div class="col-md-6">
												<div class="form-group">
													<label>FullName</label>
													<input class="au-input au-input--full" value="<?= $child->name ?>"
														   type="text" name="name" placeholder="Fullname">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Registration ID</label>
													<input disabled class="au-input au-input--full"
														   value="<?= $child->registration_id ?>" type="text"
														   name="id" placeholder="Other Name">
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Date of Birth</label>
													<input class="au-input au-input--full"
														   value=" <?= $child->date_of_birth ?>" type="date"
														   name="date_of_birth" placeholder="Date of Birth">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Gender</label>
													<select name="gender" class="form-control">
														<option selected disabled>Select Gender</option>
														<option
															value="Male" <?= $child->gender == 'Male' ? 'selected' : '' ?>>
															Male
														</option>
														<option
															value="Female" <?= $child->gender == 'Female' ? 'selected' : '' ?>>
															Female
														</option>
													</select>
												</div>
											</div>
										</div>

										<div class="form-row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Password</label>
													<input class="au-input au-input--full"
														   value="<?= set_value('password') ?>" type="password"
														   name="password" placeholder="Password">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Confirm Password</label>
													<input class="au-input au-input--full"
														   value="<?= set_value('password_confirm') ?>" type="password"
														   name="password_confirm" placeholder="Confirm Password">
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Address</label>
													<input class="au-input au-input--full"
														   value="<?= $child->address ?>" type="text" name="address"
														   placeholder="Address">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Local Government Area</label>
													<input class="au-input au-input--full" value="<?= $child->lga ?>"
														   type="text" name="lga"
														   placeholder="Local Government of Origin">
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Nationality</label>
													<select id="childCountry"
															class="au-input au-input--full form-control"
															name="nationality">
														<option value="" disabled selected>Select Country</option>
														<?php foreach ($countries as $country) : ?>
															<?php if ($child->nationality == $country->country): ?>
																<option value="<?= $country->country_id ?>"
																		selected><?= $country->country ?></option>
															<?php else: ?>
																<option
																	value="<?= $country->country_id ?>"><?= $country->country ?></option>
															<?php endif; ?>
														<?php endforeach; ?>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>State of Origin</label>
													<select id="childState" class="au-input au-input--full form-control"
															name="state_of_origin">
														<option value="<?= $child->state_of_origin ?>"
																selected><?= $child->state_of_origin ?>
														</option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Hobbie</label>
													<input class="au-input au-input--full"
														   value="<?= $child->hobbies ?>" type="text" name="hobbie"
														   placeholder="Hobbie">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class=" form-control-label">Education</label>
													<div class="form-group">
														<input class="au-input au-input--full"
															   value="<?= $child->education ?>" type="text"
															   name="education" placeholder="Child EDucation">
													</div>
												</div>
											</div>
										</div>
										<?php if ($parent): ?>
											<div class="parent-session">
                                                <span>
                                                    <h4 style="margin-bottom: 20px;">Parental Information</h4>
                                                </span>
												<div class="form-row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Title</label>
															<input class="au-input au-input--full"
																   value="<?= $parent->title ?>" type="text"
																   name="parent_title" placeholder="Title">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Fullname</label>
															<input class="au-input au-input--full"
																   value="<?= $parent->name ?>" type="text"
																   name="parent_name" placeholder="Parent Fulll Name">
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Residential Address</label>
															<input class="au-input au-input--full"
																   value="<?= $parent->address ?>" type="text"
																   name="parent_address" placeholder="Parent Address">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Occupation</label>
															<input class="au-input au-input--full"
																   value="<?= $parent->occupation ?>" type="text"
																   name="parent_occupation"
																   placeholder="Parent Occupation">
														</div>
													</div>
												</div>
												<div class="form-row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Marital Status</label>
															<input class="au-input au-input--full"
																   value="<?= $parent->marital_status ?>" type="text"
																   name="parent_marital_status"
																   placeholder="Marital Status">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Phone Number</label>
															<input class="au-input au-input--full"
																   value="<?= $parent->phone_no ?>" type="text"
																   name="parent_phone"
																   placeholder="Parent Phone number">
														</div>
													</div>
												</div>
											</div>
											<div class="form-row">
												<div class="col-md-12">
													<div class="form-group">
														<label>Local Government Area</label>
														<input class="au-input au-input--full"
															   value="<?= $parent->lga ?>"
															   type="text" name="parent_lga"
															   placeholder="Parent Local Government Area">
													</div>
												</div>
											</div>
											<div class="form-row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Nationality</label>
														<select id="parentCountry"
																class="au-input au-input--full form-control"
																name="parent_nationality">
															<option value="" disabled selected>Select Country</option>
															<?php foreach ($countries as $country) : ?>
																<?php if ($child->nationality == $country->country): ?>
																	<option value="<?= $country->country_id ?>"
																			selected><?= $country->country ?></option>
																<?php else: ?>
																	<option
																		value="<?= $country->country_id ?>"><?= $country->country ?></option>
																<?php endif; ?>
															<?php endforeach; ?>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>State of Origin</label>
														<select id="parentState"
																class="au-input au-input--full form-control"
																name="parent_state_of_origin">
															<option value="<?= $parent->state_of_orgin ?>"
																	selected><?= $parent->state_of_orgin ?></option>
														</select>
													</div>
												</div>
											</div>
										<?php endif; ?>
										<button style="width: 30%; margin: 0 auto;"
												class="mt-3 mb-3 au-btn au-btn--block au-btn--green m-b-20"
												type="submit" id="updateBtn">
											Update Child
										</button>
										<button style="width: 30%; margin: 0 auto;"
												class="mt-3 mb-3 au-btn au-btn--block au-btn--blue m-b-20"
												type="button" data-toggle="modal" data-target="#basicExampleModal">
											Add Child Record
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<?php $this->load->view('admin-dashboard/fragments/footer'); ?>
				</div>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog"
				 aria-labelledby="exampleModalLabel"
				 aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Add Child Record</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="<?= base_url('admin/children/add_record/' . $registration_id); ?>"
							  method="post">
							<div class="modal-body">
								<div class="child-session">
									<?php if ($this->session->flashdata('record_error')): ?>
										<div class="alert alert-danger">
											<?= $this->session->flashdata('record_error') ?>
										</div>
									<?php endif; ?>
									<div class="form-row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="type">Record Type</label>
												<select required id="type" name="type"
														class="au-input au-input--full form-control">
													<option disabled selected value="">---Select Type of Record---
													</option>
													<option value="Feeding">Feeding</option>
													<option value="Medical">Medical</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-row feeding" style="display: none;">
										<div class="col-md-12">
											<div class="form-group">
												<label>Feeding Method</label>
												<input id="feeding_medthod" class="au-input au-input--full"
													   type="text" value="<?= set_value('feeling_method') ?>"
													   name="feeding_method"
													   placeholder="Child's Feeding Method">
											</div>
										</div>
									</div>
									<div class="form-row medical" style="display: none;">
										<div class="col-md-6">
											<span class="pb-5">Physician Information</span>
											<div class="form-group">
												<input id="physician_name" class="au-input au-input--full"
													   type="text" name="physician_name"
													   value="<?= set_value('physician_name') ?>"
													   placeholder="Physician Name">
											</div>
											<div class="form-group">
												<input id="physician_address" class="au-input au-input--full"
													   type="text" name="physician_address"
													   VALUE="<?= set_value('physician_address') ?>"
													   placeholder="Physician Address">
											</div>
											<div class="form-group">
												<select id="physician_gender" name="physician_gender"
														class="form-control">
													<option selected disabled>Select Gender</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
											<div class="form-group">
												<input id="physician_phone" class="au-input au-input--full"
													   type="number" name="physician_phone"
													   VALUE="<?= set_value('physician_phone') ?>"
													   placeholder="Physician Phone number">
											</div>
											<div class="form-group">
												<input id="physician_hospital" class="au-input au-input--full"
													   type="text" name="physician_hospital"
													   VALUE="<?= set_value('physician_hospital') ?>"
													   placeholder="Hospital Name">
											</div>
										</div>
										<div class="col-md-6">
											<span class="pb-5">Child Health History</span>
											<div class="form-group">
												<input id="check_ups" class="au-input au-input--full"
													   type="number" name="check_ups"
													   VALUE="<?= set_value('check_ups') ?>"
													   placeholder="no of child's check up">
											</div>
											<div class="form-group">
												<input id="immunization" class="au-input au-input--full"
													   type="number" name="immunization"
													   VALUE="<?= set_value('immunization') ?>"
													   placeholder="no of immunization taken">
											</div>
											<div class="form-group">
												<input id="blood_group" class="au-input au-input--full"
													   type="text" name="blood_group"
													   VALUE="<?= set_value('blood_group') ?>"
													   placeholder="child's blood group">
											</div>
											<div class="form-group">
												<input id="genotype" class="au-input au-input--full"
													   type="text" name="genotype" value="<?= set_value('genotype') ?>"
													   placeholder="child's genotype">
											</div>
											<div class="form-group">
												<select id="disability" name="disability" class="form-control">
													<option selected disabled>Any Disability?</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
											<div class="form-group disability-details" style="display: none;">
												<input type="text" id="disability_details"
													   value="<?= set_value('disability_details') ?>"
													   name="disability_details"
													   class="au-input au-input--full form-control"
													   placeholder="details of disability"/>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Add Record</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- END MAIN CONTENT-->
		<!-- END PAGE CONTAINER-->
	</div>

</div>


<?php $this->load->view('admin-dashboard/fragments/script'); ?>
<script>
	// $(document).ready(function() {
	//     $('.delete_child').click(function() {
	//         var id = $(this).attr('name');
	//         if (confirm('Do you want to remove this child??')) {
	//             window.location.href = '<?php echo base_url('child/home/delete_child/'); ?>' + id;
	//         }
	//     });
	// });
</script>
<script>
	function changeState(country_id, element_id) {
		id = '#' + element_id
		$.ajax({
			url: '<?= base_url('child/register/get_states_json') ?>',
			method: 'POST',
			dataType: 'JSON',
			data: {
				country_id: country_id
			},
			beforeSend: function () {
				$(id).html('<option value="" disabled selected>Loading.....</option>');
			},
			success: function (data) {
				$(id).html('<option value="" disabled selected>Select State</option>');
				var states = data;
				for (var i = 0; i < states.length; i++) {
					var state = '<option value="' + states[i].state + '">' + states[i].state + '</option>';
					$(id).append(state);
				}
			}
		});
	}

	$(function () {
		$('li#childEnrollPage').addClass("active");
		<?php if($this->session->flashdata('record_error')): ?>
		$('#basicExampleModal').modal('show');
		<?php endif; ?>
		$('#disability').change(function () {
			var value = $(this).val();
			if (value === 'Yes') {
				$('.disability-details').show();
				$('#disability_details').attr('required', true);
			} else {
				$('.disability-details').hide();
				$('#disability_details').attr('required', false);
			}
		});

		$('#type').change(function () {
			var type = $(this).val();
			if (type === 'Feeding') {
				$('.feeding').show();
				$('.medical').hide();
				$('#feeding_medthod').attr('required', true);
				$('#physician_address').attr('required', false);
				$('#physician_gender').attr('required', false);
				$('#physician_hospital').attr('required', false);
				$('#physician_name').attr('required', false);
				$('#physician_phone').attr('required', false);
				$('#check_ups').attr('required', false);
				$('#disability_details').attr('required', false);
				$('#disability').attr('required', false);
				$('#genotype').attr('required', false);
				$('#blood_group').attr('required', false);
				$('#immunization').attr('required', false);
			} else {
				$('.feeding').hide();
				$('.medical').show();
				$('#physician_address').attr('required', true);
				$('#physician_gender').attr('required', true);
				$('#physician_hospital').attr('required', true);
				$('#physician_name').attr('required', true);
				$('#physician_phone').attr('required', true);
				$('#check_ups').attr('required', true);
				$('#disability_details').attr('required', true);
				$('#disability').attr('required', true);
				$('#genotype').attr('required', true);
				$('#blood_group').attr('required', true);
				$('#immunization').attr('required', true);
				$('#feeding_medthod').removeAttr('required');
			}
		});
		$('#childCountry').change(function () {
			var country_id = $(this).val();
			changeState(country_id, 'childState');
		});
		$('#parentCountry').change(function () {
			var country_id = $(this).val();
			changeState(country_id, 'parentState');
		});
	});
</script>
</body>

</html>
<!-- end document-->
