<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\MenuFood;
use App\Models\Food;
use App\Models\OrderFood;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        if ($request->note == null) {
            $request->note = '';
        }
        $id = Session::get('idUser', 1);
        $user = User::where('id', $id)->first();

        $order = new Order;
        $order->organizationDate = $request->organizationDate;
        $order->peopleNumber = $request->peopleNumber;
        $order->serviceId = Session::get('serviceId', 0);
        $order->note = $request->note;
        $order->status = 1;
        $order->paymentId = 1;
        $order->userId = $user->id;
        $order->packageId = 0;
        $order->save();
        $order->service = Service::where('id', $order->serviceId)->first();



        Session::put('orderId', $order->id);
        $paymentMethods = PaymentMethod::all();


        if ($request->menuId == -1) {
            $foodIds = $request->session()->get('foodIds', null);
            $totalCost = 0;
            $foods = new Collection();
            foreach ($foodIds as $foodId) {
                $food = Food::where('id', $foodId)->first();
                $foods->push($food);
                $totalCost += $food->price;

                $order_food = new OrderFood;
                $order_food->orderId = $order->id;
                $order_food->foodId = $food->id;
                $order_food->save();
            }

            $totalCost *= $request->peopleNumber;

            return view('cart.cart')->with('order', $order)->with('paymentMethods', $paymentMethods)->with('foods', $foods)
                ->with('totalCost', $totalCost)
                ->with('user', $user)
                ->with('status', $order->status);
        } else {
            $menu = DB::table('menus')->where('id', $request->menuId)->where('serviceId', Session::get('serviceId', 0))
                ->first();

            $menu->menuFoods = MenuFood::Where('menuId', $menu->id)->get();
            $totalCost = 0;
            foreach ($menu->menuFoods as $mf) {
                $mf->food = Food::findOrFail($mf->foodId);
                $totalCost += $mf->food->price;
                $order_food = new OrderFood;
                $order_food->orderId = $order->id;
                $order_food->foodId = $mf->food->id;
                $order_food->save();
            }

            $totalCost *= $request->peopleNumber;

            $service = Service::where('id', Session::get('serviceId', 0))->first();
            return view('pages.cart')->with('order', $order)->with('paymentMethods', $paymentMethods)->with('menu', $menu)
                ->with('totalCost', $totalCost)
                ->with('user', $user)
                ->with('status', $order->status)
                ->with('service', $service);
        }
    }
}
