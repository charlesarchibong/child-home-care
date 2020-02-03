<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('landing/fragments/head-code'); ?>
</head>

<body>
<?php $this->load->view('landing/fragments/preloader-fragment'); ?>
<?php $this->load->view('landing/fragments/search-form-fragment'); ?>
<?php $this->load->view('landing/fragments/header-main-fragment'); ?>
<!-- ***** Breadcumb Area Start ***** -->
<div class="fancy-breadcumb-area bg-img bg-overlay"
	 style="background-image: url(<?= base_url('assets/img/bg-img/hero-1.jpg'); ?>);">
	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<div class="col-12">
				<div class="breadcumb-content text-center">
					<h2>Contact Us</h2>
					<p>Tell us about your story and your project.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- ***** Breadcumb Area End ***** -->

<!-- ***** Contact Area Start ***** -->
<div class="fancy-contact-area section-padding-100">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6">
				<!-- Contact Details -->
				<div class="contact-details-area">
					<div class="section-heading">
						<h2>Contact Us</h2>
						<p>There are many ways to contact us. You may drop us a line, give us a call or send an email,
							choose what suits you the most.</p>
					</div>
					<p>(800) 686-6688 <br> info.deercreative@gmail.com
					</p>
					<p>40 Baria Sreet 133/2 <br> NewYork City, US</p>
					<p>Open hours: 8.00-18.00 Mon-Fri <br> Sunday: Closed</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- ***** Contact Area End ***** -->
<?php $this->load->view('landing/fragments/footer'); ?>
<?php $this->load->view('landing/fragments/script'); ?>
</body>
