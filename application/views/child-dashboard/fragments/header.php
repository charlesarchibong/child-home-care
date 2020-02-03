<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <div class="header-button">
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="<?= base_url('assets/dashboard/images/icon/avatar-01.png'); ?>" alt="<?= $user->name ?>" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#"><?= $user->name ?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="<?= base_url('assets/dashboard/images/icon/avatar-01.png'); ?>" alt="<?= $user->name ?>" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#"><?= $user->name ?></a>
                                        </h5>
                                        <span class="email"><?= $user->registration_id ?></span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="<?= base_url() ?>">
                                            <i class="zmdi zmdi-home"></i>Home Page</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="<?= base_url('child/login/logout') ?>">
                                        <i class="zmdi zmdi-power"></i>Logout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>