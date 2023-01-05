<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
 {
    public function index() {
        $numberUser = DB::table( 'users' )->where( 'roleId', 2 )->count();
        $numberService = DB::table( 'services' )->count();
        $numberFood = DB::table( 'food' )->count();
        $numberOrder = DB::table( 'orders' )->count();
        $services = Service::all();
        return view( 'admin.index' )->with( 'services', $services )
        ->with( 'numberUser', $numberUser )
        ->with( 'numberService', $numberService )
        ->with( 'numberFood', $numberFood )
        ->with( 'numberOrder', $numberOrder );
    }
}