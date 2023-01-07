<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index() {
        $eveluates = DB::table('eveluates')
            ->join('users', 'eveluates.userId', '=', 'users.id')
            ->select('users.fullName', 'eveluates.created_at', 'numberStar', 'content', 'avatarUrl')
            ->orderBy('eveluates.id', 'desc')
            ->paginate(2);

        $restaurant = Restaurant::findOrFail(1);

        if (isset(Auth::user()->email)) {
            $email = Auth::user()->email;
            $user = DB::table('users')->where('email', $email)->first();


            Session::put('idUser', $user->id);
            $isOrder = DB::table('users')
                ->join('orders', 'users.id', '=', 'orders.userId')
                ->select('status')
                ->where('status', 4)
                ->where('userId', $user->id)
                ->get();
            // return json_encode($isOrder);
            if ($isOrder->isEmpty()) {
                Session::put('statusReview', 0);
            } else {
                Session::put('statusReview', 1);
            }

            $orderCount = DB::table('orders')
                ->join('users', 'users.id', '=', 'orders.userId')
                ->where('status', 2)
                ->orWhere('status',3)
                ->where('userId', $user->id)
                ->count();
            Session::put('orderCount', $orderCount);

            $orderLists = DB::table('orders')
                ->join('users', 'users.id', '=', 'orders.userId')
                ->where('status', 2)
                ->orWhere('status',3)
                ->where('userId', $user->id)
                ->select('orders.updated_at', 'orders.status', 'orders.id')
                ->orderBy('orders.updated_at', 'desc')
                ->get();
            Session::put('orderLists', $orderLists);
        }
        $statusReview = Session::get('statusReview', 0);
        return view('pages.home', compact('eveluates', 'statusReview', 'restaurant', 'orderCount', 'orderLists'));
    }

    public function renderAboutPage() {
        return view('pages.about');
    }

    public function renderLoginPage() {
        return view('pages.auth.login');
    }
}