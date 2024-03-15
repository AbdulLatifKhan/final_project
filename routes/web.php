<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminAuthenticate;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\AdminBlogPostController;
use App\Http\Controllers\AdminCompaniesController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminBlogCategoryController;
use App\Http\Controllers\EmployerDashboardController;
use App\Http\Controllers\AdminUserContactPageManageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//------------Users Routes----------------------------------------------------
    //users page Routes--------------------------

    Route::get('/', [HomeController::class, 'HomePage']);
    Route::get('/about', [AboutController::class, 'AboutPage']);
    Route::get('/jobs', [JobsController::class, 'JobsPage']);
    Route::get('/blog', [BlogController::class, 'BlogPage']);
    Route::get('/contact', [ContactController::class, 'ContactPage']);

    Route::get('/contact-page-info', [ContactController::class, 'ContactPageInfo']);


//------------Admin Routes------------------------------------------------------

    //Admin Auth page Routes--------------------------
    Route::get('/adminLogin', [AdminController::class, 'AdminLoginPage']);
    Route::get('/adminSendOtp', [AdminController::class, 'AdminSendOTPPage']);
    Route::get('/adminVerifyOtp', [AdminController::class, 'AdminVerifyOTPPage']);
    Route::get('/adminResetPassword', [AdminController::class, 'AdminResetPasswordPage'])->middleware('admin');
    //Admin Auth Routes---------------------
    Route::post('/admin-login', [AdminController::class, 'AdminLogin']);
    Route::post('/send-otp',[AdminController::class,'sendOTPCode']);
    Route::post('/verify-otp',[AdminController::class,'verifyOTP']);
    Route::post('/reset-password',[AdminController::class,'resetPassword'])->middleware('admin');
    //Route::post('/reset-password',[AdminController::class,'resetPassword'])->middleware([AdminAuthenticate::class]);
    Route::get('/logout',[AdminController::class,'UserLogout']);


    //Admin Dashboard Pages Routes
    Route::get('/admin-dashboard', [AdminDashboardController::class, 'adminDashboard'])->middleware('admin');
    
    //Admin Companies Pages Routes
    Route::get('/admin-companies', [AdminCompaniesController::class, 'adminCompanies'])->middleware('admin');
   
    //Admin Companies Routes
    Route::get('/admin-companies-list', [AdminCompaniesController::class, 'adminCompaniesList'])->middleware('admin');
    Route::post('/admin-companies-ById', [AdminCompaniesController::class, 'adminCompaniesById'])->middleware('admin');
    Route::post('/admin-companies-status-update', [AdminCompaniesController::class, 'adminCompaniesStatusUpdate'])->middleware('admin');
    Route::post('/admin-companies-delete', [AdminCompaniesController::class, 'adminCompaniesDelete'])->middleware('admin');

    //Admin Jobs Pages Routes
    Route::get('/admin-jobs', [AdminController::class, 'adminJobs'])->middleware('admin');
    //Admin Jobs Routes

    //Admin Blogs Pages Routes
    Route::get('/admin-blogs-category', [AdminBlogCategoryController::class, 'adminBlogCategory'])->middleware('admin');
    Route::get('/admin-blogs-post', [AdminBlogPostController::class, 'adminBlogPost'])->middleware('admin');
    //Admin Blogs Routes
  
    Route::get('/admin-blogs-categoryList', [AdminBlogCategoryController::class, 'adminBlogsCategoryList'])->middleware('admin');
    Route::get('/admin-blogs-category-by-id', [AdminBlogCategoryController::class, 'adminBlogCategoryById'])->middleware('admin');
    Route::post('/admin-blogs-update', [AdminBlogCategoryController::class, 'adminBlogUpdate'])->middleware('admin');
    Route::post('/admin-blogCategory-delete', [AdminBlogCategoryController::class, 'adminBlogCategoryDelete'])->middleware('admin');
    Route::post('/admin-blog-category-create', [AdminBlogCategoryController::class, 'adminBlogCategoryCreate'])->middleware('admin');

 
    Route::get('/admin-blog-post-list', [AdminBlogPostController::class, 'adminBlogPostList'])->middleware('admin');
    Route::post('/admin-blog-post-create', [AdminBlogPostController::class, 'adminBlogPostCreate'])->middleware('admin');
    Route::post('/admin-blog-post-update', [AdminBlogPostController::class, 'adminBlogPostUpdate'])->middleware('admin');
    Route::get('/admin-blogs-post-by-id', [AdminBlogPostController::class, 'adminBlogBlogsById'])->middleware('admin');
    Route::post('/admin-blog-post-delete', [AdminBlogPostController::class, 'adminBlogPostDelete'])->middleware('admin');


    //Admin user Pages managment Routes
    Route::get('/admin-userHome-page-manage', [AdminBlogCategoryController::class, 'adminUserHomePageManage'])->middleware('admin');
    Route::get('/admin-userAbout-page-manage', [AdminBlogPostController::class, 'adminUserAboutPageManage'])->middleware('admin');
    Route::get('/admin-userJob-page-manage', [AdminBlogPostController::class, 'adminUserJobPageManage'])->middleware('admin');
    Route::get('/admin-userBlog-page-manage', [AdminBlogPostController::class, 'adminUserBlogPageManage'])->middleware('admin');
    Route::get('/admin-userContact-page-manage', [AdminUserContactPageManageController::class, 'adminUserContactPageManage'])->middleware('admin');
    //Contact Pages Routes
    Route::post('/contact-page-info-create', [AdminUserContactPageManageController::class, 'ContactPageInfoCreate'])->middleware('admin');







    Route::get('/admin-plugins', [AdminController::class, 'adminPlugins'])->middleware('admin');
    
//------------Admin Routes End------------------------------------------------------









//------------Employer routes-------------------
    //Employer auth page routes
    Route::get('/employerLogin', [EmployerController::class, 'EmployerLoginPage']);
    Route::get('/employerSendOtp', [EmployerController::class, 'EmployerSendOTPPage']);
    Route::get('/employerVerifyOtp', [EmployerController::class, 'EmployerVerifyOTPPage']);
    Route::get('/employerResetPassword', [EmployerController::class, 'EmployerResetPasswordPage'])->middleware('employer');
    //Employer auth routes
    Route::post('/employer-login', [EmployerController::class, 'EmployerLogin']);
    Route::post('/employer-send-otp',[EmployerController::class,'EmployerSendOTPCode']);
    Route::post('/employer-verify-otp',[EmployerController::class,'EmployerVerifyOTP']);
    Route::post('/employer-reset-password',[EmployerController::class,'EmployerResetPassword'])->middleware('employer');
    //Route::get('/logout',[EmployerController::class,'UserLogout']);


    //Employer Dashboard Pages Routes
    Route::get('/employerDashboard', [EmployerDashboardController::class, 'EmployerDashboard'])->middleware('employer');

    //Employer Jobs Pages Routes
    Route::get('/employer-jobs', [JobPostController::class, 'EmployerJobs'])->middleware('employer');

   //Employer Jobs Routes
   Route::get('/Job-posts-by-employer', [JobPostController::class, 'JobPostsByEmployer'])->middleware('employer');
   Route::get('/job-category-list', [JobPostController::class, 'JobCategoryList'])->middleware('employer');
   Route::get('/job-skill-list', [JobPostController::class, 'JobSkillList'])->middleware('employer');
   Route::post('/employer-post-create', [JobPostController::class, 'EmployerPostCreate'])->middleware('employer');
   Route::get('/employer-job-post-by-id', [JobPostController::class, 'EmployerJobPostById'])->middleware('employer');
   Route::get('/employer-job-post-by-id', [JobPostController::class, 'EmployerJobPostById'])->middleware('employer');
   Route::post('/employer-job-post-update', [JobPostController::class, 'EmployerJobPostUpdate'])->middleware('employer');
   Route::post('/employer-job-post-delete', [JobPostController::class, 'EmployerJobPostDelete'])->middleware('employer');












    //
//------------Candidate routes-------------------
    //Candidate auth page routes
    Route::get('/candidateLogin', [CandidateController::class, 'CandidateLoginPage']);
    Route::get('/candidateSendOtp', [CandidateController::class, 'CandidateSendOTPPage']);
    Route::get('/candidateVerifyOtp', [CandidateController::class, 'CandidateVerifyOTPPage']);
    Route::get('/candidateResetPassword', [CandidateController::class, 'CandidateResetPasswordPage'])->middleware('candidate');    

    //Employer auth routes
    Route::post('/candidate-login', [CandidateController::class, 'CandidateLogin']);
    Route::post('/candidate-send-otp',[CandidateController::class,'CandidateSendOTPCode']);
    Route::post('/candidate-verify-otp',[CandidateController::class,'CandidateVerifyOTP']);
    Route::post('/candidate-reset-password',[CandidateController::class,'CandidateResetPassword'])->middleware('candidate');
    //Route::get('/logout',[CandidateController::class,'UserLogout']);


    
    