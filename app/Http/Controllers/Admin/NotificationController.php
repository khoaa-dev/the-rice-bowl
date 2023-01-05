<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    function show(){
        $orderCount = DB::table('orders')->where('status', 1)
            ->count();
        return view('admin.index', compact('orderCount'));
    }
}