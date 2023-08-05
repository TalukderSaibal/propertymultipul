<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Committeemodel;
use App\Models\Complainmodel;
use App\Models\Employeemodel;

class Complaincontroller extends BaseController
{
    public function index()
    {
        $property_id=$this->session->get('rs_property_id');

        $builder = $this->db->table('complains');
        $builder->select('complains.*,employees.name');
        $builder->join('employees', 'complains.comass = employees.id', "left");
        $builder->where('complains.property_id',$property_id);
        $query = $builder->get();
        $results=$query->getResultArray();

        //echo $this->db->getLastQuery();die();
        if(empty($results)){
            $data['getComplains']=null;

            return view('admin/complain/complain-list', $data);
        }else{
            $data['getComplains']=$results;

            return view('admin/complain/complain-list', $data);
        }
       

        
    }

    public function complainAdd()
    {
        $property_id=$this->session->get('rs_property_id');

        $complain = new Complainmodel();
        $data = [];

        $personId = $this->session->get('userId');

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('complainValidate')) {
                $data['validation'] = $this->validator;
            } else {

                $complainCreate = [
                    'comtitle' => $this->request->getVar('com_title'),
                    'comdescription' => $this->request->getVar('com_description'),
                    'comdate' => $this->request->getVar('com_date'),
                    'comperson' => $personId,
                    'property_id' => $property_id,
                ];

                $complain->insert($complainCreate);
                return redirect()->to(base_url('/admin/complain_list'));
            }
        }
        return view('admin/complain/complain-add', $data);
    }

    public function complainSolution()
    {
        $property_id=$this->session->get('rs_property_id');

        $complain = new Complainmodel();
        $id =  $this->request->getVar('complainId');

        $solutionCreate = [
            'comstatus' => $this->request->getVar('comStatus'),
            'comsolution' => $this->request->getVar('comSolution'),
        ];

        $complain->update($id, $solutionCreate);
    }

    public function getEmployee()
    {
        $property_id=$this->session->get('rs_property_id');

        $employee = new Employeemodel();
        $results = $employee->where('property_id',$property_id)->findAll();
        echo json_encode($results);
    }

    public function assignEmployee()
    {
        $property_id=$this->session->get('rs_property_id');

        $complain = new Complainmodel();
        $id =  $this->request->getVar('complainId');

        $employeeCreate = [
            'comass' => $this->request->getVar('comEmployee')
        ];

        $complain->update($id, $employeeCreate);
    }


    public function complainView()
    {
        $property_id=$this->session->get('rs_property_id');

        $id =  $this->request->getVar('viewId');

        $builder = $this->db->table('complains');
        $builder->select('users.email,users.contactno,employees.name,complains.*');
        $builder->join('users', 'complains.comperson = users.id');
        $builder->join('employees', 'complains.comass = employees.id');
        $builder->where('complains.id', $id);
        $builder->where('property_id',$property_id);
        $query = $builder->get();

        //echo $this->db->getLastQuery();

        foreach ($query->getResultArray() as $row) {
            $data['getComplains'] = $row;
        }

        

        $data['getComplains']['month'] = date('F', strtotime($data['getComplains']['comdate']));

        echo json_encode($data);
    }

    public function complainEdit($id)
    {
        $property_id=$this->session->get('rs_property_id');

        $complain = new Complainmodel();
        $data['getComplain'] = $complain->where('property_id',$property_id)->where('id', $id)->first();

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('complainValidate')) {
                $data['validation'] = $this->validator;
            } else {

                $complainUpdate = [
                    'comtitle' => $this->request->getVar('com_title'),
                    'comdescription' => $this->request->getVar('com_description'),
                    'comdate' => $this->request->getVar('com_date'),
                ];

                $complain->update($id, $complainUpdate);
                return redirect()->to(base_url('/admin/complain_list'));
            }
        }
        if(!empty($data['getComplain'])){
            return view('admin/complain/complain-edit', $data);
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } 

        
    }

    public function complainDelete($id)
    {
        $property_id=$this->session->get('rs_property_id');

        $complain = new Complainmodel();
        $complain->delete($id);
        return redirect()->to(base_url('/admin/complain_list'));
    }
    
}
