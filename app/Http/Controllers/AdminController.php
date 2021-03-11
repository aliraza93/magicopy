<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use App\Models\Ads;
use App\Models\Trail;
use App\Models\AdResponse;
use App\Models\UserSubscription;
use App\Models\PageContent;
use App\Models\Pricing;
use App\Models\Logo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
use Stevebauman\Location\Facades\Location;
use App\Models\Gtag;

class AdminController extends Controller
{
    
    public function __construct(){
        
        parent::__construct();
        $this->userModel = new User();
        $this->subscription = new UserSubscription();
    }

    public function index(Request $request){
        
        $user = DB::table('users')
        ->join('user_subscriptions', 'user_subscriptions.user_id', '=', 'users.id')
        ->distinct('user_subscriptions.user_id')
        ->select('users.*','user_subscriptions.status as subscription_status','user_subscriptions.plan_period_start','user_subscriptions.plan_period_end');
        if(request()->is('trail-user')){
            $user_id=[];
            foreach(UserSubscription::select('user_id')->get()->toArray() as $val){
                $user_id[] = $val['user_id'];
            }
            $this->data['users'] =  User::whereNotIn('id',UserSubscription::select('id')->get()->toArray())->where('role','user')->paginate(10);

        }
        else if(request()->is('subscribe-user')){
            $this->data['users']  = $user->where('user_subscriptions.status','active')->paginate(10);
        }
        else if(request()->is('cancelled-user')){
            $this->data['users']  = $user->where('user_subscriptions.status','canceled')->paginate(10);
        }
        else{
            $this->data['users']  = $user->where('user_subscriptions.status','active')->paginate(10);
        }
        $this->data['trail_user'] = count( User::whereNotIn('id',UserSubscription::select('id')->get()->toArray())->where('role','user')->get()->toArray());
            
        $this->data['subscribe_user'] = count($user->where('user_subscriptions.status','active')->get()->toArray());
        $this->data['cancelled_user'] = count($this->subscription->where('status','canceled')->distinct('user_id')->get()->toArray());
        return view('admin.admin.index',$this->data);
    }

    public function login(Request $request){
        
        if(! $request->isMethod('post')){
           
            return view('admin.admin.login',$this->data);
        }

        $validator = Validator::make($request->all(), [
            'email' => 'required|max:50|email',
            'password' => 'required|min:8',
        ]);
        if ($validator->fails()) {
            return redirect('admin/login')->withErrors($validator)->withInput();
        }
        else{
           
            $formData = $request->all();
            unset($formData['_token']);
            $status = $this->userModel->login($formData);
            if($status==false){
                //$request->session()->flash('error', 'Wrong Email Or Password!');
                return redirect('admin/login')->with('error', 'Wrong Email Or Password!')->withInput();
            }
            else{

                if($status['role']=='isAdmin'){
                    $request->session()->put('user', $status);
                    return redirect('dashboard');
                }
                else{
                    return redirect('admin/login')->with('error', 'You are not Allowed to perform this action!')->withInput();
                }
            }
        }

   }

   public function register(Request $request){

    if(! $request->isMethod('post')){
        return view('admin.admin.register',$this->data);
    } 
    $validator = Validator::make($request->all(), [
        'username' => 'required|max:50',
        'email' => 'required|max:50|unique:user|email',
        'password' => 'required_with:confirm_password|same:confirm_password|min:8',
        'confirm_password' =>'required',
        'checkbox'=>'required'
    ]);
    if ($validator->fails()) {
        return redirect('admin/register')->withErrors($validator)->withInput();
    }
    else{
        $input = $request->all();
        $formData = array(
            'username'=>$input['username'],
            'email'=> $input['email'],
            'password'=>Hash::make($input['password']),
            'role'    =>'isAdmin'
        );
        $response =  $this->userModel->insertGetId($formData);
            if(!empty($response)){
               
                // $user_id = $response;
                // $user_id = bin2hex(encrypt($user_id));  //send encode id 
                // $url = url('/login'.'/'.$user_id);
                // $message = "You registered an account on Trapsol, <br>
                // before being able to use your account you need to verify that this is your email address by clicking below link: <br>
                // ";
                // $message .= '<a href="'.$url.'" class="button btn btn-primary">Reset your password</a><br>';
                // $message .="Kind Regards, Trapsol :<br>";
                // $this->send_email('',$input['email'],'Email Confirmation',$message);
                if(!empty($response)){

                    return redirect('admin/login')->with('message','Your Account Created successfully');

                }
            }
        }

    }

    public function manage_page(Request $request){

        if(! $request->isMethod('post')){
            $this->data['page_content'] = PageContent::where('id','>','0')->first();
            return view('admin.admin.manage_page',$this->data);
        }
        else{

            $input = $request->all();
            if(!empty($input['main_content_display'])){
          
                $main_content = array(
                    'main_content_display'=>!empty($input['main_content_display'])?$input['main_content_display']:'',
                    'main_content_heading'=>$input['main_content_heading'],
                    'main_content_text'=>$input['main_content_text']
                    
                );
                $main_content['file']= [];
                if(!empty($request->image)){
                    foreach($request->image as $key => $file)
                    {
                         $main_content['file'][] = $file;
                    }
                }
                if(!empty($request->file('file'))){
                    foreach($request->file('file') as $key => $file)
                    {     
                        $fileName = time().'.'.$file->extension(); 
                        $file->move(public_path('assets/page-content'), $fileName);
                        $main_content['file'][] = $fileName;
                    }
                }
                $data = ['main_content'=>json_encode($main_content)];
            }
           else if(!empty($input['content1_display'])){
                $content1 = array(
                    'content1_display'=>!empty($input['content1_display'])?$input['content1_display']:'',
                    'content1_heading'=>$input['content1_heading'],
                    'content1_text'=>$input['content1_text']

                );
                if(!empty($request->image)){
                    $content1['file'] = $request->image;
                }
                if(!empty($request->file('file'))){
                    $file =  $request->file('file');
                    $fileName = time().'.'.$file->extension();  
                    $file->move(public_path('assets/page-content'), $fileName);
                    $content1['file'] = $fileName;
                }
               
                $data = ['content1'=>json_encode($content1)];
            }
            else if(!empty($input['content2_display'])){
                $content2 = array(
                    'content2_display'=>!empty($input['content2_display'])?$input['content2_display']:'',
                    'content2_heading'=>$input['content2_heading'],
                    'content2_text'=>$input['content2_text']
                );
                if(!empty($request->image)){
                    $content2['file'] = $request->image;
                }
                if(!empty($request->file('file'))){
                    $file =  $request->file('file');
                    $fileName = time().'.'.$file->extension();  
                    $file->move(public_path('assets/page-content'), $fileName);
                    $content2['file'] = $fileName;
                }
                
                $data = ['content2'=>json_encode($content2)];
            }
            else if(!empty($input['content3_display'])){
                $content3 = array(
                    'content3_display'=>!empty($input['content3_display'])?$input['content3_display']:'',
                    'content3_heading'=>$input['content3_heading'],
                    'content3_text'=>$input['content3_text']
                );
                if(!empty($request->image)){
                    $content3['file'] = $request->image;
                }
                if(!empty($request->file('file'))){
                    $file =  $request->file('file');
                    $fileName = time().'.'.$file->extension();  
                    $file->move(public_path('assets/page-content'), $fileName);
                    $content3['file'] = $fileName;
                }
                $data = ['content3'=>json_encode($content3)];
            }
            else if (!empty($input['content4_display'])){
                $content4 = array(
                    'content4_display'=>!empty($input['content4_display'])?$input['content4_display']:'',
                    'content4_heading'=>$input['content4_heading'],
                    'content4_text'=>$input['content4_text'],
                    'content4_section1_heading'=>$input['content4_section1_heading'],
                    'content4_section1_text'=>$input['content4_section1_text'],
                    'content4_section2_heading'=>$input['content4_section2_heading'],
                    'content4_section2_text'=>$input['content4_section2_text'],
                    'content4_section3_heading'=>$input['content4_section3_heading'],
                    'content4_section3_text'=>$input['content4_section3_text'],
                );
                $data = ['content4'=>json_encode($content4)];
            }
            else if (!empty($input['content5_display'])){
                $content5 = array(
                    'content5_display'=>!empty($input['content5_display'])?$input['content5_display']:'',
                    'content5_heading'=>$input['content5_heading'],
                    'content5_text'=>$input['content5_text']
                );
                $data = ['content5'=>json_encode($content5)];
            }
            else if (!empty($input['content6_display'])){
                $content6 = array(
                    'content6_display'=>!empty($input['content6_display'])?$input['content6_display']:'',
                    'content6_heading'=>$input['content6_heading'],
                    'content6_question1'=>$input['content6_question1'],
                    'content6_answer1'=>$input['content6_answer1'],
                    'content6_question2'=>$input['content6_question2'],
                    'content6_answer2'=>$input['content6_answer2'],
                    'content6_question3'=>$input['content6_question3'],
                    'content6_answer3'=>$input['content6_answer3'],
                );
                $data = ['content6'=>json_encode($content6)];
            }
            else if (!empty($input['content7_display'])){
                $content7 = array(
                    'content7_display'=>!empty($input['content7_display'])?$input['content7_display']:'',
                    'content7_heading'=>$input['content7_heading'],
                    'content7_text'=>$input['content7_text'],
                );
                $data = ['content7'=>json_encode($content7)];
            }
            else if (!empty($input['content8_display'])){
                $content8 = array(
                    'content8_display'=>!empty($input['content8_display'])?$input['content8_display']:'',
                    'content8_vedio_url'=>$input['content8_vedio_url']
                );
                if(!empty($request->image)){
                    $content8['file'] = $request->image;
                }
                if(!empty($request->file('file'))){
                    $file =  $request->file('file');
                    $fileName = time().'.'.$file->extension();  
                    $file->move(public_path('assets/page-content'), $fileName);
                    $content8['file'] = $fileName;
                }
                $data = ['content8'=>json_encode($content8)];
            }
            else{
                echo "N/A";
            }
            
            $response =  PageContent::where('id','>','0')->update($data);

            if($response){
                $this->data['response'] =true; 
                return response()->json($this->data);
                // return redirect('manage-page')->with('message','Data Update Successfully');
            }
        }
    }

    public function create_logo(Request $request){
       
         if(! $request->isMethod('post')){
             $this->data['logo'] = Logo::where('id','>','0')->first();
         return view('admin.admin.logo',$this->data);
             
         }
         else{
             $fileName = '';
            if(!empty($request->file('file'))){
                    $file =  $request->file('file');
                    $fileName = time().'.'.$file->extension();  
                    $file->move(public_path('assets/page-content'), $fileName);
                    
                }
                $result = Logo::where('id','>','0')->update(['file'=>$fileName]);
                if($result){
                    return redirect('logo/create')->with('message','File Uplode Successfully');
                }
         }
         
    }

    public function pricing(Request $request){
        if(! $request->isMethod('post')){
            $this->data['pakage']  = Pricing::where('id','>','0')->first();
            return view('admin.admin.pricing',$this->data);
        }
        else{
            
            $validator = Validator::make($request->all(), [
                'price' => 'required|numeric',
                'duration' => 'required|alpha',
            ]);
            if ($validator->fails()) {
                return redirect('pricing')->withErrors($validator)->withInput();
            }
            else{
                $input = $request->all();
                unset($input['_token']);
                $response  = Pricing::where('duration',$request->input('duration'))->update($input);
                if($response){

                    return redirect('pricing')->with('message','Pricing Updated Succesfully');
                }
            }
        }
    }

    public function g_tag(Request $request){
        if(! $request->isMethod('post')){
            $this->data['tag']= Gtag::where('id','>',0)->first();
            return view('admin.admin.g_tag',$this->data);
        }
        else{
             $validator = Validator::make($request->all(), [
            'text' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect('g-tag')->withErrors($validator)->withInput();
            }
            else{
                $input = $request->all();
                unset($input['_token']);
                $tags = Gtag::where('id',$input['id'])->update($input);
                if($tags==true){
                    return back()->with('message','Tag Updated Successfully');
                }
            }
        }
    }

    public function fetch_price(Request $request){
        if(!empty($duration = $request->duration)){
           
            $data['response'] = true;
            $pricing = Pricing::where('duration',$duration)->first();
            // $data->price = $pricing->price;
            // $data->discount = $pricing->discount;
            // print_r($data);exit;
            // return response()->json($data);
            $pricing->response = true;
            return $pricing;
        }
    }
    
    public function remove_gif(Request $request , $key){
         $page_content = PageContent::where('id','>','0')->first();
         $main_content = json_decode($page_content->main_content,true);
         unset($main_content['file'][$key]);
         $response  = PageContent::where('id','>','0')->update(['main_content'=> json_encode($main_content)]);
         if($response){
             return back();
         }
    }

}
