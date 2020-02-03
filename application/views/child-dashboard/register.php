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
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Surname</label>
                                                        <input required class="au-input au-input--full" value="<?= set_value('surname') ?>" type="text" name="surname" placeholder="Surname">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Other Names</label>
                                                        <input required class="au-input au-input--full" value="<?= set_value('othername') ?>" type="text" name="othername" placeholder="Other Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date of Birth</label>
                                                        <input required class="au-input au-input--full" value="<?= set_value('date_of_birth') ?>" type="date" name="date_of_birth" placeholder="Date of Birth">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                        <select name="gender" class="form-control" required>
                                                            <option selected disabled>Select Gender</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input required class="au-input au-input--full" value="<?= set_value('password') ?>" type="password" name="password" placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Confirm Password</label>
                                                        <input required class="au-input au-input--full" value="<?= set_value('password_confirm') ?>" type="password" name="password_confirm" placeholder="Confirm Password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <input required class="au-input au-input--full" value="<?= set_value('address') ?>" type="text" name="address" placeholder="Address">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Local Government Area</label>
                                                        <input required class="au-input au-input--full" value="<?= set_value('lga') ?>" type="text" name="lga" placeholder="Local Government of Origin">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nationality</label>
                                                        <select id="childCountry" required class="au-input au-input--full form-control" name="nationality">
                                                            <option value="" disabled selected>Select Country</option>
                                                            <?php foreach ($countries as $country) : ?>
                                                                <option value="<?= $country->country_id ?>"><?= $country->country ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>State of Origin</label>
                                                        <select id="childState" required class="au-input au-input--full form-control" name="state_of_origin">
                                                            <option value="" disabled selected>Select State of Origin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Hobbie</label>
                                                        <input required class="au-input au-input--full" value="<?= set_value('hobbie') ?>" type="text" name="hobbie" placeholder="Hobbie">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class=" form-control-label">Education</label>
                                                        <div class="form-check">
                                                            <div class="checkbox">
                                                                <label for="checkbox1" class="form-check-label ">
                                                                    <input type="checkbox" id="checkbox1" name="education[]" value="Primary" class="form-check-input">Primary
                                                                </label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label for="checkbox2" class="form-check-label ">
                                                                    <input type="checkbox" id="checkbox2" name="education[]" value="Secondary" class="form-check-input"> Secondary
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="parent-session">
                                                <span>
                                                    <h4 style="margin-bottom: 20px;">Parental Information</h4>
                                                </span>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input required class="au-input au-input--full" value="<?= set_value('parent_title') ?>" type="text" name="parent_title" placeholder="Title">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Fullname</label>
                                                            <input required class="au-input au-input--full" value="<?= set_value('parent_name') ?>" type="text" name="parent_name" placeholder="Parent Fulll Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Residential Address</label>
                                                            <input required class="au-input au-input--full" value="<?= set_value('parent_address') ?>" type="text" name="parent_address" placeholder="Parent Address">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Occupation</label>
                                                            <input required class="au-input au-input--full" value="<?= set_value('parent_occupation') ?>" type="text" name="parent_occupation" placeholder="Parent Occupation">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Marital Status</label>
                                                            <input required class="au-input au-input--full" value="<?= set_value('parent_marital_status') ?>" type="text" name="parent_marital_status" placeholder="Marital Status">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Phone Number</label>
                                                            <input required class="au-input au-input--full" value="<?= set_value('parent_phone') ?>" type="text" name="parent_phone" placeholder="Parent Phone number">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Local Government Area</label>
                                                        <input required class="au-input au-input--full" value="<?= set_value('parent_lga') ?>" type="text" name="parent_lga" placeholder="Parent Local Government Area">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nationality</label>
                                                        <select id="parentCountry" required class="au-input au-input--full form-control" name="parent_nationality">
                                                            <option value="" disabled selected>Select Country</option>
                                                            <?php foreach ($countries as $country) : ?>
                                                                <option value="<?= $country->country_id ?>"><?= $country->country ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>State of Origin</label>
                                                        <select id="parentState" required class="au-input au-input--full form-control" name="parent_state_of_origin">
                                                            <option value="" disabled selected>Select State of Origin</option>
                                                        </select>
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
        function changeState(country_id, element_id) {
            id = '#' + element_id
            $.ajax({
                url: '<?= base_url('child/register/get_states_json') ?>',
                method: 'POST',
                dataType: 'JSON',
                data: {
                    country_id: country_id
                },
                beforeSend: function() {
                    $(id).html('<option value="" disabled selected>Loading.....</option>');
                },
                success: function(data) {
                    $(id).html('<option value="" disabled selected>Select State</option>');
                    var states = data;
                    for (var i = 0; i < states.length; i++) {
                        var state = '<option value="' + states[i].state + '">' + states[i].state + '</option>';
                        $(id).append(state);
                    }
                }
            });
        }
        $(function() {
            $('#childCountry').change(function() {
                var country_id = $(this).val();
                changeState(country_id, 'childState');
            });
            $('#parentCountry').change(function() {
                var country_id = $(this).val();
                changeState(country_id, 'parentState');
            });
        });
    </script>
</body>

</html>
<!-- end document-->