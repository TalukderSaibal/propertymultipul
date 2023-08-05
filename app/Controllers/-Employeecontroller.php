<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Employeemodel;
use App\Models\Monthsetupmodel;
use App\Models\Yearmodel;
use App\Models\Employeesalarymodel;

class Employeecontroller extends BaseController
{
    public function add_employee()
    {
        $property_id=$this->session->get('rs_property_id');

        $validation =  \Config\Services::validation();
        $employee_model = new Employeemodel();
        if ($this->request->getMethod() == 'post') {

            if ($this->validate('employee')) { 
                
                $avatar = $this->request->getFile('image');
                if ($avatar != '') {
                    $name = $avatar->getRandomName();

                    $move = $avatar->move(WRITEPATH . '../public/admin/assets/employee/', $name);

                    $image = \Config\Services::image()
                        ->withFile(WRITEPATH . '../public/admin/assets/employee/' . $name)
                        ->resize(200, 200, true, 'height')
                        ->save(WRITEPATH . '../public/admin/assets/employee/thumbnail/' . $name);
                } else {
                    $name = 'empty_image.jpg';
                }

                $data = [
                    'name' => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                    'contact_no' => $this->request->getVar('contact_no'),
                    'present_address' => $this->request->getVar('present_address'),
                    'parmanent_address' => $this->request->getVar('parmanent_address'),
                    'nid' => $this->request->getVar('nid'),
                    'designation' => $this->request->getVar('designation'),
                    'join_date' => $this->request->getVar('join_date'),
                    'end_date' => $this->request->getVar('end_date'),
                    'salary_per_month' => $this->request->getVar('salary_per_month'),
                    'status' => $this->request->getVar('status'),
                    'image' => $name,
                    'property_id' => $property_id,
                ];

                $data_save = $employee_model->save($data);


                if ($data_save) {
                    return redirect()->to(base_url('admin/employeelist'))->with('success', 'Data Saved');
                }
            } else {
                // echo "hello";die();

                $data['validation'] = $this->validator;
                return view('admin/employee/add_employee', $data);
            }
        } else {

            return view('admin/employee/add_employee');
        }
    }
    public function employee_list()
    {
        $property_id=$this->session->get('rs_property_id');
        $employee_model = new employeemodel();
        $data = [
            'employees' => $employee_model->where('property_id',$property_id)->paginate(30),
            'pager' => $employee_model->pager
        ];
        return view('admin/employee/employee_list', $data);
    }
    public function employee_update($id = null)
    {
        $property_id=$this->session->get('rs_property_id');

        $employee_model = new employeemodel();
        $employees = $employee_model->where('property_id',$property_id)->find($id);
        $data['employees'] = $employees;



        if ($this->request->getMethod() == 'post') {

            if ($this->validate('employee')) {


                $avatar = $this->request->getFile('image');

                if ($avatar != '') {

                    $pre_image = $this->request->getVar('image');
                    if ($employees['image'] != 'empty_image.jpg') {
                        unlink(WRITEPATH . '../public/admin/assets/employee/thumbnail/' . $pre_image);
                        unlink(WRITEPATH . '../public/admin/assets/employee/' . $pre_image);
                    }

                    $name = $avatar->getRandomName();

                    $move = $avatar->move(WRITEPATH . '../public/admin/assets/employee/', $name);

                    $image = \Config\Services::image()
                        ->withFile(WRITEPATH . '../public/admin/assets/employee/' . $name)
                        ->resize(200, 200, true, 'height')
                        ->save(WRITEPATH . '../public/admin/assets/employee/thumbnail/' . $name);
                } elseif ($employees['image'] != 'empty_image.jpg') {
                    $name = $employees['image'];
                } else {
                    $name = 'empty_image.jpg';
                }

                // echo $name;die();

                $data = [
                    'name' => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                    'contact_no' => $this->request->getVar('contact_no'),
                    'present_address' => $this->request->getVar('present_address'),
                    'parmanent_address' => $this->request->getVar('parmanent_address'),
                    'nid' => $this->request->getVar('nid'),
                    'designation' => $this->request->getVar('designation'),
                    'join_date' => $this->request->getVar('join_date'),
                    'end_date' => $this->request->getVar('end_date'),
                    'salary_per_month' => $this->request->getVar('salary_per_month'),
                    'status' => $this->request->getVar('status'),
                    'image' => $name,
                ];

                $updated = $employee_model->update($id, $data);
                if ($updated) {
                    return redirect()->to(base_url('admin/employeelist'))->with('success', 'Data Updated');
                }
            } else {
                $data['validation'] = $this->validator;
                return view('admin/employee/employee_update', $data);
            }
        } else {
            if(isset($data['employees'])){
                return view('admin/employee/employee_update', $data);
            }else{
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
           
        }
    }
    public function employee_delete($id = null)
    {
        $employee_model = new employeemodel();

        $find = $employee_model->where('id', $id)->first();
        if($find['image'] != 'empty_image.jpg'){
            unlink(WRITEPATH . '../public/admin/assets/employee/thumbnail/' . $find['image']);
            unlink(WRITEPATH . '../public/admin/assets/employee/' . $find['image']);
        }

        $deleted = $employee_model->where('id', $id)->delete();
        if (isset($deleted)) {
            return redirect()->to(base_url('admin/employeelist'))->with('success', 'Data Deleted');
        } else {
            return redirect()->to(base_url('admin/employeelist'))->with('success', 'Data Deleted Faild');
        }
    }

    public function indivisual_employee()
    {
        $property_id=$this->session->get('rs_property_id');

        helper('property');
        $employee_model = new Employeemodel();
        $id = $this->request->getVar('employee_id');
        $data['employee'] = $employee_model->where('property_id',$property_id)->where('id', $id)->first();
        $data['employee']['salary_per_month']=currency($data['employee']['salary_per_month'],1);
        $data['employee']['join_date']=date_formats($data['employee']['join_date']);
        $data['employee']['end_date']=date_formats($data['employee']['end_date']);
        //print_r($data['employee']);
        echo json_encode($data);
    }
    public function employee_salary()
    {

        helper('property');

        $property_id=$this->session->get('rs_property_id');

        $year_model = new Yearmodel();
        $month_model = new Monthsetupmodel();
        $data['years'] = $year_model->where('property_id',$property_id)->findall();
        $data['months'] = $month_model->where('property_id',$property_id)->findall();

        $employee_model = new Employeemodel();
        $employee_salary_model = new Employeesalarymodel();
        $data['employees'] = $employee_model->where('property_id',$property_id)->findall();
        $data['employee_salary'] = $employee_salary_model->where('property_id',$property_id)->findall();
        if ($this->request->getMethod() == 'post') {

            if ($this->validate('employeesalary')) {
                $value = $this->request->getVar('employee_name');
                $str_arr = explode(",", $value);
                $name = $str_arr[1];
                $employee_id = $str_arr[0];
                $data = [
                    'employee_id' => $employee_id,
                    'name' => $name,
                    'designation' => $this->request->getVar('designation2'),
                    'month' => $this->request->getVar('month'),
                    'year' => $this->request->getVar('year'),
                    'salary_per_month' => $this->request->getVar('salary_per_month'),
                    'issue_date' => $this->request->getVar('issue_date'),
                    'property_id' => $property_id,
                ];
                $insert = $employee_salary_model->save($data);
                if (isset($insert)) {
                    $data['years'] = $year_model->where('property_id',$property_id)->findall();
                    $data['months'] = $month_model->where('property_id',$property_id)->findall();
                    $data['employees'] = $employee_model->where('property_id',$property_id)->findall();
                    $data['employee_salary'] = $employee_salary_model->where('property_id',$property_id)->findall();
                    $data['success'] = "Data Saved";
                    return view('admin/employee/employee_salary', $data);
                }
            } else {
                $data['validation'] = $this->validator;
                return view('admin/employee/employee_salary', $data);
            }
        } else {
            return view('admin/employee/employee_salary', $data);
            
        }
    }
    public function get_indivisualemployee()
    {
        $property_id=$this->session->get('rs_property_id');

        $employee_model = new Employeemodel();
        $id = $this->request->getVar('employee_id');
        $data['employee'] = $employee_model->where('property_id',$property_id)->where('id', $id)->first();

       
        echo json_encode($data);
    }

    public function employee_salary_update($id = null)
    {
        $property_id=$this->session->get('rs_property_id');

        $year_model = new Yearmodel();
        $month_model = new Monthsetupmodel();
        $data['years'] = $year_model->where('property_id',$property_id)->findall();
        $data['months'] = $month_model->where('property_id',$property_id)->findall();

        $employee_model = new Employeemodel();
        $data['employees'] = $employee_model->where('property_id',$property_id)->findall();
        $employee_salary_model = new Employeesalarymodel();
        $employee_salary = $employee_salary_model->where('property_id',$property_id)->find($id);
        $data['employee_salary'] = $employee_salary;
        // print_r($data['employee_salary']);die();
        if ($this->request->getMethod() == 'post') {

            if ($this->validate('employeesalary')) {
                $value = $this->request->getVar('employee_name');
                $str_arr = explode(",", $value);
                $name = $str_arr[1];
                $employee_id = $str_arr[0];
                $data = [
                    'employee_id' => $employee_id,
                    'name' => $name,
                    'designation' => $this->request->getVar('designation2'),
                    'month' => $this->request->getVar('month'),
                    'year' => $this->request->getVar('year'),
                    'salary_per_month' => $this->request->getVar('salary_per_month'),
                    'issue_date' => $this->request->getVar('issue_date'),
                ];

                $updated = $employee_salary_model->update($id, $data);
                if (isset($updated)) {
                    return redirect()->to(base_url('admin/employeesalary'))->with('success', 'Data Updated');
                }
            } else {
                $data['validation'] = $this->validator;
                return view('admin/employee/employee_salary_update', $data);
            }
        } else {
            if(isset($data['employees']) && isset($data['employee_salary'])){
                return view('admin/employee/employee_salary_update', $data);
            }else{
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
            
        }
    }
    public function employee_salary_delete($id = null)
    {
        $employee_salary_model = new Employeesalarymodel();

        $deleted = $employee_salary_model->where('id', $id)->delete();
        if (isset($deleted)) {
            return redirect()->to(base_url('admin/employeesalary'))->with('success', 'Data Deleted');
        } else {
            return redirect()->to(base_url('admin/employeesalary'))->with('success', 'Data Deleted Faild');
        }
    }

    public function indivisual_employee_salary()
    {
        helper('property');

        $property_id=$this->session->get('rs_property_id');

        $employee_model = new Employeemodel();
        $employee_salary_model = new Employeesalarymodel();
        $id = $this->request->getVar('employee_salary_id');
        $employee_salary = $employee_salary_model->where('property_id',$property_id)->where('id', $id)->first();
        $data['employee_salary'] = $employee_salary;
        $data['employee'] = $employee_model->where('property_id',$property_id)->where('id', $employee_salary['employee_id'])->first();
        $data['employee']['salary_per_month']=currency($data['employee']['salary_per_month'],1);
        $data['employee_salary']['issue_date']=date_formats($data['employee_salary']['issue_date']);
       // PRINT_R($data['employee']);
        echo json_encode($data);
    }
    public function employee_leave()
    {
        return view('admin/employee/employee_leave');
    }


    
    public function print_salary_report()
    {
        return view('admin/employee/employee_leave');
    }
}
