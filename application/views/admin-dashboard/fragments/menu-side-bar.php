<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
	<div class="logo">
		<a href="#">
			<img style="width: 30%;" src="<?= base_url('assets/dashboard/images/icon/logo.png'); ?>" alt="Logo"/>
		</a>
	</div>
	<div class="menu-sidebar__content js-scrollbar1">
		<nav class="navbar-sidebar">
			<ul class="list-unstyled navbar__list">
				<li id="homePage" class="">
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
				<li id="pinPage" class="">
					<a href="<?= base_url('admin/pin') ?>">
						<i class="fas fa-user-plus"></i>Register New Admin
					</a>
				</li>
			</ul>
		</nav>
	</div>
</aside>
<!-- END MENU SIDEBAR-->
