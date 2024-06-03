<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SocialMediaModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\CIAuth;
use App\Models\UsersModel;
use App\Models\SettingsModel;
use App\Libraries\Hash;

class AdminController extends BaseController
{
  protected $helpers = ['url', 'form', 'CIMail', 'CIFunctions'];
  public function index()
  {
    // echo 'Admin Dashboard home';
    $data = [
      'pageTitle' => 'Admin Dashboard || CI4Test HRIS',
    ];
    return view('backend/pages/home', $data);
  }

  public function logoutHandler()
  {
    CIAuth::forget();
    return redirect()->route('admin.login.form')->with('info', 'You have successfully Logout');
  }

  public function profile()
  {
    $data = array(
      'pageTitle' => 'My User Profile || CI4HRIS Test Page'
    );
    return view('backend/pages/users/profile', $data);
  }

  public function settings()
  {
    $data = array(
      'pageTitle' => 'General User Settings || CI4 HRIS Test'
    );
    return view('backend/pages/users/settings', $data);
  }

  public function usersPage(){
    $data = array(
      'pageTitle' => 'Table of Users || CI4 HRIS Test'
    );
    return view('backend/pages/users/users-page', $data);
  }

  public function updateUserDetails()
  {
    $request = \Config\Services::request();
    $validation = \Config\Services::validation();
    $user_id = CIAuth::id();

    if ($request->isAJAX()) {
      $this->validate([
        'name' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Full name is required'
          ]
        ],
        'username' => [
          'rules' => 'required|min_length[4]|is_unique[users.username,id,' . $user_id . ']',
          'error' => [
            'required' => 'Username is required',
            'min_length' => 'Username must have minimum of 4 characters',
            'is_unique' => 'Username is already taken!'
          ]
        ],
      ]);

      if ($validation->run() == FALSE) {
        $errors = $validation->getErrors();
        return json_encode(['status' => 0, 'error' => $errors]);
      } else {
        $user = new UsersModel();
        $update = $user->where('id', $user_id)
          ->set([
            'name' => $request->getVar('name'),
            'username' => $request->getVar('username'),
            'bio' => $request->getVar('bio')
          ])->update();
        if ($update) {
          $user_info = $user->find($user_id);
          return json_encode(['status' => 1, 'user_info' => $user_info, 'msg' => 'Your User details have been updated successfully']);
        } else {
          return json_encode(['status' => 0, 'msg' => 'Something went wrong']);
        }
      }
    }
  }

  public function updateProfilePicture()
  {
    $request = \Config\Services::request();
    $user_id = CIAuth::id();
    $user = new UsersModel();
    $user_info = $user->asObject()->where('id', $user_id)->first();

    $path = 'images/users/';
    $file = $request->getFile('user_profile_file');
    $old_picture = $user_info->picture;
    $new_filename = 'UIMG_' . $user_id . $file->getRandomName();

    // if ( $file->move($path, $new_filename) ) {
    //     if ( $old_picture != null && file_exists($path.$old_picture) ) {
    //         unlink($path.$old_picture);
    //     } 
    //     $user->where('id',$user_info->id)
    //          ->set(['picture'=>$new_filename])
    //          ->update();

    //     echo json_encode(['status'=>1, 'msg'=>'Profile Picture Updated Successfully']);     
    // } else {
    //     echo json_encode(['status'=>0,'msg'=>'Something Went Wrong']);
    // }

    // Image Manipulation
    $upload_image = \Config\Services::image()
      ->withFile($file)
      ->resize(450, 450, true, 'height')
      ->save($path . $new_filename);

    if ($upload_image) {
      if ($old_picture != null && file_exists($path . $new_filename)) {
        unlink($path . $old_picture);
      }
      $user->where('id', $user_info->id)
        ->set(['picture' => $new_filename])
        ->update();

      echo json_encode(['status' => 1, 'msg' => 'Profile Picture Updated Successfully']);
    } else {
      echo json_encode(['status' => 0, 'msg' => 'Something went wrong']);
    }
  }

  public function changePassowrd()
  {
    $request = \Config\Services::request();

    if ($request->isAJAX()) {
      $validation = \Config\Services::validation();
      $user_id = CIAuth::id();
      $user = new UsersModel();
      $user_info = $user->asObject()->where('id', $user_id)->first();

      $this->validate([
        'current_password' => [
          'rules' => 'required|min_length[5]|check_current_password[current_password]',
          'errors' => [
            'required' => 'Enter Current Password',
            'min_length' => 'Password must have at least 5 characters',
            'check_current_password' => 'The current password is incorrect'
          ]
        ],
        'new_password' => [
          'rules' => 'required|min_length[5]|max_length[20]|is_password_strong[new_password]',
          'errors' => [
            'required' => 'New password is required',
            'min_length' => 'New password must have atleast 5 characters',
            'max_length' => 'New password must not excess atleast 20 characters',
            'is_password_strong' => 'Password must contains atleast 1 uppercase, 1 lowercase, 1 number and 1 special character'
          ]
        ],
        'confirm_new_password' => [
          'rules' => 'required|matches[new_password]',
          'errors' => [
            'required' => 'Confirm New Password',
            'matches' => 'Password Mismatch'
          ]
        ]
      ]);

      if ($validation->run() === FALSE) {
        $errors = $validation->getErrors();
        return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'error' => $errors]);
      } else {
        // Update user(admin) password in DB
        $user->where('id', $user_info->id)
          ->set(['password' => Hash::make($request->getVar('new_password'))])
          ->update();

        # send notification to user (admin) email address
        // $mail_data = array(
        // 	'user' => $user_info,
        // 	'new_password' => $this->request->getVar('new_password')
        // );

        // $view = \Config\Services::renderer();
        // $mail_body = $view->setVar('mail_data', $mail_data)->render('email-templates/password-changed-email-template');

        // $mailConfig = array(
        // 	'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
        // 	'mail_from_name' => env('EMAIL_FROM_NAME'),
        // 	'mail_recipient_email' => $user_info->email,
        // 	'mail_recipient_name' => $user_info->name,
        // 	'mail_subject' => 'Password Changed',
        // 	'mail_body' => $mail_body
        // );

        // sendEmail($mailConfig);
        return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => 'Good! Password has been changed']);
      }
    }
  }

  public function updateGeneralSettings()
  {
    $request = \Config\Services::request();

    if ($request->isAJAX()) {
      $validation = \Config\Services::validation();

      $this->validate([
        'blog_title' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Blog Title is required'
          ]
        ],
        'blog_email'=>[
          'rules'=>'required|valid_email',
          'errors'=>[
            'required'=>'Blog Email is required',
            'valid_email'=>'Invalid Email Address'
          ]
        ]
      ]);

      if( $validation->run() === FALSE ){
        $errors = $validation->getErrors();
        return $this->response->setJSON(['status'=>0, 'token'=>csrf_hash(),'error'=>$errors]);
      }else {
        $settings = new SettingsModel();
        $setting_id = $settings->asObject()->first()->id;
        $update = $settings->where('id',$setting_id)
                           ->set([
                            'blog_title'=>$request->getVar('blog_title'),
                            'blog_email'=>$request->getVar('blog_email'),
                            'blog_phone'=>$request->getVar('blog_phone'),
                            'blog_meta_keywords'=>$request->getVar('blog_meta_keywords'),
                            'blog_meta_desc'=>$request->getVar('blog_meta_desc'),
                           ])->update();
        
        if ( $update ) {
          return $this->response->setJSON(['status'=>1, 'token'=>csrf_hash(),'msg'=>'Good. General Settings Updated Successfully']);
        } else {
          return $this->response->setJSON(['status'=>0, 'token'=>csrf_hash(),'msg'=>'Something went wrong']);
        }
        

      }
    }
  }

  public function updateLogo(){
    $request = \Config\Services::request();

    if ( $request->isAJAX() ) {
      $settings = new SettingsModel();
      $path = 'images/blog/';
      $file = $request->getFile('blog_logo');
      $setting_data = $settings->asObject()->first();
      $old_logo = $setting_data->blog_logo;
      $new_filename = 'CI4blog_logo'.$file->getRandomName();

      if ( $file->move($path, $new_filename) ) {
        if ( $old_logo != null && file_exists($path.$old_logo) ) {
          unlink($path.$old_logo);
        } 
        $update = $settings->where('id',$setting_data->id)
                           ->set(['blog_logo'=>$new_filename])
                           ->update();
        if ( $update ) {
          return $this->response->setJSON(['status'=>1, 'token'=>csrf_hash(), 'msg'=>'Done! Uploading CI4 Logo has been successfully updated']);
        } else {
          return $this->response->setJSON(['status'=>0, 'token'=>csrf_hash(), 'msg'=>'Something wen wrong on updating new Logo info']);
        }
        
      } else {
        return json_encode(['status'=>0, 'token'=>csrf_hash(), 'msg'=>'Something went wrong on uploading a new logo']);
      }
    }
  }

  public function updateFavicon(){
    $request = \Config\Services::request();

    if( $request->isAJAX() ){
      $settings = new SettingsModel();
      $path = 'images/blog/';
      $file = $request->getFile('blog_favicon');
      $setting_data = $settings->asObject()->first();
      $old_favicon = $setting_data->blog_favicon;
      $new_filename = 'favicon_'.$file->getRandomName();

      if ( $file->move($path, $new_filename) ) {
        if( $old_favicon != null && file_exists($path.$old_favicon)){
          unlink($path.$old_favicon);
        }

        $update = $settings->where('id', $setting_data->id)
                           ->set(['blog_favicon'=>$new_filename])
                           ->update();

        if ( $update ) {
          return $this->response->setJSON(['status'=>1,'token'=>csrf_hash(), 'msg'=>'Done!! Favicon has been updated successfully']);
        } else {
          return $this->response->setJSON(['status'=>0,'token'=>csrf_hash(), 'msg'=>'Something wen wrong on updating new Logo info']);
        }

      } else {
        return json_encode(['status'=>0, 'token'=>csrf_hash(), 'msg'=>'Something went wrong on uploading new Favicon']);
      }
    }
  }


  public function updateSocialMedia(){
    $request = \Config\Services::request();

    if( $request->isAJAX() ){
      $validation = \Config\Services::validation();
      $this->validate([
        'facebook_url'=>[
          'rules'=>'permit_empty|valid_url_strict',
          'errors'=>[
            'valid_url_strict'=>'Invalid Facebook URL',
          ]
        ],
        'twitter_url'=>[
          'rules'=>'permit_empty|valid_url_strict',
          'errors'=>[
            'valid_url_strict'=>'Invalid Twitter URL',
          ]
        ],
        'instagram_url'=>[
          'rules'=>'permit_empty|valid_url_strict',
          'errors'=>[
            'valid_url_strict'=>'Invalid Instagram URL',
          ]
        ],
        'youtube_url'=>[
          'rules'=>'permit_empty|valid_url_strict',
          'errors'=>[
            'valid_url_strict'=>'Invalid YouTube URL',
          ]
        ],
        'github_url'=>[
          'rules'=>'permit_empty|valid_url_strict',
          'errors'=>[
            'valid_url_strict'=>'Invalid GitHub URL',
          ]
        ],
        'linkedin_url'=>[
          'rules'=>'permit_empty|valid_url_strict',
          'errors'=>[
            'valid_url_strict'=>'Invalid LinkedIn URL',
          ]
        ],
      ]);      

      if ( $validation->run() === FALSE ) {
        $errors = $validation->getErrors();
        return $this->response->setJSON(['status'=>0, 'token'=>csrf_hash(), 'error'=>$errors]);
      } else {
        // return $this->response->setJSON(['status'=>1, 'token'=>csrf_hash(), 'msg'=>'Form Validated....']);
        $social_media = new SocialMediaModel();
        $social_media_id = $social_media->asObject()->first()->id;
        $update = $social_media->where('id',$social_media_id)
                               ->set([
                                'facebook_url'=>$request->getVar('facebook_url'),
                                'twitter_url'=>$request->getVar('twitter_url'),
                                'instagram_url'=>$request->getVar('instagram_url'),
                                'youtube_url'=>$request->getVar('youtube_url'),
                                'github_url'=>$request->getVar('github_url'),
                                'linkedin_url'=>$request->getVar('linkedin_url'),
                               ])->update();
        if ( $update ) {
          return $this->response->setJSON(['status'=>1, 'token'=>csrf_hash(), 'msg'=>'Done!! User Settings Social Media have been successfully updated.']);
        } else {
          return $this->response->setJSON(['status'=>0, 'token'=>csrf_hash(), 'msg'=>'Something went wrong on updating users social media.']);
        }
         
      }
      
    }
  }

  //Employee Page
  
}
