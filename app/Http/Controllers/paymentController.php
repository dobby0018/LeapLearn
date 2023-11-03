<?php

namespace App\Http\Controllers;

use App\Models\purchased;
use App\Models\transactions;
use Razorpay\Api\Api;

use Illuminate\Http\Request;

class paymentController extends Controller
{
    public function payment(Request $request)
    {
    //    if(!empty($request->razorpay_payment_id)){
    //     $api = new Api(env('rzr_key'),env('rzr_secret'));
    //     try{
    //     $payment = $api->payment->fetch($request->razorpay_payment_id);
    //     $response = $payment->capture(['amount'=> $payment['amount']]);
    //     dd($response);
    //     }
    //     catch(\Exception $ex)
    //     {
    //         return $ex->getMessage();
    //     }
    //    }
    if (!empty($request->razorpay_payment_id)) {
        $api = new Api(env('rzr_key'), env('rzr_secret'));
        try {
            $data = $request->query('data');
            $payment = $api->payment->fetch($request->razorpay_payment_id);
            $response = $payment->capture(['amount' => $payment['amount']]);
            $transactionId = $response->id;
             // Get the transaction ID from the response
            // dd($transactionId); // Output the transaction ID

            transactions::create([
                'transaction_id' => $transactionId,
                'course_id' => $data['id'],
                'user_id'=>session('userdata.userid'),
                'payment'=>$data['price']
            ]);
            $newData = new purchased();
                $newData->Course_id = $data['id'];
                $newData->User_id = session('userdata.userid');
                $newData->Course_name = $data['title']; // Access 'Course_name' attribute directly
                $newData->save();
                return redirect('home');
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    // print_r($data);
    }
}
