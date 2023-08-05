<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Meetingmodel;

class Meetingcontroller extends BaseController
{
    public function index()
    {
        $property_id=$this->session->get('rs_property_id');

        $meeting = new Meetingmodel();
        $data['getMeetings'] = $meeting->where('property_id',$property_id)->findAll();

        return view('admin/meeting/meeting-list', $data);
    }

    public function meetingAdd()
    {
        $property_id=$this->session->get('rs_property_id');

        $meeting = new Meetingmodel();
        $data = [];

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('meetingValidate')) {
                $data['validation'] = $this->validator;
            } else {

                $meetingCreate = [
                    'meeissuedate' => $this->request->getVar('mee_issuedate'),
                    'meetitle' => $this->request->getVar('mee_title'),
                    'meedescription' => $this->request->getVar('mee_description'),
                    'property_id' => $property_id
                ];
                $meeting->insert($meetingCreate);
                return redirect()->to(base_url('/admin/meeting_list'));
            }
        }

        return view('admin/meeting/meeting-add', $data);
    }
    public function meetingView()
    {
        $property_id=$this->session->get('rs_property_id');

        $meeting = new Meetingmodel();
        $id = $this->request->getVar('meetingId');
        $results = $meeting->where('property_id',$property_id)->where('id', $id)->first();
        echo json_encode($results);

    }
    public function meetingEdit($id)
    {
        $property_id=$this->session->get('rs_property_id');

        $meeting = new Meetingmodel();
        $data['getMeeting'] = $meeting->where('property_id',$property_id)->where('id', $id)->first();

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('meetingValidate')) {
                $data['validation'] = $this->validator;
            } else {

                $meetingUpdate = [
                    'meeissuedate' => $this->request->getVar('mee_issuedate'),
                    'meetitle' => $this->request->getVar('mee_title'),
                    'meedescription' => $this->request->getVar('mee_description'),
                ];
                $meeting->update($id,$meetingUpdate);
                return redirect()->to(base_url('/admin/meeting_list'));
            }
        }
        if(!empty($data['getMeeting'])){
            return view('admin/meeting/meeting-edit', $data);
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } 
        
    }
    public function meetingDelete($id)
    {
        $meeting = new Meetingmodel();
        $meeting->delete($id);
        return redirect()->to(base_url('/admin/meeting_list'));
    }
}
