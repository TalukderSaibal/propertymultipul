<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Billdipositmodel;
use App\Models\Yearmodel;
use App\Models\Monthsetupmodel;
use App\Models\Billsetupmodel;
use App\Models\User;

class Billdipositcontroller extends BaseController
{
    public function add_bill() 
    {
        $session = session();
        $property_id=$this->session->get('rs_property_id');

        $year_model = new Yearmodel();
        $month_model = new Monthsetupmodel();
        $nilltype_model = new Billsetupmodel();
        $data['years'] = $year_model->where('property_id',$property_id)->findall();
        $data['months'] = $month_model->where('property_id',$property_id)->findall();
        
        $user_id= $session->get('userId');
        $user_model = new User();
        $this_user= $user_model->where('id',$user_id)->first();

        $billSetUp = new Billsetupmodel();
        $data['bill_types'] = $billSetUp->where('company_id',$this_user['company_id'])->findAll();

        $bill_deposit_model = new Billdipositmodel();
        if($this->request->getMethod()=='post'){ 
            if ($this->validate('billdeposit')) {
                $data = [
                    'bill_type' => $this->request->getVar('bill_type'),
                    'bill_date' => $this->request->getVar('bill_date'),
                    'month' => $this->request->getVar('month'),
                    'year' => $this->request->getVar('year'),
                    'total_amount' => $this->request->getVar('total_amount'),
                    'bank_name' => $this->request->getVar('bank_name'),
                    'details' => $this->request->getVar('details'),
                    'property_id' => $property_id,
                  ];
                  $insert = $bill_deposit_model->save($data);
                
                  if($insert){
                    return redirect()->to(base_url('admin/billdipositlist'))->with('success','Data Saved');
                  }
        
            }else{
                $data['validation'] = $this->validator;
                return view('admin/bill_deposit/add_bill',$data);
            }
        }else{
            return view('admin/bill_deposit/add_bill',$data);
        }
    }
    public function bill_diposit_list(){
        helper('property');

        $property_id=$this->session->get('rs_property_id');

        $builder = $this->db->table('bill_diposit');
        $builder->select('bill_diposit.*,billsetups.billtype as billtype_name');
        $builder->join('billsetups', 'bill_diposit.bill_type = billsetups.id','left');
        $builder->where('bill_diposit.property_id',$property_id);
        $query = $builder->get();
        $bill_lists = $query->getResult();
        $data['bill_lists']=$bill_lists;
        return view('admin/bill_deposit/bill_list',$data); 
    }
    public function bill_update($id=null){
        $session = session();

        $property_id=$this->session->get('rs_property_id');

        $year_model = new Yearmodel();
        $month_model = new Monthsetupmodel();
        $nilltype_model = new Billsetupmodel();
        $data['years'] = $year_model->where('property_id',$property_id)->findall();
        $data['months'] = $month_model->where('property_id',$property_id)->findall();
       
        $user_id= $session->get('userId');
        $user_model = new User();
        $this_user= $user_model->where('id',$user_id)->first();

        $billSetUp = new Billsetupmodel();
        $data['bill_types'] = $billSetUp->where('company_id',$this_user['company_id'])->findAll();


        $bill_deposit_model = new Billdipositmodel();
        $bill= $bill_deposit_model->where('property_id',$property_id)->find($id);
        $data['bill']=$bill;

        if($this->request->getMethod()=='post'){ 
            if ($this->validate('billdeposit')) {
                $data = [
                    'bill_type' => $this->request->getVar('bill_type'),
                    'bill_date' => $this->request->getVar('bill_date'),
                    'month' => $this->request->getVar('month'),
                    'year' => $this->request->getVar('year'),
                    'total_amount' => $this->request->getVar('total_amount'),
                    'bank_name' => $this->request->getVar('bank_name'),
                    'details' => $this->request->getVar('details'),
                  ];
               
                  $updated = $bill_deposit_model->update($id,$data);
                
                  if($updated){
                    return redirect()->to(base_url('admin/billdipositlist'))->with('success','Data Updated');
                  }

            }else{
                return view('admin/bill_deposit/bill_update',$data); 
            }
        }else{
            if(!empty($data['bill'])){
                return view('admin/bill_deposit/bill_update',$data);
            }else{
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            } 
            
        }
        
    }
    public function bill_delete($id=null){
        $property_id=$this->session->get('rs_property_id');

        $bill_deposit_model = new Billdipositmodel();
        $bill= $bill_deposit_model->find($id);
        $data['bill']=$bill;

        $deleted= $bill_deposit_model->where('id', $id)->delete();
        if(isset($deleted)){
            return redirect()->to(base_url('admin/billdipositlist'))->with('success','Data Deleted');
        }else{
            return view('admin/bill_deposit/bill_update',$data); 
        }
        
    }
    public function indivisual_bill(){
        $property_id=$this->session->get('rs_property_id');
        
        helper('property');
        $bill_deposit_model = new Billdipositmodel();
        $bill_id= $this->request->getVar('bill_id');

        $bill_data = $bill_deposit_model->where('property_id',$property_id)->where('id', $bill_id)->first();
        $data['bill_data']=$bill_data;
        $data['bill_data']['total_amount']=currency($data['bill_data']['total_amount'],1);
        $data['bill_data']['bill_date']=date_formats($data['bill_data']['bill_date']);

        echo json_encode($data);
    }
}
