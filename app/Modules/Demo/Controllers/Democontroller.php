<?php

namespace Modules\Demo\Controllers;

use App\Controllers\BaseController;
use Modules\Demo\Models\Demomodel;

class Democontroller extends BaseController{
    /**
     * This method index shows Floor list of a property.
     * Method - get
     */
    // public function index($pro_id=''){
    //     if(!empty($pro_id) && is_numeric($pro_id)){
    //         $this->session->set('rs_property_id',$pro_id);

    //         if(valid_user($pro_id)==false){
    //             return redirect()->back();
    //         }


    //     }
    //     $property_id=$this->session->get('rs_property_id');

    //     $floor = new Floormodel();
    //     $getFloors = $floor->where('property_id',$property_id)->findAll();

    //     return view('Modules\Floor\Views\admin\floor\floor-list', [
    //         "getFloors" => $getFloors
    //     ]);
    // }

    public function demoAdd(){
        $property_id = $this->session->get('rs_property_id');
        $demo = new Demomodel();
        $data = array();

        if($this->request->getMethod() == 'post'){
            if(!$this->validate('demoValidate')){
                $data['validation'] = $this->validator;
            }else{
                $demoData = [
                    'demono'      => $this->request->getVar('demo'),
                    'property_id' => $property_id
                ];

                $res = $demo->insert($demoData);

                if($res){
                    $data['demoData'] = $demo->where('property_id',$property_id)->findall();
                    return view('Modules\Demo\Views\admin\demo\demo-list', $data);
                }
            }
        }

        return view('Modules\Demo\Views\admin\demo\demo-add', $data);
    }
}
