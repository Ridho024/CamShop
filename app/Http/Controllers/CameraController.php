<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CameraController extends Controller
{
    public function home()
    {
        $data = Camera::take(6)->get();

        foreach ($data as $item) {
            $item->camera_price = number_format($item->camera_price, 0, ',', '.');
        }

        return view('index')->with('mostSearch', $data);
    }

    public function showCamera(string $IdCamera)
    {
        return $IdCamera;
    }

    // public function listCamera()
    // {
    //     $data = DB::table('cameras')->simplePaginate(6);;

    //     foreach ($data as $item) {
    //         $item->HargaCamera = number_format($item->HargaCamera, 0, ',', '.');
    //     }

    //     return view('routes/all_camera/list-product')->with('allProduct', $data);
    // }

    public function cameraInfo($camera_id, Request $request){
        $camera = Camera::find($camera_id);
        $camera->camera_price = number_format($camera->camera_price, 0, ',', '.');

        // foreach ($camera as $item) {
        //     $item->camera_price = number_format($item->camera_price, 0, ',', '.');
        // }
        $request->session()->put([
            'cameraID' => $camera->camera_id,
        ]);
        return view('routes/all_camera/camera-info', ['cameraInfo' => $camera]);
        // dd($camera);
    }
}
