<?php

namespace App\Http\Controllers;
use Exception;
use App\Helper\ResponseHelper;
use App\Models\AdminUserContactPageManage;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
class AdminUserContactPageManageController extends Controller
{
    public function adminUserContactPageManage(){
        return view('pages.admin-pages.admin-user-pages.admin-user-page');
     }

     public function ContactPageInfoCreate(Request $request):JsonResponse{
        try {
        
            $request->validate([
                'title' => 'required|string',
                'address' => 'required|string',
                'phoneNumber' => 'required|string',
                'email' => 'required|string',
                'bannerImg' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming max size is 2MB
            ]);
            //image Processing
            if($request->hasFile('bannerImg')){
                $bannerImg = $request->file('bannerImg');
                $fileNameToStore = 'bannerImg_'.md5(uniqid()).time() . '.' . $bannerImg->getClientOriginalExtension();
                $bannerImg->move(public_path('uploads/images/banner'), $fileNameToStore);
            }

            //save data to database
            $data = AdminUserContactPageManage::create([
                'title' => $request->input('title'),
                'bannerImg' => 'uploads/images/banner/'.$fileNameToStore,
                'address' => $request->input('address'),
                'phoneNumber' => $request->input('phoneNumber'),
                'email' =>$request->input('email'),
            ]);
             
            return  ResponseHelper::Out('success', 'Post Created Successfully', 201); 
        }
        catch(Exception $e) {
            return  ResponseHelper::Out('success', $e->getMessage(), 201); 
        }
    }
}
