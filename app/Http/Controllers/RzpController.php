<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RzpController extends Controller
{
    public function showPaymentForm()
    {
        return view('payment.form');
    }

    public function admitpay(Request $request)
    {
        $input = $request->all();  
    
        $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if (count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));
            } 
            catch (\Exception $e) {
                Session::put('error', $e->getMessage());
                return redirect()->back();
            }
        }
        if(count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $authenticatedUser = Auth::user();
                $Payment = new Payment();
                $Payment->payment_id = $request->razorpay_payment_id;
                $Payment->student_name = $request->student_name;
                $Payment->student_class = $request->student_class;
                $Payment->amount = $request->price/100;
                $Payment->payment_method = "online";
                $Payment->guardian_name = $authenticatedUser->name;
                $Payment->guardian_email = $authenticatedUser->email;
                $Payment->payment_status = $response['status'];
                // dd($Payment);
                $Payment->save();

                Student::where('user_id', $request->student_id)->update(['admit' => 'yes']);
    
              
            } catch (\Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
        
      
        return redirect('/guardianfees');
    }

    public function paymentSuccess(Request $request)
    {
       
    }
}
