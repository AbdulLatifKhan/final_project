<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\AdminUserContactPageManage;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    public function ContactPage(){
        return view('pages.users-pages.users-contact.contactPage');
     }

     public function ContactPageInfo(Request $request):JsonResponse{
        $data = AdminUserContactPageManage::first();
        return  ResponseHelper::Out('success', $data, 200); 
    }
}
