<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\JobPost;
use App\Models\JobSkill;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use App\Helper\ResponseHelper;
use Illuminate\Http\JsonResponse;

class JobPostController extends Controller
{
    public function EmployerJobs(Request $request){
        return view('pages.employer-pages.employer-job-post.employer-job-page');
    }

    public function JobPostsByEmployer(Request $request):JsonResponse{
        $employerEmail = $request->header('email');
        $data = JobPost::where('employer_email', '=', $employerEmail)->get();
        return  ResponseHelper::Out('success', $data, 200); 
    }
    public function EmployerJobPostById(Request $request):JsonResponse{
        $employerEmail = $request->header('email');
        $employerId = $request->input('id');
        $data = JobPost::where('employer_email', '=', $employerEmail)->where('id', '=', $employerId)->first();
        return  ResponseHelper::Out('success', $data, 200); 
    }
    public function JobCategoryList(Request $request):JsonResponse{
        $data = JobCategory::all();
        return  ResponseHelper::Out('success', $data, 200); 
    }
    public function JobSkillList(Request $request):JsonResponse{
        $data = JobSkill::all();
        return  ResponseHelper::Out('success', $data, 200); 
    }
    public function EmployerPostCreate(Request $request):JsonResponse{
        
        try {
            $employerEmail = $request->header('email');
            $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'benefit' => 'required|string',
                'location' => 'required|string',
                'deadline' => 'required|string',
                'jobCategory' => 'required|string',
                'jobSkill' => 'required|string',
            ]);

             JobPost::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'benefit' => $request->input('benefit'),
                'location' => $request->input('location'),
                'deadline' => $request->input('deadline'),
                'employer_email' => $employerEmail,
                'job_category_id' => $request->input('jobCategory'),
                'job_skills_id' => $request->input('jobSkill')
            ]);
             
            return  ResponseHelper::Out('success', 'Post Created Successfully', 201); 
        }
        catch(Exception $e) {
            return  ResponseHelper::Out('success', $e->getMessage(), 201); 
        }
    }

    public function EmployerJobPostUpdate(Request $request):JsonResponse{
        try {
            $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'benefit' => 'required|string',
                'location' => 'required|string',
                'deadline' => 'required|string',
            ]);

            $id = $request->input('id');
            //save data to database
            JobPost::where('id','=', $id)->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'benefit' => $request->input('benefit'),
                'location' => $request->input('location'),
                'deadline' => $request->input('deadline'),
            ]);
            return  ResponseHelper::Out('success', 'Update Successfully', 200); 
        }
        catch(Exception $e) {
            return  ResponseHelper::Out('success', $e->getMessage(), 200); 
        }
    }
    public function EmployerJobPostDelete(Request $request):JsonResponse{
        try {
            JobPost::where('id',$request->input('id'))->delete();
            return  ResponseHelper::Out('success', 'Deleted Successfully', 200); 
        } catch (Exception $e) {
            return  ResponseHelper::Out('fail', $e->getMessage(), 200); 
        }

 
       
            
        
    }
    
}
