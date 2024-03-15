<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\AdminBlogCategory;
use Illuminate\Http\Request;
use App\Helper\ResponseHelper;
use Illuminate\Http\JsonResponse;

class AdminBlogCategoryController extends Controller
{
    public function adminBlogCategory(Request $request){
        return view('pages.admin-pages.admin-blog.blogCategory-page');
    }

    public function adminBlogsCategoryList(Request $request):JsonResponse{
        $data = AdminBlogCategory::all();
        return  ResponseHelper::Out('success', $data, 200); 
    }
    public function adminBlogCategoryById(Request $request):JsonResponse{
        try{
            $data = AdminBlogCategory::where('id','=', $request->input('id'))->first();
            return  ResponseHelper::Out('success', $data, 200); 
        }catch(Exception $e){
            return  ResponseHelper::Out('success', $e->getMessage(), 200);
        }
    }

    public function adminBlogUpdate(Request $request):JsonResponse{
        AdminBlogCategory::where('id',$request->input('id'))->update([
            'name'=>$request->input('name'),
        ]);
        return  ResponseHelper::Out('success', 'Update Successfully', 200); 
    }
    public function adminBlogCategoryDelete(Request $request):JsonResponse{
        AdminBlogCategory::where('id',$request->input('id'))->delete();
        return  ResponseHelper::Out('success', 'Deleted Successfully', 200); 
    }

    public function adminBlogCategoryCreate(Request $request):JsonResponse{
        $name = $request->input('name');
        AdminBlogCategory::create([
            'name'=>$name
        ]);
        return  ResponseHelper::Out('success', 'Ctreated Successfully', 201); 
    }


}
