<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array('email', 'password', 'role','phone','linkout','parent_member','member_of','linked_user_role');

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function login($user){
        $password   = $user['password'];
        $email      = $user['email'];
        $credentials = array();
        $credentials['email'] = $email;
        $credentials['password'] = $password;
        $user = $this->where(['email' => $user['email']])->first();
        
		   if($user){
            //    dd();
            //    $verify = password_verify($password, $user['password']);
		   	// if($verify){
            if(auth()->attempt($credentials)) {
                   return ['userID'=> $user['id'] ,'role' => $user['role'] ,'email' => $user['email'] , 'username'=> $user['username'], 'isLoggedIn' => true,'status'=>$user['status'], 'current_project' => $user['current_project'],'linkout'=>$user['linkout'],'parent_member'=>$user['parent_member']];
                   
		   	}else{
		   		return false;
		   	}

		   }
    return false;

    }
    public function trailof()
    {
        return $this->hasone('App\Models\Trail','id','user_id');
    }
    
    /**
     * Get the projects that owns the user.
     */
    public function projects()
    {
        return $this->hasMany('App\Models\ProjectsModel', 'id','user_id');
    }
}
