<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
	<div class="header-mobile__bar">
		<div class="container-fluid">
			<div class="header-mobile-inner">
				<a class="logo" href="index.html">
					<img style="width: 30%;" src="<?= base_url('assets/dashboard/images/icon/logo.png'); ?>"
						 alt="Logo"/>
				</a>
				<button class="hamburger hamburger--slider" type="button">
                     <span class="hamburger-box">
                         <span class="hamburger-inner"></span>
                     </span>
				</button>
			</div>
		</div>
	</div>
	<nav class="navbar-mobile">
		<div class="container-fluid">
			<ul class="navbar-mobile__list list-unstyled">
				<li id="homePage">
					<a href="<?= base_url('admin/home'); ?>">
						<i class="fas fa-home"></i>Home
					</a>
				</li>
				<li id="childrenPage">
					<a href="<?= base_url('admin/children') ?>">
						<i class="fas fa-eye"></i>View Children
					</a>
				</li>
				<li id="childEnrollPage">
					<a href="<?= base_url('admin/children/add_child') ?>">
						<i class="fas fa-tasks"></i>Enroll Child
					</a>
				</li>
				<li id="childRecord">
					<a href="<?= base_url('admin/children/child_record') ?>">
						<i class="fas fa-eye"></i>View Child Record
					</a>
				</li>
				<li id="pinPage">
					<a href="<?= base_url('admin/pin') ?>">
						<i class="fas fa-user-plus"></i>Register New Admin
					</a>
				</li>
			</ul>
		</div>
	</nav>
</header>
<!-- END HEADER MOBILE-->
