<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Mail;
use App\Mail\Gmail;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Ads;
use App\Models\Trail;
use App\Models\UserSubscription;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $data;
    public $user;

    public function __construct()
    {
      $this->data = [];
      $this->data['isLoggedIn'] = false;
      $this->data['user'] = [];
      $this->data['user']['subscriber'] = false;
      $this->data['response'] = false;
      $this->data['subscriber'] = false;
      $this->ads_info = [];
      $this->middleware(function ($request, $next) {
       
        if($request->session()->has("user")){
          $this->data['user'] =  $request->session()->get("user");
          $this->data['isLoggedIn'] = $this->data['user']['isLoggedIn'];
          if(count(UserSubscription::where('user_id',$this->data['user']['userID'])->get()->toArray()) > 0){
            $this->data['user']['subscriber'] = true;
            $this->data['user']['subscription'] = UserSubscription::where('user_id',$this->data['user']['userID'])->orderBy('created_at','desc')->first();
          }

          if($this->data['user']['role'] != 'isAdmin'){
            $this->ads_info =   Ads::where('user_id',$this->data['user']['userID'])->get();
            $trail_quantity =  Trail::where('user_id',$this->data['user']['userID'])->select('trail_quantity')->get()->toArray();
            $this->trail_quantity = isset($trail_quantity[0]) ? $trail_quantity[0]['trail_quantity'] : '';
            $this->data['adscounter'] = $this->trail_quantity;
          }
         
        }
        return $next($request);
      });
      $this->data['page'] = '';
    }

    public function getSocialAd($description=''){
    
      $authorization = "Authorization: Bearer sk-6nCoIO1QwZdTppey7nzqNd0qvsnNPI1ZaYhIKIG0";
      $curl = curl_init();
      $postValues = array(
          "prompt"=>$description,
          "max_tokens"=> 100,
          "echo"=>true, 
          "frequency_penalty"=>0,
          "presence_penalty"=>0,
          "top_p"=>1,
          "temperature"=>0.7, 
          "stop"=>["-----------"]
      );
      curl_setopt($curl, CURLOPT_URL, 'https://api.openai.com/v1/engines/davinci/completions');
      curl_setopt($curl, CURLOPT_POST, true);
      curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postValues));
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
      $response = curl_exec($curl);
      //print_r(curl_getinfo($curl));
      $result = json_decode($response,true);
   
     
      return $result;

    }
    public function percentage($percentage,$totalValue){
	
      if(!empty($percentage)||$percentage !=0){
        $percantageValue = $percentage/100*$totalValue;
          return round($totalValue-$percantageValue,2);
      }
      else{
        return $totalValue;
      }
      
    }
     public function plans(){

      $plans = array( 
        '1' => array( 
            'name' => 'Monthly Subscription', 
            'price' => 49, 
            'interval' => 'month' 
        ), 
        '2' => array( 
            'name' => 'yearly Subscription', 
            'price' => 85, 
            'interval' => 'year' 
        ), 
        '3' => array( 
            'name' => 'Yearly Subscription', 
            'price' => 950, 
            'interval' => 'year' 
        ) 
    );
    return $plans;
    }
   public function checkStrip_subscription($subscription_id){

      $stripe = new \Stripe\StripeClient(
        env('STRIPE_SECRET')
      );
      $retrive  =   $stripe->subscriptions->retrieve(
        $subscription_id,
        []
      );
      return $retrive->status;
   }

   public function send_email($name='',$email='',$title='',$message=''){
    $details = array(
      'title'=>$title,
      'body'=>$message

    );
    Mail::to($email)->send(new Gmail($details));
  
    return true;
  }
  
function createBase64($string) {
  $urlCode = base64_encode($string);
  return str_replace(array('+','/','='),array('-','_',''),$urlCode);
}

function decodeBase64($base64ID) {
  $data = str_replace(array('-','_'),array('+','/'),$base64ID);
  $mod4 = strlen($data) % 4;
  if ($mod4) {
          $data .= substr('====', $mod4);
  }
  return base64_decode($data);
}

}
