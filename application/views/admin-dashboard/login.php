<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('admin-dashboard/fragments/head-code'); ?>
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
                                <div class="alert alert-danger text-center">
                                    <?= validation_errors(); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->session->flashdata('loginError')) : ?>
                                <div class="alert alert-danger text-center">
                                    <?= $this->session->flashdata('loginError'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($this->session->flashdata('pinMsg')) : ?>
                                <div class="alert alert-success text-center">
                                    <?= $this->session->flashdata('pinMsg'); ?>
                                </div>
                            <?php endif; ?>
                            <form action="<?= base_url('admin/login'); ?>" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" value="<?= set_value('email') ?>" type="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" value="<?= set_value('password') ?>" type="password" name="password" required placeholder="Password">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <a href="#">Forgotten Password?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Sign in</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="<?= base_url('admin/register'); ?>">Sign Up Here</a>
                                </p>
                            </div>
                            <div class="register-link">
                                <p>
                                    Do you want to login as child?
                                    <a href="<?= base_url('child/login'); ?>">Login as user</a>
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