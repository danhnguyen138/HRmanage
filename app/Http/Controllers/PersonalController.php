<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserInformation;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class PersonalController extends Controller
{
    public function index(){
        $usermanage=User::where('role_name','Membership')->get();

        return view('auth.usermanage.index',compact('usermanage'));


    }
    public function create(){
        return view('auth.usermanage.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation'=>['required'],

            'avatar'=>['required'],
            'birth_date'=>['required','date'],
            'phone_number'=>['required','min:11','numeric'],
            'gender'=>['required'],
            'pin_code'=>['required','min:10','numeric'],
            'address'=>['required','string','max:255'],
            'department'=>['required','string','max:255'],
            'position'=>['required','string','max:255'],
        ]);
        $dt=Carbon::now();
        $nowToday= $dt->toDayDateTimeString();
        $check_user= UserInformation::where('email',$request->email)->first();
    
        if (isset($check_user)){
            Toastr::error('Email has been used');
            return redirect('/add-employee');
        }
        $user= new User;
   
        $user->name= $request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->phone_number=$request->phone_number;
        if($request->hasFile('avatar')){

            $destination='assets/images/'.$user->avatar;
            if (File::exists($destination)){
                File::delete($destination);
            }

            $file= $request->File('avatar');
            $filename=time() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/', $filename);
            $user->avatar=$filename;
       
        };
        $user->join_date=$nowToday;
        $user->department=$request->department;
        $user->position=$request->position;
        $user->status="Active";
        $user->role_name='Membership';
        
        $user->save();
        $user_information=new UserInformation;
        $user_information->name=$request->name;
        $user_information->email=$request->email;
        $user_information->birth_date=$request->birth_date;
        $user_information->gender=$request->gender;
        $user_information->address=$request->address;
        $user_information->pin_code=$request->pin_code;
        $user_information->phone_number=$request->phone_number;
        $user_information->department=$request->department;
        $user_information->position=$request->position;
        $user_information->salary_id="ML".time();
        $user_information->save();
        Toastr::success('Add user successfully');
        return redirect('/staffview');


    }
    public function view_detail($user_id){
        $user=User::where('id',$user_id)->first();
        $user_information=UserInformation::where('id',$user_id)->first();
        return view('auth.usermanage.view',compact('user','user_information'));
    }
    public function delete($user_id){
        $user= User::where('id',$user_id)->first();
        $user_information=UserInformation::where('id',$user_id)->first();
        if($user){
            $destination='assets/images'.$user->avatar;
            if (File::exists($destination)){
                File::delete($destination);
            }
            $user->delete();
            $user_information->delete();
            Toastr::success('User Deleted Successfully');
            return redirect('/staffview');
        }
        else{
            Toastr::error('No User Id');
            return redirect('staffview');
        }
    }
}
