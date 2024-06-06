<?php

namespace App\Http\Controllers;

use App\Models\BuyCamera;
use App\Models\Camera;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoutingController extends Controller
{
    public function listCamera(Request $request)
    {


        if ($request->has('search')) {
            $camera = Camera::where('camera_name', 'LIKE', '%' . $request->search . '%')->simplePaginate(6);
        } else {
            $camera = DB::table('cameras')->simplePaginate(6);
        }


        foreach ($camera as $item) {
            $item->camera_price = number_format($item->camera_price, 0, ',', '.');
        }

        return view('routes/all_camera/list-product')->with('allProduct', $camera);
    }

    public function homepage(Request $request)
    {

        // Mengambil data session 
        $isLogin = $request->session()->get('isLogin');
        $idUser  = $request->session()->get('idUser');

        // Periksa apakah sudah login
        if ($isLogin) {

            $dataUser = User::find($idUser);

            if ($dataUser->role == 'Admin') {

                $productsInvoice = BuyCamera::all();

                return view('routes/homepage/admin-dashboard', ['adminProfile' => $dataUser, 'productsInvoice' => $productsInvoice]);

                // return "Anda adalah seorang admin";
                // return redirect('homepage');
                //return view('routes/homepage/admin-dashboard', ['adminProfile', $maybeIDK]);

            } else if ($dataUser->role == 'Member') {
                $userInvoices = BuyCamera::where('user_id', $idUser)->get();

                return view('routes/homepage/member-homepage', ['memberProfile' => $dataUser, 'userInvoices' => $userInvoices]);

                // dd($userInvoice);
            } else {
                return 'Sorry, but something went trouble, please try again';
            }
        }

        return view('routes/login_register/login-required');
    }

    public function shouldLogin()
    {
        return view('routes/login_register/login-form')->with('needLogin', true);
    }

    public function premiereProduct()
    {
        return view('routes/premiere/premiere-product');
    }
}
