<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img class="logo-image" src="<?= base_url('assets/dashboard/images/icon/logo.png'); ?>" alt="Logo" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="<?= $this->uri->segment(2) == 'home' ? 'active' : '' ?>">
                    <a href="<?= base_url('child/home'); ?>">
                        <i class="fas fa-home"></i>Home
                    </a>
                </li>
                <li class="<?= $this->uri->segment(2) == 'record' ? 'active' : '' ?>">
                    <a href="<?= base_url('child/record'); ?>">
                        <i class="fas fa-eye"></i>View Your Record
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->