<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProjectsModel;
use App\Models\AdResponse;
use App\Models\UserFavourite;
use App\Models\UserProjects;
use App\Models\Ads;
use App\Models\User;
use Log;

class ProjectController extends Controller
{
	public function __construct(){
        
        parent::__construct();
        $this->userModel = new User();
    }

	/**
	* Method to update user current project
	* @param int $project_id
	* @return response JSON
	*/
	public function updateUserProject($project_id = 0)
	{
		try {
			$user = User::where('id', $this->data['user']['userID'])->first(); // Fetch user data
			$user->current_project = $project_id; 
			$user->save(); // Update user current project
			return response()->json(['status' => true]);
		} catch(\Exception $err){
    		Log::error('Error in updateUserProject on ProjectController :'. $err->getMessage());
    		return response()->json(['status' => false]);
    	}
	}

	/**
	* Method to create Project
	* @param Illuminate\Http\Request $request
	*/
	public function createProject(Request $request)
	{
		try {
			$validator = Validator::make($request->all(), [
		        'name' => 'required|string'
		    ]);
		    if ($validator->fails()) {
		        return response()->json(['errors'=>$validator->errors()->all(), 'status' => false]);
		    }
			if($request->id == '') {
				$project = new ProjectsModel();
			} else {
				$project = ProjectsModel::find($request->id);
			}
			// $project->user_id = $this->data['user']['userID']; 
			// $project->name = $request->name; 
			// if($project->save()) { // Update user current project
			// 	return response()->json(['status' => true]);
			// }

			$project->name = $request->name; 
			if($project->save()) { // Update user current project
				if($request->id == '') {
					$userproject = new UserProjects();
					$userproject->user_id = $this->data['user']['userID'];
					$userproject->project_id = $project->id;
					$userproject->save();
				}
				return response()->json(['status' => true]);
			}

			return response()->json(['status' => false]);
		} catch(\Exception $err){
    		Log::error('Error in createProject on ProjectController :'. $err->getMessage());
    		return response()->json(['status' => false]);
    	}
	}

	public function deleteProject($project_id)
	{
		try {
			$project = ProjectsModel::find($project_id);
			if($project) {
				$project->delete();
				return response()->json(['status' => true]);
			} else {
				return response()->json(['status' => false]);
			}
		} catch(\Exception $err){
    		Log::error('Error in deleteProject on ProjectController :'. $err->getMessage());
    		return response()->json(['status' => false]);
    	}
	}

	public function allContents(Request $request)
	{
		try {
			$userData = User::where('id', $this->data['user']['userID'])->first();
			$this->data['contents'] = AdResponse::where(['user_id' => $userData->user_id, 'project_id' => $userData->current_project])->with('ads')->paginate(9); 
			$this->data['total_contents'] = AdResponse::where(['user_id' => $userData->user_id, 'project_id' => $userData->current_project])->with('ads')->count();
			return view('admin.content.index', $this->data);
		} catch(\Exception $err){
    		Log::error('Error in allContents on ProjectController :'. $err->getMessage());
    		return back()->with('error', 'Oops! Something went wrong.');
    	}
	}

	public function allContentsData(Request $request)
	{
		try {
			$userData = User::where('id', $this->data['user']['userID'])->first();
			$this->data['contents'] = AdResponse::where(['user_id' => $userData->user_id, 'project_id' => $userData->current_project])->orderBy('id', 'desc')->with('ads')->paginate(9)->onEachSide(0); 
			$this->data['page'] =(string)\View::make('components/content',$this->data);
			$this->data['status'] = true;
			return response()->json($this->data);
		} catch(\Exception $err){
    		Log::error('Error in allContents on ProjectController :'. $err->getMessage());
    		return back()->with('error', 'Oops! Something went wrong.');
    	}
	}

	public function allFavoritesData(Request $request)
	{
		try {
			$userData = User::where('id', $this->data['user']['userID'])->first();
			$this->data['contents'] = AdresponseModel::join('user_favourite', 'user_favourite.ad_response_id', '=', 'ad_response.id')->select('ad_response.*')->where(['ad_response.user_id' => $userData->user_id, 'project_id' => $userData->current_project])->orderBy('ad_response.id', 'desc')->with('ads')->paginate(9)->onEachSide(0); 
			$this->data['page'] =(string)\View::make('components/content',$this->data);
			$this->data['status'] = true;
			return response()->json($this->data);
		} catch(\Exception $err){
    		Log::error('Error in allFavouritesData on ProjectController :'. $err->getMessage());
    		return back()->with('error', 'Oops! Something went wrong.');
    	}
	}

	public function allTrashedsData(Request $request)
	{
		try {
			$userData = User::where('id', $this->data['user']['userID'])->first();
			$this->data['contents'] = AdresponseModel::where(['user_id' => $userData->user_id, 'project_id' => $userData->current_project])->onlyTrashed()->orderBy('id', 'desc')->with('ads')->paginate(9)->onEachSide(0);
			$this->data['page'] =(string)\View::make('components/content',$this->data);
			$this->data['status'] = true;
			return response()->json($this->data);
		} catch(\Exception $err){
    		Log::error('Error in allTrashedsData on ProjectController :'. $err->getMessage());
    		return back()->with('error', 'Oops! Something went wrong.');
    	}
	}

	public function getContentDetails($ads_response_id = 0)
	{
		try {
			$data['content'] = AdResponse::findOrFail($ads_response_id); 
			$data['ads'] = Ads::findOrFail($data['content']->ads_id);
			$data['favorites'] = UserFavourite::where(['ad_response_id' => $ads_response_id, 'user_id' => $this->data['user']['userID']])->first();
			$data['url'] = '';
			if($data['ads']->ads_category == 'facebook') {
				$data['url'] = url('facebook-ad/'.$data['ads']->company_name.'/'.encrypt($data['ads']->id).'/'.encrypt($data['content']->id));
				$data['input_url'] = url('facebook-ad/'.$data['ads']->company_name.'/'.encrypt($data['ads']->id));
			} elseif ($data['ads']->ads_category == 'google') {
				$data['url'] = url('google-ad/'.$data['ads']->company_name.'/'.encrypt($data['ads']->id).'/'.encrypt($data['content']->id));
				$data['input_url'] = url('google-ad/'.$data['ads']->company_name.'/'.encrypt($data['ads']->id));
			} elseif ($data['ads']->ads_category == 'product-description') {
				$data['url'] = url('product-description/'.$data['ads']->company_name.'/'.encrypt($data['ads']->id).'/'.encrypt($data['content']->id));
				$data['input_url'] = url('product-description/'.$data['ads']->company_name.'/'.encrypt($data['ads']->id));
			} elseif ($data['ads']->ads_category == 'facebook-headline') {
				$data['url'] = url('facebook-headline/'.$data['ads']->company_name.'/'.encrypt($data['ads']->id).'/'.encrypt($data['content']->id));
				$data['input_url'] = url('facebook-headline/'.$data['ads']->company_name.'/'.encrypt($data['ads']->id));
			} elseif ($data['ads']->ads_category == 'copy-paste') {
				$data['url'] = url('copypaste/'.$data['ads']->company_name.'/'.encrypt($data['ads']->id).'/'.encrypt($data['content']->id));
				$data['input_url'] = url('copypaste/'.$data['ads']->company_name.'/'.encrypt($data['ads']->id));
			}
			if($data['content'] != null) {
				return response()->json(['status' => true, 'data'=> $data]);
			}
			
			return response()->json(['status' => false, 'data'=> $data]);
		} catch(\Exception $err){
    		Log::error('Error in getContentDetails on ProjectController :'. $err->getMessage());
    		return response()->json(['status' => false]);
    	}
	}

	public function deleteResponse($ads_response_id = 0)
	{
		try {
			$response = AdResponse::findOrFail($ads_response_id);
			if($response) {
				$response->delete();
				return response()->json(['status' => true]);
			}
			return response()->json(['status' => false]);
		} catch (\Throwable $th) {
			Log::error('Error in deleteResponse on ProjectController :'. $th->getMessage());
    		return back()->with('error', 'Oops! Something went wrong.');
		}
	}

	public function favourite($ads_response_id = 0)
	{
		try {
			$response = UserFavourite::where(['ad_response_id' => $ads_response_id, 'user_id' => $this->data['user']['userID']])->first();
			if($response) {
				$response->delete();
				return response()->json(['status' => true, 'action' => 'remove']);
			} else {
				$ad_favourite = new UserFavourite();
				$ad_favourite->user_id = $this->data['user']['userID'];
				$ad_favourite->ad_response_id = $ads_response_id;
				$ad_favourite->save();
				return response()->json(['status' => true, 'action' => 'add']);
			}
			return response()->json(['status' => false]);
		} catch (\Throwable $th) {
			Log::error('Error in deleteResponse on ProjectController :'. $th->getMessage());
    		return back()->with('error', 'Oops! Something went wrong.');
		}
	}

	public function updateResponse(Request $request, $ads_response_id = 0)
	{
		try {
			$response = AdResponse::findOrFail($ads_response_id); 
			if($response) {
				$response->description = $request->response;
				$response->update();
				return response()->json(['status' => true]);
			}
			return response()->json(['status' => false]);
		} catch (\Throwable $th) {
			Log::error('Error in deleteResponse on ProjectController :'. $th->getMessage());
    		return back()->with('error', 'Oops! Something went wrong.');
		}
	}
}
