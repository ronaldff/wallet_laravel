<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallets;
use Illuminate\Support\Facades\Validator;
use Razorpay\Api\Api;
use Redirect;

class walletController extends Controller
{
    public function index(){
        $result['getWalletAmt'] = 0;
        $result['getWalletAmt'] = getWalletAmt(1);
        $result['getWalletList'] = getWalletList(1);
        $result['userDetails'] = userDetails(1);
        return view('wallet_page', $result);
    }

    public function addmoney(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'amount' => 'required|numeric|min:1',
        ]);

        if(!$validate->passes()){

            return Redirect::back()->withInput()->withErrors($validate->errors()->toArray());
        } else {
            $key = config('razorpay.API_KEY');
            $secret = config('razorpay.API_SECRET');
            $api = new Api($key,$secret);
            $price = $request->post('amount');
            $order_id = rand(111,999);
            $order = $api->order->create([
                'receipt' => 'order_rcpt_id_'.$order_id, 
                'amount' => $price * 100, 
                'currency' => 'INR'
            ]);
            $result['key'] = $key;
            $result['secret'] = $secret;
            $result['order'] = $order;
            // user_id,razorpay_o_id,amt,msg,type
            addMoney(1,$order['id'],$price,'Wallet','in');
            return view('razorpay_payment_page', $result);
        }
    }
    
}
