<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Register | Upzet - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="<?php echo base_url() ?>/admin/shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="<?php echo base_url() ?>/admin/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo base_url() ?>/admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo base_url() ?>/admin/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>/admin/assets/css/custom.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="container pt-5  ">
        <h3 style="text-align: center;"><?php echo lang('Property.pro_properties'); ?></h3>
        <br>
        <div class="col-md-12 text-center font-size-24">
                <a href="<?php echo base_url() ?>/admin/poperty_add/<?=$type;?>" class="mt-4 mb-4 btn btn-primary btn-large-rounded avatar-title mx-auto"><span><i class="ri-add-line font-size-24"></i> <br> Add Properties</span> </a>
            </div>
        <div class="row align-items-center">
            <?php 
               foreach($properties as $property){
                   
            ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?php echo base_url() ?>/admin/assets/images/pr1.jpg" class="img-fluid">
                    <div class="card-body">
                        <h3 class="d-flex align-items-center"><i class=" ri-building-4-line"></i> <?=$property['propertyname'];?></h3>
                        <p><i class=" ri-map-pin-line"></i> <?=$property['streetads'].$property['city'];?></p>
                        <hr>
                        <ul class="ml-0 d-flex align-items-center justify-content-center text-center list-unstyled">
                            <li class="flex-fill">
                                <a href="<?= base_url('admin/floor_list/'.$property['id']) ?>">
                                    <i class=" ri-building-4-line  font-size-24"></i><br />
                                    <span><?php echo lang('Property.pro_floor'); ?></span>
                                </a>
                            </li>
                            <li class="flex-fill">
                                <a href="<?= base_url('admin/tenant_list/'.$property['id']) ?>">
                                    <i class="ri-group-2-line font-size-24"></i><br />
                                    <span><?php echo lang('Property.pro_tenants'); ?></span>
                                </a>
                            </li>
                            <li class="flex-fill">
                                <a href="<?= base_url('admin/rentlist/'.$property['id']) ?>">
                                    <i class="ri-money-dollar-circle-line font-size-24"></i><br />
                                    <span><?php echo lang('Property.pro_accounting'); ?></span>
                                </a>
                            </li>
                            <li class="flex-fill">
                                <a href="<?= base_url('admin/maintenance_list/'.$property['id']) ?>">
                                    <i class="ri-tools-line font-size-24"></i><br />
                                    <span><?php echo lang('Property.pro_maintenance'); ?></span>
                                </a>
                            </li>
                        </ul>
                        <hr>
                        <div class="text-end">
                            <a href="<?= base_url('admin/home/'.$property['id']) ?>"> <?php echo lang('Property.pro_view'); ?> </a>
                        </div>
                    </div>
                </div>
            </div>

            <?php }?>

        </div>

    </div>
    <!-- JAVASCRIPT -->
    <script src="<?php echo base_url() ?>/admin/assets/libs/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/libs/node-waves/waves.min.js"></script>

    <script src="<?php echo base_url() ?>/admin/assets/js/app.js"></script>
    <script src="<?php echo base_url() ?>/admin/assets/js/custom.js"></script>

</body>

</html>