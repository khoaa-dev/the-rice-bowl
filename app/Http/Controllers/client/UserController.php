<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrderFood;
use App\Models\OrderStatus;
use App\Models\Province;
use App\Models\Service;
use App\Models\Village;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index () {

        $id = Session::get('idUser', null);
        if($id != null) {
            $user = DB::table('users')->where('id', $id)->get()[0];
        }
        $provinces = Province::all();
        if($user->villageId != '') {
            $village = Village::where('id', $user->villageId)->first();
            $district = District::where('id', $village->districtId)->first();
            $province = Province::where('id', $district->provinceId)->first();

            return view('pages.profile.infor')->with('user', $user)
                                        ->with('provinces', $provinces)
                                        ->with('id', $id)
                                        ->with('village', $village)
                                        ->with('district', $district)
                                        ->with('province', $province);
        } 

        return view('pages.profile.infor')->with('user', $user)
                                    ->with('provinces', $provinces)
                                    ->with('id', $id);
    }

    public function history() {
        $id = Session::get('idUser', null);
        if($id != null) {
            $user = DB::table('users')->where('id', $id)->get()[0];
        }
        $orders = Order::where('userId', $id)->get();
        foreach($orders as $order) {
            $order->order_status = OrderStatus::where('id', $order->status)->first();
            $order->services = Service::where('id', $order->serviceId)->first();

            $order->totalCost = 0;
            $order_foods = OrderFood::where('orderId', $order->id)->get();
            foreach($order_foods as $order_food) {
                $food = Food::where('id', $order_food->foodId)->first();
                $order->totalCost += $food->price;
            }
            $order->totalCost *= $order->peopleNumber;
        }
        $i = 0;
        return view('pages.profile.historyOrder')->with('user', $user)
                                            ->with('orders', $orders)
                                            ->with('i', $i);
    }

    public function updateInfor(Request $request) {
        $fullName = $request->fullName;
        $email = $request->email;
        $phone = $request->phone;
        $dob = $request->dob;
        $houseNumber = $request->houseNumber;
        $street = $request->street;
        $villageId = $request->villageId;
        
        $user = User::where('email', $request->email)->first();
        $user->fullName = $fullName;
        $user->email = $email;
        $user->phone = $phone;
        $user->dob = $dob;
        $user->houseNumber = $houseNumber;
        $user->street = $street;
        $user->villageId = $villageId;
        $user->save();

        return $user;
    }
}
