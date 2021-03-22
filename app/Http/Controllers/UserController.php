<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Stevebauman\Location\Facades\Location;
use App\Models\Ads;
use App\Models\Trail;
use App\Models\AdResponse;
use App\Models\User;
use App\Models\UserSubscription;
use App\Mail\UserRegistered;
use App\Models\ProjectsModel;
use App\Models\UserProjects;

use Illuminate\Support\Facades\Mail;
use Log;

class UserController extends Controller
{
    public function __construct(){
        
        parent::__construct();
        $this->userModel = new User();
    }

   
    public function profile(){
        $user_id=$this->data['user']['userID'];
        $this->data['profile']=User::where('id',$user_id)->first();
       
        return view('admin.user.profile',$this->data);
    }

    public function template(Request $request){
        
        if(! $request->isMethod('post')){
            $this->data['tempname'] = 'facebook';
            $this->data['url'] = 'facebook-ad';
            $this->data['adsinfo'] = $this->ads_info->where('ads_category','facebook')->toArray();
            return view('admin.index',$this->data);
        }
         if(!empty($request->search)){
             $search = $request->search;
             if($request->template=='google'){
                 $this->data['adsinfo'] = Ads::where('ads_category','google')->where('user_id',$this->data['user']['userID'])->where('company_name', 'LIKE', "%{$search}%")->get()->toArray();
                 $this->data['tempname'] = 'google';
                 $this->data['url'] = 'google-ad';
                  $this->data['page'] =(string)View::make('components/adstemplate',$this->data);
             }
             if($request->template=='facebook'){
                  $this->data['tempname'] = 'facebook';
                  $this->data['url'] = 'facebook-ad';
                  $this->data['adsinfo'] = Ads::where('ads_category','facebook')->where('user_id',$this->data['user']['userID'])->where('company_name', 'LIKE', "%{$search}%")->get()->toArray();
                  $this->data['page'] =(string)View::make('components/adstemplate',$this->data);
             }
              if($request->template=='product'){
                  $this->data['tempname'] = 'product';
                  $this->data['url'] = 'Product Description';
                  $this->data['adsinfo'] = Ads::where('ads_category','product')->where('user_id',$this->data['user']['userID'])->where('company_name', 'LIKE', "%{$search}%")->get()->toArray();
                  $this->data['page'] =(string)View::make('admin/ads/product/products',$this->data);
             }
              if($request->template=='copy-paste'){
                  $this->data['tempname'] = 'copy-paste';
                  $this->data['url'] = 'copy-paste';
                  $this->data['adsinfo'] = Ads::where('ads_category','copy-paste')->where('user_id',$this->data['user']['userID'])->where('company_name', 'LIKE', "%{$search}%")->get()->toArray();
                  $this->data['page'] =(string)View::make('admin/ads/copypaste/copypaste',$this->data);
             }
             if($request->template=='facebook-headline'){
                  $this->data['tempname'] = 'facebook-headline';
                  $this->data['url'] = 'facebook-headline';
                  $this->data['adsinfo'] = Ads::where('ads_category','facebook-headline')->where('user_id',$this->data['user']['userID'])->where('company_name', 'LIKE', "%{$search}%")->get()->toArray();
                  $this->data['page'] =(string)View::make('admin/ads/facebook-headline/headline',$this->data);
             }
         }
        if($request->template=='facebook-ads'){
            $this->data['tempname'] = 'facebook';
            $this->data['url'] = 'facebook-ad';
            $this->data['adsinfo'] = $this->ads_info->where('ads_category','facebook')->toArray();
            $this->data['page'] =(string)View::make('components/adstemplate',$this->data);

        }
        if($request->template=='google-ads'){
            $this->data['adsinfo'] =  $this->ads_info->where('ads_category','google')->toArray();
            $this->data['tempname'] = 'google';
            $this->data['url'] = 'google-ad';
            $this->data['page'] =(string)View::make('components/adstemplate',$this->data);

        }
         if($request->template=='product-ads'){
            $this->data['adsinfo'] =  $this->ads_info->where('ads_category','product')->toArray();
            $this->data['tempname'] = 'google';
            $this->data['url'] = 'google-ad';
            $this->data['page'] =(string)View::make('admin/ads/product/products',$this->data);

        }
         if($request->template=='copy-paste'){
            $this->data['adsinfo'] =  $this->ads_info->where('ads_category','copy-paste')->toArray();
            $this->data['tempname'] = 'copy-paste';
            $this->data['url'] = 'copy-paste-ad';
            $this->data['page'] =(string)View::make('admin/ads/copypaste/copypaste',$this->data);

        }
        if($request->template=='facebook-headline'){
            $this->data['adsinfo'] =  $this->ads_info->where('ads_category','facebook-headline')->toArray();
            $this->data['tempname'] = 'facebook-headline';
            $this->data['url'] = 'facebook-headline';
          
            $this->data['page'] =(string)View::make('admin/ads/facebook-headline/headline',$this->data);

        }
      
        $this->data['response'] = true;
        return response()->json($this->data);
        
    }

  
    public function google_ad(Request $request ,$title = '',$id='', $response_id = 0){
        
        if(! $request->isMethod('post')){
            
            if(isset($this->data['user']['userID'])) {
                $this->data['projects'] = User::leftJoin('user_projects', 'users.id', '=', 'user_projects.user_id')->leftJoin('projects', 'user_projects.project_id', '=', 'projects.id')->where('users.id', $this->data['user']['userID'])->select('projects.name', 'projects.id')->get();
                $this->data['currentUser'] = User::where('id', $this->data['user']['userID'])->first();
            }

            if(!empty($title)){

                $this->data['ad_info'] = $this->ads_info->where('company_name',$title)->where('id',decrypt($id))->first();
                $this->data['ads'] =  AdResponse::where('ads_id',$this->data['ad_info']['id'])->get()->toArray();
                if(!empty($this->data['ad_info'])){

                    return view('admin.ads.google.update',$this->data);
                }
                else
                return back();

            }
            $this->data['category'] = 'google';
            return view('admin.ads.google.google_ads',$this->data);

        } 
        
        $validator = Validator::make($request->all(), [
            'Company' => 'required|max:50',
            'CompanyDescription' => 'required',
            'add_keywords' => 'required'
        ]);
       
        if ($validator->fails()) {
            $errors = $validator->errors();
            $this->data['Company_error'] =$errors->first('Company');
            $this->data['CompanyDescription_error'] =$errors->first('CompanyDescription');
            $this->data['addkeywords_error'] =$errors->first('add_keywords');
        }
        else{
            $this->data['msg'] = '';
            $input = $request->all();
            $formData = array(
                'company_name'=>$input['Company'],
                'description'=> $input['CompanyDescription'],
                'add_keywords'=>$input['add_keywords'],
                'user_id'    =>$this->data['user']['userID'],
                'avoid_keywords'     =>$input['avoid_keyword'],
                'ads_category' => decrypt($input['category'])
            );
             $subscription_id = UserSubscription::where('user_id',$this->data['user']['userID'])->select('stripe_subscription_id')->orderBy('created_at','desc')->first();
                  if(empty($subscription_id)){
                      if($this->trail_quantity <=0){
                           $this->data['msg']  = 'Please purchase offer to generate Ads';
                            return response()->json($this->data);exit;
                      }
                      else{
                           Trail::where('user_id',$this->data['user']['userID'])->update(['trail_quantity'=>$this->trail_quantity-1]);
                      }
                  }
                        
           $response =  Ads::insertGetId($formData);
           $input['CompanyDescription']="Write a creative ad for the following product to run on Google:\n-----------\n".$input['CompanyDescription']."\n-----------\nThese are my keywords:\n-----------\n ".$input['add_keywords'].".\n-----------\nThis is the ad I wrote for Google:\n-----------\n";
           $choices = [];
           for ($i = 0; $i < 10; $i++) {
           $facebook_ad =   $this->getSocialAd($input['CompanyDescription']);
           foreach($facebook_ad['choices'] as $advalue){
               $choices[]['text'] = str_replace($input['CompanyDescription'],"",$advalue['text']);
                $apiResponse = array(
                     'ads_id' =>$response,
                    'title'  =>$input['Company'],
                    'description' =>str_replace($input['CompanyDescription'],"",$advalue['text']),
                    'user_id'=>$this->data['user']['userID']
                );
                $Adresponse =  AdResponse::insertGetId($apiResponse);

           }
           }
           $facebook_ad['choices'] = $choices;
           $facebook_ad['company_name'] = $input['Company'];
           $this->data['response'] = true;
           $this->data['ads'] =(string)View::make('components/google_ad',['ads'=>$facebook_ad]);
        }
        return response()->json($this->data);

        if (!$request->isMethod('post')) { // if method is not post
            if(isset($this->data['user']['userID'])) {
                $this->data['projects'] = User::leftJoin('user_projects', 'users.id', '=', 'user_projects.user_id')->leftJoin('projects', 'user_projects.project_id', '=', 'projects.id')->where('users.id', $this->data['user']['userID'])->select('projects.name', 'projects.id')->get();
                $this->data['currentUser'] = User::where('id', $this->data['user']['userID'])->first();
            }
            if (!empty($title)) {
                if(!isset($this->data['user']['userID'])){
                    $this->data['ad_info'] = Ads::where('company_name',$title)->where('id',decrypt($id))->first();
                    $this->data['adscounter'] = 0;
                } else {
                    $this->data['ad_info'] = $this->ads_info->where('company_name', $title)->where('id', decrypt($id))->first();
                }
                
                $this->data['ads'] = AdResponse::where('ads_id', $this->data['ad_info']['id'])->orderBy('id', 'desc')->get()->toArray();
                if ($response_id != '0') {
                    $this->data['ads_response'] = AdResponse::where('id', decrypt($response_id))->first()->toArray();
                }

                if (!empty($this->data['ad_info'])) {
                    return view('admin.ads.google.update', $this->data);
                } else {
                    return back();
                }
            }
            $this->data['category'] = 'google';
            return view('admin.ads.google.google_ads', $this->data);
        }
        // Validate Input
        $validator = Validator::make($request->all(), [
            'Company' => 'required|max:50',
            'CompanyDescription' => 'required',
            'add_keywords' => 'required',
        ]);

        if ($validator->fails()) { // If validator fails
            $errors = $validator->errors();
            $this->data['Company_error'] = $errors->first('Company');
            $this->data['CompanyDescription_error'] = $errors->first('CompanyDescription');
            $this->data['addkeywords_error'] = $errors->first('add_keywords');
        } else {
            $this->data['msg'] = '';
            $input = $request->all();
            $userData = User::where('id', $this->data['user']['userID'])->first();
            //Get Form data
            $formData = $this->createFormData($input, $userData);

            $subscription_id = UserSubscription::where('user_id', $this->data['user']['userID'])->select('stripe_subscription_id')->orderBy('created_at', 'desc')->first();
            if (empty($subscription_id)) {
                if ($this->trail_quantity <= 0) {
                    $this->data['msg'] = 'Please purchase offer to generate Ads';
                    return response()->json($this->data);
                } else {
                    Trail::where('user_id', $this->data['user']['userID'])->update(['trail_quantity' => $this->trail_quantity - 1]);
                }
            }

            $response = Ads::insertGetId($formData);
            $input['CompanyDescription'] = "Write a creative ad for the following product to run on Google:\n-----------\n" . $input['CompanyDescription'] . "\n-----------\nThese are my keywords:\n-----------\n " . $input['add_keywords'] . ".\n-----------\nThis is the ad I wrote for Google:\n-----------\n";
            $choices = [];
            for ($i = 0; $i < 10; $i++) {
                $facebook_ad = $this->getSocialAd($input['CompanyDescription']);
                foreach ($facebook_ad['choices'] as $advalue) {
                    $choices[]['text'] = str_replace($input['CompanyDescription'], "", $advalue['text']);
                    $apiResponse = array(
                        'ads_id' => $response,
                        'title' => $input['Company'],
                        'description' => str_replace($input['CompanyDescription'], "", $advalue['text']),
                        'user_id' => $this->data['user']['userID'],
                        'project_id' => $userData->current_project,
                    );
                    AdResponse::insertGetId($apiResponse);
                }
            }
            $facebook_ad['choices'] = AdResponse::where('ads_id', $response)->orderBy('id', 'desc')->get()->toArray();
            $facebook_ad['company_name'] = $input['Company'];
            $this->data['response'] = true;
            $this->data['ads'] = (string) View::make('components/google_ad', ['ads' => $facebook_ad]);
        }
        return response()->json($this->data);
    }

    public function facebook_ad(Request $request, $title = '', $id = '', $response_id = 0)
    {
        if (!$request->isMethod('post')) {
            if(isset($this->data['user']['userID'])) {
                $this->data['projects'] = User::leftJoin('user_projects', 'users.id', '=', 'user_projects.user_id')->leftJoin('projects', 'user_projects.project_id', '=', 'projects.id')->where('users.id', $this->data['user']['userID'])->select('projects.name', 'projects.id')->get();
                $this->data['currentUser'] = User::where('id', $this->data['user']['userID'])->first();
            }
            if (!empty($title)) {
                if(!isset($this->data['user']['userID'])){
                    $this->data['ad_info'] = Ads::where('company_name',$title)->where('id',decrypt($id))->first();
                    $this->data['adscounter'] = 0;
                } else {
                    $this->data['ad_info'] = $this->ads_info->where('company_name', $title)->where('id', decrypt($id))->first();
                }
                
                $this->data['ads'] = AdResponse::where('ads_id', decrypt($id))->orderBy('id', 'desc')->get()->toArray();
                if ($response_id != '0') {
                    $this->data['ads_response'] = AdResponse::where('id', decrypt($response_id))->first()->toArray();
                }
                if (!empty($this->data['ad_info'])) {
                    
                    return view('admin.ads.google.update', $this->data);
                } else {
                    return back();
                }
            }
            $this->data['category'] = 'facebook';
            return view('admin.ads.google.google_ads', $this->data);
        }

        $validator = Validator::make($request->all(), [
            'Company' => 'required|max:50',
            'CompanyDescription' => 'required',
            'add_keywords' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $this->data['Company_error'] = $errors->first('Company');
            $this->data['CompanyDescription_error'] = $errors->first('CompanyDescription');
            $this->data['addkeywords_error'] = $errors->first('add_keywords');
        } else {
            $this->data['msg'] = '';
            $userData = User::where('id', $this->data['user']['userID'])->first();

            $input = $request->all();
            //Get Form data
            $formData = $this->createFormData($input, $userData);
            $subscription_id = UserSubscription::where('user_id', $this->data['user']['userID'])->select('stripe_subscription_id')->orderBy('created_at', 'desc')->first();
            if (empty($subscription_id)) {
                if ($this->trail_quantity <= 0) {
                    $this->data['msg'] = 'Please purchase offer to generate Ads';
                    return response()->json($this->data);
                } else {
                    Trail::where('user_id', $this->data['user']['userID'])->update(['trail_quantity' => $this->trail_quantity - 1]);
                }
            }

            $response = Ads::insertGetId($formData);
            $input['CompanyDescription'] = "Write a creative ad for the following product to run on Facebook:\n-----------\n" . $input['CompanyDescription'] . "\n-----------\nThese are my keywords:\n-----------\n " . $input['add_keywords'] . ".\n-----------\nThis is the ad I wrote for Facebook:\n-----------\n";
            $i = 0;
            $choices = [];
            for ($i = 0; $i < 10; $i++) {
                $facebook_ad = $this->getSocialAd($input['CompanyDescription']);
                foreach ($facebook_ad['choices'] as $advalue) {
                    $choices[]['text'] = str_replace($input['CompanyDescription'], "", $advalue['text']);
                    $apiResponse = array(
                        'ads_id' => $response,
                        'title' => $input['Company'],
                        'description' => str_replace($input['CompanyDescription'], "", $advalue['text']),
                        'user_id' => $this->data['user']['userID'],
                        'project_id' => $userData->current_project,
                    );
                    AdResponse::insertGetId($apiResponse);
                }
            }
            $facebook_ad['choices'] = AdResponse::where('ads_id', $response)->orderBy('id', 'desc')->get()->toArray();
            $facebook_ad['company_name'] = $input['Company'];
            $this->data['response'] = true;
            $this->data['ads'] = (string) View::make('components/ads', ['ads' => $facebook_ad]);
        }
        return response()->json($this->data);
    }

    public function product(Request $request, $title = '', $id = '', $response_id = 0)
    {
        try {
            if (!$request->isMethod('post')) {
                if(isset($this->data['user']['userID'])) {
                    $this->data['projects'] = User::leftJoin('user_projects', 'users.id', '=', 'user_projects.user_id')->leftJoin('projects', 'user_projects.project_id', '=', 'projects.id')->where('users.id', $this->data['user']['userID'])->select('projects.name', 'projects.id')->get();
                    $this->data['currentUser'] = User::where('id', $this->data['user']['userID'])->first();
                }
                if (!empty($title)) {
                    if(!isset($this->data['user']['userID'])){
                        $this->data['ad_info'] = Ads::where('company_name',$title)->where('id',decrypt($id))->first();
                        $this->data['adscounter'] = 0;
                    } else {
                        $this->data['ad_info'] = $this->ads_info->where('company_name', $title)->where('id', decrypt($id))->first();
                    }
                    
                    $this->data['ads'] = AdResponse::where('ads_id', decrypt($id))->orderBy('id', 'desc')->get()->toArray();
                    $this->data['category'] = 'product-description';
                    if ($response_id != '0') {
                        $this->data['ads_response'] = AdResponse::where('id', decrypt($response_id))->first()->toArray();
                    }
                    if (!empty($this->data['ad_info'])) {
                        return view('admin.ads.product.update', $this->data);
                    } else {
                        return back();
                    }
                }
                return view('admin.ads.product.product-description', $this->data);
            }

            $validator = Validator::make($request->all(), [
                'Company' => 'required|max:50',
                'CompanyDescription' => 'required',
                'add_keywords' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                $this->data['Company_error'] = $errors->first('Company');
                $this->data['CompanyDescription_error'] = $errors->first('CompanyDescription');
                $this->data['addkeywords_error'] = $errors->first('add_keywords');
            } else {
                $this->data['msg'] = '';
                $input = $request->all();
                $userData = User::where('id', $this->data['user']['userID'])->first();
                //Get Form data
                $formData = $this->createFormData($input, $userData);

                $subscription_id = UserSubscription::where('user_id', $this->data['user']['userID'])->select('stripe_subscription_id')->orderBy('created_at', 'desc')->first();
                if (empty($subscription_id)) {
                    if ($this->trail_quantity <= 0) {
                        $this->data['msg'] = 'Please purchase offer to generate Ads';
                        return response()->json($this->data);
                    } else {
                        Trail::where('user_id', $this->data['user']['userID'])->update(['trail_quantity' => $this->trail_quantity - 1]);
                    }
                }
                $response = Ads::insertGetId($formData);
                $input['CompanyDescription'] = "Write a creative ad for the following product to run on Facebook:\n-----------\n" . $input['CompanyDescription'] . "\n-----------\nThese are my keywords:\n-----------\n " . $input['add_keywords'] . ".\n-----------\nThis is the ad I wrote for Facebook:\n-----------\n";
                $choices = [];
                for ($i = 0; $i < 10; $i++) {
                    $facebook_ad = $this->getSocialAd($input['CompanyDescription']);
                    foreach ($facebook_ad['choices'] as $advalue) {
                        $choices[]['text'] = str_replace($input['CompanyDescription'], "", $advalue['text']);
                        $apiResponse = array(
                            'ads_id' => $response,
                            'title' => $input['Company'],
                            'description' => str_replace($input['CompanyDescription'], "", $advalue['text']),
                            'user_id' => $this->data['user']['userID'],
                            'project_id' => $userData->current_project,
                        );
                        AdResponse::insertGetId($apiResponse);
                    }
                }
                $facebook_ad['choices'] = AdResponse::where('ads_id', $response)->orderBy('id', 'desc')->get()->toArray();
                $facebook_ad['company_name'] = $input['Company'];
                $this->data['response'] = true;
                $this->data['ads'] = (string) View::make('components/product-ads', ['ads' => $facebook_ad]);
            }
            return response()->json($this->data);
        } catch (\Throwable $th) {
            Log::error('Error in product on UserController :' . $th->getMessage());
            return response()->json($this->data);
        }
    }

    public function product_description(Request $request, $title = '', $id = 0, $response_id = 0)
    {
        try {
            if (!$request->isMethod('post')) {
                if(isset($this->data['user']['userID'])) {
                    $this->data['projects'] = User::leftJoin('user_projects', 'users.id', '=', 'user_projects.user_id')->leftJoin('projects', 'user_projects.project_id', '=', 'projects.id')->where('users.id', $this->data['user']['userID'])->select('projects.name', 'projects.id')->get();
                    $this->data['currentUser'] = User::where('id', $this->data['user']['userID'])->first();
                }
                if (!empty($title)) {
                    $this->data['category'] = 'product-description';
                    if(!isset($this->data['user']['userID'])){
                        $this->data['ad_info'] = Ads::where('company_name',$title)->where('id',decrypt($id))->first();
                        $this->data['adscounter'] = 0;
                    } else {
                        $this->data['ad_info'] = $this->ads_info->where('company_name', $title)->where('id', decrypt($id))->first();
                    }
                    
                    $this->data['ads'] = AdResponse::where('ads_id', decrypt($id))->orderBy('id', 'desc')->get()->toArray();
                    if ($response_id != '0') {
                        $this->data['ads_response'] = AdResponse::where('id', decrypt($response_id))->first()->toArray();
                    }
                    
                    if (!empty($this->data['ad_info'])) {
                        return view('admin.ads.product.update', $this->data);
                    } else {
                        return back();
                    }
                }
                $this->data['category'] = 'product-description';
                return view('admin.ads.product.product-description', $this->data);
            } else {
                $validator = Validator::make($request->all(), [
                    'Company' => 'required|max:50',
                    'CompanyDescription' => 'required',
                    'add_keywords' => 'required',
                ]);

                if ($validator->fails()) {
                    $errors = $validator->errors();
                    $this->data['Company_error'] = $errors->first('Company');
                    $this->data['CompanyDescription_error'] = $errors->first('CompanyDescription');
                    $this->data['addkeywords_error'] = $errors->first('add_keywords');
                } else {
                    $userData = User::where('id', $this->data['user']['userID'])->first();
                    $this->data['msg'] = '';
                    $input = $request->all();
                    //Get Form data
                    $formData = $this->createFormData($input, $userData);

                    $subscription_id = UserSubscription::where('user_id', $this->data['user']['userID'])->select('stripe_subscription_id')->orderBy('created_at', 'desc')->first();
                    if (empty($subscription_id)) {
                        if ($this->trail_quantity <= 0) {
                            $this->data['msg'] = 'Please purchase offer to generate Ads';
                            return response()->json($this->data);
                        } else {
                            Trail::where('user_id', $this->data['user']['userID'])->update(['trail_quantity' => $this->trail_quantity - 1]);
                        }
                    }

                    $response = Ads::insertGetId($formData);
                    $input['CompanyDescription'] = "Write a creative ad for the following product to run on Facebook:\n-----------\n" . $input['CompanyDescription'] . "\n-----------\nThese are my keywords:\n-----------\n  " . $input['add_keywords'] . ".\n-----------\nThis is the ad I wrote for Facebook:\n-----------\n";
                    $choices = [];
                    for ($i = 0; $i < 10; $i++) {
                        $facebook_ad = $this->getSocialAd($input['CompanyDescription']);
                        foreach ($facebook_ad['choices'] as $advalue) {
                            $choices[]['text'] = str_replace($input['CompanyDescription'], "", $advalue['text']);
                            $apiResponse = array(
                                'ads_id' => $response,
                                'title' => $input['Company'],
                                'description' => str_replace(',', '', str_replace($input['CompanyDescription'], "", $advalue['text'])),
                                'user_id' => $this->data['user']['userID'],
                                'project_id' => $userData->current_project,
                            );
                            AdResponse::insertGetId($apiResponse);
                        }
                    }
                    $facebook_ad['choices'] = AdResponse::where('ads_id', $response)->orderBy('id', 'desc')->get()->toArray();
                    $facebook_ad['company_name'] = $input['Company'];
                    $this->data['response'] = true;
                    $this->data['ads'] = (string) View::make('components/product-ads', ['ads' => $facebook_ad]);
                }
                return response()->json($this->data);
            }
        } catch (\Throwable $th) {
            Log::error('Error in product_description on UserController :' . $th->getMessage());
            return response()->json($this->data);
        }
    }

    public function copypaste(Request $request, $title = '', $id='', $response_id = 0)
    {
        try {
            if (!$request->isMethod('post')) {
                if(isset($this->data['user']['userID'])) {
                    $this->data['projects'] = User::leftJoin('user_projects', 'users.id', '=', 'user_projects.user_id')->leftJoin('projects', 'user_projects.project_id', '=', 'projects.id')->where('users.id', $this->data['user']['userID'])->select('projects.name', 'projects.id')->get();
                    $this->data['currentUser'] = User::where('id', $this->data['user']['userID'])->first();
                }
                if(!empty($title)) {
                    if(!isset($this->data['user']['userID'])){
                        $this->data['ad_info'] = Ads::where('company_name',$title)->where('id',decrypt($id))->first();
                        $this->data['adscounter'] = 0;
                    } else {
                        $this->data['ad_info'] = $this->ads_info->where('company_name',$title)->where('id',decrypt($id))->first();
                    }
                    
                    $this->data['ads'] =  AdResponse::where('ads_id', $this->data['ad_info']['id'])->orderBy('id', 'desc')->get()->toArray();
                    if($response_id != '0') {
                        $this->data['ads_response'] =  AdResponse::where('id', decrypt($response_id))->first()->toArray();
                    }
                    
                    if(!empty($this->data['ad_info'])) {
                        return view('admin.ads.copypaste.update', $this->data);
                    } else {
                        return back();
                    }
                }
                $this->data['category'] = 'copy-paste';
                return view('admin.ads.copypaste.create',$this->data);
            }
            //Validate Input
            $validator = Validator::make($request->all(), [
                'Company' => 'required|max:50',
                'CompanyDescription' => 'required',
                'add_keywords' => 'required',
            ]);
    
            if ($validator->fails()) {
                $errors = $validator->errors();
                $this->data['Company_error'] = $errors->first('Company');
                $this->data['CompanyDescription_error'] = $errors->first('CompanyDescription');
                $this->data['addkeywords_error'] = $errors->first('add_keywords');
            } else {
                $userData = User::where('id', $this->data['user']['userID'])->first();
                $this->data['msg'] = '';
                $input = $request->all();
                
                //Get Form data
                $formData = $this->createFormData($input, $userData);
    
                $subscription_id = UserSubscription::where('user_id', $this->data['user']['userID'])->select('stripe_subscription_id')->orderBy('created_at', 'desc')->first();
                if (empty($subscription_id)) {
                    if ($this->trail_quantity <= 0) {
                        $this->data['msg'] = 'Please purchase offer to generate Ads';
                        return response()->json($this->data);exit;
                    } else {
                        Trail::where('user_id', $this->data['user']['userID'])->update(['trail_quantity' => $this->trail_quantity - 1]);
                    }
                }
                $response = Ads::insertGetId($formData);
                $input['CompanyDescription'] = "Content:" . $input['CompanyDescription'] . "\n-----------\nTone of voice:Witty";
                $choices = [];
                for ($i = 0; $i < 10; $i++) {
                    $facebook_ad = $this->getSocialAd($input['CompanyDescription']);
                    foreach ($facebook_ad['choices'] as $advalue) {
                        $choices[]['text'] = str_replace($input['CompanyDescription'], "", $advalue['text']);
                        $apiResponse = array(
                            'ads_id' => $response,
                            'title' => $input['Company'],
                            'description' => str_replace(',', '', str_replace($input['CompanyDescription'], "", $advalue['text'])),
                            'user_id' => $this->data['user']['userID'],
                            'project_id' => $userData->current_project,
                        );
                        AdResponse::insertGetId($apiResponse);
                    }
                }
                $facebook_ad['choices'] = AdResponse::where('ads_id', $response)->orderBy('id', 'desc')->get()->toArray();
                $facebook_ad['company_name'] = $input['Company'];
                $this->data['response'] = true;
                $this->data['ads'] = (string) View::make('components/copypaste_ad', ['ads' => $facebook_ad]);
            }
            return response()->json($this->data);
        } catch (\Throwable $th) {
            Log::error('Error in copypaste on UserController :' . $th->getMessage());
            return response()->json($this->data);
        }
    }

    public function facebook_headline(Request $request, $title = '', $id = 0, $response_id = 0)
    {
        try {
            if (!$request->isMethod('post')) {
                if(isset($this->data['user']['userID'])) {
                    $this->data['projects'] = User::leftJoin('user_projects', 'users.id', '=', 'user_projects.user_id')->leftJoin('projects', 'user_projects.project_id', '=', 'projects.id')->where('users.id', $this->data['user']['userID'])->select('projects.name', 'projects.id')->get();
                    $this->data['currentUser'] = User::where('id', $this->data['user']['userID'])->first();
                }
                if (!empty($title)) {
                    if(!isset($this->data['user']['userID'])){
                        $this->data['ad_info'] = Ads::where('company_name',$title)->where('id',decrypt($id))->first();
                        $this->data['adscounter'] = 0;
                    } else {
                        $this->data['ad_info'] = $this->ads_info->where('company_name', $title)->where('id', decrypt($id))->first();
                    }
                    
                    $this->data['ads'] = AdResponse::where('ads_id', decrypt($id))->orderBy('id', 'desc')->get()->toArray();
                    if ($response_id != '0') {
                        $this->data['ads_response'] = AdResponse::where('id', decrypt($response_id))->first()->toArray();
                    }
                    
                    if (!empty($this->data['ad_info'])) {
                        return view('admin.ads.facebook-headline.update', $this->data);
                    } else {
                        return back();
                    }
                }
                $this->data['category'] = 'facebook-headline';
                return view('admin.ads.facebook-headline.create', $this->data);
            }
    
            $validator = Validator::make($request->all(), [
                'Company' => 'required|max:50',
                'CompanyDescription' => 'required',
                'add_keywords' => 'required',
            ]);
    
            if ($validator->fails()) {
                $errors = $validator->errors();
                $this->data['Company_error'] = $errors->first('Company');
                $this->data['CompanyDescription_error'] = $errors->first('CompanyDescription');
                $this->data['addkeywords_error'] = $errors->first('add_keywords');
            } else {
                $this->data['msg'] = '';
                $input = $request->all();
                $userData = User::where('id', $this->data['user']['userID'])->first();
    
                //Get Form data
                $formData = $this->createFormData($input, $userData);
                $subscription_id = UserSubscription::where('user_id', $this->data['user']['userID'])->select('stripe_subscription_id')->orderBy('created_at', 'desc')->first();
                if (empty($subscription_id)) {
                    if ($this->trail_quantity <= 0) {
                        $this->data['msg'] = 'Please purchase offer to generate Ads';
                        return response()->json($this->data);
                    } else {
                        Trail::where('user_id', $this->data['user']['userID'])->update(['trail_quantity' => $this->trail_quantity - 1]);
                    }
                }
                $response = Ads::insertGetId($formData);
                $input['CompanyDescription'] = "Write a headline for the following product to run on Facebook:\n-----------\nBrand:" . $input['Company'] . "\nDescription:" . $input['CompanyDescription'] . "\n-----------\nThis is the Headline I wrote for Facebook:\n-----------\n";
                $choices = [];
                for ($i = 0; $i < 10; $i++) {
                    $facebook_ad = $this->getSocialAd($input['CompanyDescription']);
                    foreach ($facebook_ad['choices'] as $advalue) {
                        $choices[]['text'] = str_replace($input['CompanyDescription'], "", $advalue['text']);
                        $apiResponse = array(
                            'ads_id' => $response,
                            'title' => $input['Company'],
                            'description' => str_replace($input['CompanyDescription'], "", $advalue['text']),
                            'user_id' => $this->data['user']['userID'],
                            'project_id' => $userData->current_project,
                        );
                        AdResponse::insertGetId($apiResponse);
                    }
                }
                $facebook_ad['choices'] = AdResponse::where('ads_id', $response)->orderBy('id', 'desc')->get()->toArray();
                $facebook_ad['company_name'] = $input['Company'];
                $this->data['response'] = true;
                $this->data['ads'] = (string) View::make('components/facebook-headline', ['ads' => $facebook_ad]);
            }
            return response()->json($this->data);
        } catch (\Throwable $th) {
            Log::error('Error in facebook_headline on UserController :' . $th->getMessage());
            return response()->json($this->data);
        }
    }

    public function update_facebookAd(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'Company' => 'required|max:50',
                'CompanyDescription' => 'required',
                'add_keywords' => 'required',
            ]);
    
            if ($validator->fails()) {
                $errors = $validator->errors();
                $this->data['Company_error'] = $errors->first('Company');
                $this->data['CompanyDescription_error'] = $errors->first('CompanyDescription');
                $this->data['addkeywords_error'] = $errors->first('add_keywords');
            } else {
                $userData = User::where('id', $this->data['user']['userID'])->first();
                $this->data['msg'] = '';
                $input = $request->all();
                //Get Form data
                $formData = $this->createFormData($input, $userData);
                $input['ad_id'] = decrypt($input['ad_id']);
                $subscription_id = UserSubscription::where('user_id', $this->data['user']['userID'])->select('stripe_subscription_id')->orderBy('created_at', 'desc')->first();
                if (empty($subscription_id)) {
                    if ($this->trail_quantity <= 0) {
                        $this->data['msg'] = 'Please purchase offer to generate Ads';
                        return response()->json($this->data);
                    } else {
                        Trail::where('user_id', $this->data['user']['userID'])->update(['trail_quantity' => $this->trail_quantity - 1]);
                    }
                }
    
                Ads::where('id', $input['ad_id'])->update($formData);
                
                $input['CompanyDescription'] = "Write a creative ad for the following product to run on Facebook:\n-----------\n" . $input['CompanyDescription'] . "\n-----------\nThese are my keywords:\n-----------\n " . $input['add_keywords'] . ".\n-----------\nThis is the ad I wrote for Facebook:\n-----------\n";
                $choices = [];
                for ($i = 0; $i < 10; $i++) {
                    $facebook_ad = $this->getSocialAd($input['CompanyDescription']);
                    foreach ($facebook_ad['choices'] as $advalue) {
                        $choices[]['text'] = str_replace($input['CompanyDescription'], "", $advalue['text']);
                        $apiResponse = array(
                            'ads_id' => $input['ad_id'],
                            'title' => $input['Company'],
                            'description' => str_replace($input['CompanyDescription'], "", $advalue['text']),
                            'user_id' => $this->data['user']['userID'],
                            'project_id' => $userData->current_project,
                        );
                        AdResponse::insertGetId($apiResponse);
                    }
                }
                $facebook_ad['choices'] = AdResponse::where('ads_id', decrypt($input['ad_id']))->orderBy('id', 'desc')->get()->toArray();
                $facebook_ad['company_name'] = $input['Company'];
                $this->data['response'] = true;
                $this->data['ads'] = (string) View::make('components/ads', ['ads' => $facebook_ad]);
            }
            return response()->json($this->data);
        } catch (\Throwable $th) {
            Log::error('Error in update_facebookAd on UserController :' . $th->getMessage());
            return response()->json($this->data);
        }
    }

    /**
     * Method to update Google Ad
     * @param Illuminate\Http\Request $request
     * @return response JSON
     */
    public function update_googleAd(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'Company' => 'required|max:50',
                'CompanyDescription' => 'required',
                'add_keywords' => 'required',
            ]);
    
            if ($validator->fails()) {
                $errors = $validator->errors();
                $this->data['Company_error'] = $errors->first('Company');
                $this->data['CompanyDescription_error'] = $errors->first('CompanyDescription');
                $this->data['addkeywords_error'] = $errors->first('add_keywords');
            } else {
                $userData = User::where('user_id', $this->data['user']['userID'])->first();
                $this->data['msg'] = '';
                $input = $request->all();
                //Get Form data
                $formData = $this->createFormData($input, $userData);
    
                $input['ad_id'] = decrypt($input['ad_id']);
                $subscription_id = UserSubscription::where('user_id', $this->data['user']['userID'])->select('stripe_subscription_id')->orderBy('created_at', 'desc')->first();
                if (empty($subscription_id)) {
                    if ($this->trail_quantity <= 0) {
                        $this->data['msg'] = 'Please purchase offer to generate Ads';
                        return response()->json($this->data);
                    } else {
                        Trail::where('user_id', $this->data['user']['userID'])->update(['trail_quantity' => $this->trail_quantity - 1]);
                    }
                }
    
                Ads::where('id', $input['ad_id'])->update($formData);
    
                $input['CompanyDescription'] = "Write a creative ad for the following product to run on Google:\n-----------\n" . $input['CompanyDescription'] . "\n-----------\nThese are my keywords:\n-----------\n " . $input['add_keywords'] . ".\n-----------\nThis is the ad I wrote for Google:\n-----------\n";
                $choices = [];
                for ($i = 0; $i < 10; $i++) {
                    $facebook_ad = $this->getSocialAd($input['CompanyDescription']);
                    foreach ($facebook_ad['choices'] as $advalue) {
                        $choices[]['text'] = str_replace($input['CompanyDescription'], "", $advalue['text']);
                        $apiResponse = array(
                            'ads_id' => $input['ad_id'],
                            'title' => $input['Company'],
                            'description' => str_replace($input['CompanyDescription'], "", $advalue['text']),
                            'user_id' => $this->data['user']['userID'],
                            'project_id' => $userData->current_project,
                        );
                        AdResponse::insertGetId($apiResponse);
                    }
                }
                $facebook_ad['choices'] = AdResponse::where('ads_id', decrypt($input['ad_id']))->orderBy('id', 'desc')->get()->toArray();
                $facebook_ad['company_name'] = $input['Company'];
                $this->data['response'] = true;
                $this->data['ads'] = (string) View::make('components/google_ad', ['ads' => $facebook_ad]);
            }
            return response()->json($this->data);
        } catch (\Throwable $th) {
            Log::error('Error in update_googleAd on UserController :' . $th->getMessage());
            return response()->json($this->data);
        }
    }

    /**
     * Method to update Product Ad
     * @param Illuminate\Http\Request $request
     * @return response JSON
     */
    public function update_productAd(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'Company' => 'required|max:50',
                'CompanyDescription' => 'required',
                'add_keywords' => 'required',
            ]);
    
            if ($validator->fails()) {
                $errors = $validator->errors();
                $this->data['Company_error'] = $errors->first('Company');
                $this->data['CompanyDescription_error'] = $errors->first('CompanyDescription');
                $this->data['addkeywords_error'] = $errors->first('add_keywords');
            } else {
                $this->data['msg'] = '';
                $input = $request->all();
                $userData = User::where('id', $this->data['user']['userID'])->first();
                //Get Form data
                $formData = $this->createFormData($input, $userData);
    
                $input['ad_id'] = decrypt($input['ad_id']);
                $subscription_id = UserSubscription::where('user_id', $this->data['user']['userID'])->select('stripe_subscription_id')->orderBy('created_at', 'desc')->first();
                if (empty($subscription_id)) {
                    if ($this->trail_quantity <= 0) {
                        $this->data['msg'] = 'Please purchase offer to generate Ads';
                        return response()->json($this->data);
                    } else {
                        Trail::where('user_id', $this->data['user']['userID'])->update(['trail_quantity' => $this->trail_quantity - 1]);
                    }
                }
                Ads::where('id', $input['ad_id'])->update($formData);
    
                $input['CompanyDescription'] = "Write a creative ad for the following product to run on Facebook:\n-----------\n" . $input['CompanyDescription'] . "\n-----------\nThese are my keywords:\n-----------\n " . $input['add_keywords'] . ".\n-----------\nThis is the ad I wrote for Facebook:\n-----------\n";
                $choices = [];
                for ($i = 0; $i < 10; $i++) {
                    $facebook_ad = $this->getSocialAd($input['CompanyDescription']);
                    foreach ($facebook_ad['choices'] as $advalue) {
                        $choices[]['text'] = str_replace($input['CompanyDescription'], "", $advalue['text']);
                        $apiResponse = array(
                            'ads_id' => $input['ad_id'],
                            'title' => $input['Company'],
                            'description' => str_replace($input['CompanyDescription'], "", $advalue['text']),
                            'user_id' => $this->data['user']['userID'],
                            'project_id' => $userData->current_project,
                        );
                        AdResponse::insertGetId($apiResponse);
                    }
                }
                $facebook_ad['choices'] = AdResponse::where('ads_id', decrypt($input['ad_id']))->orderBy('id', 'desc')->get()->toArray();
                $facebook_ad['company_name'] = $input['Company'];
                $this->data['response'] = true;
                $this->data['ads'] = (string) View::make('components/product-ads', ['ads' => $facebook_ad]);
            }
            return response()->json($this->data);
        } catch (\Throwable $th) {
            Log::error('Error in update_productAd on UserController :' . $th->getMessage());
            return response()->json($this->data);
        }
    }

    /**
     * Method to update CopyPaste Ad
     * @param Illuminate\Http\Request $request
     * @return response JSON
     */
    public function update_copypaste_ad(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'Company' => 'required|max:50',
                'CompanyDescription' => 'required',
                'add_keywords' => 'required',
            ]);
    
            if ($validator->fails()) {
                $errors = $validator->errors();
                $this->data['Company_error'] = $errors->first('Company');
                $this->data['CompanyDescription_error'] = $errors->first('CompanyDescription');
                $this->data['addkeywords_error'] = $errors->first('add_keywords');
            } else {
                $userData = User::where('id', $this->data['user']['userID'])->first();
                $this->data['msg'] = '';
                $input = $request->all();
                //Get Form data
                $formData = $this->createFormData($input, $userData);
    
                $input['ad_id'] = decrypt($input['ad_id']);
                $subscription_id = UserSubscription::where('user_id', $this->data['user']['userID'])->select('stripe_subscription_id')->orderBy('created_at', 'desc')->first();
                if (empty($subscription_id)) {
                    if ($this->trail_quantity <= 0) {
                        $this->data['msg'] = 'Please purchase offer to generate Ads';
                        return response()->json($this->data);
                    } else {
                        Trail::where('user_id', $this->data['user']['userID'])->update(['trail_quantity' => $this->trail_quantity - 1]);
                    }
                }
    
                Ads::where('id', $input['ad_id'])->update($formData);
                
                $input['CompanyDescription'] = "Content:" . $input['CompanyDescription'] . "\n-----------\nTone of voice:Witty";
                $choices = [];
                for ($i = 0; $i < 10; $i++) {
                    $facebook_ad = $this->getSocialAd($input['CompanyDescription']);
                    foreach ($facebook_ad['choices'] as $advalue) {
                        $choices[]['text'] = str_replace($input['CompanyDescription'], "", $advalue['text']);
                        $apiResponse = array(
                            'ads_id' => $input['ad_id'],
                            'title' => $input['Company'],
                            'description' => str_replace($input['CompanyDescription'], "", $advalue['text']),
                            'user_id' => $this->data['user']['userID'],
                            'project_id' => $userData->current_project,
                        );
                        AdResponse::insertGetId($apiResponse);
                    }
                }
                $facebook_ad['choices'] = AdResponse::where('ads_id',decrypt($input['ad_id']))->orderBy('id', 'desc')->get()->toArray();
                $facebook_ad['company_name'] = $input['Company'];
                $this->data['response'] = true;
                $this->data['ads'] = (string) View::make('components/copypaste_ad', ['ads' => $facebook_ad]);
            }
            return response()->json($this->data);
        } catch (\Throwable $th) {
            Log::error('Error in update_copypaste_ad on UserController :' . $th->getMessage());
            return response()->json($this->data);
        }
    }

    /**
     * Method to update Facebook Headline
     * @param Illuminate\Http\Request $request
     * @return response JSON
     */
    public function update_facebook_headline(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'Company' => 'required|max:50',
                'CompanyDescription' => 'required',
                'add_keywords' => 'required',
            ]);
    
            if ($validator->fails()) {
                $errors = $validator->errors();
                $this->data['Company_error'] = $errors->first('Company');
                $this->data['CompanyDescription_error'] = $errors->first('CompanyDescription');
                $this->data['addkeywords_error'] = $errors->first('add_keywords');
            } else {
                $userData = User::where('id', $this->data['user']['userID'])->first();
                $this->data['msg'] = '';
                $input = $request->all();
    
                //Get Form data
                $formData = $this->createFormData($input, $userData);
                $input['ad_id'] = decrypt($input['ad_id']);
                $subscription_id = UserSubscription::where('user_id', $this->data['user']['userID'])->select('stripe_subscription_id')->orderBy('created_at', 'desc')->first();
                if (empty($subscription_id)) {
                    if ($this->trail_quantity <= 0) {
                        $this->data['msg'] = 'Please purchase offer to generate Ads';
                        return response()->json($this->data);
                    } else {
                        Trail::where('user_id', $this->data['user']['userID'])->update(['trail_quantity' => $this->trail_quantity - 1]);
                    }
                }
                Ads::where('id', $input['ad_id'])->update($formData);
                
                $input['CompanyDescription'] = "Write a headline for the following product to run on Facebook:\n-----------\nBrand:" . $input['Company'] . "\nDescription:" . $input['CompanyDescription'] . "\n-----------\nThis is the Headline I wrote for Facebook:\n-----------\n";
                $choices = [];
                for ($i = 0; $i < 10; $i++) {
                    $facebook_ad = $this->getSocialAd($input['CompanyDescription']);
                    foreach ($facebook_ad['choices'] as $advalue) {
                        $choices[]['text'] = str_replace($input['CompanyDescription'], "", $advalue['text']);
                        $apiResponse = array(
                            'ads_id' => $input['ad_id'],
                            'title' => $input['Company'],
                            'description' => str_replace($input['CompanyDescription'], "", $advalue['text']),
                            'user_id' => $this->data['user']['userID'],
                            'project_id' => $userData->current_project,
                        );
                        AdResponse::insertGetId($apiResponse);
                    }
                }
                $facebook_ad['choices'] = AdResponse::where('ads_id',decrypt($input['ad_id']))->orderBy('id', 'desc')->get()->toArray();
                $facebook_ad['company_name'] = $input['Company'];
                $this->data['response'] = true;
                $this->data['ads'] = (string) View::make('components/facebook-headline', ['ads' => $facebook_ad]);
            }
            return response()->json($this->data);
        } catch (\Throwable $th) {
            Log::error('Error in update_facebook_headline on UserController :' . $th->getMessage());
            return response()->json($this->data);
        }
    }

    public function flushSession(Request $request)
    {
        $request->session()->flush();
        return redirect('/');

    }
    public function update_password(Request $request)
    {
        if (!$request->isMethod('post')) {
            return view('admin.user.change_password', $this->data);
        }
        $validator = Validator::make($request->all(), [
            'password' => 'required_with:confirm_password|same:confirm_password|min:8',
            'confirm_password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('update-password')->withErrors($validator)->withInput();
        } else {
            $input = $request->all();
            $formData = array(
                'password' => Hash::make($input['password']),
            );
            $response = $this->userModel->where('user_id', $this->data['user']['userID'])->update($formData);
            if ($response == true) {
                $request->session()->flush();
                if ($this->data['user']['role'] == 'isAdmin') {
                    return redirect('admin/login')->with('message', 'password updated successfully please login with new password');
                }
                return redirect('login')->with('message', 'password updated successfully please login with new password');
            }
        }
    }
    public function remove_ad(Request $request)
    {
        $data = [];
        $data['response'] = false;
        $id = decrypt($request->ad_id);
        Ads::where('id', $id)->delete();
        AdResponse::where('ads_id', $id)->delete();
        $data['response'] = true;
        return response()->json($data);
    }

    public function update_userStatus(Request $request, $user_id = '', $status = '')
    {
        $update = array(
            'status' => decrypt($status),
        );
        $response = $this->userModel::where('user_id', decrypt($user_id))->update($update);
        if ($response == true) {
            return back();
        }
    }

    public function login(Request $request)
    {
        if (!$request->isMethod('post')) {
            return back();
        } else {
            $data = [];
            $data['response'] = false;
            $validator = Validator::make($request->all(), [
                'email' => 'required|max:50|email',
                'password' => 'required|min:8',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                $data['email'] = $errors->first('email');
                $data['password'] = $errors->first('password');
            } else {

                $formData = $request->all();
                unset($formData['_token']);
                $status = $this->userModel->login($formData);
                if ($status == false) {
                    $data['error'] = 'Wrong Email Or Password!';
                } else {
                    if ($status['role'] == 'user') {
                        $subscription_id = UserSubscription::where('user_id', $status['userID'])->select('stripe_subscription_id')->orderBy('created_at', 'desc')->first();
                        if (!empty($subscription_id)) {
                            $subscription = $this->checkStrip_subscription($subscription_id['stripe_subscription_id']);
                            if ($subscription == 'canceled') {
                                UserSubscription::where('stripe_subscription_id', $subscription_id['stripe_subscription_id'])->update(['status' => $subscription]);
                            }
                        }

                        $request->session()->put('user', $status);
                        $data['redirect'] = 'template';
                        $data['response'] = true;
                    } else {
                        $data['error'] = 'Sorry you cannot perform this action !';
                    }
                }
            }
            return response()->json($data);
        }
    }

    public function register(Request $request)
    {
        if (!$request->isMethod('post')) {
            return back();
        }
        if ($request['ref'] != '' && $request['pa'] != '') {
            $find = User::where('parent_member', $request['pa'])->count();
            if ($find >= 10) {
                $data['response'] = false;
                $data['msg'] = 'You can not register using this link!';
                return response()->json($data);
            }
        }
        $data = [];
        $data['response'] = false;
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:50',
            'email' => 'required|max:50|unique:user|email',
            'password' => 'required_with:confirm_password|same:confirm_password|min:8',
            'confirm_password' => 'required',
            'checkbox' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $data['username'] = $errors->first('username');
            $data['email'] = $errors->first('email');
            $data['password'] = $errors->first('password');
            $data['confirm_password'] = $errors->first('confirm_password');
            $data['checkbox'] = $errors->first('checkbox');
        } else {
            $input = $request->all();
            if ($input['ref'] == '') {
                $ref = 0;
            } else {
                $ref = $input['ref'];
            }

            if ($input['ref'] != '' && $input['pa'] == 0) {
                $pa = $input['ref'];
            } else if ($input['ref'] == '' && $input['pa'] == '') {
                $pa = 0;
                $user_r = 'admin';
            } else {
                $pa = $input['pa'];
                $user_r = 'user';
            }
            $location = request()->ip();
            $location = str_replace('.', ':', $location);
            $location_data = Location::get($location);
            $country_name = $location_data->countryName ?? '';
            $formData = array(
                'username' => $input['username'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'role' => 'user',
                'ip_address' => request()->ip(),
                'country_name' => $country_name,
                'linkout' => md5(rand(00000, 99999)),
                'member_of' => $ref,
                'parent_member' => $pa,
                'linked_user_role' => $user_r,
                'current_project' => 0,
            );
            $response = $this->userModel->insertGetId($formData);
            if ($input['ref'] == '' && $input['pa'] == '') {
                // Create Project for user
                $project = new ProjectsModel();
                $project->name = "My Project";
                $project->save();
                // Map Project to User
                $save_project = new UserProjects();
                $save_project->user_id = $response;
                $save_project->project_id = $project->id;
                $save_project->save();

                User::find($response)->update(['parent_member' => $response, 'linked_user_role' => 'admin', 'current_project' => $project->id]);
            } else {
                $user_projects = UserProjects::where('user_id', $pa)->get();
                foreach ($user_projects as $value) {
                    // Save Team Projects
                    $save_project = new UserProjects();
                    $save_project->user_id = $response;
                    $save_project->project_id = $value->project_id;
                    $save_project->save();
                }
                // Set User Current Project
                User::find($response)->update(['current_project' => $save_project->project_id]);
            }
            if (!empty($response)) {
                $trailArray = array(
                    'user_id' => $response,
                    'trail_quantity' => 10,
                );
                $response = Trail::insertGetId($trailArray);
                if (!empty($response)) {
                    $data['response'] = true;
                    $data['msg'] = 'Your Account Created successfully';
                }
            }
        }
        return response()->json($data);

    }

    public function password_recover(Request $request)
    {
        if (!$request->isMethod('post')) {
            return view('admin.user.password_recover');
        } else {
            $data = array();
            $data['response'] = false;
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|max:50',
            ]);
            if (!$validator->fails()) {
                $post = ['email' => $request->input('email')]; //   no comments
                $row = $this->userModel->where($post)->first(); // no comments
                if (!empty($row)) {
                    $user_id = $row['user_id'];
                    $email = $this->createBase64($request->input('email')); // send encode email
                    $user_id = $this->createBase64($user_id); //send encode id
                    $url = url('update_password' . '/' . $user_id . '/' . $email);
                    $message = "You recently requested for reset password of your account in Trapsol<br>click the
                    button below to reset it :<br> ";
                    $message .= '<a href="' . $url . '" class="button btn btn-primary">Reset your password</a>';
                    $this->send_email('', $request->input('email'), 'Email Confirmation', $message);
                    $data['response'] = true;
                    $data['msg'] = ' Please follow that email to reset your password';

                } else {
                    $data['msg'] = ' Email does not exist ';

                }
            } else {
                $errors = $validator->errors();
                $data['email_error'] = $errors->first('email');
            }
            $data['csrf_token'] = csrf_token();
            echo json_encode($data);
        }
    }
    public function recoverpassword(Request $request, $id = '', $email = '')
    {
        if (!$request->isMethod('post')) {
            $id = $this->decodeBase64($id);
            $email = $this->decodeBase64($email);
            $where = array('user_id' => $id, 'email' => $email);
            $result = $this->userModel->where($where)->first(); // checking email, id in db
            if (empty($result)) {
                return redirect('/');
            }
            $this->data['id'] = $id;
            return view('admin.user.reset_password', $this->data);
        } else {
            $this->data['response'] = false;
            $validator = Validator::make($request->all(), [
                'password' => 'required|min:8',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                $this->data['password_error'] = $errors->first('password');
            } else {
                $user = $request->input('id');
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $passwrodArray = [];
                $passwrodArray = array(
                    'password' => $password,
                );
                $this->User = new User();
                $response = $this->User->where('id', $user)->update($passwrodArray);
                if ($response == true) {
                    $request->session()->flash('message', 'Password Updated Sucessfully');
                    $this->data['response'] = true;
                }
            }
            $this->data['csrf_token'] = csrf_token();
            echo json_encode($this->data);
        }
    }
    public function update_profile(Request $request)
    {
        if (request()->is('update/company_info')) {
            $validator = Validator::make($request->all(), [
                'cmp_name' => 'required|max:50',
                'cmp_description' => 'required|max:500',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'username' => 'required|max:50',
                'email' => 'required|max:50|email',
                'fname' => 'required|max:50',
                'lname' => 'required|max:50',
            ]);
        }

        if ($validator->fails()) {
            return redirect('profile')->withErrors($validator)->withInput();
        } else {
            $input = $request->all();
            unset($input['_token']);
            $response = $this->userModel->where('user_id', $this->data['user']['userID'])->update($input);
            if ($response == true) {
                if (!empty($input['username'])) {
                    return redirect('profile')->with('personalinfo', 'personal information updated successfully');
                } else {
                    return redirect('profile')->with('companyinfo', 'company information updated successfully');
                }
            }
        }
    }

    /**
     * Method to create form data
     * @param array $input
     * @param collection $userData
     * @return array $data
     */
    public function createFormData($input = array(), $userData)
    {
        dd($userData);
        try {
            return array(
                'project_id' => $userData->current_project,
                'company_name' => $input['Company'] ?? '',
                'description' => $input['CompanyDescription'] ?? '',
                'add_keywords' => $input['add_keywords'] ?? '',
                'user_id' => $this->data['user']['userID'] ?? '',
                'avoid_keywords' => $input['avoid_keyword'] ?? '',
                'ads_category' => decrypt($input['category']),
            );
        } catch (\Throwable $th) {
            Log::error("Error in createFormData on UserController " . $th->getMessage());
        }
    }
}