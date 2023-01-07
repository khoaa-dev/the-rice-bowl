<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    public function getLogin()
    {
        return view('admin.auth.login');
    }
 
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'admin_email' => 'required|email',
            'admin_password' => 'required',
        ]);

        $user = User::where('email', '=', $request->admin_email)
                        ->where('password', '=', $request->admin_password)
                        ->first();
        if($user !== null) {
            if($user->roleId === 1) {
                auth()->login($user); 
                Session::put('idAdmin', $user->id);
                return redirect()->route('adminHome');
            } else {
                // return redirect()->route('adminLogin')->with('error','Tài khoản admin không hợp lệ!');
                return response()->json(['error'=>'Tài khoản admin không hợp lệ!']);
            }
        } else {
            // return redirect()->route('adminLogin')->with('error','Tài khoản hoặc mật khẩu không đúng!');
            return response()->json(['error'=>'Tài khoản hoặc mật khẩu không đúng!']);
            // ->with('error','Tài khoản hoặc mật khẩu không đúng!')
        }
    }
 
    public function adminLogout()
    {
        $idAdmin = Session::get('idAdmin');
        $user = User::find($idAdmin);
        auth()->logout($user);
        Session::flush();
        // Session::put('success', 'You are logout sucessfully');
        return redirect(route('adminLogin'));
    }
}
