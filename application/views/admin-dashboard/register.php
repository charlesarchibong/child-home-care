<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('admin-dashboard/fragments/head-code'); ?>
    <style>
        .page-content--bge5 {
            background: transparent;
            height: auto;
        }
    </style>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img style="width: 30%;" src="<?= base_url('assets/dashboard/images/icon/logo.png'); ?>" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <?php if (validation_errors()) : ?>
                                <div class="alert alert-danger" style="text-align: center;">
                                    <?= validation_errors(); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($this->session->flashdata('pinError')) : ?>
                                <div class="alert alert-danger" style="text-align: center;">
                                    <?= $this->session->flashdata('pinError'); ?>
                                </div>
                            <?php endif; ?>
                            <form action="<?= base_url('admin/register'); ?>" method="post">
                                <div class="form-group">
                                    <label>Fullname</label>
                                    <input required class="au-input au-input--full" value="<?= set_value('name') ?>" type="text" name="name" placeholder="Fullname">
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input required class="au-input au-input--full" value="<?= set_value('email') ?>" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input required class="au-input au-input--full" value="<?= set_value('password') ?>" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input required class="au-input au-input--full" value="<?= set_value('password_confirm') ?>" type="password" name="password_confirm" placeholder="Confirm Password">
                                </div>
                                <div class="form-group">
                                    <label>Authentication Pin</label>
                                    <input required class="au-input au-input--full" value="<?= set_value('pin') ?>" type="password" name="pin" placeholder="Admin Authentication Pin">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">
                                    Register
                                </button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="<?= base_url('admin/login'); ?>">Sign In</a>
                                </p>
                            </div>
                            <div class="register-link">
                                <p>
                                    Do you want to register as child?
                                    <a href="<?= base_url('child/register'); ?>">Sign up as user</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php $this->load->view('admin-dashboard/fragments/script'); ?>
</body>

</html>
<!-- end document-->