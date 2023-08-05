<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OwnerModel;
use App\Models\Fundmodel;
use App\Models\Yearmodel;
use App\Models\Monthsetupmodel;

class Apartmentfundcontroller extends BaseController
{
    public function add_fund()
    {
        $property_id=$this->session->get('rs_property_id');

        $year_model = new Yearmodel();
        $month_model = new Monthsetupmodel();
        $data['years'] = $year_model->where('property_id',$property_id)->findall();
        $data['months'] = $month_model->where('property_id',$property_id)->findall();
        
        $owner_model= new OwnerModel();
        $fund_model= new Fundmodel();

        $data['get_owners'] = $owner_model->where('property_id',$property_id)->findall();
    

        if($this->request->getMethod()=='post'){ 

            if ($this->validate('fund')) {
                $owner=$this->request->getVar('owner_name');
                $str_arr = explode (",", $owner); 
                $owner_name = $str_arr[0];
                $owner_id = $str_arr[1];
                $owner_image = $str_arr[2];

            $data = [
            'owner_id' => $owner_id,
            'owner_name' => $owner_name,
            'owner_image' => $owner_image,
            'month' => $this->request->getVar('month'),
            'year' => $this->request->getVar('year'),
            'issue_date' => $this->request->getVar('issue_date'),
            'total_amount' => $this->request->getVar('total_amount'),
            'purpose' => $this->request->getVar('purpose'),
            'property_id' => $property_id,
            ];
    
            $data_save= $fund_model->save($data);
            
            
            if($data_save){
            return redirect()->to(base_url('admin/fundlist'))->with('success','Data Saved');
            }
    
            }else{
            $data['validation'] = $this->validator;
        
            return view('admin/apartment_fund/add_fund',$data);
            }
            }else{
            
                return view('admin/apartment_fund/add_fund',$data);
            }
    }
    public function fund_list()
    {
        $property_id=$this->session->get('rs_property_id');

        helper('property');
        $fund_model= new Fundmodel();
        $builder = $this->db->table('funds');
        $builder->select('funds.*,owners.image as owner_image,owners.name as owner_name');
        $builder->join('owners', 'funds.owner_id = owners.owner_id','left');
        $builder->where('funds.property_id',$property_id);
        $query = $builder->get();
        $funds = $query->getResult();
        $data['funds'] = $funds;
        return view('admin/apartment_fund/fund_list',$data);
    }
    
        public function fund_update($id=null)
    {
        $property_id=$this->session->get('rs_property_id');

        $year_model = new Yearmodel();
        $month_model = new Monthsetupmodel();
        $data['years'] = $year_model->where('property_id',$property_id)->findall();
        $data['months'] = $month_model->where('property_id',$property_id)->findall();
        
        $owner_model= new OwnerModel();
        $fund_model= new Fundmodel();
        $data['get_owners'] = $owner_model->where('property_id',$property_id)->findall();
        $data['get_fund'] = $fund_model->where('property_id',$property_id)->find($id);

        if($this->request->getMethod()=='post'){ 
            if ($this->validate('fund')) {
                $owner=$this->request->getVar('owner_name');
                $str_arr = explode (",", $owner); 
                $owner_name = $str_arr[0];
                $owner_id = $str_arr[1];
                $owner_image = $str_arr[2];
                
                $data = [
                'owner_id' => $owner_id,
                'owner_name' => $owner_name,
                'owner_image' => $owner_image,
                'month' => $this->request->getVar('month'),
                'year' => $this->request->getVar('year'),
                'issue_date' => $this->request->getVar('issue_date'),
                'total_amount' => $this->request->getVar('total_amount'),
                'purpose' => $this->request->getVar('purpose'),
                ];
               
                  $updated = $fund_model->update($id,$data);
                
                  if($updated){
                    return redirect()->to(base_url('admin/fundlist'))->with('success','Data Updated');
                  }

            }else{
                return view('admin/apartment_fund/fund_update',$data);
            }
        }else{
            if(!empty($data['get_fund'])){
                return view('admin/apartment_fund/fund_update',$data);
            }else{
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
            
        }
        
    }
    public function fund_delete($id=null)
    {
        $fund_model= new Fundmodel();
        
        $deleted = $fund_model->where('id',$id)->delete();
                
                  if($deleted){
                    return redirect()->to(base_url('admin/fundlist'))->with('success','Data Deleted');
                  }

    }
    public function indivisual_fund()
    {
        helper('property');

        $property_id=$this->session->get('rs_property_id');

        $fund_model= new Fundmodel();
        $id= $this->request->getVar('fund_id');

        $builder = $this->db->table('funds');
        $builder->select('funds.*,owners.image as owner_image,owners.name as owner_name');
        $builder->join('owners', 'funds.owner_id = owners.owner_id','left');
        $builder->where('funds.property_id',$property_id);
        $query = $builder->get();
        $funds = $query->getResult();
        foreach($funds as $fund){
            $data['fund'] = $fund;
            $data['fund']->total_amount =currency($data['fund']->total_amount,1);
            $data['fund']->issue_date =date_formats($data['fund']->issue_date);
        }
        

        echo json_encode($data);
    }
    public function invoice($id=null)
    {
        $property_id=$this->session->get('rs_property_id');

        $owner_model= new Ownermodel();
        $fund_model= new Fundmodel();
        $fund = $fund_model->where('property_id',$property_id)->where('id',$id)->first();
        $data['fund']=$fund;
        $owner=$owner_model->where('property_id',$property_id)->where('owner_id',$fund['owner_id'])->first();
        $data['owner']=$owner;
    
        $this->session->set('fund_i',$fund);
        $this->session->set('owner_i',$data['owner']);
                
        return view('admin/apartment_fund/invoice',$data);
    }

    public function print_fund_invoice(){

        $data['fund']=$this->session->get('fund_i');
        $data['owner']=$this->session->get('owner_i');
        //print_r($data['owner']);die();
        return view('admin/apartment_fund/print_fund_invoice',$data);
    }

}
