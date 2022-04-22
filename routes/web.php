<?php

use App\Http\Controllers\Admin\CategoryNewsController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\LandController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SelfInforController;
use App\Http\Controllers\Admin\UploadImgController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\NongNghiep\ForumController;
use App\Http\Controllers\NongNghiep\LandsController as NongNghiepLandsController;
use App\Http\Controllers\NongNghiep\MainController as NongNghiepMainController;
use App\Http\Controllers\NongNghiep\NewsController as NongNghiepNewsController;
use App\Http\Controllers\NongNghiep\SignInController;
use App\Http\Controllers\NongNghiep\SignUpController;
use App\Http\Controllers\NongNghiep\UserController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Nong Nghiệp Xanh

Route::get('/', [NongNghiepMainController::class, 'index']);
Route::get('/sign-up', [SignUpController::class, 'index']);
Route::post('/sign-up/create', [SignUpController::class, 'create']);

Route::get('/sign-in', [SignInController::class, 'index'])->name('signin');
Route::post('/sign-in/store', [SignInController::class, 'store']);
Route::get('/log-out', [SignInController::class, 'logout']);

Route::get('/account/{user}',[UserController::class, 'account'])->middleware(['user']);
Route::get('/profile/{user}',[UserController::class, 'profile'])->middleware(['user']);
Route::post('/account/{user_id}/update',[UserController::class, 'update'])->middleware(['user']);
Route::post('/account/upload/img', [UserController::class, 'uploadImg'])->middleware(['user']);
Route::post('/account/{user_id}/changepassword', [UserController::class, 'changePassword'])->middleware(['user']);

Route::get('/news/category/{news}', [NongNghiepNewsController::class, 'newsByCategory']);
Route::get('/news/detail/{news}', [NongNghiepNewsController::class, 'newsDetailByID']);
Route::post('/news/detail/{news}/{users}', [NongNghiepNewsController::class, 'commentNewsDetail']);
Route::post('/news/detail/{news}/{users}/{comments}', [NongNghiepNewsController::class, 'replyCommentNewsDetail']);



Route::get('/land', [NongNghiepLandsController::class, 'index']);



Route::get('/forum',[ForumController::class, 'index']);
Route::get('/forum/add',[ForumController::class, 'add'])->middleware(['user']);
Route::post('/forum/add/create',[ForumController::class, 'create'])->middleware(['user']);

Route::get('/forum/detail/{forum}',[ForumController::class, 'detail']);
Route::post('/forum/upload/img', [ForumController::class, 'uploadImg'])->middleware(['user']);;

Route::post('/forum/detail/{forum}/{user}/comment',[ForumController::class, 'commentForumDetail'])->middleware(['user']);
Route::post('/forum/detail/{forum}/{user}/comment/{comment}',[ForumController::class, 'replyCommentForumDetail'])->middleware(['user']);


Route::get('/searchnews',[SearchController::class, 'searchNews']);




//Administrator
Route::get('/administrator/login', [LoginController::class, 'index'])->name('login');
Route::get('/administrator/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/administrator/login/store', [LoginController::class, 'store']);
Route::post('administrator/district/getDistrictOfProvince', [DistrictController::class, 'getDistrictOfProvince']);
Route::post('administrator/commune/getCommuneOfDistrict', [CommuneController::class, 'getCommuneOfDistrict']);


Route::middleware(['auth'])->group(function () {
    Route::prefix('administrator')->group(function () {
        Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');
        
        // Department
        Route::prefix('department')->group(function () {
            Route::get('/', [DepartmentController::class, 'index']);
            Route::get('add', [DepartmentController::class, 'add']);
            Route::post('add/create', [DepartmentController::class, 'create']);
            Route::get('view/{department}', [DepartmentController::class, 'view']);
            Route::get('edit/{department}', [DepartmentController::class, 'show']);
            Route::post('update/{department}', [DepartmentController::class, 'update']);
            Route::delete('delete', [DepartmentController::class, 'delete']);
        });

        // Job
        Route::prefix('job')->group(function () {
            Route::get('/', [JobController::class, 'index']);
            Route::get('add', [JobController::class, 'add']);
            Route::post('add/create', [JobController::class, 'create']);
            Route::get('view/{job}', [JobController::class, 'view']);
            Route::get('edit/{job}', [JobController::class, 'show']);
            Route::post('update/{job}', [JobController::class, 'update']);
            Route::delete('delete', [JobController::class, 'delete']);

            Route::post('getjobbydepartment', [JobController::class, 'getJobByDepartmentAjax']);
            Route::post('getsalaryofjob', [JobController::class, 'getSalaryOfJobAjax']);

        });

        //Employee
        Route::prefix('employee')->group(function () {
            Route::get('/', [EmployeeController::class, 'index']);
            Route::get('add', [EmployeeController::class, 'add']);
            Route::post('add/create', [EmployeeController::class, 'create']);
            Route::get('view/{id}', [EmployeeController::class, 'view']);
            Route::get('edit/{id}', [EmployeeController::class, 'show']);
            Route::post('update/{id}', [EmployeeController::class, 'update']);
            Route::delete('delete', [EmployeeController::class, 'delete']);
        });



        //Category - News
        Route::prefix('category-news')->group(function () {
            Route::get('/', [CategoryNewsController::class, 'index']);
            Route::get('/add', [CategoryNewsController::class, 'add']);
            Route::post('/add/create', [CategoryNewsController::class, 'create']);
            // Route::get('/view/{id}', [CategoryNewsController::class, 'view']);
            Route::get('edit/{categorynews}', [CategoryNewsController::class, 'show']);
            Route::post('update/{categorynews}', [CategoryNewsController::class, 'update']);
            Route::delete('delete', [CategoryNewsController::class, 'delete']);
        });
        //News
        Route::prefix('news')->group(function () {
            Route::get('/', [NewsController::class, 'index']);
            Route::get('/add', [NewsController::class, 'add']);
            Route::post('/add/create', [NewsController::class, 'create']);
            Route::post('/add/upload/img', [NewsController::class, 'upload']);
            Route::get('edit/{news}', [NewsController::class, 'show']);
            Route::post('update/{news}', [NewsController::class, 'update']);
            Route::delete('delete', [NewsController::class, 'delete']);
            Route::get('view/{news}', [NewsController::class, 'view']);
        });

        //Province
        Route::prefix('province')->group(function () {
            Route::get('/', [ProvinceController::class, 'index']);
            Route::get('/add', [ProvinceController::class, 'add']);
            Route::post('/add/create', [ProvinceController::class, 'create']);
            Route::get('view/{province}', [ProvinceController::class, 'view']);
            Route::get('edit/{province}', [ProvinceController::class, 'show']);        
            Route::post('update/{province}', [ProvinceController::class, 'update']);
            Route::delete('/delete', [ProvinceController::class, 'delete']);
        });

        // District
        Route::prefix('district')->group(function () {
            Route::get('/', [DistrictController::class, 'index']);
            Route::get('/add', [DistrictController::class, 'add']);
            Route::post('/add/create', [DistrictController::class, 'create']);
            Route::get('edit/{district}', [DistrictController::class, 'show']);
            Route::post('update/{district}', [DistrictController::class, 'update']);
            Route::delete('/delete', [DistrictController::class, 'delete']);
        });
        
        // Commune
        Route::prefix('commune')->group(function () {
            Route::get('/', [CommuneController::class, 'index']);
            Route::get('/add', [CommuneController::class, 'add']);
            Route::post('/add/create', [CommuneController::class, 'create']);
            Route::get('edit/{commune}', [CommuneController::class, 'show']);
            Route::post('update/{commune}', [CommuneController::class, 'update']);
            Route::delete('/delete', [CommuneController::class, 'delete']);
            
        });


        //Lands
        Route::prefix('land')->group(function () {
            Route::get('/', [LandController::class, 'index']);
            Route::get('/add', [LandController::class, 'add']);
            Route::post('/add/create', [LandController::class, 'create']);
            Route::get('view/{lands}', [LandController::class, 'view']);
            Route::get('edit/{lands}', [LandController::class, 'show']);
            Route::post('update/{lands}', [LandController::class, 'update']);
            Route::delete('/delete', [LandController::class, 'delete']);
            Route::post('/upload/img', [LandController::class, 'uploadImg']);
        });





        Route::get('/{id}', [SelfInforController::class, 'index']);
        Route::post('/{id}/admin/update', [SelfInforController::class, 'update']);
        Route::post('/upload/{admin}/img', [UploadImgController::class, 'store']);

    });
});










