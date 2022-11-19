<?php

namespace App\Http\Controllers\Auth;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout',
            'locked',
            'unlock'
        ]);
    }
    public function login(){
        return view('auth.login');
    }
    public function authenticate(Request $request){
        $request->validate([
            'email'=>'required|string',
            'password'=>'required|string'
        ]);
        $email=$request->email;
        $password=$request->password;
        $dt=Carbon::now();
        $nowToday=$dt->toDayDateTimeString();
        if (Auth::attempt(['email'=> $email,'password'=> $password,'status'=>'Active'])) {
            /** get session */
            $user = Auth::User();
            Session::put('id',$user->id);
            Session::put('name', $user->name);
            Session::put('email', $user->email);
         
            Session::put('join_date', $user->join_date);
            Session::put('phone_number', $user->phone_number);
            Session::put('status', $user->status);
            Session::put('role_name', $user->role_name);
            Session::put('avatar', $user->avatar);
            Session::put('position', $user->position);
            Session::put('department', $user->department);
            $activityLog = ['name'=> Session::get('name'),'email'=> $email,'description' => 'Has log in','date_time'=> $nowToday,];
            // DB::table('activity_logs')->insert($activityLog);
            Toastr::success('Login successfully','Success');
            return redirect()->intended('home');
        }else {
            Toastr::error('fail, WRONG USERNAME OR PASSWORD','Error');
            return redirect('login');
        }
    }
    public function logout(Request $request)
    {
        $dt         = Carbon::now();
        $nowToday  = $dt->toDayDateTimeString();

        $activityLog = ['name'=> Session::get('name'),'email'=> Session::get('email'),'description' => 'Has log out','date_time'=> $nowToday,];
        // DB::table('activity_logs')->insert($activityLog);
        // forget login session
        $request->session()->forget('id');
        $request->session()->forget('name');
        $request->session()->forget('email');
      
        $request->session()->forget('join_date');
        $request->session()->forget('phone_number');
        $request->session()->forget('status');
        $request->session()->forget('role_name');
        $request->session()->forget('avatar');
        $request->session()->forget('position');
        $request->session()->forget('department');
        $request->session()->flush();
        Auth::logout();
        Toastr::success('Logout successfully :)','Success');
        return redirect('login');
    }
}
