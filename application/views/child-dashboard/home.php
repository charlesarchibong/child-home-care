<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('child-dashboard/fragments/head-code'); ?>
</head>

<body class="animsition">
    <div class="page-wrapper">

        <?php $this->load->view('child-dashboard/fragments/mobile-header'); ?>
        <?php $this->load->view('child-dashboard/fragments/menu-side-bar'); ?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php $this->load->view('child-dashboard/fragments/header'); ?>
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

								<form action="#">
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
														   value=" <?= $child->date_of_birth ?>" type="text"
														   name="date_of_birth" placeholder="Date of Birth">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Gender</label>
													<select name="gender" class="form-control au-input">
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
									</div>
								</form>
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


    <?php $this->load->view('child-dashboard/fragments/script'); ?>
    <script>
     $(function(){
         $('.au-input').attr('disabled', true);
     });
    </script>
</body>

</html>
<!-- end document-->