<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function userLogin(Request $request) {

      $userName=$request->input('username');
      $userPassword=$request->input('password');

      $loginCheck = '';

      //$userCheck = DB::table('one_printuser')->where(['user_name' => $userName])->get();
      //$passwordCheck = DB::table('one_printuser')->where(['user_password' => $userPassword])->get();
      $message = DB::table('oneprint_user')->select('user_name','user_password','user_type')->where('user_name',$userName)->get();

      if($message[0]->user_name == null) {
         $loginCheck = "user don't exist";
      } else if ($message[0]->user_name != $userPassword) {
         $loginCheck = "password is wrong";
      } else {
         $loginCheck = "success";
      };
      
      $userMessage['username'] = $userName;
      $userMessage['logincheck'] = $loginCheck;
      $userMessage['type'] = $message[0]->user_type;
      return response()->json($userMessage);
   }

   public function userRegister(Request $request) {

      //检测是否已经被注册
      $user_name = $request->input('userName');
      $user_password = $request->input('password');
      $user_email = $request->input('email');
      $user_phonenum = $request->input('phoneNumber');
      $user_address = $request->input('address');
      $user_subrub = $request->input('subrub');
      $user_state = $request->input('state');
      $user_postcode = $request->input('postcode');

      $userCheck = DB::table('oneprint_user')->select('user_name')->where('user_name',$user_name)->get();
      if(!$userCheck->isEmpty()) {
         $register = "repeat";
         return response()->json($register);
      } else {
         DB::table('oneprint_user')->insert([
               'user_name' => $user_name,
               'user_type' => 0,
               'user_password' => $user_password,
               'user_email' => $user_email,
               'user_phonenum' => $user_phonenum,
               'user_address' => $user_address,
               'user_subrub' => $user_subrub,
               'user_state' => $user_state,
               'user_postcode' => $user_postcode
        ]);
        $register = "success";
        return response()->json($register);
      }
   }

   public function userLoginSuccess(Request $request) {
      return redirect('/userLogin');
   }
}
