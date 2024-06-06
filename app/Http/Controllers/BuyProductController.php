<?php

namespace App\Http\Controllers;

use App\Models\BuyCamera;
use App\Models\Camera;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use stdClass;

// Import juga modelnya

class BuyProductController extends Controller
{
    function buyProduct($cameraID, Request $request){
        $camera = Camera::find($cameraID);
        $camera->camera_price = number_format($camera->camera_price, 0, ',', '.');

        // Mengambil data user
        $userID = $request->session()->get('idUser');
        $user = User::find($userID);
        
        return view('routes/buy_product/buy-product', ['cameraInfo' => $camera, 'userInfo'=>$user]);

    }

    function buyProcess($cameraID, Request $request){
        // Yang harus dimasukan ke database:
        // camera id, user id, camera name, quantity, total_price, address, status, created at, updated at
        $userID = $request->session()->get('idUser');
        $camera = Camera::find($cameraID);
        $cameraName = $camera->camera_name;
        $quantity = $request->input('quantity');
        $totalPrice = $quantity * $camera->camera_price;
        $userAddress = $request->input('user_address');
        $status = 'Pending';

        $isSuccess = BuyCamera::create([
            'camera_id' => $camera->camera_id,
            'user_id' => $userID,
            'camera_name' => $cameraName,
            'camera_foto' => $camera->foto_camera,
            'quantity' => $quantity,
            'total_price' => $totalPrice,
            'address' => $userAddress,
            'status' => $status,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        if($isSuccess){
            return redirect('homepage');
        }else {
            return 'Hadeh';
        }
    }

    function adminAction($action, $invoiceNumber){
        $invoice = BuyCamera::find($invoiceNumber);

        if($action == 'accept'){
            $invoice->status = 'Accepted';
            $invoice->save();

            return redirect('homepage');
        }else if($action == 'send'){
            $invoice->status = 'Sending';
            $invoice->save();

            return redirect('homepage');
        }else if($action == 'reject'){
            $invoice->status = 'Rejected';
            $invoice->save();

            return redirect('homepage');
        }
    }

    function memberAction($action, $invoiceNumber){
        $invoice = BuyCamera::find($invoiceNumber);

        if($action == 'pay-invoice'){
            $invoice->status = 'Already Paid';
            $invoice->save();

            return redirect('homepage');
        }else if($action == 'cancel'){
            $invoice->status = 'Canceled';
            $invoice->save();

            return redirect('homepage');
        }else if($action == 'delete-invoice'){
            $invoice->delete();

            return redirect('homepage');
        }else if($action == 'remove'){
            $invoice->delete();

            return redirect('homepage');
        }
    }
}
