<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\CIAuth;
use App\Models\UsersModel;

class AdminController extends BaseController
{
    protected $helpers = ['url','form','CIMail','CIFunctions'];
    public function index()
    {
        // echo 'Admin Dashboard home';
        $data = [
            'pageTitle' => 'Admin Dashboard || CI4Test HRIS',
        ];
        return view('backend/pages/home', $data);
    }

    public function logoutHandler(){
        CIAuth::forget();
        return redirect()->route('admin.login.form')->with('info','You have successfully Logout');
    }

    public function profile(){
        $data = array(
            'pageTitle' => 'My User Profile || CI4HRIS Test Page'
        );
        return view('backend/pages/users/profile', $data);
    }

    public function settings(){
        $data = array(
            'pageTitle' => 'General User Settings || CI4 HRIS Test' 
        );
        return view('backend/pages/users/settings', $data);
    }

    public function updatePersonalDetails(){
        $request = \Config\Services::request();
        $validation = \Config\Services::validation();   
        $user_id = CIAuth::id();

        if( $request->isAJAX() ){
            $this->validate([
                'name'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=> 'Full Name is required'
                    ]
                ],
                'username'=>[
                    'rules'=>'required|min_lengths[4]|is_unique[users.username,id,'.$user_id.']',
                    'error'=>[
                        'required'=> 'Username is required',
                        'min_lengths'=> 'Username must have minimum of 4 characters',
                        'is_unique'=> 'Username is already taken'
                    ]
                ]
            ]);

            if ( $validation->run() == FALSE ) {
                $errors = $validation->getErrors();
                return json_encode(['status'=>0, 'error'=>$errors]);
            } else {
                $user = new UsersModel();
                $update = $user->where('id',$user_id)
                               ->set([
                                'name'=>$request->getVar('name'),
                                'username'=>$request->getVar('username'),
                                'bio'=> $request->getVar('bio'),
                               ])->update();
                if ( $update ) {
                    $user_info = $user->find($user_id);
                    return json_encode(['status'=>1,'user_info'=>$user_info,'msg'=>'Your Personal Details have been successfully updated']);
                } else {
                    return json_encode(['status'=>0,'msg'=>'Something went wrong']);
                }
            }   
        }
    }

    public function updateProfilePicture(){
        
        $var = $_POST['file'];
        print_r($var);
        if($this->input->post('file')) {
            $config['upload_path'] = 'upload'; 
            $config['file_name'] = $var;
            $config['overwrite'] = 'TRUE';
            $config["allowed_types"] = 'jpg|jpeg|png|gif';
            $config["max_size"] = '1024';
            $config["max_width"] = '400';
            $config["max_height"] = '400';
            $this->load->library('upload', $config);
    
            if(!$this->upload->do_upload()) {
                $this->data['error'] = $this->upload->display_errors();
                print_r( $this->data['error']);
            } else {
                print_r("success");
            }
        }


    }
}
