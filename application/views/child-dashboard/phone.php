<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('child-dashboard/fragments/head-code'); ?>
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
    </style>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="login-wrap">
                            <div class="login-content">
                                <div class="login-logo">
                                    <a href="#">
                                        <img style="width: 30%;" src="<?= base_url('assets/dashboard/images/icon/logo.png'); ?>" alt="Coolchild">
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

                                    <form action="<?= base_url('child/register'); ?>" method="post">
                                        <div class="child-session">
                                            <span>
                                                <h4 style="margin-bottom: 20px;">Child Information</h4>
                                            </span>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nationality</label>
                                                    <select id="parentCountry" required class="au-input au-input--full form-control" name="parent_nationality">
                                                        <option value="" disabled selected>Select Country</option>
                                                        <?php foreach ($countries as $country) : ?>
                                                            <option value="<?= $country->phonecode ?>"><?= $country->country ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone Number</label>
                                                    <input id="phone" required class="au-input au-input--full" value="<?= set_value('parent_phone') ?>" type="text" name="parent_phone" placeholder="Parent Phone number">
                                                </div>
                                            </div>
                                        </div>
                                        <button style="width: 30%; margin: 0 auto;" class="mt-3 mb-3 au-btn au-btn--block au-btn--green m-b-20" type="submit">
                                            Register
                                        </button>
                                </div>
                                </form>
                                <div class="register-link">
                                    <p>
                                        Already have account?
                                        <a href="<?= base_url('child/login'); ?>">Sign In</a>
                                    </p>
                                </div>

                                <div class="register-link">
                                    <p>
                                        Do you want to register as admin?
                                        <a href="<?= base_url('admin/register'); ?>">Register as admin</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <?php $this->load->view('child-dashboard/fragments/script'); ?>
    <script>
        $(function() {
            $('#parentCountry').change(function() {
                var phoneCode = $(this).val();
                $('#phone').val('+' + phoneCode);
            });
        });
    </script>
</body>

</html>
<!-- end document-->