<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
 {
    public function index() {

        $numberUser = DB::table('users')->where('roleId', 2)->count();
        $numberService = DB::table('services')->count();
        $numberFood = DB::table('food')->count();
        $numberOrder = DB::table('orders')->count();

        $orderCount = DB::table('orders')->where('status', 1)->count();
        Session::put('orderCount', $orderCount);
        $orderLists = DB::table('orders')->where('status', 1)
                        ->join('users', 'orders.userId', '=', 'users.id')
                        ->select('users.fullName', 'orders.created_at', 'avatarUrl')
                        ->orderBy('orders.created_at', 'desc')
                        ->paginate(5);
        Session::put('orderLists', $orderLists);
        $services = Service::all();
        return view('admin.index')->with('services',$services)
                                ->with('numberUser', $numberUser)
                                ->with('numberService',$numberService)
                                ->with('numberFood',$numberFood)
                                ->with('numberOrder',$numberOrder)
                                ->with('orderCount', $orderCount)
                                ->with('orderLists', $orderLists);
    }

    public function showNoti(){
    }

}