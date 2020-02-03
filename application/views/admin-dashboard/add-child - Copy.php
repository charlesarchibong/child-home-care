<!DOCTYPE html>
<html lang="en">

<head>
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

        .bannerstick {
            background-color: red;
            position: fixed;
            bottom: 0;
            margin: 0 auto;
            width: 100%;
            right: 0px;
        }
    </style>
</head>

<body class="animsition">
    <div class="page-wrapper">

        <?php $this->load->view('admin-dashboard/fragments/mobile-header'); ?>
        <?php $this->load->view('admin-dashboard/fragments/menu-side-bar'); ?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php $this->load->view('admin-dashboard/fragments/header'); ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div id="partnerWithUs">
                                <div class="text-center bannerstick" style="padding: 10px;">
                                    <img style="width: 20%;" alt="" src="<?= base_url('assets/dashboard/images/partnership.png') ?>" />
                                    <img style="width: 5%;" alt="" src="<?= base_url('assets/dashboard/images/hand.png') ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>


    <script>
        // $(document).ready(function() {
        //     $('.delete_child').click(function() {
        //         var id = $(this).attr('name');
        //         if (confirm('Do you want to remove this child??')) {
        //             window.location.href = '<?php echo base_url('child/home/delete_child/'); ?>' + id;
        //         }
        //     });
        // });
    </script>
    <script>
        
       

        $(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() < 500) {
                    $('#partnerWithUs').fadeOut(1000);
                } else {
                    $('#partnerWithUs').fadeIn(5000);
                }
            });
        });
    </script>
</body>

</html>
<!-- end document-->