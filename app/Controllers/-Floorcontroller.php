<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Floormodel;

class floorController extends BaseController
{
    public function index($pro_id='')
    {
        if(!empty($pro_id) && is_numeric($pro_id)){
            $this->session->set('rs_property_id',$pro_id);
          
            if(valid_user($pro_id)==false){
                return redirect()->back();
            }
            
            
        }
        //echo $property_id;die();
        $property_id=$this->session->get('rs_property_id');
              //echo $property_id;die();
        $floor = new Floormodel();
        $getFloors = $floor->where('property_id',$property_id)->findAll();

        return view('admin/floor/floor-list', [
            "getFloors" => $getFloors
        ]);
    }
    public function floorAdd()
    {
        $property_id=$this->session->get('rs_property_id');
        $floor = new Floormodel();
        $data = array();
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('floorValidate')) {
                $data['validation'] = $this->validator;
            } else {
                $floorAdd = [
                    'floorno' => $this->request->getVar('floor_no'),
                    'property_id'=>$property_id
                ];
                $floor->insert($floorAdd);
                $data['getFloors']= $floor->where('property_id',$property_id)->findall(); 
                return view('admin/floor/floor-list',$data);
            }
        }
        return view('admin/floor/floor-add', $data);
    }
    public function floorEdit($id)
    {
        $property_id=$this->session->get('rs_property_id');
        $floor = new Floormodel();
        $data['floorInfo'] = $floor->where(['id' => $id,'property_id'=>$property_id])->first();

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('floorValidate')) {
                $data['validation'] = $this->validator;
            } else {
                $florUpdate = [
                    'floorno' => $this->request->getVar('floor_no')
                ];
                $floor->update($id, $florUpdate);
                $data['getFloors']= $floor->where('property_id',$property_id)->findall(); 
                return view('admin/floor/floor-list',$data);
            }
        }

        if(isset($data['floorInfo'])){
            return view('admin/floor/floor-edit', $data);
        }else{
             throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }
    public function floorDelete($id)
    {
        $property_id=$this->session->get('rs_property_id');
        
        $floor = new Floormodel();

        $floor->delete($id);

        $data['getFloors']= $floor->where('property_id',$property_id)->findall(); 
        return view('admin/floor/floor-list',$data);
    }
}
