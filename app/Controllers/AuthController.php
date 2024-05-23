<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\CIAuth;
use App\Libraries\Hash;
use App\Models\UsersModel;
use App\Models\PasswordResetTokenModels;
use Carbon\Carbon;

class AuthController extends BaseController
{
	protected $helpers = ['url', 'form', 'CIMail', 'CIFunctions'];
	public function loginForm()
	{
		$data = [
			'pageTitle' => 'Login Form || CI4 HRIS Test',
			'validation' => null
		];
		return view('backend/pages/auth/login', $data);
	}

	public function loginHandler()
	{
		$fieldType = filter_var($this->request->getVar('login_id'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

		if ($fieldType == 'email') {
			$isValid = $this->validate([
				'login_id' => [
					'rules' => 'required|valid_email|is_not_unique[users.email]',
					'errors' => [
						'required' => 'Email or Username is Required',
						'valid_email' => 'Please, check the text field. It does not appear to be valid.',
						'is_not_unique' => 'Email is not exists in our system'
					]
				],
				'password' => [
					'rules' => 'required|min_length[5]|max_length[25]',
					'errors' => [
						'required' => 'Password is Required',
						'min_length' => 'Password must have atleast 8 characters in Length',
						'max_length' => 'Password must not have characters more than 25 in Length'
					]
				]
			]);
		} else {
			$isValid = $this->validate([
				'login_id' => [
					'rules' => 'required|is_not_unique[users.username]',
					'errors' => [
						'required' => 'Username is Required',
						'is_not_unique' => 'Username is not exists in our system'
					]
				],
				'password' => [
					'rules' => 'required|min_length[5]|max_length[25]',
					'errors' => [
						'required' => 'Password is Required',
						'min_length' => 'Password must have atleast 5 characters in Length',
						'max_length' => 'Password must not have characters more than 25 in Length'
					]
				]
			]);
		}

		if (!$isValid) {
			return view('/backend/pages/auth/login', [
				'pageTitle' => 'Login',
				'validation' => $this->validator
			]);
		} else {
			// echo 'Login Process';
			$user = new UsersModel();
			$userInfo = $user->where($fieldType, $this->request->getVar('login_id'))->first();
			$check_password = Hash::check($this->request->getVar('password'), $userInfo['password']);

			if (!$check_password) {
				return redirect()->route('admin.login.form')->with('fail', 'Incorrect Password')->withInput();
			} else {
				CIAuth::setCIAuth($userInfo);
				return redirect()->route('admin.home');
			}
		}
	}

	public function forgotForm()
	{
		$data = array(
			'pageTitle' => 'Forgot Password || CI4 Test HRIS',
			'validation' => null,
		);
		return view('backend/pages/auth/forgot', $data);
	}

	public function sendPasswordResetLink()
	{
		// echo 'Send Password Link';
		$isValid = $this->validate([
			'email' => [
				'rules' => 'required|valid_email|is_not_unique[users.email]',
				'errors' => [
					'required' => 'Email is Required',
					'valid_email' => 'Please check the email field. It does not appears to be valid',
					'is_not_unique' => 'Email is not exists in system'
				]
			]
		]);

		if (!$isValid) {
			return view('backend/pages/auth/forgot', [
				'pageTilte' => 'Forgot Password || CI4 HRIS',
				'validation' => $this->validator,
			]);
		} else {
			// echo 'Email Token Validated';
			$user = new UsersModel();
			$user_info = $user->where('email', $this->request->getVar('email'))->first();

			//Generating Token
			$token = bin2hex(openssl_random_pseudo_bytes(65));

			//Get reset password token
			$password_reset_token = new PasswordResetTokenModels();
			$isOldTokenExists = $password_reset_token->asObject()->where('email', $user_info->email)->first();

			if ($isOldTokenExists) {
				//Update Existing Tokens
				$password_reset_token->where('email', $user_info->email)
					->set(['token' => $token, 'created_at' => Carbon::now()])
					->update();
			} else {
				$password_reset_token->insert([
					'email' => $user_info->email,
					'token' => $token,
					'created_at' => Carbon::now()
				]);
			}

			// Create an Action Link
			// $actionLink = route_to('admin.reset-password', $token);
			$actionLink = base_url('admin.reset-password', $token);


			$mail_data = array(
				'actionLink' => $actionLink,
				'user' => $user_info,
			);

			$view = \Config\Services::renderer();
			$mail_body =  $view->setVar('mail_data', $mail_data)->render('email-templates/forgot-email-template');

			$mailConfig = array(
				'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
				'mail_from_name' => env('EMAIL_FROM_NAME'),
				'mail_recipient_email' => $user_info->email,
				'mail_recipient_name' => $user_info->name,
				'mail_subject' => 'Reset Password',
				'mail_body' => $mail_body
			);

			//Send Email

			if (sendEmail($mailConfig)) {
				return redirect()->route('admin.forgot.form')->with('success', 'We have E-Mailed your password reset link.');
			} else {
				return redirect()->route('admin.forgot.form')->with('fail', 'Something went wrong');
			}
		}
	}

	public function resetPassword($token)
	{
		$passwordResetPassword = new PasswordResetTokenModels();
		$check_token = $passwordResetPassword->asObject()->where('token', $token)->first();

		if (!$check_token) {
			return redirect()->route('admin.forgot.form')->with('fail', 'Invalid Token. Request another reset password link.');
		} else {
			# check if token not expired (Not older than 15 minutes)
			$diffMins = Carbon::createFromFormat('Y-m-d H:i:s', $check_token->created_at)->diffInMinutes(Carbon::now());

			if ($diffMins > 15) {
				# if token expired (older than 15 minutes)
				return redirect()->route('admin.forgot.form')->with('fail', 'Token expired. Request another reset password link.');
			} else {
				return view('backend/pages/auth/reset', [
					'pageTitle' => 'Reset Password || CI4 HRtest',
					'validation' => null,
					'token' => $token,
				]);
			}
		}
	}

	public function resetPasswordHandler($token)
	{
		// echo $token;
		$isValid = $this->validate([
			'new_password' => [
				'rules' => 'required|min_length[5]|max_length[20]|is_password_strong[new_password]',
				'erros' => [
					'required' => 'Enter new password',
					'min_lengths' => 'New password must have atleast minimum of 5 characters. ',
					'max_length' => 'New password must have atleast maximum of 20 characters. ',
					'is_password_strong' => 'New password must contains atleast 1 capital, 1 small, 1 number and 1 special character. ',
				]
			],
			'confirm_new_password' => [
				'rules' => 'required|matches[new_password]',
				'errors' => [
					'required' => 'Confirm New Password',
					'matches' => 'Passwords not matches'
				]
			]
		]);

		if (!$isValid) {
			return view('backend/pages/auth/reset', [
				'pageTitle' => 'Reset Password || CI4 HRIS Test',
				'validation' => null,
				'token' => $token
			]);
		} else {
			//Get Token Details
			$passwordResetPassword = new PasswordResetTokenModels();
			$get_token = $passwordResetPassword->asObject()->where('token', $token)->first();

			//Get User (admin) details
			$user = new UsersModel();
			$user_info = $user->asObject()->where('email', $get_token->email)->first();

			if (!$get_token) {
				return redirect()->back()->with('fail', 'Invalid Token!!')->withInput();
			} else {
				# Update admin password in DB
				$user->where('email', $user_info->email)
					->set(['password' => Hash::make($this->request->getVar('new_password'))])
					->update();

				# send notification to user (admin) email address
				$mail_data = array(
					'user' => $user_info,
					'new_password' => $this->request->getVar('new_password')
				);

				$view = \Config\Services::renderer();
				$mail_body = $view->setVar('mail_data', $mail_data)->render('email-templates/password-changed-email-template');

				$mail_config = array(
					'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
					'mail_from_name' => env('EMAIL_FROM_NAME'),
					'mail_recipient_email' => $user_info->email,
					'mail_recipient_name' => $user_info->name,
					'mail_subject' => 'Password Changed',
					'mail_body' => $mail_body
				);

				if (sendEmail($mail_config)) {
					# delete token
					$passwordResetPassword->where('email', $user_info->email)->delete();

					#redirect and displaying message on the login page
					return redirect()->route('admin.login.form')->with('success', 'Done! your password has been changed successfully. Use your new password to logged in.');
				} else {
					return redirect()->back()->with('fail', 'Something went wrong')->withInput();
				}
			}
		}
	}


}
