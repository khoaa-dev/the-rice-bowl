<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {
    public function index() {
        $accountUsers = User::where( 'roleId', 2 )->get();
        $accountAdmins = User::where( 'roleId', 1 )->get();
        $i1 = 0;
        $i2 = 0;
        return view( 'admin.account.index' )->with( 'accountUsers', $accountUsers )
        ->with( 'accountAdmins', $accountAdmins )
        ->with( 'i1', $i1 )
        ->with( 'i2', $i2 );
    }

    public function show( $id ) {
        $user = DB::table( 'users' )->where( 'id', '=', $id )->first();
        return view( 'admin.account.show', compact( 'user' ) );
    }

}