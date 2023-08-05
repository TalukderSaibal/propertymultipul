<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Modules\User\Models\User;
use Modules\Setting\Models\Popertymodel;
use App\Models\Ownermodel;
use Modules\Floor\Models\Floormodel;
use App\Models\Unitmodel;
use App\Models\Tenantmodel;
use App\Models\Rentmodel;
use App\Models\Ownerutility;
use App\Models\Maintenancemodel;
use App\Models\Committeemodel;
use Modules\Employee\Models\Employeemodel;
use App\Models\Fundmodel;
use App\Models\Employeesalarymodel;
use Modules\Complain\Models\Complainmodel;
use Modules\Visitor\Models\Visitormodel;


class Dashboardcontroller extends BaseController
{
    public function index($property_id = null)
    {
        $session = session();
        //echo $property_id;die();
        if(is_numeric($property_id)){

            $user_id= $session->get('userId');
            $property_model = new Popertymodel();
            $user_model = new User();

            $property_user= $property_model->where('id',$property_id)->first();
            //$user= $user_model->where('id',$property_user['owner'])->first();
             
            $this_user= $user_model->where('id',$user_id)->first();

            if($property_user['company_id']==$this_user['company_id']){
                $this->session->set('rs_property_id',$property_id);
               
            }
            else{

                if($this_user['type'] == 2){
                    
                    $user= $user_model->where('id',$user_id)->first();
                    $properties= $property_model->where('company_id',$user['company_id'])->findall();
                    $data['properties']= $properties;
                    $data['type']= $this_user['type'];
                    return view('admin/user/poperty-list',$data);

                }elseif($this_user['type'] == 1){
                    $user= $user_model->where('id',$user_id)->first();
                    $properties= $property_model->where('company_id',$user['company_id'])->first();
                    $this->session->set('rs_property_id',$properties['id']);
                    
                }
                
            }

        }
        
        $floor_model= new Floormodel();
        // $unit_model= new Unitmodel();
        // $owner_model= new Ownermodel();
        // $tenant_model= new Tenantmodel();
        // $employee_model= new Employeemodel();
        // $committee_model= new Committeemodel();
        // $rent_model= new Rentmodel();
        // $maintenance_model= new Maintenancemodel();
        // $fund_model= new Fundmodel();
        // $owner_utility_model= new Ownerutility();
        // $employeee_salary_model= new Employeesalarymodel();
        $visitor_model= new Visitormodel();
        $complain_model= new Complainmodel();

        $property_id=$this->session->get('rs_property_id');


        $builder = $this->db->table('floors');
        $builder->selectCount('id');
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $total_floors = $query->getResultArray();
        foreach($total_floors as $total_floor){
            $data['total_floors']=$total_floor['id'];
        }

        $builder = $this->db->table('units');
        $builder->selectCount('id');
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $total_units = $query->getResultArray();
        foreach($total_units as $total_unit){
            $data['total_units']=$total_unit['id'];
        }

        $builder = $this->db->table('owners');
        $builder->selectCount('owner_id');
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $total_owners = $query->getResultArray();
        foreach($total_owners as $total_owner){
            $data['total_owners']=$total_owner['owner_id'];
        }


        $builder = $this->db->table('tenants');
        $builder->selectCount('id');
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $total_tenants = $query->getResultArray();
        foreach($total_tenants as $total_tenant){
            $data['total_tenants']=$total_tenant['id'];
        }


        $builder = $this->db->table('employees');
        $builder->selectCount('id');
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $total_employees = $query->getResultArray();
        foreach($total_employees as $total_employee){
            $data['total_employees']=$total_employee['id'];
        }


        $builder = $this->db->table('committees');
        $builder->selectCount('id');
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $total_committees = $query->getResultArray();
        foreach($total_committees as $total_committee){
            $data['total_committees']=$total_committee['id'];
        }

        $builder = $this->db->table('rent');
        $builder->selectCount('id');
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $total_rents = $query->getResultArray();
        foreach($total_rents as $total_rent){
            $data['total_rents']=$total_rent['id'];
        }

        $builder = $this->db->table('maintenances');
        $builder->selectCount('id');
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $total_maintenances = $query->getResultArray();
        foreach($total_maintenances as $total_maintenance){
            $data['total_maintenances']=$total_maintenance['id'];
        }

        $builder = $this->db->table('funds');
        $builder->selectCount('id');
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $total_funds = $query->getResultArray();
        foreach($total_funds as $total_fund){
            $data['total_funds']=$total_fund['id'];
        }

        $builder = $this->db->table('owners_utility');
        $builder->selectCount('id');
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $total_o_utilitys = $query->getResultArray();
        foreach($total_o_utilitys as $total_o_utility){
            $data['total_o_utilitys']=$total_o_utility['id'];
        }

        $builder = $this->db->table('employee_salary');
        $builder->selectCount('id');
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $total_e_salaries = $query->getResultArray();
        foreach($total_e_salaries as $total_e_salary){
            $data['total_e_salaries']=$total_e_salary['id'];
        }

        $builder = $this->db->table('complains');
        $builder->selectCount('id');
        $builder->where('property_id',$property_id);
        $query = $builder->get();
        $total_complains = $query->getResultArray();
        foreach($total_complains as $total_complain){
            $data['total_complains']=$total_complain['id'];
        }

        $data['complains'] = $complain_model->where('property_id', $property_id)->orderBy('id', 'desc')->findAll(5);
        $data['visitors'] = $visitor_model->where('property_id', $property_id)->orderBy('id', 'desc')->findAll(5);
        return view('admin/home/home',$data);
        
    }

    public function visitor_details($id)
    {
        $data['uri'] = $this->request->uri->getSegments();

        $property_id=$this->session->get('rs_property_id');

        $visitor_model = new Visitormodel();
        $floor_model = new Floormodel();

        $visitor = $visitor_model->where('property_id',$property_id)->where('id', $id)->first();
        $data['floor']= $floor_model->where('property_id',$property_id)->where('id', $visitor['floorid'])->first();
        $data['visitor']= $visitor;


        return view('admin/home/visitor_show', $data);
        
    }
    public function complain_details($id)
    {
        //$data['uri'] = $this->request->uri->getSegments();

        $property_id=$this->session->get('rs_property_id');

        $complain_model = new Complainmodel();
        $employee_model = new Employeemodel();

        $complain = $complain_model->where('property_id',$property_id)->where('id', $id)->first();
        $data['employee']= $employee_model->where('property_id',$property_id)->where('id', $complain['comass'])->first();
        $data['complain']= $complain;


        return view('admin/home/complain_show', $data);
        
    }
}
