<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\CIAuth;
use App\Libraries\Hash;
use App\Models\UsersModel;

class AuthController extends BaseController
{
    protected $helpers = ['url','form'];
    public function loginForm()
    {
        $data = [
            'pageTitle' => 'Login Form || CI4 HRIS Test',
            'validation'=>null
        ];
        return view('backend/pages/auth/login', $data);
    }

    public function loginHandler(){
        $fieldType = filter_var($this->request->getVar('login_id'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if ( $fieldType == 'email') {
            $isValid = $this->validate([
                'login_id'=>[
                    'rules'=>'required|valid_email|is_not_unique[users.email]',
                    'errors'=>[
                        'required'=>'Email or Username is Required',
                        'valid_email'=>'Please, check the text field. It does not appear to be valid.',
                        'is_not_unique'=>'Email is not exists in our system'
                    ]
                ],
                'password'=>[
                    'rules'=>'required|min_length[5]|max_length[25]',
                    'errors'=>[
                        'required'=>'Password is Required',
                        'min_length'=>'Password must have atleast 8 characters in Length',
                        'max_length'=>'Password must not have characters more than 25 in Length'
                    ]
                ]
            ]);
        } else {
            $isValid = $this->validate([
                'login_id'=>[
                    'rules'=>'required|is_not_unique[users.username]',
                    'errors'=>[
                        'required'=>'Username is Required',
                        'is_not_unique'=>'Username is not exists in our system'
                    ]
                ],
                'password'=>[
                    'rules'=>'required|min_length[5]|max_length[25]',
                    'errors'=>[
                        'required'=>'Password is Required',
                        'min_length'=>'Password must have atleast 5 characters in Length',
                        'max_length'=>'Password must not have characters more than 25 in Length'
                    ]
                ]
            ]);
        }

        if( !$isValid ){
            return view('/backend/pages/auth/login', [
                'pageTitle'=>'Login',
                'validation'=>$this->validator
            ]);
        }else{
            // echo 'Login Process';
            $user = new UsersModel();
            $userInfo = $user->where($fieldType, $this->request->getVar('login_id'))->first();
            $check_password = Hash::check($this->request->getVar('password'), $userInfo['password']);

            if ( !$check_password ) {
                return redirect()->route('admin.login.form')->with('fail','Incorrect Password')->withInput();
            } else {
                CIAuth::setCIAuth($userInfo);
                return redirect()->route('admin.home');
            }
            
        
        }
    }


    public function forgotForm(){   
        $data = array(
            'pageTitle' => 'Forgot Password || CI4 Test HRIS',
            'validation' => null,
        );
        return view('backend/pages/auth/forgot', $data);
    }

    public function sendPasswordResetLink(){
        echo 'Send Password Link';
    }


}
