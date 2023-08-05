<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('Modules\LoginAuth\Controllers');
$routes->setDefaultController('Admincontroller');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->add('/', '\Modules\LoginAuth\Controllers\Admincontroller::index', ['as' => '/']);
// $routes->add('forgot_pass', 'Admincontroller::forgotPass', ['as' => 'forgot_pass']);
// $routes->add('reset_pass/(:any)', 'Admincontroller::resetPass/$1', ['as' => 'reset_pass']);
// $routes->match(['get', 'post'],'register', 'Admincontroller::register', ['as' => 'register']);

// $routes->group('admin', ['filter' => 'auth'], function ($routes) {
//     $routes->get('account_mode', 'Popertycontroller::index', ['as' => 'account_mode']);
//     $routes->match(['get', 'post'],'poperty_list/(:any)', 'Popertycontroller::popertyList/$1', ['as' => 'poperty_list']);
//     $routes->add('poperty_add/(:any)', 'Popertycontroller::popertyAdd/$1', ['as' => 'poperty_add']);
 
//     //multiple image upload
//     $routes->post('poperty_images', 'Popertycontroller::multipleImageUpload', ['as' => 'poperty_images']);
    
//     $routes->get('home/(:any)', 'Dashboardcontroller::/$1', ['as' => 'home']);
    //$routes->get('logout', 'Admincontroller::adminLogout', ['as' => 'adminLogout']);
    
// });

    // $routes->group('admin', ['filter' => 'Useraccess'], function ($routes) {
    
    //$routes->get('/', 'Dashboard::index', ['filter' => ['auth', 'second_filter']]); 
    //floor section
    // $routes->get('floor_list/(:any)', 'Floorcontroller::index/$1', ['as' => 'floor_list']);
    // $routes->get('floor_list', 'Floorcontroller::index', ['as' => 'floor_list_new']);
    // $routes->add('floor_add', 'Floorcontroller::floorAdd', ['as' => 'floor_add']);
    // $routes->add('floor_edit/(:any)', 'Floorcontroller::floorEdit/$1', ['as' => 'floor_edit']);
    // $routes->get('floor_delete/(:any)', 'Floorcontroller::floorDelete/$1', ['as' => 'floor_delete']);

    //Unit section
    // $routes->get('unit_list', 'Unitcontroller::index', ['as' => 'unit_list']);
    // $routes->add('unit_add', 'Unitcontroller::unitAdd', ['as' => 'unit_add']);
    // $routes->add('unit_edit/(:any)', 'Unitcontroller::unitEdit/$1', ['as' => 'unit_edit']);
    // $routes->get('unit_delete/(:any)', 'Unitcontroller::unitDelete/$1', ['as' => 'unit_delete']);
    
    //Tenant section
    // $routes->get('tenant_list/(:any)', 'Tenantcontroller::index/$1', ['as' => 'tenant_list']);
    // $routes->get('tenant_list', 'Tenantcontroller::index', ['as' => 'tenant_list_new']);
    // $routes->add('tenant_add', 'Tenantcontroller::tenantAdd', ['as' => 'tenant_add']);
    // $routes->post('tenant_view', 'Tenantcontroller::tenantView', ['as' => 'tenant_view']);
    // $routes->add('tenant_edit/(:any)', 'Tenantcontroller::tenantEdit/$1', ['as' => 'tenant_edit']);
    // $routes->get('tenant_delete/(:any)', 'Tenantcontroller::tenantDelete/$1', ['as' => 'tenant_delete']);
    // $routes->get('tenant_depand', 'Tenantcontroller::tenantDepand/$1', ['as' => 'tenant_depand']);

    //Maintenance section
    // $routes->get('maintenance_list/(:any)', 'Maintenancecontroller::index/$1', ['as' => 'maintenance_list']);
    // $routes->get('maintenance_list', 'Maintenancecontroller::index', ['as' => 'maintenance_list_new']);
    // $routes->add('maintenance_add', 'Maintenancecontroller::maintenanceAdd', ['as' => 'maintenance_add']);
    // $routes->post('maintenance_view', 'Maintenancecontroller::maintenanceView', ['as' => 'maintenance_view']);
    // $routes->add('maintenance_edit/(:any)', 'Maintenancecontroller::maintenanceEdit/$1', ['as' => 'maintenance_edit']);
    // $routes->get('maintenance_delete/(:any)', 'Maintenancecontroller::maintenanceDelete/$1', ['as' => 'maintenance_delete']);
    
    //Management committee section
    // $routes->get('committee_list', 'Committeecontroller::index', ['as' => 'committee_list']);
    // $routes->add('committee_add', 'Committeecontroller::committeeAdd', ['as' => 'committee_add']);
    // $routes->post('committee_view', 'Committeecontroller::committeeView', ['as' => 'committee_view']);
    // $routes->add('committee_edit/(:any)', 'Committeecontroller::committeeEdit/$1', ['as' => 'committee_edit']);
    // $routes->get('committee_delete/(:any)', 'Committeecontroller::committeeDelete/$1', ['as' => 'committee_delete']);
    

    //Visitor section
    // $routes->get('visitor_list', 'Visitorcontroller::index', ['as' => 'visitor_list']);
    // $routes->add('visitor_add', 'Visitorcontroller::visitorAdd', ['as' => 'visitor_add']);
    // $routes->add('visitor_edit/(:any)', 'Visitorcontroller::visitorEdit/$1', ['as' => 'visitor_edit']);
    // $routes->get('visitor_delete/(:any)', 'Visitorcontroller::visitorDelete/$1', ['as' => 'visitor_delete']);
    // $routes->match(['get', 'post'],'getUnits', 'Visitorcontroller::tenantDepand', ['as' => 'getunits']);

    //Complain section
    // $routes->get('complain_list', 'Complaincontroller::index', ['as' => 'complain_list']);
    // $routes->add('complain_add', 'Complaincontroller::complainAdd', ['as' => 'complain_add']);
    // $routes->get('complain_view', 'Complaincontroller::complainView', ['as' => 'complain_view']);
    // $routes->add('complain_edit/(:any)', 'Complaincontroller::complainEdit/$1', ['as' => 'complain_edit']);
    // $routes->get('complain_delete/(:any)', 'Complaincontroller::complainDelete/$1', ['as' => 'complain_delete']);

    // $routes->post('complain_solution', 'Complaincontroller::complainSolution', ['as' => 'complain_solution']);
    // $routes->post('assign_employee', 'Complaincontroller::assignEmployee', ['as' => 'assign_employee']);
    // $routes->get('get_employee', 'Complaincontroller::getEmployee', ['as' => 'get_employee']);

    //Meeting section
    // $routes->get('meeting_list', 'Meetingcontroller::index', ['as' => 'meeting_list']);
    // $routes->add('meeting_add', 'Meetingcontroller::meetingAdd', ['as' => 'meeting_add']);
    // $routes->get('meeting_view', 'Meetingcontroller::meetingView', ['as' => 'meeting_view']);
    // $routes->add('meeting_edit/(:any)', 'Meetingcontroller::meetingEdit/$1', ['as' => 'meeting_edit']);
    // $routes->get('meeting_delete/(:any)', 'Meetingcontroller::meetingDelete/$1', ['as' => 'meeting_delete']);


 /*=============================================================
                        Report section
    ===============================================================*/

    // //tenant
    // $routes->add('rented_report', 'Reportcontroller::rentedReport', ['as' => 'rented_report']);
    // $routes->get('rentedprint_report', 'Reportcontroller::rentedPrintReport', ['as' => 'rentedprint_report']);
    // $routes->get('rented_pdf', 'Reportcontroller::rentedPdf', ['as' => 'rented_pdf']);

    // //visitor
    // $routes->add('visitor_report', 'Reportcontroller::visitorReport', ['as' => 'visitor_report']);
    // $routes->get('visitorprint_report', 'Reportcontroller::visitorPrintReport', ['as' => 'visitorprint_report']);
    // $routes->get('visitor_pdf', 'Reportcontroller::visitorPdf', ['as' => 'visitor_pdf']);

    // //complain
    // $routes->add('complain_report', 'Reportcontroller::complainReport', ['as' => 'complain_report']);
    // $routes->get('complainprint_report', 'Reportcontroller::complainPrintReport', ['as' => 'complainprint_report']);
    // $routes->get('complain_pdf', 'Reportcontroller::complainPdf', ['as' => 'complain_pdf']);

    // //unit
    // $routes->add('unit_report', 'Reportcontroller::unitReport', ['as' => 'unit_report']);
    // $routes->get('unitprint_report', 'Reportcontroller::unitPrintReport', ['as' => 'unitprint_report']);
    // $routes->get('unit_pdf', 'Reportcontroller::unitPdf', ['as' => 'unit_pdf']);

    // //rental info
    // $routes->match(['get', 'post'],'rentreport', 'Reportcontroller::rent_report', ['as' => 'rent_report']);
    // $routes->match(['get', 'post'],'rentinfo', 'Reportcontroller::rent_info', ['as' => 'rent_info']);
    // $routes->get('rentinfo_pdf', 'Reportcontroller::rentInfoPdf', ['as' => 'rentinfo_pdf']);

    // //fund status
    // $routes->match(['get', 'post'],'fundstatus', 'Reportcontroller::fund_status', ['as' => 'fund_status']);
    // $routes->match(['get', 'post'],'rentinfo', 'Reportcontroller::rent_info', ['as' => 'rent_info']);
    // $routes->get('fundstatus_pdf', 'Reportcontroller::fundStatusPdf', ['as' => 'fundstatus_pdf']);
   
    // //bill report
    // $routes->match(['get', 'post'],'billreport', 'Reportcontroller::bill_report', ['as' => 'bill_report']);
    // $routes->match(['get', 'post'],'billinfo', 'Reportcontroller::bill_info', ['as' => 'bill_info']);
    // $routes->get('billinfo_pdf', 'Reportcontroller::billInfoPdf', ['as' => 'billinfo_pdf']);

    // //salary report
    // $routes->match(['get', 'post'],'salaryreport', 'Reportcontroller::salary_report', ['as' => 'salary_report']);
    // $routes->match(['get', 'post'],'salaryinfo', 'Reportcontroller::salary_info', ['as' => 'salary_info']);
    // $routes->get('salaryinfo_pdf', 'Reportcontroller::salaryInfoPdf', ['as' => 'salaryinfo_pdf']);
   
    // //report print
    // $routes->match(['get', 'post'],'printsalaryreport','Reportcontroller::print_salary_report', ['as' => 'print_salary_report']);
    // $routes->match(['get', 'post'],'printrentreport','Reportcontroller::print_rent_report', ['as' => 'print_rent_report']);
    // $routes->match(['get', 'post'],'printfundstatus','Reportcontroller::print_fund_status', ['as' => 'print_fund_status']);
    // $routes->match(['get', 'post'],'printbillreport','Reportcontroller::print_bill_report', ['as' => 'print_bill_report']);

    /*=============================================================
                        Setting section
    ===============================================================*/

    // //Bill Type Setup
    // $routes->add('billsetup_add', 'Settingcontroller::billSetupAdd', ['as' => 'billsetup_add']);
    // $routes->add('billsetup_edit/(:any)', 'Settingcontroller::billSetupEdit/$1', ['as' => 'billsetup_edit']);
    // $routes->get('billsetup_delete/(:any)', 'Settingcontroller::billSetupDelete/$1', ['as' => 'billsetup_delete']);

    // //Utility Type Setup
    // $routes->add('utility_setup', 'Settingcontroller::utilitySetup', ['as' => 'utility_setup']);

    // //Member Type Setup
    // $routes->add('membersetup_add', 'Settingcontroller::memberSetupAdd', ['as' => 'membersetup_add']);
    // $routes->add('membersetup_edit/(:any)', 'Settingcontroller::memberSetupEdit/$1', ['as' => 'membersetup_edit']);
    // $routes->get('membersetup_delete/(:any)', 'Settingcontroller::memberSetupDelete/$1', ['as' => 'membersetup_delete']);

    // //Month Setup
    // $routes->add('monthsetup_add', 'Settingcontroller::monthSetupAdd', ['as' => 'monthsetup_add']);
    // $routes->add('monthsetup_edit/(:any)', 'Settingcontroller::monthSetupEdit/$1', ['as' => 'monthsetup_edit']);
    // $routes->get('monthsetup_delete/(:any)', 'Settingcontroller::monthSetupDelete/$1', ['as' => 'monthsetup_delete']);

    // //Notification Setup
    // $routes->get('notification_list', 'Settingcontroller::notificationSetup', ['as' => 'notification_list']);
    // $routes->get('notification_edit', 'Settingcontroller::notificationSetupEdit', ['as' => 'notification_edit']);
    // $routes->post('notification_update', 'Settingcontroller::notificationSetupUpdate',['as' => 'notification_update']);

    // //mailsms section
    // $routes->get('mailsms_list', 'Mailsmscontroller::index', ['as' => 'mailsms_list']);
    // $routes->add('mailsms_add', 'Mailsmscontroller::mailsmsAdd', ['as' => 'mailsms_add']);
    // $routes->add('mailsms_edit/(:any)', 'Mailsmscontroller::mailsmsEdit/$1', ['as' => 'mailsms_edit']);
    // $routes->get('mailsms_delete/(:any)', 'Mailsmscontroller::mailsmsDelete/$1', ['as' => 'mailsms_delete']);


   

    /////// shukriti/////
    // Owner
    // $routes->match(['get', 'post'],'owneradd', 'Ownercontroller::owner_add', ['as' => 'owner_add']);
    // $routes->get('ownerlist', 'Ownercontroller::owner_list', ['as' => 'owner_list']);
    // $routes->match(['get', 'post'],'ownerupdate/(:num)', 'Ownercontroller::owner_update/$1', ['as' => 'owner_update']);
    // $routes->match(['get', 'post'],'ownerdelete/(:num)', 'Ownercontroller::owner_delete/$1', ['as' => 'owner_delete']);
    // $routes->match(['get', 'post'],'indivusualowner', 'Ownercontroller::owner_indivisual', ['as' => 'owner_indivisual']);

    // Owner Utility
    // $routes->match(['get', 'post'],'ownerutilityadd', 'Ownercontroller::owner_utility_add', ['as' => 'owner_utility_add']);
    // $routes->match(['get', 'post'],'getunits', 'Ownercontroller::get_units_by_floor', ['as' => 'get_units_by_floor']);  
    // $routes->match(['get', 'post'],'getowner', 'Ownercontroller::get_owner_by_unit', ['as' => 'get_owner_by_unit']);
    // $routes->match(['get', 'post'],'ownerutilitylist', 'Ownercontroller::owner_utility_list', ['as' => 'owner_utility_list']);
    // $routes->match(['get', 'post'],'ownerutilityupdate/(:num)', 'Ownercontroller::owner_utility_update/$1', ['as' => 'owner_utility_update']);
    // $routes->match(['get', 'post'],'ownerutilitydelete/(:num)', 'Ownercontroller::owner_utility_delete/$1', ['as' => 'owner_utility_delete']);
    // $routes->match(['get', 'post'],'indivusualutility', 'Ownercontroller::indivusual_utility', ['as' => 'indivusual_utility']);

    // Employee
    // $routes->match(['get', 'post'],'addemployee', 'Employeecontroller::add_employee', ['as' => 'add_employee']);
    // $routes->match(['get', 'post'],'employeelist', 'Employeecontroller::employee_list', ['as' => 'employee_list']);
    // $routes->match(['get', 'post'],'employeeupdate/(:num)', 'Employeecontroller::employee_update/$1', ['as' => 'employee_update']);
    // $routes->match(['get', 'post'],'employeedelete/(:num)', 'Employeecontroller::employee_delete/$1', ['as' => 'employee_delete']);
    // $routes->match(['get', 'post'],'indivisualemployee', 'Employeecontroller::indivisual_employee', ['as' => 'indivisual_employee']);

    // $routes->match(['get', 'post'],'employeesalary', 'Employeecontroller::employee_salary', ['as' => 'employee_salary']);
    // $routes->match(['get', 'post'],'getindivisualemployee', 'Employeecontroller::get_indivisualemployee', ['as' => 'get_indivisualemployee']);
    // $routes->match(['get', 'post'],'employeesalaryupdate/(:num)', 'Employeecontroller::employee_salary_update/$1', ['as' => 'employee_salary_update']);
    // $routes->match(['get', 'post'],'employeesalarydelete/(:num)', 'Employeecontroller::employee_salary_delete/$1', ['as' => 'employee_salary_delete']);
    // $routes->match(['get', 'post'],'indivisualemployeesalary', 'Employeecontroller::indivisual_employee_salary', ['as' => 'indivisual_employee_salary']);

    // $routes->match(['get', 'post'],'employeeleave', 'Employeecontroller::employee_leave', ['as' => 'employee_leave']);

    // deposit bill
    // $routes->match(['get', 'post'],'addbill', 'Billdipositcontroller::add_bill', ['as' => 'add_bill']);
    // $routes->match(['get', 'post'],'billdipositlist', 'Billdipositcontroller::bill_diposit_list', ['as' => 'bill_diposit_list']);
    // $routes->match(['get', 'post'],'billupdate/(:num)', 'Billdipositcontroller::bill_update/$1', ['as' => 'bill_update']);
    // $routes->match(['get', 'post'],'billdelete/(:num)', 'Billdipositcontroller::bill_delete/$1', ['as' => 'bill_delete']);
    // $routes->match(['get', 'post'],'indivisualbill', 'Billdipositcontroller::indivisual_bill', ['as' => 'indivisual_bill']);

    // apertmant fund
    // $routes->match(['get', 'post'],'addfund', 'Apartmentfundcontroller::add_fund', ['as' => 'add_fund']);
    // $routes->match(['get', 'post'],'fundlist', 'Apartmentfundcontroller::fund_list', ['as' => 'fund_list']);
    // $routes->match(['get', 'post'],'fundupdate/(:num)', 'Apartmentfundcontroller::fund_update/$1', ['as' => 'fund_update']);
    // $routes->match(['get', 'post'],'funddelete/(:num)', 'Apartmentfundcontroller::fund_delete/$1', ['as' => 'fund_delete']);
    // $routes->match(['get', 'post'],'indivisualfund', 'Apartmentfundcontroller::indivisual_fund', ['as' => 'indivisual_fund']);
    // $routes->match(['get', 'post'],'invoice/(:num)', 'Apartmentfundcontroller::invoice/$1', ['as' => 'invoice']);
    // $routes->match(['get', 'post'],'printfundinvoice', 'Apartmentfundcontroller::print_fund_invoice', ['as' => 'print_fund_invoice']);



    // notice bord
    // $routes->match(['get', 'post'],'addnotice', 'Noticecontroller::owner_notice', ['as' => 'owner_notice']);
    // $routes->match(['get', 'post'],'noticeupdate/(:num)', 'Noticecontroller::notice_update/$1', ['as' => 'notice_update']);
    // $routes->match(['get', 'post'],'noticedelete/(:num)', 'Noticecontroller::notice_delete/$1', ['as' => 'notice_delete']);

    // Rent
    // $routes->match(['get', 'post'],'addrent', 'Rentcontroller::add_rent', ['as' => 'add_rent']);
    // $routes->match(['get', 'post'],'gettenent', 'Rentcontroller::get_tenent', ['as' => 'get_tenent']);
    // $routes->match(['get', 'post'],'rentlist/(:num)', 'Rentcontroller::rent_list/$1', ['as' => 'rent_list']);
    // $routes->match(['get', 'post'],'rentlist', 'Rentcontroller::rent_list', ['as' => 'rent_list_new']);
    // $routes->match(['get', 'post'],'rentupdate/(:num)', 'Rentcontroller::rent_update/$1', ['as' => 'rent_update']);
    // $routes->match(['get', 'post'],'rentdelete/(:num)', 'Rentcontroller::rent_delete/$1', ['as' => 'rent_delete']);
    // $routes->match(['get', 'post'],'rentinvoice/(:num)', 'Rentcontroller::rent_invoice/$1', ['as' => 'rent_invoice']);
    // $routes->match(['get', 'post'],'indivusualrent', 'Rentcontroller::indivusual_rent', ['as' => 'indivusual_rent']);
    // $routes->match(['get', 'post'],'printrentinvoice', 'Rentcontroller::print_rent_invoice', ['as' => 'print_rent_invoice']);

    

    // Settings
    // Users
    // $routes->match(['get', 'post'],'adduser', 'Usercontroller::add_user', ['as' => 'add_user']);
    // $routes->match(['get', 'post'],'userupdate/(:num)', 'Usercontroller::user_update/$1', ['as' => 'user_update']);
    // $routes->match(['get', 'post'],'userdelete/(:num)', 'Usercontroller::user_delete/$1', ['as' => 'user_delete']);
    // $routes->match(['get', 'post'],'indivusualuser', 'Usercontroller::indivusual_user', ['as' => 'indivusual_user']);

    
    // $routes->match(['get', 'post'],'yearsetup', 'Settingcontroller::year_setup', ['as' => 'year_setup']);
    // $routes->match(['get', 'post'],'yearupdate/(:num)', 'Settingcontroller::year_update/$1', ['as' => 'year_update']);
    // $routes->match(['get', 'post'],'yeardelete/(:num)', 'Settingcontroller::year_delete/$1', ['as' => 'year_delete']);
    

    // $routes->match(['get', 'post'],'currencysetup', 'Settingcontroller::currency_setup', ['as' => 'currency_setup']);
    // $routes->match(['get', 'post'],'currencyupdate/(:num)', 'Settingcontroller::currency_update/$1', ['as' => 'currency_update']);
    // $routes->match(['get', 'post'],'currencydelete/(:num)', 'Settingcontroller::currency_delete/$1', ['as' => 'currency_delete']);

    // $routes->match(['get', 'post'],'systemsetup','Settingcontroller::system_setup', ['as' => 'system_setup']);
    // $routes->match(['get', 'post'],'currencysetting','Settingcontroller::currency_setting', ['as' => 'currency_setting']);
    // $routes->match(['get', 'post'],'languagesetting','Settingcontroller::language_setting', ['as' => 'language_setting']);
    // $routes->match(['get', 'post'],'emailsetting','Settingcontroller::email_setting', ['as' => 'email_setting']);
    // $routes->match(['get', 'post'],'smssetting','Settingcontroller::sms_setting', ['as' => 'sms_setting']);

    // $routes->match(['get', 'post'],'datesetting','Settingcontroller::date_setting', ['as' => 'date_setting']);

    // $routes->match(['get', 'post'],'roleadd','Settingcontroller::role_add', ['as' => 'role_add']);
    // $routes->match(['get', 'post'],'roleupdate/(:num)','Settingcontroller::role_update/$1', ['as' => 'role_update']);
    // $routes->match(['get', 'post'],'roledelete/(:num)','Settingcontroller::role_delete/$1', ['as' => 'role_delete']);
    // $routes->match(['get', 'post'],'rolelist','Settingcontroller::role_list', ['as' => 'role_list']);
    // $routes->match(['get', 'post'],'view_access','Settingcontroller::view_access', ['as' => 'view_access']);
    
    // Home 
    // $routes->match(['get', 'post'],'visitordetails/(:num)','Dashboardcontroller::visitor_details/$1', ['as' => 'visitor_details']);
    // $routes->match(['get', 'post'],'complaindetails/(:num)','Dashboardcontroller::complain_details/$1', ['as' => 'complain_details']);
// });



// $routes->post('login', 'AdminController::index', ['as' => 'login']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
