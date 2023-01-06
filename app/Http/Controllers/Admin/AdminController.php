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

        // $gets = DeclarationStatistic::all();
        $gets = Statistic::whereBetween('date',[$from_date, $to_date])->orderBy('date','ASC')->get();
        $chart_data = new Collection();
        foreach($gets as $get){
            $chart_data->push([
                'date' => $get->date,
                'sumRevenues' => $get->sumRevenues
            ]);
        }
        return json_encode($chart_data);
    }

    public function filter_by_date1(Request $request){
        $from_date = Carbon::createFromFormat('m/d/Y', $request->from_date)->format('Y-m-d');
        $to_date = Carbon::createFromFormat('m/d/Y', $request->to_date)->format('Y-m-d');
        $serviceId = $request->serviceId;
        // $gets = DeclarationStatistic::all();
        $gets = Order::whereBetween('organizationDate',[$from_date, $to_date])
                    ->select(DB::raw('count(id) as number'),'organizationDate')
                    ->groupBy('organizationDate')
                    ->orderBy('organizationDate','ASC')
                    ->where('serviceId',$serviceId)
                    ->get();
                    // return json_encode($gets);

        $chart_data = new Collection();
        foreach($gets as $get){
            $chart_data->push([
                'organizationDate' => $get->organizationDate,
                'number' => $get->number
            ]);
        }
        return json_encode($chart_data);
    }

}