<?= $this->extend('admin/master') ?>
<?= $this->section('content') ?>
<div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Roles Update  </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Golden Tower</a></li>
                                <li class="breadcrumb-item active">Roles Update   </li>
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
                           
                            
                            <form action="<?= base_url('admin/roleupdate/'.$role['id'])?>" method="POST"enctype="multipart/form-data" class="needs-validation" novalidate>
                                <div class="row">
                                    
                                    <div class="col-md-12 mt-4">
                                        <label>* Role name :</label>
                                        <input type="text" class="form-control" name="role_name" value="<?=$role['role_name'];?>" required>
                                        <p style="color:red;" class="text-danger"><?php if(isset($validation)){ if($validation->hasError('role_name')) {
                                          echo $validation->getError('role_name'); }} ?></p>
                                                        <div class="invalid-feedback">
                                                        Sorry role name is required.
                                                        </div>
                                    </div>
                                   
                                    <div class="col-md-12 mt-4">
                                        <label>User Access :</label><br>
                                        <?php 
                                        $user_access= json_decode($role['user_access']);
                                        //print_r($user_access); echo "hello";
                                        ?>
                                       
                                        <label>Floor :</label><br>
                                        <input type="checkbox" id="floor_l" name="floor_l" value="floor_list"
                                        <?php 
                                       if(!empty($user_access->floor_l)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="floor_l">Floor List</label>

                                        <input type="checkbox" id="floor_a" name="floor_a" value="floor_add"
                                        <?php 
                                       if(!empty($user_access->floor_a)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="floor_a">Floor Add</label>

                                        <input type="checkbox" id="floor_e" name="floor_e" value="floor_edit"
                                        <?php 
                                       if(!empty($user_access->floor_e)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="floor_e">Floor Edit </label>

                                        <input type="checkbox" id="floor_d" name="floor_d" value="floor_delete"
                                        <?php 
                                       if(!empty($user_access->floor_d)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="floor_d">Floor Delete</label>

                                        <br><label>Unit :</label><br>
                                        <input type="checkbox" id="unit_l" name="unit_l" value="unit_list"
                                        <?php 
                                       if(!empty($user_access->unit_l)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="unit_l"> Unit List</label>

                                        <input type="checkbox" id="unit_a" name="unit_a" value="unit_add"
                                        <?php 
                                       if(!empty($user_access->unit_a)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="unit_a"> Unit Add</label>

                                        <input type="checkbox" id="unit_e" name="unit_e" value="unit_edit"
                                        <?php 
                                       if(!empty($user_access->unit_e)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="unit_e">Unit Edit</label>

                                        <input type="checkbox" id="unit_d" name="unit_d" value="unit_delete"
                                        <?php 
                                       if(!empty($user_access->unit_d)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="unit_d">Unit Delete</label>


                                        <br><label>Owner :</label><br>
                                        <input type="checkbox" id="owner_l" name="owner_l" value="ownerlist"
                                        <?php 
                                       if(!empty($user_access->owner_l)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="owner_l">Owner List</label>

                                        <input type="checkbox" id="owner_a" name="owner_a" value="owneradd"
                                        <?php 
                                       if(!empty($user_access->owner_a)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="owner_a">Owner Add</label>

                                        <input type="checkbox" id="owner_e" name="owner_e" value="ownerupdate"
                                        <?php 
                                       if(!empty($user_access->owner_e)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="owner_e">Owner Edit</label>

                                        <input type="checkbox" id="owner_d" name="owner_d" value="ownerdelete"
                                        <?php 
                                       if(!empty($user_access->owner_d)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="owner_d">Owner Delete</label>

                                        <input type="checkbox" id="indivusualowner" name="indivusualowner" value="indivusualowner"
                                        <?php 
                                        if(!empty($user_access->indivusualowner)){
                                           echo "Checked";
                                       } ?>
                                        >
                                        <label for="indivusualowner">Owner View</label>


                                        <br><label>Tenant :</label><br>
                                        <input type="checkbox" id="tenant_l" name="tenant_l" value="tenant_list"
                                        <?php 
                                       if(!empty($user_access->tenant_l)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="tenant_l"> Tenant List</label>

                                        <input type="checkbox" id="tenant_a" name="tenant_a" value="tenant_add"
                                        <?php 
                                       if(!empty($user_access->tenant_a)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="tenant_a"> Tenant Add</label>

                                        <input type="checkbox" id="tenant_e" name="tenant_e" value="tenant_edit"
                                        <?php 
                                       if(!empty($user_access->tenant_e)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="tenant_e"> Tenant Edit</label>

                                        <input type="checkbox" id="tenant_d" name="tenant_d" value="tenant_delete"
                                        <?php 
                                       if(!empty($user_access->tenant_d)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="tenant_d"> Tenant Delete</label>

                                        <input type="checkbox" id="tenant_view" name="tenant_view" value="tenant_view"
                                        <?php 
                                        if(!empty($user_access->tenant_view)){
                                           echo "Checked";
                                       } ?>
                                        >
                                        <label for="tenant_view">Tenant View</label>

                                        <br><label>Employee :</label><br>
                                        <input type="checkbox" id="employee_l" name="employee_l" value="employeelist"
                                        <?php 
                                       if(!empty($user_access->employee_l)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="employee_l">Employee List</label>

                                        <input type="checkbox" id="employee_a" name="employee_a" value="employeeadd"
                                        <?php 
                                       if(!empty($user_access->employee_a)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="employee_a"> Employee Add</label>

                                        <input type="checkbox" id="employee_e" name="employee_e" value="employeeupdate"
                                        <?php 
                                       if(!empty($user_access->employee_e)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="employee_e"> Employee E/label>

                                        <input type="checkbox" id="employee_d" name="employee_d" value="employeedelete"
                                        <?php 
                                       if(!empty($user_access->employee_d)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="employee_d"> Employee Delete</label>

                                        <input type="checkbox" id="indivisualemployee" name="indivisualemployee" value="indivisualemployee"
                                        <?php 
                                        if(!empty($user_access->indivisualemployee)){
                                           echo "Checked";
                                       } ?>
                                        >
                                        <label for="indivisualemployee">Employee View</label>

                                        <br><label>Employee Salary :</label><br>
                                        <input type="checkbox" id="emp_salary_addandlist" name="emp_salary_addandlist" value="employeesalary"
                                        <?php 
                                       if(!empty($user_access->emp_salary_addandlist)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="emp_salary_addandlist"> Salary List</label>

                                        <input type="checkbox" id="emp_salaery_e" name="emp_salaery_e" value="employeesalaryupdate"
                                        <?php 
                                       if(!empty($user_access->emp_salaery_e)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="emp_salaery_e"> Salary Edit</label>
                                        
                                        <input type="checkbox" id="emp_salaery_d" name="emp_salaery_d" value="employeesalarydelete"
                                        <?php 
                                       if(!empty($user_access->emp_salaery_d)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="emp_salaery_d">Salary Delete</label>

                                        <input type="checkbox" id="indivisualemployeesalary" name="indivisualemployeesalary" value="indivisualemployeesalary"
                                        <?php 
                                        if(!empty($user_access->indivisualemployeesalary)){
                                           echo "Checked";
                                       } ?>
                                        >
                                        <label for="indivisualemployeesalary">Employee Salary View</label>

                                        <br><label>Rent Colection :</label><br>
                                        <input type="checkbox" id="rent_l" name="rent_l" value="rentlist"
                                        <?php 
                                       if(!empty($user_access->rent_l)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="rent_l"> Rent List</label>

                                        <input type="checkbox" id="rent_a" name="rent_a" value="addrent"
                                        <?php 
                                       if(!empty($user_access->rent_a)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="rent_a"> Rent Add</label>

                                        <input type="checkbox" id="rent_e" name="rent_e" value="rentupdate"
                                        <?php 
                                       if(!empty($user_access->rent_e)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="rent_e"> Rent Edit </label>

                                        <input type="checkbox" id="rent_d" name="rent_d" value="rentdelete"
                                        <?php 
                                       if(!empty($user_access->rent_d)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="rent_d"> Rent Delete</label>

                                        <input type="checkbox" id="indivusualrent" name="indivusualrent" value="indivusualrent"
                                        <?php 
                                        if(!empty($user_access->indivusualrent)){
                                           echo "Checked";
                                       } ?>
                                        >
                                        <label for="indivusualrent">Rent View</label>
                                        

                                        <br><label>Owner Utility :</label><br>
                                        <input type="checkbox" id="utility_l" name="utility_l" value="ownerutilitylist"
                                        <?php 
                                       if(!empty($user_access->utility_l)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="utility_l"> Utility List</label>

                                        <input type="checkbox" id="utility_a" name="utility_a" value="ownerutilityadd"
                                        <?php 
                                       if(!empty($user_access->utility_a)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="utility_a"> Utility Add</label>

                                        <input type="checkbox" id="utility_e" name="utility_e" value="ownerutilityupdate"
                                        <?php 
                                       if(!empty($user_access->utility_e)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="utility_e"> Utility Edit</label>

                                        <input type="checkbox" id="utility_d" name="utility_d" value="ownerutilitydelete"
                                        <?php 
                                       if(!empty($user_access->utility_d)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="utility_d"> Utility Delete</label>

                                        <input type="checkbox" id="indivusualutility" name="indivusualutility" value="indivusualutility"
                                        <?php 
                                        if(!empty($user_access->indivusualutility)){
                                           echo "Checked";
                                       } ?>
                                        >
                                        <label for="indivusualutility">Owner Utility View</label>

                                        <br><label>Maintenance Cost :</label><br>
                                        <input type="checkbox" id="cost_l" name="cost_l" value="maintenance_list"
                                        <?php 
                                       if(!empty($user_access->cost_l)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="cost_l"> Cost List</label>

                                        <input type="checkbox" id="cost_a" name="cost_a" value="maintenance_add"
                                        <?php 
                                       if(!empty($user_access->cost_a)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="cost_a"> Cost Add</label>

                                        <input type="checkbox" id="cost_e" name="cost_e" value="maintenance_edit"
                                        <?php 
                                       if(!empty($user_access->cost_e)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="cost_e"> Cost Edit</label>

                                        <input type="checkbox" id="cost_d" name="cost_d" value="maintenance_delete"
                                        <?php 
                                       if(!empty($user_access->cost_d)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="cost_d"> Cost Delete</label>

                                        <input type="checkbox" id="maintenance_view" name="maintenance_view" value="maintenance_view"
                                        <?php 
                                        if(!empty($user_access->maintenance_view)){
                                           echo "Checked";
                                       } ?>
                                        >
                                        <label for="maintenance_view">Maintenance Cost View</label>


                                        <br><label>Management Committee :</label><br>
                                        <input type="checkbox" id="committee_l" name="committee_l" value="committee_list"
                                        <?php 
                                       if(!empty($user_access->committee_l)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="committee_l"> Committee List</label>

                                        <input type="checkbox" id="committee_a" name="committee_a" value="committee_add"
                                        <?php 
                                       if(!empty($user_access->committee_a)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="committee_a"> Committee Add</label>

                                        <input type="checkbox" id="committee_e" name="committee_e" value="committee_edit"
                                        <?php 
                                       if(!empty($user_access->committee_e)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="committee_e"> Committee Edit</label>

                                        <input type="checkbox" id="committee_d" name="committee_d" value="committee_delete"
                                        <?php 
                                       if(!empty($user_access->committee_d)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="committee_d"> Committee Delete</label>

                                        <input type="checkbox" id="committee_view" name="committee_view" value="committee_view"
                                        <?php 
                                        if(!empty($user_access->committee_view)){
                                           echo "Checked";
                                       } ?>
                                        >
                                        <label for="committee_view">Committee View</label>


                                        <br><label>Apartment Fund :</label><br>
                                        <input type="checkbox" id="fund_l" name="fund_l" value="fundlist"
                                        <?php 
                                       if(!empty($user_access->fund_l)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="fund_l"> Fund List</label>

                                        <input type="checkbox" id="fund_a" name="fund_a" value="addfund"
                                        <?php 
                                       if(!empty($user_access->fund_a)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="fund_a"> Fund Add</label>

                                        <input type="checkbox" id="fund_e" name="fund_e" value="fundupdate"
                                        <?php 
                                       if(!empty($user_access->fund_e)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="fund_e"> Fund Edit</label>

                                        <input type="checkbox" id="fund_d" name="fund_d" value="fundupdate"
                                        <?php 
                                       if(!empty($user_access->fund_d)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="fund_d"> Fund Delete</label>

                                        <input type="checkbox" id="indivisualfund" name="indivisualfund" value="indivisualfund"
                                        <?php 
                                       if(!empty($user_access->indivisualfund)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="indivisualfund"> Fund view</label>

                                        <br><label>Bill Deposit :</label><br>
                                        <input type="checkbox" id="bill_l" name="bill_l" value="billdipositlist"
                                        <?php 
                                       if(!empty($user_access->bill_l)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="bill_l"> Bill Bist</label>

                                        <input type="checkbox" id="bill_a" name="bill_a" value="addbill"
                                        <?php 
                                       if(!empty($user_access->bill_a)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="bill_a"> Bill Add</label>

                                        <input type="checkbox" id="bill_e" name="bill_e" value="billupdate"
                                        <?php 
                                       if(!empty($user_access->bill_e)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="bill_e"> bill Edit</label>

                                        <input type="checkbox" id="bill_d" name="bill_d" value="billdelete"
                                        <?php 
                                       if(!empty($user_access->bill_d)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="billdelete"> Bill Delete</label>

                                        <input type="checkbox" id="indivisualbill" name="indivisualbill" value="indivisualbill"
                                        <?php 
                                        if(!empty($user_access->indivisualbill)){
                                           echo "Checked";
                                       } ?>
                                        >
                                        <label for="indivisualbill">Bill View</label>

                                        <br><label>Complain :</label><br>
                                        <input type="checkbox" id="complain_l" name="complain_l" value="complain_list"
                                        <?php 
                                       if(!empty($user_access->complain_l)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="complain_l"> Complain Dist</label>

                                        <input type="checkbox" id="complain_a" name="complain_a" value="complain_add"
                                        <?php 
                                       if(!empty($user_access->complain_a)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="complain_a"> Complain Add</label>

                                        <input type="checkbox" id="complain_e" name="complain_e" value="complain_edit"
                                        <?php 
                                       if(!empty($user_access->complain_e)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="complain_e"> Complain Edit</label>

                                        <input type="checkbox" id="complain_d" name="complain_d" value="complain_delete"
                                        <?php 
                                       if(!empty($user_access->complain_d)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="complain_d"> Complain Delete</label>

                                        <input type="checkbox" id="complain_view" name="complain_view" value="complain_view"
                                        <?php 
                                        if(!empty($user_access->complain_view)){
                                           echo "Checked";
                                       } ?>

                                        >
                                        <label for="complain_view">Complain View</label>



                                        <br><label>Visitor :</label><br>
                                        <input type="checkbox" id="visitor_l" name="visitor_l" value="visitor_list"
                                        <?php 
                                       if(!empty($user_access->visitor_l)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="visitor_l"> Visitor List</label>

                                        <input type="checkbox" id="visitor_a" name="visitor_a" value="visitor_add"
                                        <?php 
                                       if(!empty($user_access->visitor_a)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="visitor_a"> Visitor Add</label>

                                        <input type="checkbox" id="visitor_e" name="visitor_e" value="visitor_edit"
                                        <?php 
                                       if(!empty($user_access->visitor_e)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="visitor_e"> Visitor Edit</label>

                                        <input type="checkbox" id="visitor_d" name="visitor_d" value="visitor_delete"
                                        <?php 
                                       if(!empty($user_access->visitor_d)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="visitor_d"> Visitor Delete</label>

                                        <br><label>Meeting :</label><br>
                                        <input type="checkbox" id="meeting_l" name="meeting_l" value="meeting_list"
                                        <?php 
                                       if(!empty($user_access->meeting_l)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="meeting_l"> Meeting List</label>

                                        <input type="checkbox" id="meeting_a" name="meeting_a" value="meeting_add"
                                        <?php 
                                       if(!empty($user_access->meeting_a)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="meeting_a"> Meeting Add</label>

                                        <input type="checkbox" id="meeting_e" name="meeting_e" value="meeting_edit"
                                        <?php 
                                       if(!empty($user_access->meeting_e)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="meeting_e"> Meeting Edit</label>

                                        <input type="checkbox" id="meeting_d" name="meeting_d" value="meeting_delete"
                                        <?php 
                                       if(!empty($user_access->meeting_d)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="meeting_d"> Meeting Delete</label>

                                        <input type="checkbox" id="meeting_view" name="meeting_view" value="meeting_view"
                                        <?php
                                        if(!empty($user_access->meeting_view)){
                                           echo "Checked";
                                       }?>
                                        >
                                        <label for="meeting_view">Meeting View</label>

                                        <br><label>Notice Board :</label><br>
                                        <input type="checkbox" id="notice_addlist" name="notice_addlist" value="addnotice"
                                        <?php 
                                       if(!empty($user_access->notice_addlist)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="notice_addlist"> Notice Add and List</label>

                                        <input type="checkbox" id="notice_e" name="notice_e" value="noticeupdate"
                                        <?php 
                                       if(!empty($user_access->notice_e)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="notice_e"> Notice Edit</label>

                                        <input type="checkbox" id="notice_d" name="notice_d"value="noticedelete"
                                        <?php 
                                       if(!empty($user_access->notice_d)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="notice_d"> Notice Delete</label>

                                        <br><label>Email / SMS Alert :</label><br>
                                        <input type="checkbox" id="emailandsms_s" name="emailandsms_s" value="emailandsms_s"
                                        <?php 
                                       if(!empty($user_access->emailandsms_s)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="emailandsms_s"> Email / SMS Alert</label>

                                        <br><label>Report :</label><br>
                                        <input type="checkbox" id="rent_r" name="rent_r" value="rentreport"
                                        <?php 
                                       if(!empty($user_access->rent_r)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="rent_r"> Rental Report</label>

                                        <input type="checkbox" id="tenant_r" name="tenant_r" value="rented_report"
                                        <?php 
                                       if(!empty($user_access->tenant_r)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="tenant_r"> Tenant Report</label>

                                        <input type="checkbox" id="visitor_r" name="visitor_r" value="visitor_report"
                                        <?php 
                                       if(!empty($user_access->visitor_r)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="visitor_r"> Visitor Report</label>

                                        <input type="checkbox" id="complain_r" name="complain_r" value="complain_report"
                                        <?php 
                                       if(!empty($user_access->complain_r)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="complain_r"> Complain Report</label>

                                        <input type="checkbox" id="unit_r" name="unit_r" value="unit_report"
                                        <?php 
                                       if(!empty($user_access->unit_r)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="unit_r"> Unit Status Report</label>

                                        <input type="checkbox" id="fund_r" name="fund_r" value="fundstatus"
                                        <?php 
                                       if(!empty($user_access->fund_r)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="fund_r"> Fund Status</label>

                                        <input type="checkbox" id="bill_r" name="bill_r" value="billreport"
                                        <?php 
                                       if(!empty($user_access->bill_r)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="bill_r"> Bill Report</label>

                                        <input type="checkbox" id="salary_r" name="salary_r" value="salaryreport"
                                        <?php 
                                       if(!empty($user_access->salary_r)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="salary_r"> Salary Report</label>

                                        <br><label>Setting :</label><br>

                                        <br><label>User :</label><br>
                                        <input type="checkbox" id="user_addlist" name="user_addlist" value="adduser"
                                        <?php 
                                       if(!empty($user_access->user_addlist)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="user_addlist"> User Sdd and List</label>

                                        <input type="checkbox" id="user_e" name="user_e" value="userupdate"
                                        <?php 
                                       if(!empty($user_access->user_e)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="user_e"> User Edit</label>

                                        <input type="checkbox" id="user_d" name="user_d" value="userdelete"
                                        <?php 
                                       if(!empty($user_access->user_d)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="user_d"> User Delete</label>

                                        <br><label>Bill Type Setup :</label><br>
                                        <input type="checkbox" id="billtype_addlist" name="billtype_addlist" value="billsetup_add"
                                        <?php 
                                       if(!empty($user_access->billtype_addlist)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="billtype_addlist"> Bill Type Add and List</label>

                                        <input type="checkbox" id="billtype_e" name="billtype_e" value="billsetup_edit"
                                        <?php 
                                       if(!empty($user_access->billtype_e)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="billtype_e"> Bill Type Edit</label>

                                        <input type="checkbox" id="billtype_d" name="billtype_d" value="billsetup_delete"
                                        <?php 
                                       if(!empty($user_access->billtype_d)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="billtype_d"> Bill Type Delete</label>

                                        <br><label>Utility bill setup :</label><br>
                                        <input type="checkbox" id="utilitybill_addlist" name="utilitybill_addlist" value="utility_setup"
                                        <?php 
                                       if(!empty($user_access->utilitybill_addlist)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="utilitybill_addlist">Utility Bill Add and List</label>

                                        <br><label>Management Member Type :</label><br>
                                        <input type="checkbox" id="membersetup_add" name="membersetup_add" value="membersetup_add"
                                        <?php 
                                       if(!empty($user_access->membersetup_add)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="membersetup_add"> Member Setup Add and List</label>

                                        <input type="checkbox" id="membersetup_edit" name="membersetup_edit" value="membersetup_edit"
                                        <?php 
                                       if(!empty($user_access->membersetup_edit)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="membersetup_edit"> Member Setup Edit</label>

                                        <input type="checkbox" id="membersetup_delete" name="membersetup_delete" value="membersetup_delete"
                                        <?php 
                                       if(!empty($user_access->membersetup_delete)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="membersetup_delete"> Member Setup Delete</label>

                                        <br><label>Year setup :</label><br>
                                        <input type="checkbox" id="yearsetup" name="yearsetup" value="yearsetup"
                                        <?php 
                                       if(!empty($user_access->yearsetup)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="yearsetup"> Year Setup Add and List</label>

                                        <input type="checkbox" id="yearupdate" name="yearupdate" value="yearupdate"
                                        <?php 
                                       if(!empty($user_access->yearupdate)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="yearupdate"> Year Setup Edit</label>

                                        <input type="checkbox" id="yeardelete" name="yeardelete" value="membersetup_delete"
                                        <?php 
                                       if(!empty($user_access->yeardelete)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="yeardelete"> Year Setup Delete</label>

                                        <br><label>Month Setup :</label><br>
                                        <input type="checkbox" id="monthsetup_add" name="monthsetup_add" value="monthsetup_add"
                                        <?php 
                                       if(!empty($user_access->monthsetup_add)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="monthsetup_add"> Month Setup Sdd and List</label>

                                        <input type="checkbox" id="monthsetup_edit" name="monthsetup_edit" value="monthsetup_edit"
                                        <?php 
                                       if(!empty($user_access->monthsetup_edit)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="monthsetup_edit"> Month Setup Edit</label>

                                        <input type="checkbox" id="monthsetup_delete" name="monthsetup_delete" value="monthsetup_delete"
                                        <?php 
                                       if(!empty($user_access->monthsetup_delete)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="monthsetup_delete"> Month Setup Delete</label>

                                        <br><label>Currency Setup :</label><br>
                                        <input type="checkbox" id="currencysetup" name="currencysetup" value="currencysetup"
                                        <?php 
                                       if(!empty($user_access->currencysetup)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="currencysetup"> Currency Setup Add and List</label>

                                        <input type="checkbox" id="currencyupdate" name="currencyupdate" value="currencyupdate"
                                        <?php 
                                       if(!empty($user_access->currencyupdate)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="currencyupdate"> Currency Setup Edit</label>

                                        <input type="checkbox" id="currencydelete" name="currencydelete" value="currencydelete"
                                        <?php 
                                       if(!empty($user_access->currencydelete)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="currencydelete"> Currency Setup Delete</label>

                                        <br><label>System Setup :</label><br>

                                        <input type="checkbox" id="systemsetup" name="systemsetup" value="systemsetup"
                                        <?php 
                                       if(!empty($user_access->systemsetup)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="systemsetup"> System Setup Add and List</label>

                                        <br><label>Role setup :</label><br>
                                        <input type="checkbox" id="roleadd" name="roleadd" value="roleadd"
                                        <?php 
                                       if(!empty($user_access->roleadd)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="roleadd"> Role Setup Add and List</label>
                               
                          
                                        <input type="checkbox" id="rolelist" name="rolelist" value="rolelist"
                                        <?php 
                                       if(!empty($user_access->rolelist)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="rolelist"> Role List</label>
                                      

                                        <input type="checkbox" id="roleupdate" name="roleupdate" value="roleupdate"
                                        <?php 
                                       if(!empty($user_access->roleupdate)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="roleupdate"> Role Setup Edit</label>

                                        <input type="checkbox" id="roledelete" name="roledelete" value="roledelete"
                                        <?php 
                                       if(!empty($user_access->roledelete)){
                                           echo "Checked";
                                       }
                                       ?>
                                        >
                                        <label for="roledelete"> Role Setup Delete</label>

                                        <input type="checkbox" id="view_access" name="view_access" value="view_access"
                                        <?php 
                                       if(!empty($user_access->view_access)){
                                           echo "Checked";
                                       }
                                       ?>>
                                        <label for="view_access"> Role View</label>






                                         <!-- new add -->

                                         <br><label>All view with modal :</label><br>
                                        
                                      

                                        

                                        

                                       

                                        

                                        

                                       

                                        

                                       

                                        

                                        

                                    </div>
                                   
                                </div>
                                <div class="d-flex mt-4">
                                    <input type="reset" class="btn btn-warning btn-rounded" value="Reset" name="">
                                    <button class="btn btn-primary ms-auto btn-rounded">Updated</button>
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
 


<?php echo $this->endSection('content') ?>