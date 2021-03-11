<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use App\Models\UserSubscription;
use App\Models\Pricing;

class Payment extends Controller
{   

    /**
     * Creates an intent for payment so we can capture the payment
     * method for the user. 
     * 
     * @param Request $request The request data from the user.
     */
    public function getSetupIntent(){
        return auth()->user()->createSetupIntent();
    }

    /**
     * Returns the payment methods the user has saved
     * 
     * @param Request $request The request data from the user.
     */
    public function getPaymentMethods( Request $request ){
        $user = auth()->user();

        $methods = array();

        if( $user->hasPaymentMethod() ){
            foreach( $user->paymentMethods() as $method ){
                array_push( $methods, [
                    'id' => $method->id,
                    'brand' => $method->card->brand,
                    'last_four' => $method->card->last4,
                    'exp_month' => $method->card->exp_month,
                    'exp_year' => $method->card->exp_year,
                ] );
            }
        }

        return response()->json( $methods );
    }

    /**
     * Removes a payment method for the current user.
     * 
     * @param Request $request The request data from the user.
     */
    public function removePaymentMethod( Request $request ){
        $user = auth()->user();
        $paymentMethodID = $request->get('id');

        $paymentMethods = $user->paymentMethods();

        foreach( $paymentMethods as $method ){
            if( $method->id == $paymentMethodID ){
                $method->delete();
                break;
            }
        }
        
        return response()->json( null, 204 );
    }

    public function subscription(Request $request){
        $currency = "USD"; 
        $token = $request->stripeToken;
        $plans = $this->plans();
         // Plan info 
        $planID =1;   // $_POST['subscr_plan']
        $pakage = Pricing::where('duration',$request->input('duration'))->first();
        $pakage->price = $this->percentage($pakage->discount,$pakage->price);
        $planInfo = $plans[$planID]; 
        $planName = $pakage->duration.'ly Subscription'; 
        $planPrice = $pakage->price; 
        $planInterval = $pakage->duration;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        // $data=\Stripe\Charge::create(array(
        // 	"amount"=>1000,
        // 	"currency"=>"usd",
        // 	"description"=>"Programming with Vishal Desc",
        // 	"source"=>$token,
        // ));
        // Add customer to stripe 
        try {  
            $customer = \Stripe\Customer::create(array( 
                'email' => 'aqib5452@gmail.com', 
                'source'  => $token 
            )); 
        }catch(Exception $e) {  
            $api_error = $e->getMessage();  
        } 
     
    if(empty($api_error) && $customer){  
        // Convert price to cents 
        $priceCents = round($planPrice*100); 
     
        // Create a plan 
        try { 
            $plan = \Stripe\Plan::create(array( 
                "product" => [ 
                    "name" => $planName 
                ], 
                "amount" => $priceCents, 
                "currency" => $currency, 
                "interval" => $planInterval, 
                "interval_count" => 1 
            )); 
        }catch(Exception $e) { 
            $api_error = $e->getMessage(); 
        } 
         
        if(empty($api_error) && $plan){ 
			// Creates a new subscription 
            try { 
                $subscription = \Stripe\Subscription::create(array( 
                    "customer" => $customer->id, 
                    "items" => array( 
                        array( 
                            "plan" => $plan->id, 
                        ), 
                    ), 
                )); 
            }catch(Exception $e) { 
                $api_error = $e->getMessage(); 
            } 
             
            if(empty($api_error) && $subscription){ 
				// Retrieve subscription data 
                $subsData = $subscription->jsonSerialize(); 
                // Check whether the subscription activation is successful 
                if($subsData['status'] == 'active'){ 
                    // Subscription info 
                    $planresponse = [];
                    $planresponse = array(
                        'user_id'=>$this->data['user']['userID'],
                        'stripe_subscription_id'=>$subsData['id'],
                        'stripe_customer_id'=>$subsData['customer'],
                        'stripe_plan_id'=>$subsData['plan']['id'],
                        'plan_amount'=>($subsData['plan']['amount']/100),
                        'plan_amount_currency'=>$subsData['plan']['currency'],
                        'plan_interval'=> $subsData['plan']['interval'],
                        'plan_interval_count'=>$subsData['plan']['interval_count'],
                        'payer_email'=>$this->data['user']['email'],
                        'created'=>date("Y-m-d H:i:s", $subsData['created']),
                        'plan_period_start'=>date("Y-m-d H:i:s", $subsData['current_period_start']),
                        'plan_period_end'=>date("Y-m-d H:i:s", $subsData['current_period_end']),
                        'status'=>$subsData['status']
                    );
                    $response = UserSubscription::insert($planresponse);
                    if($response==true){
                        $request->session()->flash('subscription', 'Thank you for Monthly subscription');
                        return back();
                    }
				 } 
			}
			else{ 
				$statusMsg = "Subscription activation failed!"; 
			} 
		}
		else{ 
			$statusMsg = "Subscription creation failed! ".$api_error; 
		} 	
	}
	else{ 
		$statusMsg = "Subscription creation failed! ".$api_error; 
	} 
    }

    /**
     * Pay with Stripe
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function payWithStripe(Request $request, $token)
    {  
        $request->validate([
            'name_on_card' => 'required',
        ]);
        dd($request->all());
        try{
            //$stripeCharge = Auth::user()->newSubscription('main', $request->time)->create($token);
            $charge = Stripe::charges()->create([
                'amount' => $request->price,
                'currency' => 'USD',
                'source' => $token,
                'description' => 'Description goes here',
                'receipt_email' => auth()->user()->email,
            ]);
            $customer = Stripe::customers()->create(
                [
                    'email' => auth()->user()->email,
                ]
            );
            
            /*$paymentMethod = Stripe::paymentMethods()->create([
                'type' => 'card',
                'card' => [
                    'number' => '4242424242424242',
                    'exp_month' => 9,
                    'exp_year' => 2020,
                    'cvc' => '314'
                ],
            ]);
            
            $plan = Stripe::plans()->create([
                'id'                   => $request->time,
                'name'                 => $request->time,
                'amount'               => $request->totalPrice,
                'currency'             => 'USD',
                'interval'             => 'month',
            ]);
            */

            //$plan = Stripe::plans()->find('Weekly');
            //$subscription = Stripe::subscriptions()->create($customer['id'], [
            //    'plan' => $plan['id'],
            //]);
            //dd($subscription);
            //dd($plan);
            //dd($paymentMethod['id']);
            //$stripeCharge = Auth::user()->newSubscription('main', $request->time)->create($paymentMethod['id']);
            /*$user = $user->createAsStripeCustomer();;
            dd($user);
            //$subscription = Stripe::subscriptions()->create(
            //    $customer['id']
            //);
            */
            try{
                $user_id = '';
                if(Auth::user()){
                    $user_id = Auth::user()->id;
                }
                else{
                    $user_id = null;
                }
                $size_id = Size::where('title', $request->roomSize)->pluck('id')->first();
                $date = $request->date;
                $exploded = explode('T', $date);
                $booking = new Booking;
                $booking->size_id = $size_id;
                $booking->user_id = $user_id;
                $booking->cleaning_type = $request->cleaning;
                $booking->recurring_cleaning = $request->time;
                $booking->bedrooms = $request->bedrooms;
                $booking->bathrooms = $request->bathrooms;
                $booking->requirements = isset($request->details) ? $request->details : '';
                $booking->extras = serialize($request->service);
                $booking->hours = $request->hour;
                $booking->date = $exploded[0];
                $booking->time = $request->timer;
                $booking->email = $request->email;
                $booking->phone = $request->phone;
                $booking->zip = $request->zip;
                $booking->address = $request->adress;
                $booking->discount = !empty($request->percentage) ? $request->percentage : 0;
                $booking->total_cost = $request->totalPrice;
                $booking->status = 'active';
                $booking->save();
                Temp::truncate();
                $booking_id = Booking::latest()->get()->pluck('id')->first();
                $email = $request->email;
                $end = '';
                if($request->time != 'One Time') {
                    if($request->time == 'Weekly') {
                        $end = Carbon::now()->add(7, 'day')->format('Y-m-d');
                    }
                    else if($request->time == 'BI-Weekly') {
                        $end = Carbon::now()->add(14, 'day')->format('Y-m-d');
                    }
                    else if($request->time == 'Monthly') {
                        $end = Carbon::now()->add(30, 'day')->format('Y-m-d');
                    }
                    $invoice = new Invoice;
                    $invoice->booking_id = $booking_id;
                    $invoice->email = $email;
                    $invoice->time = $request->time;
                    $invoice->end_date = $end;
                    $invoice->amount = $request->totalPrice;
                    $invoice->status = 'pending';
                    $invoice->save();
                }
                if (!empty($email)) {
                    $email_params = array();
                    $email_params['house_size'] = $request->roomSize;
                    $email_params['cleaning'] = $request->cleaning;
                    $email_params['time'] = $request->time;
                    $email_params['bedrooms'] = $request->bedrooms;
                    $email_params['bathrooms'] = $request->bathrooms;
                    $email_params['extras'] = $request->service;
                    $email_params['requirement'] = $request->details;
                    $email_params['hour'] = $request->hour;
                    $email_params['date'] = $exploded[0];
                    $email_params['timer'] = $request->timer;
                    $email_params['booking_id'] = $booking_id;
                    $email_params['totalPrice'] = $request->totalPrice;
                    $email_params['discount'] = !empty($request->percentage) ? $request->percentage : 'No Discount';
                    Mail::to($email)
                        ->send(
                            new OrderCompleted(
                                $email_params
                            )
                        );
                }
            }
            catch(\Exception $e) {
                return response()->json(['status'=>'error','message'=> $e->getMessage()]);
            }
            return response()->json([
                'status' => 'success',
                'message' => 'Thank you! Your payment has been accepted.'
            ]);
        }
        catch (CardErrorException $e) {
            return response()->json(['status'=>'error','message'=> $e->getMessage()]);
        }
    }

    /**
     * Adds a payment method to the current user. 
     * 
     * @param Request $request The request data from the user.
    */
    public function postPaymentMethods( Request $request ){
        $user = $request->user();
        $paymentMethodID = $request->get('payment_method');

        if( $user->stripe_id == null ){
            $user->createAsStripeCustomer();
        }

        $user->addPaymentMethod( $paymentMethodID );
        $user->updateDefaultPaymentMethod( $paymentMethodID );
        
        return response()->json( null, 204 );        
    }

    /**
     * Updates a subscription for the user
     * 
     * @param Request $request The request containing subscription update info.
     */
    public function updateSubscription( Request $request ){
        $user = auth()->user();
        $planID = $request->get('plan');
        $paymentID = $request->get('payment');

        if( !$user->subscribed('Monthly') ){
            $user->newSubscription( 'Monthly', $planID )
                ->create( $paymentID );
        }else{
            $user->subscription('Monthly')->swap( $planID );
        }
        
        return response()->json([
            'subscription_updated' => true
        ]);
    }
}
