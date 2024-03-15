<?php

namespace App\Http\Controllers;

use Exception;
use App\Mail\OTPMail;
use App\Helper\JWTToken;
use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Helper\ResponseHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class CandidateController extends Controller
{
    public function CandidateLoginPage(Request $request){
        return view('pages.candidate-pages.candidate-auth.login-page');
    }
    public function CandidateSendOTPPage(Request $request){
        return view('pages.candidate-pages.candidate-auth.send-otp-page');
    }
    public function CandidateVerifyOTPPage(Request $request){
        return view('pages.candidate-pages.candidate-auth.verify-otp-page');
    }
    public function CandidateResetPasswordPage(Request $request){
        return view('pages.candidate-pages.candidate-auth.reset-pass-page');
    }

    public function CandidateLogin(Request $request):JsonResponse{
        
        $user = Candidate::where('email', '=', $request->input('email'))
                        ->where('password', '=', $request->input('password'))
                        ->where('role', '=', 3)
                        ->first();
        
        if ($user !== null) {
            $token = JWTToken::CreateToken($request->input('email'), $user->id, $user->role);
            return ResponseHelper::Out('success', 'Login Successfully', 200)->cookie('token', $token, 60*24*30);
        } else {
            return ResponseHelper::Out('fail','Login Fail', 401);
        }
                        
    }
    public function CandidateSendOTPCode(Request $request):JsonResponse{
        try {
            $email = $request->input('email');
            $otp = rand(1000,9999);                
            
                Mail::to($email)->send(new OTPMail($otp));
                Candidate::where('email', '=', $email)
                            ->update(['otp' => $otp]);
                
                return ResponseHelper::Out('success', 'A 4 Digit OTP Email Has Been Send', 200);
    
        } catch (Exception $e) {
            return ResponseHelper::Out('fail',$e->getMessage(), 200);
        }
    }

    public function CandidateVerifyOTP(Request $request):JsonResponse{
        $email = $request->input('email');
        $otp = $request->input('otp');
        
        $candidate = Candidate::where('email','=',$email)->where('otp','=',$otp)->first();
        if($candidate){
            Candidate::where('email','=',$email)->where('otp','=',$otp)->update(['otp'=>'0']);
            $token = JWTToken::CreateToken($email, $candidate->id, $candidate->role);
            return ResponseHelper::Out('success', 'verify Successfully', 200)->cookie('token', $token, 60*24*30);
        } else {
            return ResponseHelper::Out('fail', 'Verify Fail', 401);
        }
    }

    public function CandidateResetPassword(Request $request):JsonResponse{
        try {
            $email = $request->header('email');
            $password = $request->input('password');
    
            Candidate::where('email', '=', $email)->update(['password' => $password]);
                
                return ResponseHelper::Out('success', 'Password Reset Successfully', 200)->cookie('token', '', -1);
        } catch (Exception $e) {
            return ResponseHelper::Out('fail', $e->getMessage(), 401);
        } 
    }

}
