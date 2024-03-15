<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\AdminBlogPost;
use Illuminate\Http\Request;
use App\Helper\ResponseHelper;
use Illuminate\Http\JsonResponse;

class AdminBlogPostController extends Controller
{
    public function adminBlogPost(Request $request){
        return view('pages.admin-pages.admin-blog.blogPost-page');
    }
    public function adminBlogPostList(Request $request):JsonResponse{
        $data = AdminBlogPost::all();
        return  ResponseHelper::Out('success', $data, 200); 
    }
    public function adminBlogPostCreate(Request $request):JsonResponse{
        try {
            $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'status' => 'required|in:Draft,Published',
                'blog_category_id' => 'required|string',
                'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming max size is 2MB
            ]);
            //image Processing
            if($request->hasFile('featured_image')){
                $featuredImage = $request->file('featured_image');
                $fileNameToStore = 'featured_image_'.md5(uniqid()).time() . '.' . $featuredImage->getClientOriginalExtension();
                $featuredImage->move(public_path('uploads/images/blogPost'), $fileNameToStore);
            }
            //save data to database
            $data = AdminBlogPost::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'status' => $request->input('status'),
                'featured_image' => 'uploads/images/blogPost/'.$fileNameToStore,
                'admin_blog_category_id' =>$request->input('blog_category_id'),
            ]);
             
            return  ResponseHelper::Out('success', 'Post Created Successfully', 201); 
        }
        catch(Exception $e) {
            return  ResponseHelper::Out('success', $e->getMessage(), 201); 
        }
    }
    public function adminBlogBlogsById(Request $request):JsonResponse{
        try {
            $request->validate([
                'id' => 'required|numeric', // Example validation rules
            ]);
            $data = AdminBlogPost::where('id','=', $request->input('id'))->first();

            return  ResponseHelper::Out('success',$data,200); 
        }
        catch(Exception $e) {
            return  ResponseHelper::Out('success', $e->getMessage(), 201); 
        }
    }
    public function adminBlogPostUpdate(Request $request):JsonResponse{
        try {
            $request->validate([
                'id' => 'required|numeric', // Add validation for 'id'
                'status' => 'required|in:Draft,Published',
            ]);
            $postId = $request->input('id');
            $status = $request->input('status');
            //save data to database
            AdminBlogPost::where('id',$postId)->update([
                'status'=>$status
            ]);
            return  ResponseHelper::Out('success', 'Update Successfully', 200); 
        }
        catch(Exception $e) {
            return  ResponseHelper::Out('success', $e->getMessage(), 201); 
        }
    }
    public function adminBlogPostDelete(Request $request):JsonResponse{
        $post = AdminBlogPost::where('id',$request->input('id'))->first();
        $removeFile = unlink(public_path($post->featured_image));
        if($removeFile){
            AdminBlogPost::where('id',$request->input('id'))->delete();
            return  ResponseHelper::Out('success', 'Deleted Successfully', 200); 
        }else{
            return  ResponseHelper::Out('fail', 'Deleted Failed', 200); 
        }

    }
}
