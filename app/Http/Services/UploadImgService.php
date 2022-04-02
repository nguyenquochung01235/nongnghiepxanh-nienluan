<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\File;

class UploadImgService{

    public function store($request, $id)
    {
        if ($request->hasFile('file')) {
            try {
                $type = pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_EXTENSION);
                // $pathFull = 'uploads/' . date("Y/m/d");
                $name = 'avatar-'. $id .'.'.$type;
                $pathFull = 'uploads/admin';

                $request->file('file')->storeAs(
                    'public/' . $pathFull, $name
                );

                return '/storage/' . $pathFull . '/' . $name;
            } catch (\Exception $error) {
                return false;
            }
        }
    }
    

}