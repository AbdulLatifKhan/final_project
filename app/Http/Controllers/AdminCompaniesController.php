<?php

namespace App\Http\Controllers;
use App\Models\Employer;
use Illuminate\Http\Request;
use App\Helper\ResponseHelper;
use Illuminate\Http\JsonResponse;

class AdminCompaniesController extends Controller
{
    public function adminCompanies(Request $request){
        return view('pages.admin-pages.admin-company.companies-page');
    }

    public function adminCompaniesList(Request $request):JsonResponse{
        $data = Employer::all();
        // $status = ucwords($request->input('status'));
        // $data = Employer::where('status','=',$status)->get();
        return  ResponseHelper::Out('success', $data, 200); 
    }
    public function adminCompaniesById(Request $request):JsonResponse{
        $data = Employer::where('id','=',$request->input('id'))->first();
        return  ResponseHelper::Out('success', $data, 200); 
    }
    public function adminCompaniesStatusUpdate(Request $request):JsonResponse{
        Employer::where('id',$request->input('id'))->update([
            'status'=>$request->input('status'),
        ]);
        return  ResponseHelper::Out('success', 'Update Successfully', 200); 
    }
    public function adminCompaniesDelete(Request $request):JsonResponse{
        Employer::where('id',$request->input('id'))->delete();
        return  ResponseHelper::Out('success', 'Deleted Successfully', 200); 
    }
}
