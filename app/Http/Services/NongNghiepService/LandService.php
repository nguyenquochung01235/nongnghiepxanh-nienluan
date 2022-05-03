<?php

namespace App\Http\Services\NongNghiepService;

use App\Models\District;
use App\Models\Lands;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LandService{

    public function getLandDetail(){
        $checkUserLogin = Auth::guard('user')->check();

        if($checkUserLogin){
            $userId = Auth::guard('user')->user()->user_id;
            $userAddress = Auth::guard('user')->user()->user_address;

            if($userAddress != null){
                $user = User::with('commune.district')
                ->where('user_address',$userAddress)->where('user_id',$userId)
                ->get();
                $district_id =  $user[0]->commune->district->district_id;
                return  Lands::where('district_id', $district_id)->first();
            }
        }
        return Lands::where('district_id', 34)->first();
        

    }

    public function searchLands($request){
        $district =  District::where('district_name','like','%'.$request->searchnews.'%')
        ->get(['district_id'])->first();
        return  Lands::where('district_id', $district->district_id)->first();
    }

}   