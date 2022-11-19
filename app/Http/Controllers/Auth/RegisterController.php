<?php

namespace App\Http\Controllers\Auth;

use auth;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserInformation;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    public function register(){
        // $role=DB::table('role_type_users')->get();
        return view('auth.register');
    }
   

    

    public function storeUser(Request $request)
    {
        $request->validate( [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role_name'=>['required','string','max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation'=>['required']

        ]);
        $dt=Carbon::now();
        $nowToday= $dt->toDayDateTimeString();
        
        User::create([
            'name'=>$request->name,
            
            'avatar'=>$request->image,
            'email'=>$request->email,
            'join_date'=>$nowToday,
            'role_name'=>$request->role_name,
            'status'=>'Active',
            'password'=>Hash::make($request->password)
        ]);
        $data=new UserInformation;
        $data->name=$request->name; 
        $data->email=$request->email;
        $data->salary_id="ML".time();
        $data->save();
      
        Toastr::success('Create new account successfully :)','Success');
        return redirect('login');
    
           

        
    }

  

}
