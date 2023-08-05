<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Register | Upzet - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

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
                                <div class="text-center mb-4">
                                    <a href="index.html" class="">
                                        <img src="assets/images/logo-dark.png" alt="" height="44" class="auth-logo logo-dark mx-auto">
                                        <img src="assets/images/logo-light.png" alt="" height="44" class="auth-logo logo-light mx-auto">
                                    </a>
                                </div>
                                
                                <h4 class="font-size-18 text-muted text-center mt-2">Free Register</h4>
                                <?php 
                    if(session()->getFlashdata('success')){
                        echo "<h4 style='color:red;text-align:center;'>".session()->getFlashdata('success')."</h4>";
                     }
                    ?>
                                <p class="text-muted text-center mb-4">Get your free Upzet account now.</p>
                                <form class="form-horizontal" action="<?php echo base_url('/register') ?>" method="post"> 
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label" for="username">Username</label>
                                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">

                                                <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('username')) {
             echo $validation->getError('username'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        User name is required.
                                                        </div>

                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label" for="useremail">Email</label>
                                                <input type="email" class="form-control" id="useremail" name="useremail" placeholder="Enter email">  
                                                
                                                <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('useremail')) {
             echo $validation->getError('useremail'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        User Email is required.
                                                        </div>      
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label" for="userpassword">Password</label>
                                                <input type="password" class="form-control" id="userpassword"
                                                name="userpassword" placeholder="Enter password">
                                                <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('userpassword')) {
             echo $validation->getError('userpassword'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        Password is required.
                                                        </div>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="term-conditionCheck" value="1" name="term_and_condition">
                                                <label class="form-check-label fw-normal" for="term-conditionCheck">I accept <a href="#" class="text-primary">Terms and Conditions</a></label>
                                                <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('term_and_condition')) {
             echo $validation->getError('term_and_condition'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        Terms and Conditions is required.
                                                        </div>
                                            </div>
                                            <div class="d-grid mt-4">
                                                <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p class="text-white-50">Already have account ?<a href="index.php" class="fw-medium text-primary"> Login </a> </p>
                            <p class="text-white-50">© <script>document.write(new Date().getFullYear())</script> Property Management. Crafted with <i class="mdi mdi-heart text-danger"></i> by Therssoftware</p>
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
