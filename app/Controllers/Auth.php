<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
 public function login()
 {
  return view('auth/login');
 }

 public function loginPost()
 {
  helper(['form']);

  if ($this->request->getMethod() === 'POST') {
   $email    = $this->request->getPost('email');
   $password = $this->request->getPost('password');

   $userModel = new \App\Models\UserModel();
   $user = $userModel->where('email', $email)->first();

   if ($user && password_verify($password, $user['password'])) {
    // ✅ Set session data
    session()->set([
     'user'        => [
      'id'    => $user['id'],
      'name'  => $user['name'],
      'email' => $user['email'],
     ],
     'isLoggedIn' => true
    ]);

    return redirect()->to('/dashboard');
   } else {
    return redirect()->back()->with('error', 'Invalid email or password.');
   }
  }

  return view('auth/login');
 }

 public function register()
 {
  return view('auth/register');
 }

 public function registerPost()
 {
  $model = new UserModel();

  $email = $this->request->getPost('email');
  $password = $this->request->getPost('password');
  $confirm = $this->request->getPost('confirm_password');

  if ($password !== $confirm) {
   return redirect()->back()->with('error', 'Passwords do not match.');
  }

  if ($model->where('email', $email)->first()) {
   return redirect()->back()->with('error', 'Email already registered.');
  }

  $model->save([
   'email' => $email,
   'password' => password_hash($password, PASSWORD_DEFAULT),
  ]);

  return redirect()->to('/login')->with('success', 'Registration successful! Please log in.');
 }

 public function forgotPassword()
 {
  return view('auth/forgot');
 }

 public function sendResetLink()
 {
  $email = $this->request->getPost('email');
  $user = (new UserModel())->where('email', $email)->first();

  if (!$user) {
   return redirect()->back()->with('error', 'Email not found.');
  }

  $token = bin2hex(random_bytes(50));
  $db = db_connect();
  $db->table('password_reset_tokens')->insert([
   'email' => $email,
   'token' => $token,
  ]);

  $resetLink = base_url("/reset-password/{$token}");
  // For now, just echo. Later, send email.
  echo "Password reset link: <a href='$resetLink'>$resetLink</a>";
  exit;
 }

 public function resetPassword($token)
 {
  return view('auth/reset', ['token' => $token]);
 }

 public function resetPasswordPost()
 {
  $token = $this->request->getPost('token');
  $password = $this->request->getPost('password');
  $confirm = $this->request->getPost('confirm_password');

  if ($password !== $confirm) {
   return redirect()->back()->with('error', 'Passwords do not match.');
  }

  $db = db_connect();
  $row = $db->table('password_reset_tokens')->where('token', $token)->get()->getRow();

  if (!$row) {
   return redirect()->to('/forgot-password')->with('error', 'Invalid token.');
  }

  $model = new UserModel();
  $model->where('email', $row->email)->set(['password' => password_hash($password, PASSWORD_DEFAULT)])->update();

  $db->table('password_reset_tokens')->where('token', $token)->delete();

  return redirect()->to('/login')->with('success', 'Password reset successful. Please log in.');
 }

 public function logout()
 {
  session()->destroy();
  return redirect()->to('/login');
 }
}
