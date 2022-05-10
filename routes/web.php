<?php

use App\Http\Controllers\Admin\AnimalController;
use App\Http\Controllers\Admin\CategoryAnimalController;
use App\Http\Controllers\Admin\CategoryFertilizerController;
use App\Http\Controllers\Admin\CategoryNewsController;
use App\Http\Controllers\Admin\CategoryPesticidesController;
use App\Http\Controllers\Admin\CategoryPetController;
use App\Http\Controllers\Admin\CategoryPlantController;
use App\Http\Controllers\Admin\CategoryVeterinaryMedicineController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\FertilizerController;
use App\Http\Controllers\Admin\ForumController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\LandController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PesticidesController;
use App\Http\Controllers\Admin\PlantController;
use App\Http\Controllers\Admin\SelfInforController;
use App\Http\Controllers\Admin\SoaController;
use App\Http\Controllers\Admin\SopController;
use App\Http\Controllers\Admin\UploadImgController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\VeterinaryMedicineController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\NongNghiep\AnimalController as NongNghiepAnimalController;
use App\Http\Controllers\NongNghiep\FertilizerController as NongNghiepFertilizerController;
use App\Http\Controllers\NongNghiep\ForumController as NongNghiepForumController;
use App\Http\Controllers\NongNghiep\LandsController as NongNghiepLandsController;
use App\Http\Controllers\NongNghiep\MainController as NongNghiepMainController;
use App\Http\Controllers\NongNghiep\NewsController as NongNghiepNewsController;
use App\Http\Controllers\NongNghiep\PesticidesController as NongNghiepPesticidesController;
use App\Http\Controllers\NongNghiep\PlantController as NongNghiepPlantController;
use App\Http\Controllers\NongNghiep\SignInController;
use App\Http\Controllers\NongNghiep\SignUpController;
use App\Http\Controllers\NongNghiep\SoaController as NongNghiepSoaController;
use App\Http\Controllers\NongNghiep\SopController as NongNghiepSopController;
use App\Http\Controllers\NongNghiep\UserController;
use App\Http\Controllers\NongNghiep\VeterinaryMedicineController as NongNghiepVeterinaryMedicineController;
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
// User Controller
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
// --------------------------------------------------------------------

// News Controller
Route::get('/news/category/{news}', [NongNghiepNewsController::class, 'newsByCategory']);
Route::get('/news/detail/{news}', [NongNghiepNewsController::class, 'newsDetailByID']);
Route::post('/news/detail/{news}/{users}', [NongNghiepNewsController::class, 'commentNewsDetail']);
Route::post('/news/detail/{news}/{users}/{comments}', [NongNghiepNewsController::class, 'replyCommentNewsDetail']);
// --------------------------------------------------------------------


// Land Controller
Route::get('/land', [NongNghiepLandsController::class, 'index']);
// --------------------------------------------------------------------

// Plant Controller
Route::get('/plant', [NongNghiepPlantController::class, 'index']);
Route::get('/plant/detail/{plant}', [NongNghiepPlantController::class, 'view']);

// --------------------------------------------------------------------

// Sop (Sick of plant) Controller
Route::get('/sop', [NongNghiepSopController::class, 'index']);
Route::get('/sop/detail/{sop}', [NongNghiepSopController::class, 'view']);

// --------------------------------------------------------------------


// Animal Controller
Route::get('/animal', [NongNghiepAnimalController::class, 'index']);
Route::get('/animal/detail/{animal}', [NongNghiepAnimalController::class, 'view']);

// --------------------------------------------------------------------

// Soa (Sick of animal) Controller
Route::get('/soa', [NongNghiepSoaController::class, 'index']);
Route::get('/soa/detail/{soa}', [NongNghiepSoaController::class, 'view']);

// --------------------------------------------------------------------


// Pesticides Controller
Route::get('/pesticides', [NongNghiepPesticidesController::class, 'index']);
Route::get('/pesticides/detail/{pesticides}', [NongNghiepPesticidesController::class, 'view']);

// --------------------------------------------------------------------

// Veterinary-Medicine Controller
Route::get('/veterinary-medicine', [NongNghiepVeterinaryMedicineController::class, 'index']);
Route::get('/veterinary-medicine/detail/{veterinarymedicine}', [NongNghiepVeterinaryMedicineController::class, 'view']);

// --------------------------------------------------------------------

// Fertilizer Controller
Route::get('/fertilizer', [NongNghiepFertilizerController::class, 'index']);
Route::get('/fertilizer/detail/{fertilizer}', [NongNghiepFertilizerController::class, 'view']);

// --------------------------------------------------------------------

// Forum Controller
Route::get('/forum',[NongNghiepForumController::class, 'index']);
Route::get('/forum/add',[NongNghiepForumController::class, 'add'])->middleware(['user']);
Route::post('/forum/add/create',[NongNghiepForumController::class, 'create'])->middleware(['user']);

Route::get('/forum/detail/{forum}',[NongNghiepForumController::class, 'detail']);
Route::post('/forum/upload/img', [NongNghiepForumController::class, 'uploadImg'])->middleware(['user']);;

Route::post('/forum/detail/{forum}/{user}/comment',[NongNghiepForumController::class, 'commentForumDetail'])->middleware(['user']);
Route::post('/forum/detail/{forum}/{user}/comment/{comment}',[NongNghiepForumController::class, 'replyCommentForumDetail'])->middleware(['user']);
// --------------------------------------------------------------------


// Search Controller
Route::get('/searchnews',[SearchController::class, 'searchNews']);
Route::get('/searchnews/land',[NongNghiepLandsController::class, 'searchLands']);
Route::get('/searchnews/plant',[NongNghiepPlantController::class, 'searchPlant']);
Route::get('/searchnews/sop',[NongNghiepSopController::class, 'searchSop']);
Route::get('/searchnews/soa',[NongNghiepSoaController::class, 'searchSoa']);
Route::get('/searchnews/animal',[NongNghiepAnimalController::class, 'searchAnimal']);
Route::get('/searchnews/pesticides',[NongNghiepPesticidesController::class, 'searchPesticides']);
Route::get('/searchnews/veterinary-medicine',[NongNghiepVeterinaryMedicineController::class, 'searchVeterinaryMedicine']);
Route::get('/searchnews/fertilizer',[NongNghiepFertilizerController::class, 'searchFertilizer']);
Route::get('/searchnews/forum',[NongNghiepForumController::class, 'searchForum']);
// --------------------------------------------------------------------




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
            Route::get('filter', [EmployeeController::class, 'filter']); 
        });



        //Category - News
        Route::prefix('category-news')->group(function () {
            Route::get('/', [CategoryNewsController::class, 'index']);
            Route::get('/add', [CategoryNewsController::class, 'add']);
            Route::post('/add/create', [CategoryNewsController::class, 'create']);
            Route::get('/view/{categoryNews}', [CategoryNewsController::class, 'view']);
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
            Route::get('filter', [NewsController::class, 'filter']);
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
            Route::get('filter', [ProvinceController::class, 'filter']);
        });

        // District
        Route::prefix('district')->group(function () {
            Route::get('/', [DistrictController::class, 'index']);
            Route::get('/add', [DistrictController::class, 'add']);
            Route::post('/add/create', [DistrictController::class, 'create']);
            Route::get('view/{district}', [DistrictController::class, 'view']);
            Route::get('edit/{district}', [DistrictController::class, 'show']);
            Route::post('update/{district}', [DistrictController::class, 'update']);
            Route::delete('/delete', [DistrictController::class, 'delete']);
            Route::get('filter', [DistrictController::class, 'filter']);
        });
        
        // Commune
        Route::prefix('commune')->group(function () {
            Route::get('/', [CommuneController::class, 'index']);
            Route::get('/add', [CommuneController::class, 'add']);
            Route::post('/add/create', [CommuneController::class, 'create']);
            Route::get('edit/{commune}', [CommuneController::class, 'show']);
            Route::post('update/{commune}', [CommuneController::class, 'update']);
            Route::delete('/delete', [CommuneController::class, 'delete']);
            Route::get('filter', [CommuneController::class, 'filter']);
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
            Route::get('filter', [LandController::class, 'filter']);
        });

        //Forum
        Route::prefix('forum')->group(function () {
            Route::get('/', [ForumController::class, 'index']);
            Route::get('view/{forum}', [ForumController::class, 'view']);
            Route::post('approve/{forum}', [ForumController::class, 'approve']);
            Route::get('filter', [ForumController::class, 'filter']);
            Route::delete('/delete', [ForumController::class, 'delete']);         
        });

         //Category - Plant
         Route::prefix('category-plant')->group(function () {
            Route::get('/', [CategoryPlantController::class, 'index']);
            Route::get('/add', [CategoryPlantController::class, 'add']);
            Route::post('/add/create', [CategoryPlantController::class, 'create']);
            // Route::get('/view/{categoryplant}', [CategoryPlantController::class, 'view']);
            Route::get('edit/{categoryplant}', [CategoryPlantController::class, 'show']);
            Route::post('update/{categoryplant}', [CategoryPlantController::class, 'update']);
            Route::delete('delete', [CategoryPlantController::class, 'delete']);
        });

        //Plant
        Route::prefix('plant')->group(function () {
            Route::get('/', [PlantController::class, 'index']);
            Route::get('/add', [PlantController::class, 'add']);
            Route::post('/add/create', [PlantController::class, 'create']);
            Route::get('view/{plant}', [PlantController::class, 'view']);
            Route::get('edit/{plant}', [PlantController::class, 'show']);
            Route::post('update/{plant}', [PlantController::class, 'update']);
            Route::delete('/delete', [PlantController::class, 'delete']);
            Route::post('/upload/img', [PlantController::class, 'uploadImg']);
            Route::get('filter', [PlantController::class, 'filter']);
            Route::post('/search', [PlantController::class, 'search']);
        });

        // Sick of Plant
        Route::prefix('sop')->group(function () {
            Route::get('/', [SopController::class, 'index']);
            Route::get('/add', [SopController::class, 'add']);
            Route::post('/add/create', [SopController::class, 'create']);
            Route::get('view/{sop}', [SopController::class, 'view']);
            Route::get('edit/{sop}', [SopController::class, 'show']);
            Route::post('update/{sop}', [SopController::class, 'update']);
            Route::delete('/delete', [SopController::class, 'delete']);
            Route::post('/search', [SopController::class, 'search']);
            Route::post('/upload/img', [SopController::class, 'uploadImg']);
            Route::get('filter', [SopController::class, 'filter']);
        });


        //Category - Animal
        Route::prefix('category-animal')->group(function () {
            Route::get('/', [CategoryAnimalController::class, 'index']);
            Route::get('/add', [CategoryAnimalController::class, 'add']);
            Route::post('/add/create', [CategoryAnimalController::class, 'create']);
            // Route::get('/view/{categoryplant}', [CategoryPlantController::class, 'view']);
            Route::get('edit/{categoryanimal}', [CategoryAnimalController::class, 'show']);
            Route::post('update/{categoryanimal}', [CategoryAnimalController::class, 'update']);
            Route::delete('delete', [CategoryAnimalController::class, 'delete']);
        });


          //Animal
          Route::prefix('animal')->group(function () {
            Route::get('/', [AnimalController::class, 'index']);
            Route::get('/add', [AnimalController::class, 'add']);
            Route::post('/add/create', [AnimalController::class, 'create']);
            Route::get('view/{animal}', [AnimalController::class, 'view']);
            Route::get('edit/{animal}', [AnimalController::class, 'show']);
            Route::post('update/{animal}', [AnimalController::class, 'update']);
            Route::delete('/delete', [AnimalController::class, 'delete']);
            Route::post('/upload/img', [AnimalController::class, 'uploadImg']);
            Route::get('filter', [AnimalController::class, 'filter']);
        });


          // Sick of Amnimal
          Route::prefix('soa')->group(function () {
            Route::get('/', [SoaController::class, 'index']);
            Route::get('/add', [SoaController::class, 'add']);
            Route::post('/add/create', [SoaController::class, 'create']);
            Route::get('view/{soa}', [SoaController::class, 'view']);
            Route::get('edit/{soa}', [SoaController::class, 'show']);
            Route::post('update/{soa}', [SoaController::class, 'update']);
            Route::delete('/delete', [SoaController::class, 'delete']);
            Route::post('/search', [SoaController::class, 'search']);
            Route::post('/upload/img', [SoaController::class, 'uploadImg']);
            Route::get('filter', [SoaController::class, 'filter']);        
        });

        // Category Fertilizer
        Route::prefix('category-fertilizer')->group(function () {
            Route::get('/', [CategoryFertilizerController::class, 'index']);
            Route::get('/add', [CategoryFertilizerController::class, 'add']);
            Route::post('/add/create', [CategoryFertilizerController::class, 'create']);
            // Route::get('/view/{categoryNews}', [CategoryFertilizerController::class, 'view']);
            Route::get('edit/{categoryfertilizer}', [CategoryFertilizerController::class, 'show']);
            Route::post('update/{categoryfertilizer}', [CategoryFertilizerController::class, 'update']);
            Route::delete('delete', [CategoryFertilizerController::class, 'delete']);
        });

         //Fertilizer
         Route::prefix('fertilizer')->group(function () {
            Route::get('/', [FertilizerController::class, 'index']);
            Route::get('/add', [FertilizerController::class, 'add']);
            Route::post('/add/create', [FertilizerController::class, 'create']);
            Route::get('view/{fertilizer}', [FertilizerController::class, 'view']);
            Route::get('edit/{fertilizer}', [FertilizerController::class, 'show']);
            Route::post('update/{fertilizer}', [FertilizerController::class, 'update']);
            Route::delete('/delete', [FertilizerController::class, 'delete']);
            Route::post('/upload/img', [FertilizerController::class, 'uploadImg']);
            Route::get('filter', [FertilizerController::class, 'filter']);
        });

        // Category Pesticides
        Route::prefix('category-pesticides')->group(function () {
            Route::get('/', [CategoryPesticidesController::class, 'index']);
            Route::get('/add', [CategoryPesticidesController::class, 'add']);
            Route::post('/add/create', [CategoryPesticidesController::class, 'create']);
            Route::get('edit/{categorypesticides}', [CategoryPesticidesController::class, 'show']);
            Route::post('update/{categorypesticides}', [CategoryPesticidesController::class, 'update']);
            Route::delete('/delete', [CategoryPesticidesController::class, 'delete']);
        }); 

        

        //Pesticides
        Route::prefix('pesticides')->group(function () {
            Route::get('/', [PesticidesController::class, 'index']);
            Route::get('/add', [PesticidesController::class, 'add']);
            Route::post('/add/create', [PesticidesController::class, 'create']);
            Route::get('view/{pesticides}', [PesticidesController::class, 'view']);
            Route::get('edit/{pesticides}', [PesticidesController::class, 'show']);
            Route::post('update/{pesticides}', [PesticidesController::class, 'update']);
            Route::delete('/delete', [PesticidesController::class, 'delete']);
            Route::post('/upload/img', [PesticidesController::class, 'uploadImg']);
            Route::get('filter', [PesticidesController::class, 'filter']);
        });


        // Category Veterinary Medicine
        Route::prefix('category-veterinary-medicine')->group(function () {
            Route::get('/', [CategoryVeterinaryMedicineController::class, 'index']);
            Route::get('/add', [CategoryVeterinaryMedicineController::class, 'add']);
            Route::post('/add/create', [CategoryVeterinaryMedicineController::class, 'create']);
            Route::get('edit/{categoryveterinarymedicine}', [CategoryVeterinaryMedicineController::class, 'show']);
            Route::post('update/{categoryveterinarymedicine}', [CategoryVeterinaryMedicineController::class, 'update']);
            Route::delete('/delete', [CategoryVeterinaryMedicineController::class, 'delete']);
        }); 

        //Veterinary Medicine
        Route::prefix('veterinary-medicine')->group(function () {
            Route::get('/', [VeterinaryMedicineController::class, 'index']);
            Route::get('/add', [VeterinaryMedicineController::class, 'add']);
            Route::post('/add/create', [VeterinaryMedicineController::class, 'create']);
            Route::get('view/{veterinarymedicine}', [VeterinaryMedicineController::class, 'view']);
            Route::get('edit/{veterinarymedicine}', [VeterinaryMedicineController::class, 'show']);
            Route::post('update/{veterinarymedicine}', [VeterinaryMedicineController::class, 'update']);
            Route::delete('/delete', [VeterinaryMedicineController::class, 'delete']);
            Route::post('/upload/img', [VeterinaryMedicineController::class, 'uploadImg']);
            Route::get('filter', [VeterinaryMedicineController::class, 'filter']);
        });

        // User Management
        Route::prefix('user')->group(function () {
            Route::get('/', [AdminUserController::class, 'index']); 
            Route::get('/add', [AdminUserController::class, 'add']);
            Route::post('/add/create', [AdminUserController::class, 'create']);
            // Route::get('view/{soa}', [AdminUserController::class, 'view']);
            Route::get('edit/{user}', [AdminUserController::class, 'show']);
            Route::post('update/{user}', [AdminUserController::class, 'update']);
            Route::delete('/delete', [AdminUserController::class, 'delete']);
            Route::get('filter', [AdminUserController::class, 'filter']);  
        });

        Route::get('/{id}', [SelfInforController::class, 'index']);
        Route::post('/{id}/admin/update', [SelfInforController::class, 'update']);
        Route::post('/upload/{admin}/img', [UploadImgController::class, 'store']);

    });
});










