<?php

namespace App\Controllers;

use App\Models\Yearmodel;
use App\Models\Currencymodel;
use App\Models\User;
use App\Models\Settingmodel;
use App\Controllers\BaseController;
use App\Models\Billsetupmodel;
use App\Models\Membersetupmodel;
use App\Models\Monthsetupmodel;
use App\Models\Notificationmodel;
use App\Models\Rolemodel;
use App\Models\Datemodel;



class Settingcontroller extends BaseController
{
    public function year_setup()
    {
        $property_id=$this->session->get('rs_property_id');

        $year_model = new Yearmodel();
        $all_year = $year_model->where('property_id',$property_id)->findall();
        $data['years'] = $all_year;
        if ($this->request->getMethod() == 'post') {
            if ($this->validate('year')) {
                $data = [
                    'year' => $this->request->getVar('year'),
                    'property_id' => $property_id,
                ];
                $insert = $year_model->save($data);
                if (isset($insert)) {
                    $all_year = $year_model->where('property_id',$property_id)->findall();
                    $data['years'] = $all_year;
                    $data['insert_success'] = "Data Saved";
                    return view('admin/setting/year_setup', $data);
                }
            } else {
                $data['validation'] = $this->validator;
                return view('admin/setting/year_setup', $data);
            }
        } else {
            return view('admin/setting/year_setup', $data);
        }
    }

    public function year_update($id = null)
    {
        $property_id=$this->session->get('rs_property_id');

        $year_model = new Yearmodel();
        $all_year = $year_model->findall();
        $data['years'] = $all_year;
        $year = $year_model->where('id', $id)->first();
        $data['year'] = $year;

        if ($this->request->getMethod() == 'post') {
            if ($this->validate('year')) {
                $data = [
                    'year' => $this->request->getVar('year'),
                ];
                $update = $year_model->update($id, $data);
                if (isset($update)) {
                    $all_year = $year_model->where('property_id',$property_id)->findall();
                    $data['years'] = $all_year;
                    $data['update_success'] = "Data Updated";
                    return view('admin/setting/year_setup', $data);
                }
            } else {
                $data['validation'] = $this->validator;
                return view('admin/setting/year_update', $data);
            }
        } else {
            if(!empty($data['year'])){
                return view('admin/setting/year_update', $data);
            }else{
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            } 
            
        }
    }
    public function year_delete($id = null)
    {
        $property_id=$this->session->get('rs_property_id');
        $year_model = new Yearmodel();
        $delete = $year_model->where('id', $id)->delete();
        if (isset($delete)) {
            $all_year = $year_model->findall();
            $data['years'] = $all_year;
            $data['delete_success'] = "Data Deleted";
            return view('admin/setting/year_setup', $data);
        }
    }

    public function currency_setup()
    {
        $property_id=$this->session->get('rs_property_id');

        $currency_model = new Currencymodel();
        $all_currency = $currency_model->where('property_id',$property_id)->findall();
        $data['currencies'] = $all_currency;

        if ($this->request->getMethod() == 'post') {
            if ($this->validate('currency')) {

                $data = [
                    'symbol' => $this->request->getVar('symbol'),
                    'name' => $this->request->getVar('name'),
                    'property_id' => $property_id,
                ];
                $insert = $currency_model->save($data);
                if (isset($insert)) {
                    $all_currency = $currency_model->where('property_id',$property_id)->findall();
                    $data['currencies'] = $all_currency;
                    $data['insert_success'] = "Data Saved";
                    return view('admin/setting/currency_setup', $data);
                }
            } else {
                $data['validation'] = $this->validator;
                return view('admin/setting/currency_setup', $data);
            }
        } else {
            return view('admin/setting/currency_setup', $data);
        }
    }
    public function currency_update($id = null)
    {
       
        $property_id=$this->session->get('rs_property_id');

        $currency_model = new Currencymodel();
        $currency = $currency_model->where('id', $id)->first();
        $data['currency'] = $currency;
        $all_currency = $currency_model->findall();
        $data['currencies'] = $all_currency;

        if ($this->request->getMethod() == 'post') {
            if ($this->validate('currency')) {
                echo $$this->request->getVar('symbol');
                $data = [
                    'symbol' => $this->request->getVar('symbol'),
                    'name' => $this->request->getVar('name'),
                ];
                $update = $currency_model->update($id, $data);
                if (isset($update)) {
                    
                    $all_currency = $currency_model->where('property_id',$property_id)->findall();
                    $data['currencies'] = $all_currency;
                    $data['update_success'] = "Data Updated";
                    return view('admin/setting/currency_setup', $data);
                }
            } else {
                $data['validation'] = $this->validator;
                return view('admin/setting/currency_update', $data);
            }
        } else {
            return view('admin/setting/currency_update', $data);
        }
    }
    public function currency_delete($id = null)
    {
        $property_id=$this->session->get('rs_property_id');
        $currency_model = new Currencymodel();
        $delete = $currency_model->where('id', $id)->delete();
        if (isset($delete)) {
            $all_currency = $currency_model->findall();
            $data['currencies'] = $all_currency;
            $data['delete_success'] = "Data Deleted";
            return view('admin/setting/currency_setup', $data);
        }
    }
    public function system_setup()
    {
        $property_id=$this->session->get('rs_property_id');

        $setting_model= new Settingmodel(); 
        $data['currency'] = $setting_model->where('property_id',$property_id)->where('sname','currency')->first();
        $data['language'] = $setting_model->where('property_id',$property_id)->where('sname','language')->first();
        $data['email'] = $setting_model->where('property_id',$property_id)->where('sname','email')->first();
        $data['sms'] = $setting_model->where('property_id',$property_id)->where('sname','sms')->first();
        $data['date'] = $setting_model->where('property_id',$property_id)->where('sname','date')->first();

        $date_model= new Datemodel();

        $data['date_formats'] = $date_model->findall();
        
         
        $currency_model = new Currencymodel();
        $data['currencies'] = $currency_model->where('property_id',$property_id)->findall();
        return view('admin/setting/system_setup', $data);
    }
    public function currency_setting()
    {
        $property_id=$this->session->get('rs_property_id');
        $date_model= new Datemodel();
        $data['date_formats'] = $date_model->findall();

        if ($this->validate('currencysett')) {
        $avatar = $this->request->getFile('image');
        if ($avatar != '') {

            $name = $avatar->getRandomName();

            $move = $avatar->move(WRITEPATH . '../public/admin/assets/super_admin/', $name);

            $image = \Config\Services::image()
                ->withFile(WRITEPATH . '../public/admin/assets/super_admin/' . $name)
                ->resize(200, 200, true, 'height')
                ->save(WRITEPATH . '../public/admin/assets/super_admin/thumbnail/' . $name);
        } else {
            $name = 'empty_image.jpg';
        }
        
        $currency = [
            'currency' => $this->request->getVar('currency'),
            'currency_separator' => $this->request->getVar('currency_separator'),
            'currency_position' => $this->request->getVar('currency_position'),
            'currency_decimal' => $this->request->getVar('currency_decimal'),
            'image' => $name,
            
        ];
        $currency_id=$this->request->getVar('currency_id');
        $currency_setup= json_encode($currency);
        $data = [
            'sname' => 'currency',
            'sgroup' => 'system',
            'svalue' => $currency_setup,
        ];
        // echo $currency_id.'///';
        // print_r($data);die();
        $setting_model= new Settingmodel();
        $builder=$this->db->table('settings');
        $builder->where('sname','currency');
        $builder->where('id',$currency_id);
        $insert= $builder->update($data);
         
        if(isset($insert)){
            //$set_currency= $this->request->getVar('currency');
            $currency_model = new Currencymodel();
            $setting_model= new Settingmodel();
            $data['currency'] = $setting_model->where('property_id',$property_id)->where('sname','currency')->first();
            $data['language'] = $setting_model->where('property_id',$property_id)->where('sname','language')->first();
            $data['email'] = $setting_model->where('property_id',$property_id)->where('sname','email')->first();
            $data['date'] = $setting_model->where('property_id',$property_id)->where('sname','date_format')->first();
            $data['date_formats'] = $date_model->findall();
            $data['sms'] = $setting_model->where('property_id',$property_id)->where('sname','sms')->first();
            $data['currencies'] = $currency_model->where('property_id',$property_id)->findall();
            $data['update_success'] = "Data Updated";
            return view('admin/setting/system_setup', $data);
        }
    }else{
        $data['validation'] = $this->validator;
        $currency_model = new Currencymodel();
        
        $data['currencies'] = $currency_model->findall();
        return view('admin/setting/system_setup', $data);

    }

    }
    public function language_setting(){
        $property_id=$this->session->get('rs_property_id');
        $date_model= new Datemodel();
        $data['date_formats'] = $date_model->findall();

        if ($this->validate('language')) {
            $languages = [
                'language' => $this->request->getVar('language'),
            ];
            $language= json_encode($languages);
        $data = [
            'sname' => 'language',
            'sgroup' => 'system',
            'svalue' => $language,
        ];
        $language_id=$this->request->getVar('language_id');
        $setting_model= new Settingmodel();
        $builder=$this->db->table('settings');
        $builder->where('sname','language');
        $builder->where('id',$language_id);
        $insert= $builder->update($data);
            if(isset($insert)){
                $currency_model = new Currencymodel();
                $setting_model= new Settingmodel();
                $data['currency'] = $setting_model->where('property_id',$property_id)->where('sname','currency')->first();
                $data['language'] = $setting_model->where('property_id',$property_id)->where('sname','language')->first();
                $data['email'] = $setting_model->where('property_id',$property_id)->where('sname','email')->first();
                $data['sms'] = $setting_model->where('property_id',$property_id)->where('sname','sms')->first();
                $data['date'] = $setting_model->where('property_id',$property_id)->where('sname','date_format')->first();
                $data['date_formats'] = $date_model->findall();
                $data['currencies'] = $currency_model->where('property_id',$property_id)->findall();
                $data['update_success'] = "Data Updated";
                return view('admin/setting/system_setup', $data);
            }

        }else{
            $data['validation'] = $this->validator;
            $currency_model = new Currencymodel();
            
            $data['currencies'] = $currency_model->findall();
            return view('admin/setting/system_setup', $data);
        }
        
    }
    public function email_setting(){
        $property_id=$this->session->get('rs_property_id');
        $date_model= new Datemodel();
        $data['date_formats'] = $date_model->findall();

        if ($this->validate('emailsetting')) {
            $email_sett = [
                'mail_option' => $this->request->getVar('mail_option'),
                'smtp_hostname' => $this->request->getVar('smtp_hostname'),
                'smtp_username' => $this->request->getVar('smtp_username'),
                'smtp_password' => $this->request->getVar('smtp_password'),
                'smtp_post' => $this->request->getVar('smtp_post'),
                'smtp_secure' => $this->request->getVar('smtp_secure'),
            ];
            $email_settings= json_encode($email_sett);
            $data = [
                'sname' => 'email',
                'sgroup' => 'system',
                'svalue' => $email_settings,
            ];
            //print_r($data);die();
            $setting_model= new Settingmodel();

            $email_id=$this->request->getVar('email_id');
            //echo $email_id.'//';die();
            $builder=$this->db->table('settings');
            $builder->where('sname','email');
            $builder->where('id',$email_id);
            $insert= $builder->update($data);
            if(isset($insert)){
                $currency_model = new Currencymodel();
                $setting_model= new Settingmodel();
                $data['currency'] = $setting_model->where('property_id',$property_id)->where('sname','currency')->first();
                $data['language'] = $setting_model->where('property_id',$property_id)->where('sname','language')->first();
                $data['email'] = $setting_model->where('property_id',$property_id)->where('sname','email')->first();
                $data['sms'] = $setting_model->where('property_id',$property_id)->where('sname','sms')->first();
                $data['date'] = $setting_model->where('property_id',$property_id)->where('sname','date_format')->first();
                $data['date_formats'] = $date_model->findall();
                $data['currencies'] = $currency_model->where('property_id',$property_id)->findall();
                $data['update_success'] = "Data Updated";
                return view('admin/setting/system_setup', $data);
            }

        }else{
            $data['validation'] = $this->validator;
            $currency_model = new Currencymodel();
            
            $data['currencies'] = $currency_model->findall();
            return view('admin/setting/system_setup', $data);
        }
        
    }
    public function date_setting(){
       // echo "hi";die();
        $property_id=$this->session->get('rs_property_id');
        $date_model= new Datemodel();
        $data['date_formats'] = $date_model->findall();

        if ($this->validate('date')) {
            $date_format = [
                'date_format' => $this->request->getVar('date_format'),
            ];
            $date_format= json_encode($date_format);
        $data = [
            'sname' => 'date_format',
            'sgroup' => 'system',
            'svalue' => $date_format,
        ];

        //print_r($data);die();
        $date_id=$this->request->getVar('date_id');
        $setting_model= new Settingmodel();
        $builder=$this->db->table('settings');
        $builder->where('sname','date_format');
        $builder->where('id', 12);
        $insert= $builder->update($data);
            if(isset($insert)){
                $currency_model = new Currencymodel();
                $setting_model= new Settingmodel();
                $data['currency'] = $setting_model->where('property_id',$property_id)->where('sname','currency')->first();
                $data['language'] = $setting_model->where('property_id',$property_id)->where('sname','language')->first();
                $data['email'] = $setting_model->where('property_id',$property_id)->where('sname','email')->first();
                $data['sms'] = $setting_model->where('property_id',$property_id)->where('sname','sms')->first();
                $data['date'] = $setting_model->where('property_id',$property_id)->where('sname','date_format')->first();
                $data['date_formats'] = $date_model->findall();
                $data['currencies'] = $currency_model->where('property_id',$property_id)->findall();
                //print_r($data['date']);die();
                
                $data['update_success'] = "Data Updated";
                return view('admin/setting/system_setup', $data);
            }

        }else{
            $data['validation'] = $this->validator;
            $currency_model = new Currencymodel();
            
            $data['currencies'] = $currency_model->findall();
            return view('admin/setting/system_setup', $data);
        }
        
    }

    public function sms_setting(){
        $property_id=$this->session->get('rs_property_id');
        $date_model= new Datemodel();
        $data['date_formats'] = $date_model->findall();

        if ($this->validate('smssetting')) {
            $sms_all = [
                'clickAtell_username' => $this->request->getVar('clickAtell_username'),
                'clickAtell_password' => $this->request->getVar('clickAtell_password'),
                'clickAtell_api_key' => $this->request->getVar('clickAtell_api_key'),
            ];
            $sms= json_encode($sms_all);
            $data = [
                'sname' => 'sms',
                'sgroup' => 'system',
                'svalue' => $sms,
            ];
            $setting_model= new Settingmodel();

            $sms_id=$this->request->getVar('sms_id');

            $builder=$this->db->table('settings');
            $builder->where('id',$sms_id);
            $insert= $builder->update($data);
            if(isset($insert)){
                $currency_model = new Currencymodel();
                $setting_model= new Settingmodel();
                $data['currency'] = $setting_model->where('property_id',$property_id)->where('sname','currency')->first();
                $data['language'] = $setting_model->where('property_id',$property_id)->where('sname','language')->first();
                $data['email'] = $setting_model->where('property_id',$property_id)->where('sname','email')->first();
                $data['sms'] = $setting_model->where('property_id',$property_id)->where('sname','sms')->first();
                $data['date'] = $setting_model->where('property_id',$property_id)->where('sname','date_format')->first();
                $data['date_formats'] = $date_model->findall();
                $data['currencies'] = $currency_model->where('property_id',$property_id)->findall();
                $data['update_success'] = "Data Updated";
                return view('admin/setting/system_setup', $data);
            }

        }else{
            $data['validation'] = $this->validator;
            $currency_model = new Currencymodel();
            
            $data['currencies'] = $currency_model->findall();
            return view('admin/setting/system_setup', $data);
        }
        
    }

    /////
    public function billSetupAdd()
    {
        $session = session();
        $property_id=$this->session->get('rs_property_id');

        $user_id= $session->get('userId');
        $user_model = new User();
        $this_user= $user_model->where('id',$user_id)->first();

        $billSetUp = new Billsetupmodel();
        $data['getBillSetups'] = $billSetUp->where('company_id',$this_user['company_id'])->findAll();

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('billSetupValidate')) {
                $data['validation'] = $this->validator;
            } else {
                $billCreate = [
                    'billtype' => $this->request->getVar('bill_type'),
                    'property_id' => $property_id,
                ];

                $billSetUp->insert($billCreate);
                return redirect()->to(base_url('/admin/billsetup_add'));
            }
        }
        return view('admin/setting/billsetup-add', $data);
    }
    public function billSetupEdit($id)
    {
        $session = session();
        $property_id=$this->session->get('rs_property_id');

        $billSetUp = new Billsetupmodel();

        $data['billSetupEdit'] = $billSetUp->where('property_id',0)->orwhere('property_id',$property_id)->where('id', $id)->first();

        $user_id= $session->get('userId');
        $user_model = new User();
        $this_user= $user_model->where('id',$user_id)->first();

        $billSetUp = new Billsetupmodel();
        $data['getBillSetups'] = $billSetUp->where('company_id',$this_user['company_id'])->findAll();

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('billSetupValidate')) {
                $data['validation'] = $this->validator;
            } else {
                $billUpdate = [
                    'billtype' => $this->request->getVar('bill_type'),
                ];

                $billSetUp->update($id, $billUpdate);
                return redirect()->to(base_url('/admin/billsetup_add'));
            }
        }
        if(!empty($data['billSetupEdit'])){
            return view('admin/setting/billsetup-edit', $data);
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } 
        
    }

    public function billSetupDelete($id)
    {
        $property_id=$this->session->get('rs_property_id');

        $billSetUp = new Billsetupmodel();
        $billSetUp->delete($id);
        return redirect()->to(base_url('/admin/billsetup_add'));
    }

    public function utilitySetup()
    {
        $property_id=$this->session->get('rs_property_id');

        $utilitySetUp = new Settingmodel();
        $data['getUtilitySetup'] = $utilitySetUp->where('property_id',$property_id)->where('sname', 'utilitybill')->first();

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('utilitySetupValidate')) {
                $data['validation'] = $this->validator;
            } else {
                $sname = $this->request->getVar('sname');

                $myupdate = [
                    'gas_bill'=> $this->request->getVar('gas_bill'),
                    'security_bill'=> $this->request->getVar('security_bill'),
                    'property_id'=> $property_id,
                ];
                
                $insertField = [
                    'svalue' => json_encode($myupdate),
                ];

                $utilitySetUp->where('sname', $sname)
                            ->where('property_id',$property_id)
                            ->set($insertField)
                            ->update();

                return redirect()->to(base_url('/admin/utility_setup'))->with('success', 'Updated Utility Bill Information Successfully');
            }
        }
        return view('admin/setting/utility-setup', $data);
    }


    public function memberSetupAdd()
    {
        $property_id=$this->session->get('rs_property_id');

        $memberSetUp = new Membersetupmodel();
        $data['getMemberSetups'] = $memberSetUp->where('property_id',$property_id)->findAll();


        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('memberSetupValidate')) {
                $data['validation'] = $this->validator;
            } else {
                $memberCreate = [
                    'membertype' => $this->request->getVar('member_type'),
                    'property_id' => $property_id,
                ];

                $memberSetUp->insert($memberCreate);
                return redirect()->to(base_url('/admin/membersetup_add'));
            }
        }
        return view('admin/setting/membersetup-add', $data);
    }

    public function memberSetupEdit($id)
    {
        $property_id=$this->session->get('rs_property_id');

        $memberSetUp = new Membersetupmodel();
        $data['getMemberSetups'] = $memberSetUp->where('property_id',$property_id)->findAll();
        $data['getSetupEdit'] = $memberSetUp->where('property_id',$property_id)->where('id', $id)->first();

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('memberSetupValidate')) {
                $data['validation'] = $this->validator;
            } else {
                $memberUpdate = [
                    'membertype' => $this->request->getVar('member_type'),
                ];

                $memberSetUp->update($id, $memberUpdate);
                return redirect()->to(base_url('/admin/membersetup_add'));
            }
        }
        if(!empty($data['getSetupEdit'])){
            return view('admin/setting/membersetup-edit', $data);
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } 
        
    }

    public function memberSetupDelete($id)
    {
        $property_id=$this->session->get('rs_property_id');

        $memberSetUp = new Membersetupmodel();
        $memberSetUp->delete($id);
        return redirect()->to(base_url('/admin/membersetup_add'));
    }

    public function monthSetupAdd()
    {
        $property_id=$this->session->get('rs_property_id');

        $monthSetUp = new Monthsetupmodel();
        $data['getMonthSetups'] = $monthSetUp->where('property_id',$property_id)->findAll();

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('monthSetupValidate')) {
                $data['validation'] = $this->validator;
            } else {
                $monthCreate = [
                    'monthname' => $this->request->getVar('month_name'),
                    'property_id' => $property_id,
                ];

                $monthSetUp->insert($monthCreate);
                return redirect()->to(base_url('/admin/monthsetup_add'));
            }
        }
        return view('admin/setting/monthsetup-add', $data);
    }

    public function monthSetupEdit($id)
    {
        $property_id=$this->session->get('rs_property_id');

        $monthSetUp = new Monthsetupmodel();
        $data['getMonthSetups'] = $monthSetUp->where('property_id',$property_id)->findAll();
        $data['getSetupEdit'] = $monthSetUp->where('property_id',$property_id)->where('id', $id)->first();

        if ($this->request->getMethod() == 'post') {
            if (!$this->validate('monthSetupValidate')) {
                $data['validation'] = $this->validator;
            } else {
                $monthUpdate = [
                    'monthname' => $this->request->getVar('month_name'),
                ];

                $monthSetUp->update($id, $monthUpdate);
                return redirect()->to(base_url('/admin/monthsetup_add'));
            }
        }
        if(!empty($data['getSetupEdit'])){
            return view('admin/setting/monthsetup-edit', $data);
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }

    public function monthSetupDelete($id)
    {
        $monthSetUp = new Monthsetupmodel();
        $monthSetUp->delete($id);
        return redirect()->to(base_url('/admin/monthsetup_add'));
    }

    public function notificationSetup()
    {
        $notification = new Notificationmodel();
        $data['getNotification'] = $notification->findAll();
        $data['summernote'] = 1;

        return view('admin/setting/notification/notification-setup', $data);
    }

    public function notificationSetupEdit()
    {
        $id = $this->request->getVar('id');
        $notification = new Notificationmodel();
        $data['getNotification'] = $notification->find($id);

        $result = view('admin/setting/notification/notification-edit', $data);
        echo json_encode($result);
    }

    public function notificationSetupUpdate(){

        $notification = new Notificationmodel();

        $id = $this->request->getVar('n_id');
        $notificationUpdate = [
            'mailsub' => $this->request->getVar('mail_subject'),
            'mailbody' => $this->request->getVar('mail_body'),
        ];

        $notification->update($id, $notificationUpdate);

        // echo "<pre>";
        // print_r($notificationUpdate);
        // die();

        echo json_encode('success');
    }

    public function role_add(){

        $session = session();
        $property_id=$this->session->get('rs_property_id');
        $user_id= $session->get('userId');
        $user_model = new User();
        $role_model = new Rolemodel();
        $this_user= $user_model->where('id',$user_id)->first();
        $roles = $role_model->where('company_id',$this_user['company_id'])->findall();
        $data['roles']=$roles;

        if ($this->request->getMethod() == 'post') {
            if ($this->validate('role')) {
                $access = [
                    'floor_l' => $this->request->getVar('floor_l'),
                    'floor_a' => $this->request->getVar('floor_a'),
                    'floor_e' => $this->request->getVar('floor_e'),
                    'floor_d' => $this->request->getVar('floor_d'),
                    'unit_l' => $this->request->getVar('unit_l'),
                    'unit_a' => $this->request->getVar('unit_a'),
                    'unit_e' => $this->request->getVar('unit_e'),
                    'unit_d' => $this->request->getVar('unit_d'),
                    'owner_l' => $this->request->getVar('owner_l'),
                    'owner_a' => $this->request->getVar('owner_a'),
                    'owner_e' => $this->request->getVar('owner_e'),
                    'owner_d' => $this->request->getVar('owner_d'),
                    'tenant_l' => $this->request->getVar('tenant_l'),
                    'tenant_a' => $this->request->getVar('tenant_a'),
                    'tenant_e' => $this->request->getVar('tenant_e'),
                    'tenant_d' => $this->request->getVar('tenant_d'),
                    'employee_l' => $this->request->getVar('employee_l'),
                    'employee_a' => $this->request->getVar('employee_a'),
                    'employee_e' => $this->request->getVar('employee_e'),
                    'employee_d' => $this->request->getVar('employee_d'),
                    'emp_salary_addandlist' => $this->request->getVar('emp_salary_addandlist'),
                    'emp_salaery_e' => $this->request->getVar('emp_salaery_e'),
                    'emp_salaery_d' => $this->request->getVar('emp_salaery_d'),
                    'rent_l' => $this->request->getVar('rent_l'),
                    'rent_a' => $this->request->getVar('rent_a'),
                    'rent_e' => $this->request->getVar('rent_e'),
                    'rent_d' => $this->request->getVar('rent_d'),
                    'utility_l' => $this->request->getVar('utility_l'),
                    'utility_a' => $this->request->getVar('utility_a'),
                    'utility_e' => $this->request->getVar('utility_e'),
                    'utility_d' => $this->request->getVar('utility_d'),
                    'cost_l' => $this->request->getVar('cost_l'),
                    'cost_a' => $this->request->getVar('cost_a'),
                    'cost_e' => $this->request->getVar('cost_e'),
                    'cost_d' => $this->request->getVar('cost_d'),
                    'committee_l' => $this->request->getVar('committee_l'),
                    'committee_a' => $this->request->getVar('committee_a'),
                    'committee_e' => $this->request->getVar('committee_e'),
                    'committee_d' => $this->request->getVar('committee_d'),
                    'fund_l' => $this->request->getVar('fund_l'),
                    'fund_a' => $this->request->getVar('fund_a'),
                    'fund_e' => $this->request->getVar('fund_e'),
                    'fund_d' => $this->request->getVar('fund_d'),
                    'bill_l' => $this->request->getVar('bill_l'),
                    'bill_a' => $this->request->getVar('bill_a'),
                    'bill_e' => $this->request->getVar('bill_e'),
                    'bill_d' => $this->request->getVar('bill_d'),
                    'complain_l' => $this->request->getVar('complain_l'),
                    'complain_a' => $this->request->getVar('complain_a'),
                    'complain_e' => $this->request->getVar('complain_e'),
                    'complain_d' => $this->request->getVar('complain_d'),
                    'visitor_l' => $this->request->getVar('visitor_l'),
                    'visitor_a' => $this->request->getVar('visitor_a'),
                    'visitor_e' => $this->request->getVar('visitor_e'),
                    'visitor_d' => $this->request->getVar('visitor_d'),
                    'meeting_l' => $this->request->getVar('meeting_l'),
                    'meeting_a' => $this->request->getVar('meeting_a'),
                    'meeting_e' => $this->request->getVar('meeting_e'),
                    'meeting_d' => $this->request->getVar('meeting_d'),
                    'notice_addlist' => $this->request->getVar('notice_addlist'),
                    'notice_e' => $this->request->getVar('notice_e'),
                    'notice_d' => $this->request->getVar('notice_d'),
                    'emailandsms_s' => $this->request->getVar('emailandsms_s'),
                    'rent_r' => $this->request->getVar('rent_r'),
                    'tenant_r' => $this->request->getVar('tenant_r'),
                    'visitor_r' => $this->request->getVar('visitor_r'),
                    'complain_r' => $this->request->getVar('complain_r'),
                    'unit_r' => $this->request->getVar('unit_r'),
                    'fund_r' => $this->request->getVar('fund_r'),

                    'bill_r' => $this->request->getVar('bill_r'),
                    'salary_r' => $this->request->getVar('salary_r'),
                    'user_addlist' => $this->request->getVar('user_addlist'),
                    'user_e' => $this->request->getVar('user_e'),
                    'user_d' => $this->request->getVar('user_d'),
                    'billtype_addlist' => $this->request->getVar('billtype_addlist'),
                    'billtype_e' => $this->request->getVar('billtype_e'),
                    'billtype_d' => $this->request->getVar('billtype_d'),
                    'utilitybill_addlist' => $this->request->getVar('utilitybill_addlist'),
                    'membersetup_add' => $this->request->getVar('membersetup_add'),
                    'membersetup_edit' => $this->request->getVar('membersetup_edit'),
                    'membersetup_delete' => $this->request->getVar('membersetup_delete'),
                    'yearsetup' => $this->request->getVar('yearsetup'),
                    'yearupdate' => $this->request->getVar('yearupdate'),
                    'yeardelete' => $this->request->getVar('yeardelete'),
                    'monthsetup_add' => $this->request->getVar('monthsetup_add'),
                    'monthsetup_edit' => $this->request->getVar('monthsetup_edit'),
                    'monthsetup_delete' => $this->request->getVar('monthsetup_delete'),
                    'currencysetup' => $this->request->getVar('currencysetup'),
                    'currencyupdate' => $this->request->getVar('currencyupdate'),
                    'currencydelete' => $this->request->getVar('currencydelete'),
                    'systemsetup' => $this->request->getVar('systemsetup'),
                    'roleadd' => $this->request->getVar('roleadd'),
                    'roleupdate' => $this->request->getVar('roleupdate'),
                    'roledelete' => $this->request->getVar('roledelete'),
                    'rolelist' => $this->request->getVar('rolelist'),
                    'view_access' => $this->request->getVar('view_access'),


                    'tenant_view' => $this->request->getVar('tenant_view'),
                    'maintenance_view' => $this->request->getVar('maintenance_view'),
                    'committee_view' => $this->request->getVar('committee_view'),
                    'complain_view' => $this->request->getVar('complain_view'),
                    'meeting_view' => $this->request->getVar('meeting_view'),
                    'indivusualowner' => $this->request->getVar('indivusualowner'),
                    'indivusualutility' => $this->request->getVar('indivusualutility'),
                    'indivisualemployee' => $this->request->getVar('indivisualemployee'),
                    'indivisualemployeesalary' => $this->request->getVar('indivisualemployeesalary'),
                    'indivisualbill' => $this->request->getVar('indivisualbill'),
                    'indivusualrent' => $this->request->getVar('indivusualrent'),
                    'indivisualfund' => $this->request->getVar('indivisualfund'),
                    
                ];
                $user_access= json_encode($access);

                

                $data=[
                    'role_name' => $this->request->getVar('role_name'),
                    'user_access' => $user_access,
                    'status' =>  1,
                    'company_id' =>  $this_user['company_id'],
                    'property_id' =>  $property_id,
                ];

                
                $insert =  $role_model->insert($data);
                if(isset($insert)){
                    $roles = $role_model->where('company_id',$this_user['company_id'])->findall();
                    $data['roles']=$roles;
                    $data['success']= "Saved Successfully";
                    return view('admin/setting/role_list', $data);
                }

            }else{
                $data['validation'] = $this->validator;
                return view('admin/setting/role_add', $data);
            }
        }
        return view('admin/setting/role_add', $data); 
    }

    public function role_update($id){
        //echo "hello";die();
        $session = session();
        $property_id=$this->session->get('rs_property_id');
        $user_id= $session->get('userId');
        $user_model = new User();
        $role_model = new Rolemodel();
        $this_user= $user_model->where('id',$user_id)->first();
        $roles = $role_model->where('company_id',$this_user['company_id'])->where('id',$id)->first();
        $data['role']=$roles;

        if ($this->request->getMethod() == 'post') {
            if ($this->validate('role')) {

                $access = [
                    'floor_l' => $this->request->getVar('floor_l'),
                    'floor_a' => $this->request->getVar('floor_a'),
                    'floor_e' => $this->request->getVar('floor_e'),
                    'floor_d' => $this->request->getVar('floor_d'),
                    'unit_l' => $this->request->getVar('unit_l'),
                    'unit_a' => $this->request->getVar('unit_a'),
                    'unit_e' => $this->request->getVar('unit_e'),
                    'unit_d' => $this->request->getVar('unit_d'),
                    'owner_l' => $this->request->getVar('owner_l'),
                    'owner_a' => $this->request->getVar('owner_a'),
                    'owner_e' => $this->request->getVar('owner_e'),
                    'owner_d' => $this->request->getVar('owner_d'),
                    'tenant_l' => $this->request->getVar('tenant_l'),
                    'tenant_a' => $this->request->getVar('tenant_a'),
                    'tenant_e' => $this->request->getVar('tenant_e'),
                    'tenant_d' => $this->request->getVar('tenant_d'),
                    'employee_l' => $this->request->getVar('employee_l'),
                    'employee_a' => $this->request->getVar('employee_a'),
                    'employee_e' => $this->request->getVar('employee_e'),
                    'employee_d' => $this->request->getVar('employee_d'),
                    'emp_salary_addandlist' => $this->request->getVar('emp_salary_addandlist'),
                    'emp_salaery_e' => $this->request->getVar('emp_salaery_e'),
                    'emp_salaery_d' => $this->request->getVar('emp_salaery_d'),
                    'rent_l' => $this->request->getVar('rent_l'),
                    'rent_a' => $this->request->getVar('rent_a'),
                    'rent_e' => $this->request->getVar('rent_e'),
                    'rent_d' => $this->request->getVar('rent_d'),
                    'utility_l' => $this->request->getVar('utility_l'),
                    'utility_a' => $this->request->getVar('utility_a'),
                    'utility_e' => $this->request->getVar('utility_e'),
                    'utility_d' => $this->request->getVar('utility_d'),
                    'cost_l' => $this->request->getVar('cost_l'),
                    'cost_a' => $this->request->getVar('cost_a'),
                    'cost_e' => $this->request->getVar('cost_e'),
                    'cost_d' => $this->request->getVar('cost_d'),
                    'committee_l' => $this->request->getVar('committee_l'),
                    'committee_a' => $this->request->getVar('committee_a'),
                    'committee_e' => $this->request->getVar('committee_e'),
                    'committee_d' => $this->request->getVar('committee_d'),
                    'fund_l' => $this->request->getVar('fund_l'),
                    'fund_a' => $this->request->getVar('fund_a'),
                    'fund_e' => $this->request->getVar('fund_e'),
                    'fund_d' => $this->request->getVar('fund_d'),
                    'bill_l' => $this->request->getVar('bill_l'),
                    'bill_a' => $this->request->getVar('bill_a'),
                    'bill_e' => $this->request->getVar('bill_e'),
                    'bill_d' => $this->request->getVar('bill_d'),
                    'complain_l' => $this->request->getVar('complain_l'),
                    'complain_a' => $this->request->getVar('complain_a'),
                    'complain_e' => $this->request->getVar('complain_e'),
                    'complain_d' => $this->request->getVar('complain_d'),
                    'visitor_l' => $this->request->getVar('visitor_l'),
                    'visitor_a' => $this->request->getVar('visitor_a'),
                    'visitor_e' => $this->request->getVar('visitor_e'),
                    'visitor_d' => $this->request->getVar('visitor_d'),
                    'meeting_l' => $this->request->getVar('meeting_l'),
                    'meeting_a' => $this->request->getVar('meeting_a'),
                    'meeting_e' => $this->request->getVar('meeting_e'),
                    'meeting_d' => $this->request->getVar('meeting_d'),
                    'notice_addlist' => $this->request->getVar('notice_addlist'),
                    'notice_e' => $this->request->getVar('notice_e'),
                    'notice_d' => $this->request->getVar('notice_d'),
                    'emailandsms_s' => $this->request->getVar('emailandsms_s'),
                    'rent_r' => $this->request->getVar('rent_r'),
                    'tenant_r' => $this->request->getVar('tenant_r'),
                    'visitor_r' => $this->request->getVar('visitor_r'),
                    'complain_r' => $this->request->getVar('complain_r'),
                    'unit_r' => $this->request->getVar('unit_r'),
                    'fund_r' => $this->request->getVar('fund_r'),

                    'bill_r' => $this->request->getVar('bill_r'),
                    'salary_r' => $this->request->getVar('salary_r'),
                    'user_addlist' => $this->request->getVar('user_addlist'),
                    'user_e' => $this->request->getVar('user_e'),
                    'user_d' => $this->request->getVar('user_d'),
                    'billtype_addlist' => $this->request->getVar('billtype_addlist'),
                    'billtype_e' => $this->request->getVar('billtype_e'),
                    'billtype_d' => $this->request->getVar('billtype_d'),
                    'utilitybill_addlist' => $this->request->getVar('utilitybill_addlist'),
                    'membersetup_add' => $this->request->getVar('membersetup_add'),
                    'membersetup_edit' => $this->request->getVar('membersetup_edit'),
                    'membersetup_delete' => $this->request->getVar('membersetup_delete'),
                    'yearsetup' => $this->request->getVar('yearsetup'),
                    'yearupdate' => $this->request->getVar('yearupdate'),
                    'yeardelete' => $this->request->getVar('yeardelete'),
                    'monthsetup_add' => $this->request->getVar('monthsetup_add'),
                    'monthsetup_edit' => $this->request->getVar('monthsetup_edit'),
                    'monthsetup_delete' => $this->request->getVar('monthsetup_delete'),
                    'currencysetup' => $this->request->getVar('currencysetup'),
                    'currencyupdate' => $this->request->getVar('currencyupdate'),
                    'currencydelete' => $this->request->getVar('currencydelete'),
                    'systemsetup' => $this->request->getVar('systemsetup'),
                    'roleadd' => $this->request->getVar('roleadd'),
                    'roleupdate' => $this->request->getVar('roleupdate'),
                    'roledelete' => $this->request->getVar('roledelete'),
                    'rolelist' => $this->request->getVar('rolelist'),
                    'view_access' => $this->request->getVar('view_access'),



                    'tenant_view' => $this->request->getVar('tenant_view'),
                    'maintenance_view' => $this->request->getVar('maintenance_view'),
                    'committee_view' => $this->request->getVar('committee_view'),
                    'complain_view' => $this->request->getVar('complain_view'),
                    'meeting_view' => $this->request->getVar('meeting_view'),
                    'indivusualowner' => $this->request->getVar('indivusualowner'),
                    'indivusualutility' => $this->request->getVar('indivusualutility'),
                    'indivisualemployee' => $this->request->getVar('indivisualemployee'),
                    'indivisualemployeesalary' => $this->request->getVar('indivisualemployeesalary'),
                    'indivisualbill' => $this->request->getVar('indivisualbill'),
                    'indivusualrent' => $this->request->getVar('indivusualrent'),
                    'indivisualfund' => $this->request->getVar('indivisualfund'),


                    
                ];

                
                $user_access= json_encode($access);
                 //echo "<pre>";print_r($user_access);die();
                

                $data=[
                    'role_name' => $this->request->getVar('role_name'),
                    'user_access' => $user_access,
                    'status' =>  1,
                    'company_id' =>  $this_user['company_id'],
                    'property_id' =>  $property_id,
                ];

                $update =  $role_model->update($id,$data);
                if(isset($update)){
                    $roles = $role_model->where('company_id',$this_user['company_id'])->findall();
                    $data['roles']=$roles;
                    $data['success']= "Updated Successfully";
                    return view('admin/setting/role_list', $data);

                }

            }else{
                $data['validation'] = $this->validator;
                return view('admin/setting/role_add', $data);
            }
        }else{
           if(!empty($data['role'])){
            return view('admin/setting/role_update', $data); 
           }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
           }

        }
        
    }

    public function role_delete($id){
        $session = session();
        $property_id=$this->session->get('rs_property_id');
        $user_id= $session->get('userId');
        $user_model = new User();
        $role_model = new Rolemodel();
        $this_user= $user_model->where('id',$user_id)->first();
        $delete = $role_model->where('company_id',$this_user['company_id'])->delete($id);

        if(isset($delete)){
            $roles = $role_model->where('company_id',$this_user['company_id'])->findall();
            $data['roles']=$roles;
            $data['success']= "Deleted Successfully";
            return view('admin/setting/role_list', $data); 
        }else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

    }

    public function role_list(){
       
        $session = session();
        $property_id=$this->session->get('rs_property_id');
        $user_id= $session->get('userId');
        $user_model = new User();
        $role_model = new Rolemodel();
        $this_user= $user_model->where('id',$user_id)->first();
        $roles = $role_model->where('company_id',$this_user['company_id'])->findall();
        $data['roles']=$roles;

        $roles = $role_model->where('company_id',$this_user['company_id'])->findall();
        $data['roles']=$roles;
        return view('admin/setting/role_list', $data); 
        
    }
    public function view_access(){
       

        $role_id=$this->request->getVar('role_id');

        $role_model = new Rolemodel();
        $roles = $role_model->where('id',$role_id)->first();
        $data['roles']=$roles;

       echo json_encode($roles);
        
    }
}
