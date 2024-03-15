<?php

namespace App\Http\Controllers;

use App\Mail\OTPMail;
use App\Models\Admin;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use App\Helper\ResponseHelper;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{


    public function AdminLoginPage(Request $request){
        return view('pages.admin-pages.admin-auth.login-page');
    }
    public function AdminSendOTPPage(Request $request){
        return view('pages.admin-pages.admin-auth.send-otp-page');
    }
    public function AdminVerifyOTPPage(Request $request){
        return view('pages.admin-pages.admin-auth.verify-otp-page');
    }
    public function AdminResetPasswordPage(Request $request){
        return view('pages.admin-pages.admin-auth.reset-pass-page');
    }

    public function adminJobs(Request $request){
        return view('pages.admin-pages.admin-job.jobs-page');
    }

    public function adminPlugins(Request $request){
        return view('pages.admin-pages.admin-plugins.plugins-page');
    }




    public function AdminLogin(Request $request):JsonResponse{
        
        $user = Admin::where('email', '=', $request->input('email'))
                        ->where('password', '=', $request->input('password'))
                        ->where('role', '=', 1)
                        ->first();
        
        if ($user !== null) {
            $token = JWTToken::CreateToken($request->input('email'), $user->id, $user->role);
            return ResponseHelper::Out('success', 'Login Successfully', 200)->cookie('token', $token, 60*24*30);
        } else {
            return ResponseHelper::Out('fail','Login Fail', 401);
        }
                        
    }

    public function sendOTPCode(Request $request):JsonResponse{
        try {
            $email = $request->input('email');
            $otp = rand(1000,9999);                
            
                Mail::to($email)->send(new OTPMail($otp));
                Admin::where('email', '=', $email)
                            ->update(['otp' => $otp]);
                
                return ResponseHelper::Out('success', 'A 4 Digit OTP Email Has Been Send', 200);
    
        } catch (Exception $e) {
            return ResponseHelper::Out('fail',$e->getMessage(), 200);
        }
    }

    public function verifyOTP(Request $request):JsonResponse{
        $email = $request->input('email');
        $otp = $request->input('otp');
        
        $admin = Admin::where('email','=',$email)->where('otp','=',$otp)->first();
        if($admin){
            Admin::where('email','=',$email)->where('otp','=',$otp)->update(['otp'=>'0']);
            $token = JWTToken::CreateToken($email, $admin->id, $admin->role);
            return ResponseHelper::Out('success', 'verify Successfully', 200)->cookie('token', $token, 60*24*30);
        } else {
            return ResponseHelper::Out('fail', 'Verify Fail', 401);
        }
    }

    
    public function resetPassword(Request $request):JsonResponse{
        try {
            $email = $request->header('email');
            $password = $request->input('password');
    
                Admin::where('email', '=', $email)->update(['password' => $password]);
                
                return ResponseHelper::Out('success', 'Password Reset Successfully', 200)->cookie('token', '', -1);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', $e->getMessage(), 401);
        } 
    }

    
    function UserLogout(){
        return redirect('/adminLogin')->cookie('token','',-1);
    }

}
