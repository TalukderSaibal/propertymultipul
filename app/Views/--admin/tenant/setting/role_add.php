<?= $this->extend('admin/master') ?>
<?= $this->section('content') ?>

<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Roles Setup  </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Golden Tower</a></li>
                                <li class="breadcrumb-item active">Roles Setup  </li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title --> 
  
                <div class="row">
                <div class="col-lg-12"> 
                    <div class="card">
                        <div class="card-body ">
                            <?php 
                        if (isset($success)) {
                            echo "<h4 style='color:red;text-align:center;'class='text-danger'>" . $success . "</h4>";
                        }
                        ?>
                            
                            <form action="<?= base_url('admin/roleadd')?>" method="POST"enctype="multipart/form-data" class="needs-validation" novalidate>
                                <div class="row">

                                    <div class="col-md-12 mt-4">
                                        <label>* Role name :</label>
                                        <input type="text" class="form-control" name="role_name" required>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('role_name')) {
             echo $validation->getError('role_name'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        Sorry role name is required.
                                                        </div>
                                    </div>
                                   
                                    <div class="col-md-12 mt-4">
                                        <label>User access :</label><br>

                                        <label>Floor :</label><br>
                                        <input type="checkbox" id="floor_l" name="floor_l" value="floor_list">
                                        <label for="floor_l">Floor List</label>

                                        <input type="checkbox" id="floor_a" name="floor_a" value="floor_add">
                                        <label for="floor_a">Floor Add</label>

                                        <input type="checkbox" id="floor_e" name="floor_e" value="floor_edit">
                                        <label for="floor_e">Floor Edit </label>

                                        <input type="checkbox" id="floor_d" name="floor_d" value="floor_delete">
                                        <label for="floor_d">Floor Delete</label>

                                        <br><label>Unit :</label><br>
                                        <input type="checkbox" id="unit_l" name="unit_l" value="unit_list">
                                        <label for="unit_l"> Unit List</label>

                                        <input type="checkbox" id="unit_a" name="unit_a" value="unit_add">
                                        <label for="unit_a"> Unit Add</label>

                                        <input type="checkbox" id="unit_e" name="unit_e" value="unit_edit">
                                        <label for="unit_e">Unit Edit</label>

                                        <input type="checkbox" id="unit_d" name="unit_d" value="unit_delete">
                                        <label for="unit_d">Unit Delete</label>

                                        <br><label>Owner :</label><br>
                                        <input type="checkbox" id="owner_l" name="owner_l" value="ownerlist">
                                        <label for="owner_l">Owner List</label>

                                        <input type="checkbox" id="owner_a" name="owner_a" value="owneradd">
                                        <label for="owner_a">Owner Add</label>

                                        <input type="checkbox" id="owner_e" name="owner_e" value="ownerupdate">
                                        <label for="owner_e">Owner Edit</label>

                                        <input type="checkbox" id="owner_d" name="owner_d" value="ownerdelete">
                                        <label for="owner_d">Owner Delete</label>

                                        <input type="checkbox" id="indivusualowner" name="indivusualowner" value="indivusualowner">
                                        <label for="indivusualowner">Owner View</label>

                                        <br><label>Tenant :</label><br>
                                        <input type="checkbox" id="tenant_l" name="tenant_l" value="tenant_list">
                                        <label for="tenant_l"> Tenant List</label>

                                        <input type="checkbox" id="tenant_a" name="tenant_a" value="tenant_add">
                                        <label for="tenant_a"> Tenant Add</label>

                                        <input type="checkbox" id="tenant_e" name="tenant_e" value="tenant_edit">
                                        <label for="tenant_e"> Tenant Edit</label>

                                        <input type="checkbox" id="tenant_d" name="tenant_d" value="tenant_delete">
                                        <label for="tenant_d"> Tenant Delete</label>

                                        <input type="checkbox" id="tenant_view" name="tenant_view" value="tenant_view">
                                        <label for="tenant_view">Tenant View</label>

                                        <br><label>Employee :</label><br>
                                        <input type="checkbox" id="employee_l" name="employee_l" value="employeelist">
                                        <label for="employee_l">Employee List</label>

                                        <input type="checkbox" id="employee_a" name="employee_a" value="employeeadd">
                                        <label for="employee_a"> Employee Add</label>

                                        <input type="checkbox" id="employee_e" name="employee_e" value="employeeupdate">
                                        <label for="employee_e"> Employee Edit</label>

                                        <input type="checkbox" id="employee_d" name="employee_d" value="employeedelete">
                                        <label for="employee_d"> Employee Delete</label>

                                        <input type="checkbox" id="indivisualemployee" name="indivisualemployee" value="indivisualemployee">
                                        <label for="indivisualemployee">Employee View</label>

                                        <br><label>Employee salary :</label><br>
                                        <input type="checkbox" id="emp_salary_addandlist" name="emp_salary_addandlist" value="employeesalary">
                                        <label for="emp_salary_addandlist"> Salary List</label>

                                        <input type="checkbox" id="emp_salaery_e" name="emp_salaery_e" value="employeesalaryupdate">
                                        <label for="emp_salaery_e"> Salary Edit</label>
                                        
                                        <input type="checkbox" id="emp_salaery_d" name="emp_salaery_d" value="employeesalarydelete">
                                        <label for="emp_salaery_d">Salary Delete</label>

                                        <input type="checkbox" id="indivisualemployeesalary" name="indivisualemployeesalary" value="indivisualemployeesalary">
                                        <label for="indivisualemployeesalary">Employee Salary View</label>

                                        <br><label>Rent colection :</label><br>
                                        <input type="checkbox" id="rent_l" name="rent_l" value="rentlist">
                                        <label for="rent_l"> Rent List</label>

                                        <input type="checkbox" id="rent_a" name="rent_a" value="addrent">
                                        <label for="rent_a"> Rent Add</label>

                                        <input type="checkbox" id="rent_e" name="rent_e" value="rentupdate">
                                        <label for="rent_e"> Rent Edit </label>

                                        <input type="checkbox" id="rent_d" name="rent_d" value="rentdelete">
                                        <label for="rent_d"> Rent Delete</label>

                                        <input type="checkbox" id="indivusualrent" name="indivusualrent" value="indivusualrent">
                                        <label for="indivusualrent">Rent View</label>

                                        <br><label>Owner Utility :</label><br>
                                        <input type="checkbox" id="utility_l" name="utility_l" value="ownerutilitylist">
                                        <label for="utility_l"> Utility List</label>

                                        <input type="checkbox" id="utility_a" name="utility_a" value="ownerutilityadd">
                                        <label for="utility_a"> Utility Add</label>

                                        <input type="checkbox" id="utility_e" name="utility_e" value="ownerutilityupdate">
                                        <label for="utility_e"> Utility Edit</label>

                                        <input type="checkbox" id="utility_d" name="utility_d" value="ownerutilitydelete">
                                        <label for="utility_d"> Utility Delete</label>

                                        <input type="checkbox" id="indivusualutility" name="indivusualutility" value="indivusualutility">
                                        <label for="indivusualutility">Owner Utility View</label>

                                        <br><label>Maintenance Cost :</label><br>
                                        <input type="checkbox" id="cost_l" name="cost_l" value="maintenance_list">
                                        <label for="cost_l"> Cost List</label>

                                        <input type="checkbox" id="cost_a" name="cost_a" value="maintenance_add">
                                        <label for="cost_a"> Cost Add</label>

                                        <input type="checkbox" id="cost_e" name="cost_e" value="maintenance_edit">
                                        <label for="cost_e"> Cost Edit</label>

                                        <input type="checkbox" id="cost_d" name="cost_d" value="maintenance_delete">
                                        <label for="cost_d"> Cost Delete</label>

                                        <input type="checkbox" id="maintenance_view" name="maintenance_view" value="maintenance_view">
                                        <label for="maintenance_view">Maintenance View</label>

                                        <br><label>Management committee :</label><br>
                                        <input type="checkbox" id="committee_l" name="committee_l" value="committee_list">
                                        <label for="committee_l"> Committee List</label>

                                        <input type="checkbox" id="committee_a" name="committee_a" value="committee_add">
                                        <label for="committee_a"> Committee Add</label>

                                        <input type="checkbox" id="committee_e" name="committee_e" value="committee_edit">
                                        <label for="committee_e"> Committee Edit</label>

                                        <input type="checkbox" id="committee_d" name="committee_d" value="committee_delete">
                                        <label for="committee_d"> Committee Delete</label>

                                        <input type="checkbox" id="committee_view" name="committee_view" value="committee_view">
                                        <label for="committee_view">Committee View</label>

                                        <br><label>Apartment Fund :</label><br>
                                        <input type="checkbox" id="fund_l" name="fund_l" value="fundlist">
                                        <label for="fund_l"> Fund List</label>

                                        <input type="checkbox" id="fund_a" name="fund_a" value="addfund">
                                        <label for="fund_a"> Fund Add</label>

                                        <input type="checkbox" id="fund_e" name="fund_e" value="fundupdate">
                                        <label for="fund_e"> Fund Edit</label>

                                        <input type="checkbox" id="fund_d" name="fund_d" value="fundupdate">
                                        <label for="fund_d"> Fund Delete</label>

                                        <input type="checkbox" id="indivisualfund" name="indivisualfund" value="indivisualfund">
                                        <label for="indivisualfund"> Fund view</label>

                                        <br><label>Bill Deposit :</label><br>
                                        <input type="checkbox" id="bill_l" name="bill_l" value="billdipositlist">
                                        <label for="bill_l"> Bill List</label>

                                        <input type="checkbox" id="bill_a" name="bill_a" value="addbill">
                                        <label for="bill_a"> Bill Add</label>

                                        <input type="checkbox" id="bill_e" name="bill_e" value="billupdate">
                                        <label for="bill_e"> Bill Edit</label>

                                        <input type="checkbox" id="bill_d" name="bill_d" value="billdelete">
                                        <label for="bill_d"> Bill Delete</label>

                                        <input type="checkbox" id="indivisualbill" name="indivisualbill" value="indivisualbill">
                                        <label for="indivisualbill">Bill View</label>

                                        <br><label>Complain :</label><br>
                                        <input type="checkbox" id="complain_l" name="complain_l" value="complain_list">
                                        <label for="complain_l"> Complain List</label>

                                        <input type="checkbox" id="complain_a" name="complain_a" value="complain_add">
                                        <label for="complain_a"> Complain Add</label>

                                        <input type="checkbox" id="complain_e" name="complain_e" value="complain_edit">
                                        <label for="complain_e"> Complain Edit</label>

                                        <input type="checkbox" id="complain_d" name="complain_d" value="complain_delete">
                                        <label for="complain_d"> Complain Delete</label>

                                        <input type="checkbox" id="complain_view" name="complain_view" value="complain_view">
                                        <label for="complain_view">Complain View</label>


                                        <br><label>Visitor :</label><br>
                                        <input type="checkbox" id="visitor_l" name="visitor_l" value="visitor_list">
                                        <label for="visitor_l"> Visitor List</label>

                                        <input type="checkbox" id="visitor_a" name="visitor_a" value="visitor_add">
                                        <label for="visitor_a"> Visitor Add</label>

                                        <input type="checkbox" id="visitor_e" name="visitor_e" value="visitor_edit">
                                        <label for="visitor_e"> Visitor Edit</label>

                                        <input type="checkbox" id="visitor_d" name="visitor_d" value="visitor_delete">
                                        <label for="visitor_d"> Visitor Delete</label>

                                        <br><label>Meeting :</label><br>
                                        <input type="checkbox" id="meeting_l" name="meeting_l" value="meeting_list">
                                        <label for="meeting_l"> Meeting List</label>

                                        <input type="checkbox" id="meeting_a" name="meeting_a" value="meeting_add">
                                        <label for="meeting_a"> Meeting Add</label>

                                        <input type="checkbox" id="meeting_e" name="meeting_e" value="meeting_edit">
                                        <label for="meeting_e"> Meeting Edit</label>

                                        <input type="checkbox" id="meeting_d" name="meeting_d" value="meeting_delete">
                                        <label for="meeting_d"> Meeting Delete</label>

                                        <input type="checkbox" id="meeting_view" name="meeting_view" value="meeting_view">
                                        <label for="meeting_view">Meeting View</label>

                                        <br><label>Notice Board :</label><br>
                                        <input type="checkbox" id="notice_addlist" name="notice_addlist" value="addnotice">
                                        <label for="notice_addlist"> Notice Add and List</label>

                                        <input type="checkbox" id="notice_e" name="notice_e" value="noticeupdate">
                                        <label for="notice_e"> Notice Edit</label>

                                        <input type="checkbox" id="notice_d" name="notice_d"value="noticedelete">
                                        <label for="notice_d"> Notice Delete</label>

                                        <br><label>Email / SMS Alert :</label><br>
                                        <input type="checkbox" id="emailandsms_s" name="emailandsms_s" value="emailandsms_s">
                                        <label for="emailandsms_s"> Email / SMS Alert</label>

                                        <br><label>Report :</label><br>
                                        <input type="checkbox" id="rent_r" name="rent_r" value="rentreport">
                                        <label for="rent_r"> Rental Report</label>

                                        <input type="checkbox" id="tenant_r" name="tenant_r" value="rented_report">
                                        <label for="tenant_r"> Tenant Report</label>

                                        <input type="checkbox" id="visitor_r" name="visitor_r" value="visitor_report">
                                        <label for="visitor_r"> Visitor Report</label>

                                        <input type="checkbox" id="complain_r" name="complain_r" value="complain_report">
                                        <label for="complain_r"> Complain Report</label>

                                        <input type="checkbox" id="unit_r" name="unit_r" value="unit_report">
                                        <label for="unit_r"> Unit Status Report</label>

                                        <input type="checkbox" id="fund_r" name="fund_r" value="fundstatus">
                                        <label for="fund_r"> Fund Status</label>

                                        <input type="checkbox" id="bill_r" name="bill_r" value="billreport">
                                        <label for="bill_r"> Bill Report</label>

                                        <input type="checkbox" id="salary_r" name="salary_r" value="salaryreport">
                                        <label for="salary_r"> Salary Report</label>

                                        <br><label>Setting :</label><br>

                                        <br><label>User :</label><br>
                                        <input type="checkbox" id="user_addlist" name="user_addlist" value="adduser">
                                        <label for="user_addlist"> User Add and List</label>

                                        <input type="checkbox" id="user_e" name="user_e" value="userupdate">
                                        <label for="user_e"> User Edit</label>

                                        <input type="checkbox" id="user_d" name="user_d" value="userdelete">
                                        <label for="user_d"> User Delete</label>

                                        <br><label>Bill Type Setup :</label><br>
                                        <input type="checkbox" id="billtype_addlist" name="billtype_addlist" value="billsetup_add">
                                        <label for="billtype_addlist"> Bill Type Add and List</label>

                                        <input type="checkbox" id="billtype_e" name="billtype_e" value="billsetup_edit">
                                        <label for="billtype_e"> Bill Type Edit</label>

                                        <input type="checkbox" id="billtype_d" name="billtype_d" value="billsetup_delete">
                                        <label for="billtype_d"> Bill Type Delete</label>

                                        <br><label>Utility Bill Setup :</label><br>
                                        <input type="checkbox" id="utilitybill_addlist" name="utilitybill_addlist" value="utility_setup">
                                        <label for="utilitybill_addlist">Utility Bill Add and List</label>

                                        <br><label>Management Member Type :</label><br>
                                        <input type="checkbox" id="membersetup_add" name="membersetup_add" value="membersetup_add">
                                        <label for="membersetup_add"> Member Setup add And List</label>

                                        <input type="checkbox" id="membersetup_edit" name="membersetup_edit" value="membersetup_edit">
                                        <label for="membersetup_edit"> Member Setup Edit</label>

                                        <input type="checkbox" id="membersetup_delete" name="membersetup_delete" value="membersetup_delete">
                                        <label for="membersetup_delete"> Member Setup Delete</label>

                                        <br><label>Year Setup :</label><br>
                                        <input type="checkbox" id="yearsetup" name="yearsetup" value="yearsetup">
                                        <label for="yearsetup"> Year Setup Add and List</label>

                                        <input type="checkbox" id="yearupdate" name="yearupdate" value="yearupdate">
                                        <label for="yearupdate"> Year Setup Edit</label>

                                        <input type="checkbox" id="yeardelete" name="yeardelete" value="membersetup_delete">
                                        <label for="yeardelete"> Year Setup Delete</label>

                                        <br><label>Month Setup :</label><br>
                                        <input type="checkbox" id="monthsetup_add" name="monthsetup_add" value="monthsetup_add">
                                        <label for="monthsetup_add">Month Setup Add and List</label>

                                        <input type="checkbox" id="monthsetup_edit" name="monthsetup_edit" value="monthsetup_edit">
                                        <label for="monthsetup_edit"> Month Setup Edit</label>

                                        <input type="checkbox" id="monthsetup_delete" name="monthsetup_delete" value="monthsetup_delete">
                                        <label for="monthsetup_delete"> Month Setup Delete</label>

                                        <br><label>Currency Setup :</label><br>
                                        <input type="checkbox" id="currencysetup" name="currencysetup" value="currencysetup">
                                        <label for="currencysetup"> Currency Setup Add and List</label>

                                        <input type="checkbox" id="currencyupdate" name="currencyupdate" value="currencyupdate">
                                        <label for="currencyupdate"> Currency Setup Edit</label>

                                        <input type="checkbox" id="currencydelete" name="currencydelete" value="currencydelete">
                                        <label for="currencydelete"> Currency Setup Delete</label>

                                        <br><label>System Setup :</label><br>

                                        <input type="checkbox" id="systemsetup" name="systemsetup" value="systemsetup">
                                        <label for="systemsetup"> System Setup Add and List</label>

                                        <br><label>Role Setup :</label><br>
                                        <input type="checkbox" id="roleadd" name="roleadd" value="roleadd">
                                        <label for="roleadd"> Role Setup add</label>

                                     
                                        <input type="checkbox" id="rolelist" name="rolelist" value="rolelist">
                                        <label for="rolelist"> Role List</label>

                                        <input type="checkbox" id="roleupdate" name="roleupdate" value="roleupdate">
                                        <label for="roleupdate"> Role Setup Edit</label>

                                        <input type="checkbox" id="roledelete" name="roledelete" value="roledelete">
                                        <label for="roledelete"> Role Setup Delete</label>

                                        <input type="checkbox" id="view_access" name="view_access" value="view_access">
                                        <label for="view_access"> Role View</label>

                                        <input type="checkbox" id="notification_s" name="notification_s" value="notification_s">
                                        <label for="notification_s">Notification Setup</label>



                                    </div>
                                   
                                </div>
                                <div class="d-flex mt-4">
                                    <input type="reset" class="btn btn-warning btn-rounded" value="Reset" name="">
                                    <button class="btn btn-primary ms-auto btn-rounded">Created</button>
                                </div>
                            </form>
                             
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div> 
                <!-- end col -->
            </div>
            <!-- end row -->
            
            
            
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
  <!--  Modal content for the above example -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Admin Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img class="rounded-circle avatar-xl" alt="200x200" src="assets/images/users/avatar-4.jpg" data-holder-rendered="true">
                        <h3>John Peterson</h3>
                    </div>
                    <hr>
                    <h4>Details Infromation</h4>
                    <div class="row">
                        <div class="col-md-12"> 
                            Name : Tony<br>
                            Email : tony@yahoo.com<br>
                            Contact : +8801679110711<br>
                            Branch : Golden Tower<br>
                            Password : 123456<br>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


<?php echo $this->endSection('content') ?>