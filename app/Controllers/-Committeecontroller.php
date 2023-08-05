<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Committeemodel;

class Committeecontroller extends BaseController
{
    public function index()
    {
        $property_id=$this->session->get('rs_property_id');
        
        $committee = new Committeemodel();
        $getCommittees = $committee->where('property_id',$property_id)->findAll();
        return view('admin/committee/committee-list', [
            'getCommittees' => $getCommittees
        ]);
    }
    public function committeeAdd()
    {
        $property_id=$this->session->get('rs_property_id');

        $committee = new Committeemodel();
        $data = [];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('committeeValidate')) {
                $data['validation'] = $this->validator;
            } else {
                $imgFile = $this->request->getFile('m_image');
                $newName = '';
               
                if ($imgFile->isValid() && ! $imgFile->hasMoved()) {
                    $newName = $imgFile->getRandomName();
                    $imgFile->move(ROOTPATH . 'public/uploads', $newName);
                }

                $committeeCreate = [
                    'mmembername' => $this->request->getVar('m_membername'),
                    'memail' => $this->request->getVar('m_email'),
                    'mpassword' => $this->request->getVar('m_password'),
                    'mphone' => $this->request->getVar('m_phone'),
                    'mpresentads' => $this->request->getVar('m_presentads'),
                    'mpermanentads' => $this->request->getVar('m_permanentads'),
                    'mnid' => $this->request->getVar('m_nid'),
                    'mdesignation' => $this->request->getVar('m_designation'),
                    'mjoiningdate' => $this->request->getVar('m_joiningdate'),
                    'mendingdate' => $this->request->getVar('m_endingdate'),
                    'mstaus' => $this->request->getVar('m_staus'),
                    'mimage' => $newName,
                    'property_id' => $property_id,
                ];
                $committee->insert($committeeCreate);
                return redirect()->to(base_url('/admin/committee_list'));
            }
        }

        return view('admin/committee/committee-add', $data);
    }

    public function committeeView()
    {
        $property_id=$this->session->get('rs_property_id');

        $committee = new Committeemodel();

        $id = $this->request->getVar('committeeId');
        $result = $committee->where(['id' => $id,'property_id' => $property_id])->first();
        //print_r();die();
        $result['mjoiningdate']= date_formats($result['mjoiningdate']);
        $result['mendingdate']= date_formats($result['mendingdate']);
        echo json_encode($result);
    }

    protected function committeeImageInfoUpdate()
    {
        $img = $this->request->getFile('m_image');
        $newName = $img->getRandomName();
        $img->move(ROOTPATH . 'public/uploads', $newName);

        return $newName;
    }
    protected function committeeBasicInfoUpdate($id, $committee, $committeeImageUrl = null)
    {
        $committeeUpdate = [
            'mmembername' => $this->request->getVar('m_membername'),
            'memail' => $this->request->getVar('m_email'),
            'mpassword' => $this->request->getVar('m_password'),
            'mphone' => $this->request->getVar('m_phone'),
            'mpresentads' => $this->request->getVar('m_presentads'),
            'mpermanentads' => $this->request->getVar('m_permanentads'),
            'mnid' => $this->request->getVar('m_nid'),
            'mdesignation' => $this->request->getVar('m_designation'),
            'mjoiningdate' => $this->request->getVar('m_joiningdate'),
            'mendingdate' => $this->request->getVar('m_endingdate'),
            'mstaus' => $this->request->getVar('m_staus'),
        ];

        if ($committeeImageUrl) {
            $committeeUpdate['mimage'] = $committeeImageUrl;
        }

        $committee->update($id, $committeeUpdate);
    }

    public function committeeEdit($id)
    {
        $property_id=$this->session->get('rs_property_id');
        $committee = new Committeemodel();
        $data['getCommitte'] = $committee->where(['id' => $id,'property_id' => $property_id])->first();

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('committeeValidate')) {
                $data['validation'] = $this->validator;
            } else {
                $newFileName = $this->request->getFile('m_image');
                $committees = $committee->find($id);

                if ($newFileName->isValid()) {
                    if ($committees['mimage'] != '') {
                        unlink('./uploads/' . $committees['mimage']);
                    }
                    $committeeImageUrl = $this->committeeImageInfoUpdate();
                    $this->committeeBasicInfoUpdate($id, $committee, $committeeImageUrl);
                    return redirect()->to(base_url('/admin/committee_list'));
                } else {
                    $this->committeeBasicInfoUpdate($id, $committee);
                    return redirect()->to(base_url('/admin/committee_list'));
                }
            }
        }
        if(!empty($data['getCommitte'])){
            return view('admin/committee/committee-edit', $data);
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        
    }

    public function committeeDelete($id)
    {
        $committee = new Committeemodel();
        $committee->delete($id);
        return redirect()->to(base_url('/admin/committee_list'));
    }
}
