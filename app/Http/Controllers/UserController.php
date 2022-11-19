<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserInformation;

use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function profile(){
        $profile=Session::get('id');
        $userInfo=UserInformation::find($profile);
       
        $profile_info=User::where('id',$profile)->first();
      
        return view('auth.userView.profile_user',compact('userInfo','profile_info'));
            
    }
        
    
    public function updateUser(Request $request){
        $request->validate( [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'image'=>[],
            'birth_date'=>['required','date'],
            'phone_number'=>['required','min:11','numeric'],
            'gender'=>['required'],
            'pin_code'=>['required','min:10','numeric'],
            'address'=>['required','string','max:255'],
            'department'=>['required','string','max:255'],
            'position'=>['required','string','max:255'],

        ]);
        $user_information=UserInformation::where('id',Session::get('id'))->first();
        $user=User::where('id',Session::get('id'))->first();
        $user_information->name=$request->name;
        $user_information->email=$request->email;
        $user_information->birth_date=$request->birth_date;
        $user_information->phone_number=$request->phone_number;
        $user_information->gender=$request->gender;
        $user_information->pin_code=$request->pin_code;
        $user_information->address=$request->address;
        $user_information->department=$request->department;
        $user_information->position=$request->position;
       


        $user_information->update();

        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone_number=$request->phone_number;
        $user->department=$request->department;
        $user->position=$request->position;
        if($request->hasFile('image')){

            $destination='assets/images/'.$user->avatar;
            if (File::exists($destination)){
                File::delete($destination);
            }

            $file= $request->File('image');
            $filename=time() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/', $filename);
            $user->avatar=$filename;
       
        }

        $user->update();
        Toastr::success('Update successfully','Success');
        return redirect()->intended('profile_user');
    }
}
