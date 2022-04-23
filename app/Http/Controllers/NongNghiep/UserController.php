<?php

namespace App\Http\Controllers\NongNghiep;

use App\Http\Controllers\Controller;
use App\Http\Services\CommuneService;
use App\Http\Services\DistrictService;
use App\Http\Services\NongNghiepService\ForumService;
use App\Http\Services\NongNghiepService\UserService;
use App\Http\Services\ProvinceService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userService;
    protected $communeService;
    protected $districtService;
    protected $provinceService;
    protected $forumService;


    public function __construct(UserService $userService,CommuneService $communeService, DistrictService $districtService, ProvinceService $provinceService, ForumService $forumService)
    {
        $this->userService = $userService;
        $this->communeService = $communeService;
        $this->districtService = $districtService;
        $this->provinceService = $provinceService;
        $this->forumService = $forumService;
    }

    public function profile(User $user){
        $listForum = $this->forumService->getAllForumByUser($user->user_id);
        return view('nongnghiepxanh.user.profile',[
            'title' => 'Trang Cá Nhân',
            'user' => $user,
            'listForum' =>$listForum
        ]);
    }


    public function account(User $user){
        $commune = $this->communeService->getAllCommuneNongNghiepXanh();
        $district = $this->districtService->getAllDistrictNongNghiepXanh();
        $province  = $this->provinceService->getAllProvinceNongNghiepXanh();
        $info = $this->userService->infor($user->user_id);
        return view('nongnghiepxanh.user.account',[
            'title' => 'Thông tin tài khoản',
            'user'=> $info,
            'commune'=> $commune,
            'district'=> $district,
            'province'=> $province,
        ]);
    }

    public function uploadImg(Request $request){
        $id = Auth::guard('user')->user()->user_id;
        $url = $this->userService->uploadImg($request, $id);
        if ($url !== false) {
            return response()->json([
                'error' => false,
                'url'   => $url
            ]);
        }

        return response()->json(['error' => true]);
    }


    public function update($user_id, Request $request){
        $result = $this->userService->update($user_id, $request);
        if($result){
            return redirect("/account/$user_id");
        }
        return redirect()->back();
    }


    public function changePassword($user_id, Request $request){
        $result = $this->userService->changePassword($user_id, $request);
        if($result){
            return redirect("/account/$user_id");
        }
        redirect()->back();
    }
}
