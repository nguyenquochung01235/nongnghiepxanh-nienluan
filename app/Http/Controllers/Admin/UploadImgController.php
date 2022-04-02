<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\UploadImgService;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadImgController extends Controller
{
    protected $upload;

    public function __construct(UploadImgService $upload)
    {
        $this->upload = $upload;
    }


    public function store(Request $request, Admin $admin){
        $id = $admin->admin_id;
        $url = $this->upload->store($request,$id);
        if ($url !== false) {
            return response()->json([
                'error' => false,
                'url'   => $url
            ]);
        }

        return response()->json(['error' => true]);
    }

}
