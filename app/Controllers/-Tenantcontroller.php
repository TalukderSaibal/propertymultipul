<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Tenantmodel;
use App\Models\Floormodel;
use App\Models\Unitmodel;
use App\Models\Yearmodel;
use App\Models\Monthsetupmodel;

class Tenantcontroller extends BaseController
{
    public function index($pro_id='')
    {
        if(!empty($pro_id) && is_numeric($pro_id)){
            $this->session->set('rs_property_id',$pro_id);
            if(valid_user($pro_id)==false){
                return redirect()->back();
            }
            
            
        }

        $property_id=$this->session->get('rs_property_id');

        helper('property');
        $tenant = new Tenantmodel();
        $getTenants = $tenant->where('property_id',$property_id)->findAll();

        return view('admin/tenant/tenant-list', [
            'getTenants' => $getTenants
        ]);
    }

    public function tenantAdd()
    {
        $property_id=$this->session->get('rs_property_id');

        $year_model = new Yearmodel();
        $month_model = new Monthsetupmodel();
        $data['years'] = $year_model->where('property_id',$property_id)->findall();
        $data['months'] = $month_model->where('property_id',$property_id)->findall();

        $tenant = new Tenantmodel();
        $floor = new Floormodel();
        $unit = new Unitmodel();

        $data['getFloors'] = $floor->where('property_id',$property_id)->findAll();
        $data['getUnits'] = $unit->where('property_id',$property_id)->findAll();

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('tenantValidate')) {
                $data['validation'] = $this->validator;
            } else {
                $imgFile = $this->request->getFile('te_ownerphoto');
                $newName = '';
               
                if ($imgFile->isValid() && ! $imgFile->hasMoved()) {
                    $newName = $imgFile->getRandomName();
                    $imgFile->move(ROOTPATH . 'public/uploads', $newName);
                }

                $tenantCreate = [
                    'tename' => $this->request->getVar('te_name'),
                    'teemail' => $this->request->getVar('te_email'),
                    'tepass' => $this->request->getVar('te_password'),
                    'tecontrctno' => $this->request->getVar('te_contrctno'),
                    'teads' => $this->request->getVar('te_ads'),
                    'tenid' => $this->request->getVar('te_nid'),
                    'floorno' => $this->request->getVar('floor_no'),
                    'unitno' => $this->request->getVar('unit_no'),
                    'teadvancerent' => $this->request->getVar('te_advancerent'),
                    'terentpermonth' => $this->request->getVar('te_rentpermonth'),
                    'teissuedate' => $this->request->getVar('te_issuedate'),
                    'terentmonth' => $this->request->getVar('te_rentmonth'),
                    'terentyear' => $this->request->getVar('te_rentyear'),
                    'testatus' => $this->request->getVar('te_status'),
                    'teownerphoto' => $newName,
                    'property_id' => $property_id,
                ];
                $tenant->insert($tenantCreate);
                $data['getTenants']= $tenant->where('property_id',$property_id)->findall(); 
                return view('admin/tenant/tenant-list',$data);
            }
        }
        return view('admin/tenant/tenant-add', $data);
    }

    public function tenantView()
    {   $property_id=$this->session->get('rs_property_id');

        helper('property');
        
        $tenant = new Tenantmodel();
        $id = $this->request->getVar('tenantId');
        $getTenant = $tenant->where('property_id',$property_id)->where('id', $id)->first();
        $getTenant['terentpermonth']= currency($getTenant['terentpermonth'],1);
        $getTenant['teissuedate']= date_formats($getTenant['teissuedate']);
        //print_r($getTenant);
        echo json_encode($getTenant);

        // echo $this->db->getLastQuery();
    }

    protected function tenantImageInfoUpdate()
    {
        $img = $this->request->getFile('te_ownerphoto');
        $newName = $img->getRandomName();
        $img->move(ROOTPATH . 'public/uploads', $newName);

        return $newName;
    }
    protected function tenantBasicInfoUpdate($id, $tenant, $tenantImageUrl = null)
    {
        $tenantUpdate = [
            'tename' => $this->request->getVar('te_name'),
            'teemail' => $this->request->getVar('te_email'),
            'tepass' => $this->request->getVar('te_password'),
            'tecontrctno' => $this->request->getVar('te_contrctno'),
            'teads' => $this->request->getVar('te_ads'),
            'tenid' => $this->request->getVar('te_nid'),
            'floorno' => $this->request->getVar('floor_no'),
            'unitno' => $this->request->getVar('unit_no'),
            'teadvancerent' => $this->request->getVar('te_advancerent'),
            'terentpermonth' => $this->request->getVar('te_rentpermonth'),
            'teissuedate' => $this->request->getVar('te_issuedate'),
            'terentmonth' => $this->request->getVar('te_rentmonth'),
            'terentyear' => $this->request->getVar('te_rentyear'),
            'testatus' => $this->request->getVar('te_status'),
        ];

        if ($tenantImageUrl) {
            $tenantUpdate['teownerphoto'] = $tenantImageUrl;
        }

        $tenant->update($id, $tenantUpdate);
    }
    public function tenantEdit($id)
    {
        $property_id=$this->session->get('rs_property_id');

        $year_model = new Yearmodel();
        $month_model = new Monthsetupmodel();
        $data['years'] = $year_model->where('property_id',$property_id)->findall();
        $data['months'] = $month_model->where('property_id',$property_id)->findall();

        $tenant = new Tenantmodel();
        $floor = new Floormodel();
        $unit = new Unitmodel();

        $data['getFloors'] = $floor->where('property_id',$property_id)->findAll();
        $data['getUnits'] = $unit->where('property_id',$property_id)->findAll();

        $data['getTenant'] = $tenant->where('property_id',$property_id)->where('id', $id)->first();

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('tenantValidate')) {
                $data['validation'] = $this->validator;
            } else {
                $newFileName = $this->request->getFile('te_ownerphoto');
                $tenants = $tenant->find($id);

                if ($newFileName->isValid()) {
                    if ($tenants['teownerphoto'] != '') {
                        unlink('./uploads/' . $tenants['teownerphoto']);
                    }
                    $tenantImageUrl = $this->tenantImageInfoUpdate();
                $this->tenantBasicInfoUpdate($id, $tenant, $tenantImageUrl);
                $data['getTenants']= $tenant->where('property_id',$property_id)->findall(); 
                return view('admin/tenant/tenant-list',$data);
                } else {
                    $this->tenantBasicInfoUpdate($id, $tenant);
                    $data['getTenants']= $tenant->where('property_id',$property_id)->findall(); 
                    return view('admin/tenant/tenant-list',$data);
                }
            }
        }
        
        if(isset($data['getTenant']) && isset($data['getUnits']) && isset($data['getUnits'])){
            return view('admin/tenant/tenant-edit', $data);
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }
    public function tenantDelete($id)
    {
        $property_id=$this->session->get('rs_property_id');
        
        $tenant = new Tenantmodel();
        $tenant->delete($id);
        $data['getTenants']= $tenant->where('property_id',$property_id)->findall(); 
        return view('admin/tenant/tenant-list',$data);
    }

    public function tenantDepand()
    {
        $property_id=$this->session->get('rs_property_id');

        $unit = new Unitmodel();
        $id = $this->request->getVar('floorId');

        $results = $unit->where('property_id',$property_id)->where('floorid', $id)->findAll();
        echo json_encode($results);
    }
}
