<!doctype html>
<html lang="en">
<?php

    // print_r($email);
    // print_r($rememberkey);

?>


<head>

    <meta charset="utf-8" />
    <title>Login | Upzet - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>/admin/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="<?php echo base_url() ?>/admin/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo base_url() ?>/admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo base_url() ?>/admin/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="bg-pattern">
    <div class="bg-overlay"></div>
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="">
                                <div class="text-center mb-4">
                                    <a href="index.html" class="">
                                        <img src="<?php echo base_url() ?>/admin/assets/images/logo-dark.png" alt="" height="44" class="auth-logo logo-dark mx-auto">
                                        <img src="<?php echo base_url() ?>/admin/assets/images/logo-light.png" alt="" height="34" class="auth-logo logo-light mx-auto">
                                    </a>
                                </div>
                                <!-- end row -->
                                <h4 class="font-size-18 text-muted mt-2 text-center">Welcome Back !</h4>
                                <p class="mb-5 text-center">Sign in to continue to Upzet.</p>

                                <?php

                                if(isset($error)){
                                    echo $error;
                                }
                                ?>
                                <?php
                    if(session()->getFlashdata('success')){
                        echo "<h4 style='color:green;text-align:center;'>".session()->getFlashdata('success')."</h4>";
                    }

                    ?>

                                <form class="form-horizontal" action="<?php echo base_url() ?>/" method="post">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label" for="username">Username</label>
                                                <input type="text" class="form-control" name="email" id="email" placeholder="Enter username"
                                                value="<?php if (isset($email)) {
                                                    echo $email;
                                                } ?>">
                                                <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                    echo $validation->getError('email');
                                                } ?>
                                                </small>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label" for="userpassword">Password</label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" value="<?php if (isset($rememberkey)) {
                                                    echo $rememberkey;
                                                } ?>">
                                                <small style="color:red;" class="text-danger"><?php if (isset($validation)) {
                                                    echo $validation->getError('password');
                                                } ?>
                                                </small>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="customControlInline" name="remember">
                                                        <label class="form-label" class="form-check-label" for="customControlInline">Remember me</label>
                                                    </div>
                                                </div>
                                                <div class="col-7">
                                                    <div class="text-md-end mt-3 mt-md-0">
                                                        <a href="<?=base_url('/forgot_pass');?>" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mt-3 mt-md-0">
                                                    <label class="form-label">
                                                    Not a member!
                                                        </label><a href="<?=base_url('/register');?>"> <b>Register here</b></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-grid mt-4">
                                                <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p class="text-white-50">Don't have an account ? <a href="register.php" class="fw-medium text-primary"> Register </a> </p>
                        <p class="text-white-50">© <script>
                                document.write(new Date().getFullYear())
                            </script> Property Management. Crafted with <i class="mdi mdi-heart text-danger"></i> by Therssoftware</p>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    <!-- end Account pages -->

    <!-- JAVASCRIPT -->
    <script src="<?php echo base_url() ?>/admin/assets/libs/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/libs/node-waves/waves.min.js"></script>

    <script src="<?php echo base_url() ?>/admin/assets/js/app.js"></script>

</body>

</html>