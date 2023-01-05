<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Order;

class PayPalController extends Controller
{
    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request, $id, $paymentId)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $order = Order::where('id', $id)->first();
            $order->paymentId = $paymentId;
            $order->status = 4;
            $order->update();

            return redirect()
                ->route('getOrder', $id)
                ->with('success', 'Thanh toán thành công.');
        } else {
            return redirect()
                ->route('getOrder', $id)
                ->with('error', $response['message'] ?? 'Thanh toán thất bại.');
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request, $id)
    {
        return redirect()
            ->route('getOrder', $id)
            ->with('error', $response['message'] ?? 'Bạn đã hủy giao dịch này.');
    }
}
