<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Statistic;
use Carbon\Carbon;
use Illuminate\Support\Collection;

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

    public function filter_by_date(Request $request){
        $from_date = Carbon::createFromFormat('m/d/Y', $request->from_date)->format('Y-m-d');
        $to_date = Carbon::createFromFormat('m/d/Y', $request->to_date)->format('Y-m-d');

        $orders = DB::table('orders')
                    ->join('order_food', 'orders.id', '=', 'order_food.orderId')
                    ->join('food', 'order_food.foodId', '=', 'food.id')
                    ->whereBetween('orders.updated_at', [$from_date, $to_date])
                    ->select(DB::raw('SUM(food.price * "peopleNumber") AS revenue'), 'orders.updated_at')
                    ->groupBy('orders.updated_at')
                    ->get();

        $chart_data = new Collection();
        foreach($orders as $order){
            $chart_data->push([
                'date' => $order->updated_at,
                'sumRevenues' => $order->revenue
            ]);
        }
        return json_encode($chart_data);
    }

    public function filter_by_service(Request $request){
        $from_date = Carbon::createFromFormat('m/d/Y', $request->from_date)->format('Y-m-d');
        $to_date = Carbon::createFromFormat('m/d/Y', $request->to_date)->format('Y-m-d');
        $serviceId = $request->serviceId;

        $order_by_services = DB::table('orders')
            ->join('services', 'orders.serviceId', '=', 'services.id')
            ->whereBetween(DB::raw('cast(orders.updated_at as date)'), [$from_date, $to_date])
            ->select(DB::raw('COUNT(orders.id) AS number'), DB::raw('cast(orders.updated_at as date)'), 'services.name')
            ->where('services.id', '=', $serviceId)
            ->groupBy(DB::raw('cast(orders.updated_at as date)'), 'services.name')
            ->get();

        $chart_data = new Collection();
        foreach($order_by_services as $order){
            $chart_data->push([
                'date' => $order->updated_at,
                'number' => $order->number
            ]);
        }
        return json_encode($chart_data);
    }

}
