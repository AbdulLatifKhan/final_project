<?php

namespace App\Http\Controllers;

use Exception;
use App\Mail\OTPMail;
use App\Helper\JWTToken;
use App\Models\Employer;
use Illuminate\Http\Request;
use App\Helper\ResponseHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class EmployerController extends Controller
{
    public function EmployerLoginPage(Request $request){
        return view('pages.employer-pages.employer-auth.login-page');
    }

    public function EmployerSendOTPPage(Request $request){
        return view('pages.employer-pages.employer-auth.send-otp-page');
    }
    public function EmployerVerifyOTPPage(Request $request){
        return view('pages.employer-pages.employer-auth.verify-otp-page');
    }
    public function EmployerResetPasswordPage(Request $request){
        return view('pages.employer-pages.employer-auth.reset-pass-page');
    }
    public function EmployerLogin(Request $request):JsonResponse{
        
        $user = Employer::where('email', '=', $request->input('email'))
                        ->where('password', '=', $request->input('password'))
                        ->where('role', '=', 2)
                        ->first();
        
        if ($user !== null) {
            $token = JWTToken::CreateToken($request->input('email'), $user->id, $user->role);
            return ResponseHelper::Out('success', 'Login Successfully', 200)->cookie('token', $token, 60*24*30);
        } else {
            return ResponseHelper::Out('fail','Login Fail', 401);
        }
                        
    }

    public function EmployerSendOTPCode(Request $request):JsonResponse{
        try {
            $email = $request->input('email');
            $otp = rand(1000,9999);                
            
                Mail::to($email)->send(new OTPMail($otp));
                Employer::where('email', '=', $email)
                            ->update(['otp' => $otp]);
                
                return ResponseHelper::Out('success', 'A 4 Digit OTP Email Has Been Send', 200);
    
        } catch (Exception $e) {
            return ResponseHelper::Out('fail',$e->getMessage(), 200);
        }
    }


    public function EmployerVerifyOTP(Request $request):JsonResponse{
        $email = $request->input('email');
        $otp = $request->input('otp');
        
        $employer = Employer::where('email','=',$email)->where('otp','=',$otp)->first();
        if($employer){
            Employer::where('email','=',$email)->where('otp','=',$otp)->update(['otp'=>'0']);
            $token = JWTToken::CreateToken($email, $employer->id, $employer->role);
            return ResponseHelper::Out('success', 'verify Successfully', 200)->cookie('token', $token, 60*24*30);
        } else {
            return ResponseHelper::Out('fail', 'Verify Fail', 401);
        }
    }

    public function EmployerResetPassword(Request $request):JsonResponse{
        try {
            $email = $request->header('email');
            $password = $request->input('password');
    
            Employer::where('email', '=', $email)->update(['password' => $password]);
                
                return ResponseHelper::Out('success', 'Password Reset Successfully', 200)->cookie('token', '', -1);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', $e->getMessage(), 401);
        } 
    }
    
}
