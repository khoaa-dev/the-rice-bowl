<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_all_users = User::all();
        return view( 'admin.user.usersList' )->with( 'data_all_users', $data_all_users );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'admin.user.addUser' );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        $user = new user();
        $user->fullName =  $request->fullName;
        $user->email =  $request->email;
        $user->phone =  $request->phone;
        $user->dob =  $request->dob;
        $user->username =  $request->username;
        $user->houseNumber = $request->houseNumber;
        $user->save();
        $request->session()->put( 'message', 'Upadate successful' );
        return Redirect::to( 'admin/user' );
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        $user = user::find( $id );
        $user->delete();
        return Redirect::to( 'admin/user' );
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        $user = user::find( $id );
        return view( 'admin.user.updateUser' )->with( 'user', $user );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        $user = user::find( $id );
        $user->fullName =  $request->fullName;
        $user->email =  $request->email;
        $user->phone =  $request->phone;
        $user->dob =  $request->dob;
        $user->username =  $request->username;
        $user->houseNumber = $request->houseNumber;
        $user->save();
        $request->session()->put( 'message', 'Upadate successful' );
        return Redirect::to( 'admin/user' );
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( Request $request, $id ) {

    }
}