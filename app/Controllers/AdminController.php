<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\CIAuth;

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
}
