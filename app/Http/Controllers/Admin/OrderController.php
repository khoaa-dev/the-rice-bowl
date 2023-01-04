<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use App\Models\Service;
use App\Models\User;
use App\Models\OrderFood;
use App\Models\Food;

class OrderController extends Controller
{
    public function index() {
        $pendingOrders = Order::where('status', 1)->get();

        foreach($pendingOrders as $pendingOrder) {
            $pendingOrder->order_status = OrderStatus::where('id', $pendingOrder->status)->first();
            $pendingOrder->services = Service::where('id', $pendingOrder->serviceId)->first();
            $pendingOrder->users = User::where('id', $pendingOrder->userId)->first();
        }

        $approvedOrders = Order::where('status', 2)->orWhere('status', 4)
                                ->orderBy('created_at', 'DESC')
                                ->paginate(7);
        foreach($approvedOrders as $approvedOrder) {
            $approvedOrder->order_status = OrderStatus::where('id', $approvedOrder->status)->first();
            $approvedOrder->services = Service::where('id', $approvedOrder->serviceId)->first();
            $approvedOrder->users = User::where('id', $approvedOrder->userId)->first();


        }

        $i1 = 0;
        $i2 = 0;

        return view('admin.order.index', compact('pendingOrders', 'approvedOrders', 'i1', 'i2'));
    }

    public function show($id) 
    {
        $order = Order::find($id);
        $order->service = Service::where('id', $order->serviceId)->first();
        $order->payment = PaymentMethod::where('id', $order->paymentId)->first();
        $order_foods = OrderFood::where('orderId', $id)->get();
        foreach($order_foods as $order_food) {
            $order_food->food = Food::where('id', $order_food->foodId)->first();
        }

        $i = 0;

        return view('admin.order.show', compact('order', 'order_foods', 'i'));

    }

    public function confirmOrder($id) 
    {
        $order = Order::find($id);
        $order->status = 2;
        $order->update();

        return back()->with('status', 'Đơn hàng đã được duyệt!');
    }
}
