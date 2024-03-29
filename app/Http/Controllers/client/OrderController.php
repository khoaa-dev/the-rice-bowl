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
use Srmklive\PayPal\Services\PayPal as PayPalClient;

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
        $order->packageId = 1;
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

            return view('pages.order.show')->with('order', $order)->with('paymentMethods', $paymentMethods)->with('foods', $foods)
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
            return view('pages.order.show')->with('order', $order)->with('paymentMethods', $paymentMethods)->with('menu', $menu)
                ->with('totalCost', $totalCost)
                ->with('user', $user)
                ->with('status', $order->status)
                ->with('service', $service);
        }
    }

    public function show($id)
    {
        $order = Order::where('id', $id)->first();
        $order->service = Service::where('id', $order->serviceId)->first();
        $paymentMethods = PaymentMethod::all();

        $idUser = Session::get('idUser', 1);
        $user = User::where('id', $idUser)->first();

        Session::put('orderId', $id);

        $totalCost = 0;
        $order_foods = OrderFood::where('orderId', $id)->get();
        $foods = new Collection();

        foreach ($order_foods as $order_food) {
            $food = Food::where('id', $order_food->foodId)->first();
            $foods->push($food);
            $totalCost += $food->price;
        }

        $totalCost *= $order->peopleNumber;
        $status = $order->status;

        return view('pages.order.show', compact('order', 'foods', 'totalCost', 'user', 'status', 'paymentMethods'));
    }

    public function confirmOrder(Request $request, $id)
    {
        $order = Order::where('id', $id)->first();
        $order->paymentId = $request->payment;
        $order->status = 4;
        $order->update();

        return back()->with('status', 'Đơn hàng của bạn đã được duyệt. Nhân viên sẽ liên hệ bạn trong thời gian sớm nhất.');
    }

    public function processPayment(Request $request, $id)
    {
        if($request->payment == 1) {
            $totalCost = $request->totalCost;
            $paymentId = $request->payment;
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('successTransaction', [$id, $paymentId]),
                    "cancel_url" => route('cancelTransaction', $id),
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => "" . $totalCost
                        ]
                    ]
                ]
            ]);
            if (isset($response['id']) && $response['id'] != null) {
                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }
                return redirect()
                    ->route('getOrder', $id)
                    ->with('error', 'Thanh toán thất bại.');
            } else {
                return redirect()
                    ->route('getOrder', $id)
                    ->with('error', $response['message'] ?? 'Thanh toán thất bại.');
            }
        } elseif ($request->payment == 3) {
            $order = Order::where('id', $id)->first();
            $order->paymentId = $request->payment;
            $order->status = 4;
            $order->update();

            return back()->with('status', 'Xác nhận thành công. Chúng tôi sẽ chuẩn bị cho đơn hàng của bạn.');
        }
    }
}
