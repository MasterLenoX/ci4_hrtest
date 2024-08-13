<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DepartmentModel;
use App\Models\SocialMediaModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\CIAuth;
use App\Models\UsersModel;
use App\Models\SettingsModel;
use App\Models\EmployeesModel;
use App\Libraries\Hash;
use PSpell\Config;
use SSP;


class AdminController extends BaseController
{
  protected $helpers = ['url', 'form', 'CIMail', 'CIFunctions'];
  protected $db;

  public function __construct()
  {
    require_once APPPATH . 'ThirdParty/ssp.php';
    $this->db = db_connect();
  }

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

  public function usersPage()
  {
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
        'blog_email' => [
          'rules' => 'required|valid_email',
          'errors' => [
            'required' => 'Blog Email is required',
            'valid_email' => 'Invalid Email Address'
          ]
        ]
      ]);

      if ($validation->run() === FALSE) {
        $errors = $validation->getErrors();
        return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'error' => $errors]);
      } else {
        $settings = new SettingsModel();
        $setting_id = $settings->asObject()->first()->id;
        $update = $settings->where('id', $setting_id)
          ->set([
            'blog_title' => $request->getVar('blog_title'),
            'blog_email' => $request->getVar('blog_email'),
            'blog_phone' => $request->getVar('blog_phone'),
            'blog_meta_keywords' => $request->getVar('blog_meta_keywords'),
            'blog_meta_desc' => $request->getVar('blog_meta_desc'),
          ])->update();

        if ($update) {
          return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => 'Good. General Settings Updated Successfully']);
        } else {
          return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Something went wrong']);
        }
      }
    }
  }

  public function updateLogo()
  {
    $request = \Config\Services::request();

    if ($request->isAJAX()) {
      $settings = new SettingsModel();
      $path = 'images/blog/';
      $file = $request->getFile('blog_logo');
      $setting_data = $settings->asObject()->first();
      $old_logo = $setting_data->blog_logo;
      $new_filename = 'CI4blog_logo' . $file->getRandomName();

      if ($file->move($path, $new_filename)) {
        if ($old_logo != null && file_exists($path . $old_logo)) {
          unlink($path . $old_logo);
        }
        $update = $settings->where('id', $setting_data->id)
          ->set(['blog_logo' => $new_filename])
          ->update();
        if ($update) {
          return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => 'Done! Uploading CI4 Logo has been successfully updated']);
        } else {
          return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Something wen wrong on updating new Logo info']);
        }
      } else {
        return json_encode(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Something went wrong on uploading a new logo']);
      }
    }
  }

  public function updateFavicon()
  {
    $request = \Config\Services::request();

    if ($request->isAJAX()) {
      $settings = new SettingsModel();
      $path = 'images/blog/';
      $file = $request->getFile('blog_favicon');
      $setting_data = $settings->asObject()->first();
      $old_favicon = $setting_data->blog_favicon;
      $new_filename = 'favicon_' . $file->getRandomName();

      if ($file->move($path, $new_filename)) {
        if ($old_favicon != null && file_exists($path . $old_favicon)) {
          unlink($path . $old_favicon);
        }

        $update = $settings->where('id', $setting_data->id)
          ->set(['blog_favicon' => $new_filename])
          ->update();

        if ($update) {
          return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => 'Done!! Favicon has been updated successfully']);
        } else {
          return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Something wen wrong on updating new Logo info']);
        }
      } else {
        return json_encode(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Something went wrong on uploading new Favicon']);
      }
    }
  }


  public function updateSocialMedia()
  {
    $request = \Config\Services::request();

    if ($request->isAJAX()) {
      $validation = \Config\Services::validation();
      $this->validate([
        'facebook_url' => [
          'rules' => 'permit_empty|valid_url_strict',
          'errors' => [
            'valid_url_strict' => 'Invalid Facebook URL',
          ]
        ],
        'twitter_url' => [
          'rules' => 'permit_empty|valid_url_strict',
          'errors' => [
            'valid_url_strict' => 'Invalid Twitter URL',
          ]
        ],
        'instagram_url' => [
          'rules' => 'permit_empty|valid_url_strict',
          'errors' => [
            'valid_url_strict' => 'Invalid Instagram URL',
          ]
        ],
        'youtube_url' => [
          'rules' => 'permit_empty|valid_url_strict',
          'errors' => [
            'valid_url_strict' => 'Invalid YouTube URL',
          ]
        ],
        'github_url' => [
          'rules' => 'permit_empty|valid_url_strict',
          'errors' => [
            'valid_url_strict' => 'Invalid GitHub URL',
          ]
        ],
        'linkedin_url' => [
          'rules' => 'permit_empty|valid_url_strict',
          'errors' => [
            'valid_url_strict' => 'Invalid LinkedIn URL',
          ]
        ],
      ]);

      if ($validation->run() === FALSE) {
        $errors = $validation->getErrors();
        return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'error' => $errors]);
      } else {
        // return $this->response->setJSON(['status'=>1, 'token'=>csrf_hash(), 'msg'=>'Form Validated....']);
        $social_media = new SocialMediaModel();
        $social_media_id = $social_media->asObject()->first()->id;
        $update = $social_media->where('id', $social_media_id)
          ->set([
            'facebook_url' => $request->getVar('facebook_url'),
            'twitter_url' => $request->getVar('twitter_url'),
            'instagram_url' => $request->getVar('instagram_url'),
            'youtube_url' => $request->getVar('youtube_url'),
            'github_url' => $request->getVar('github_url'),
            'linkedin_url' => $request->getVar('linkedin_url'),
          ])->update();
        if ($update) {
          return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => 'Done!! User Settings Social Media have been successfully updated.']);
        } else {
          return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Something went wrong on updating users social media.']);
        }
      }
    }
  }
  // Start of Employee Page
  //Employee Page
  public function employee()
  {
    $data = array(
      'pageTitle' => 'Employee Page || CI4 HRIS Test'
    );
    return view('backend/pages/201file/employees/employee', $data);
  }

  //Create Employee
  public function addEmployee()
  {
    $request = \Config\Services::request();

    if ($request->isAJAX()) {
      $validation = \Config\Services::validation();

      $this->validate([
        'emp_firstname' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Please, Enter your First Name'
          ]
        ],
        // 'emp_midname' => [
        //   'rules' => 'required',
        //   'errors' => [
        //     'required' => 'Please, Enter your Middle Name'
        //   ]
        // ],
        'emp_lastname' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Please, Enter your Last name'
          ]
        ],
        'emp_email_add' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Please, Enter your Email Address'
          ]
        ],
        'emp_contact_no' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Please, Enter your Contact No.'
          ]
        ]
      ]);

      if ($validation->run() === FALSE) {
        $errors = $validation->getErrors();
        return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'error' => $errors]);
      } else {
        // return $this->response->setJSON(['status'=>1,'token'=>csrf_hash(),'msg'=>'Employee Form Created Successfully....']);

        $employee = new EmployeesModel();
        $save = $employee->save([
          'emp_id_no' => $request->getVar(['emp_id_no']),
          'emp_firstname' => $request->getVar(['emp_firstname']),
          'emp_midname' => $request->getVar(['emp_midname']),
          'emp_lastname' => $request->getVar(['emp_lastname']),
          'emp_dob' => $request->getVar(['emp_dob']),
          'emp_pob' => $request->getVar(['emp_pob']),
          'emp_location_add' => $request->getVar(['emp_location_add']),
          'emp_email_add' => $request->getVar(['emp_email_add']),
          'emp_contact_no' => $request->getVar(['emp_contact_no']),
        ]);

        if ($save) {
          return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => 'New Employee has been created successfully']);
        } else {
          return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Something went wrong']);
        }
      }
    }
  }

  //get Employees
  public function getEmployees()
  {
    //DB Details
    $dbDetails = array(
      "host" => $this->db->hostname,
      "user" => $this->db->username,
      "pass" => $this->db->password,
      "db" => $this->db->database
    );

    $table = "employees";
    $primarykey = "id";
    $columns = array(
      array(
        "db" => "id",
        "dt" => 0
      ),
      array(
        "db" => "emp_id_no",
        "dt" => 1,
        "formatter" => function ($d, $row) {
          return "FFI - " . $row['emp_id_no'] . " ";
        }
      ),
      array(
        "db" => "emp_firstname",
        "dt" => 2
      ),
      array(
        "db" => "emp_midname",
        "dt" => 3,
        // "formatter"=>function($d, $row){
        //   return substr($row['emp_middlename'], 0).".";
        // }
      ),
      array(
        "db" => "emp_lastname",
        "dt" => 4
      ),
      // array(
      //   "db" => "emp_dob",
      //   "dt" => 5
      // ),
      // array(
      //   "db" => "emp_pob",
      //   "dt" => 6
      // ),
      // array(
      //   "db" => "emp_location_add",
      //   "dt" => 7
      // ),
      array(
        "db" => "emp_email_add",
        "dt" => 5
      ),
      // array(
      //   "db" => "emp_contact_no",
      //   "dt" => 9
      // ),
      array(
        "db" => "id",
        "dt" => 6,
        "formatter" => function ($d, $row) {
          return "<div class='btn-group'>
            <button class='btn btn-success btn-sm rounded-pill p-2 mx-1 editEmployeeBtn' data-toggle='tooltip' title='Edit Info' data-id='" . $row['id'] . "'>
              <span class='micon ti-pencil-alt'></span>
            </button>
            <button class='btn btn-info btn-sm rounded-pill p-2 mx-1 viewEmployeeBtn' data-toggle='tooltip' title='View Info' data-id='" . $row['id'] . "'>
              <span class='micon ti-search'></span>
            </button>
            <button class='btn btn-danger btn-sm rounded-pill p-2 mx-1 deleteEmployeeBtn' data-toggle='tooltip' title='Delete Info' data-id='" . $row['id'] . "'>
              <span class='micon ti-trash'></span>
            </button>
          </div>";
        }
      ),
      array(
        "db" => "ordering",
        "dt" => 7
      )
    );

    return json_encode(
      SSP::simple($_GET, $dbDetails, $table, $primarykey, $columns)
    );
  }

  //get employee id for update
  public function getEmployee()
  {
    $request = \Config\Services::request();

    if ($request->isAJAX()) {
      $id = $request->getVar('employee_id');
      $employee = new EmployeesModel();
      $employee_data = $employee->find($id);
      return $this->response->setJSON(['data' => $employee_data]);
    }
  }

  public function updateEmployee()
  {
    $request = \Config\Services::request();

    if ($request->iSAJAX()) {
      $id = $request->getVar('employee_id');
      $validation = \Config\Services::validation();

      $this->validate([
        'emp_firstname' => [
          'rules' => 'required',
          'error' => [
            'required' => 'Please update your first name'
          ]
        ],
        // 'emp_midname' => [
        //   'rules' => 'required',
        //   'error' => [
        //     'required' => 'Please update your middle name'
        //   ]
        // ],
        'emp_lastname' => [
          'rules' => 'required',
          'error' => [
            'required' => 'Please update your last name'
          ]
        ],
        'emp_email_add' => [
          'rules' => 'required',
          'error' => [
            'required' => 'Please update your email'
          ]
        ],
        'emp_contact_no' => [
          'rules' => 'required',
          'error' => [
            'required' => 'Please update your contact no'
          ]
        ]
      ]);

      if ($validation->run() === FALSE) {
        $errors = $validation->getErrors();
        return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'error' => $errors]);
      } else {
        # code...
        // return $this->response->setJSON(['status'=> 1, 'token'=>csrf_hash(), 'msg'=>'I DONT FEAR YOU N**GA']);
        $employees = new EmployeesModel();
        $update = $employees->where('id', $id)
          ->set([
            'emp_id_no' => $request->getVar(['emp_id_no']),
            'emp_firstname' => $request->getVar(['emp_firstname']),
            'emp_midname' => $request->getVar(['emp_midname']),
            'emp_lastname' => $request->getVar(['emp_lastname']),
            'emp_dob' => $request->getVar(['emp_dob']),
            'emp_pob' => $request->getVar(['emp_pob']),
            'emp_location_add' => $request->getVar(['emp_location_add']),
            'emp_email_add' => $request->getVar(['emp_email_add']),
            'emp_contact_no' => $request->getVar(['emp_contact_no'])
          ])->update();

        if ($update) {
          return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => 'Employee has been updated successfully']);
        } else {
          return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Something went wrong']);
        }
      }
    }
  }

  public function deleteEmployee()
  {
    $request = \Config\Services::request();

    if ($request->isAJAX()) {
      $id = $request->getVar('employee_id');
      $employees = new EmployeesModel();
      $delete = $employees->where('id', $id)->delete();
      // $delete = $employees->delete($id);

      if ($delete) {
        return $this->response->setJSON(['status' => 1, 'msg' => 'Employee has been successfully deleted']);
      } else {
        return $this->response->setJSON(['status' => 0, 'msg' => 'Something went wrong']);
      }
    }
  }
  // End of Employee Page

  //Department Page
  public function department(){
    $data = array(
      'pageTitle' => 'Department Page || CI4 HRIS Test'
    );
    return view('backend/pages/201file/department/department', $data);
  }

  // Add Department
  public function addDepartment()
  {
    $request = \Config\Services::request();

    if ($request->isAJAX()) {
      $validation = \Config\Services::validation();

      $this->validate([
        'dept_id_no' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Please enter Department ID No.'
          ]
        ],
        'dept_code' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Please enter Department Code.'
          ]
        ],
        'dept_name' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Please enter Department Name.'
          ]
        ]
      ]);

      if ($validation->run() === FALSE) {
        $errors = $validation->getErrors();
        return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'error' => $errors]);
      } else {

        $department = new DepartmentModel();
        $save = $department->save([
          'dept_id_no' => $request->getVar(['dept_id_no']),
          'dept_code' => $request->getVar(['dept_code']),
          'dept_name' => $request->getVar(['dept_name']),
        ]);

        if ($save) {
          return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => 'New Department has been created successfully']);
        } else {
          return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Something went wrong']);
        }
      }
    }
  }

  // View Department List
  public function getDepartment(){

    //DB Details
    $dbDetails = array(
      "host" => $this->db->hostname,
      "user" => $this->db->username,
      "pass" => $this->db->password,
      "db" => $this->db->database
    );

    $table = "departments";
    $primarykey = "id";
    $columns = array(
      array(
        "db" => "id",
        "dt" => 0
      ),
      array(
        "db" => "dept_id_no",
        "dt" => 1,
        "formatter" => function ($d, $row) {
          return "FFI - " . $row['dept_id_no'] . " ";
        }
      ),
      array(
        "db" => "dept_code",
        "dt" => 2
      ),
      array(
        "db" => "dept_name",
        "dt" => 3,
      ),
      array(
        "db" => "id",
        "dt" => 4,
        "formatter" => function ($d, $row) {
          return "<div class='btn-group'>
            <button class='btn btn-success btn-sm rounded-pill p-2 mx-1 editDepartmentBtn' data-toggle='tooltip' title='Edit Info' data-id='" . $row['id'] . "'>
              <span class='micon ti-pencil-alt'></span>
            </button>
            <button class='btn btn-info btn-sm rounded-pill p-2 mx-1 viewDepartmentBtn' data-toggle='tooltip' title='View Info' data-id='" . $row['id'] . "'>
              <span class='micon ti-search'></span>
            </button>
            <button class='btn btn-danger btn-sm rounded-pill p-2 mx-1 deleteDepartmentBtn' data-toggle='tooltip' title='Delete Info' data-id='" . $row['id'] . "'>
              <span class='micon ti-trash'></span>
            </button>
          </div>";
        }
      ),
      array(
        "db" => "ordering",
        "dt" => 5
      )
    );

    return json_encode(
      SSP::simple($_GET, $dbDetails, $table, $primarykey, $columns)
    );
  }

  // get department id
  public function getDept(){
    $request = \Config\Services::request();

    if ($request->isAJAX()) {
      $id = $request->getVar('department_id');
      $department = new DepartmentModel();
      $department_data = $department->find($id);
      return $this->response->setJSON(['data' => $department_data]);
    } 
  }

  // Edit Department
  public function updateDepartment(){
    $request = \Config\Services::request();

    if( $request->isAJAX() ){
      $id = $request->getVar('department_id');
      $validation = \Config\Services::validation();

      $this->validate([
        'dept_id_no' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Please edit Department ID No.'
          ]
        ],
        'dept_code' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Please edit Department Code.'
          ]
        ],
        'dept_name' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Please edit Department Name.'
          ]
        ]
      ]);

      if ( $validation->run() === FALSE ) {
        $errors = $validation->getErrors();
        return $this->response->setJSON(['status'=>0,'token'=>csrf_hash(), 'error'=>$errors]);
      } else {
        // return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => 'I DONT FEAR YOU NIGGA']);
        $department = new DepartmentModel();
        $update = $department->where('id',$id)
                             ->set([
                              'dept_id_no' => $request->getVar(['dept_id_no']),
                              'dept_code' => $request->getVar(['dept_code']),
                              'dept_name' => $request->getVar(['dept_name'])        
                             ])->update();  
        if ( $update ) {
          return $this->response->setJSON(['status' => 1, 'token' => csrf_hash(), 'msg' => 'Department has been updated successfully']);
        } else {
          return $this->response->setJSON(['status' => 0, 'token' => csrf_hash(), 'msg' => 'Something went wrong']);
        }
        
      }
      
    }
  }

  // Delete Department
  public function deleteDepartment(){
    $request = \Config\Services::request();

    if ( $request->isAJAX() ) {
      $id = $request->getVar('department_id');
      $department = new DepartmentModel();
      $delete = $department->where('id',$id)->delete();
      
      if ( $delete ) {
        return $this->response->setJSON(['status'=>1, 'msg'=>'Department has been successfully deleted']);
      } else {
        return $this->response->setJSON(['status'=>0, 'msg'=>'Something went wrong']);
      }
    }
  }

  //Organization Page
  public function organization()
  {
    $data = array(
      'pageTitle' => 'Orgazization Page || CI4 HRIS Test'
    );
    return view('backend/pages/201file/organization/organization', $data);
  }

  // Add Organization
  // View Organization
  // Edit Organization
  // Delete Organization

}
