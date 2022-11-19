<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Salary;
use Illuminate\Http\Request;
use App\Models\UserInformation;
use Yoeunes\Toastr\Facades\Toastr;


class SalaryController extends Controller
{
    public function index(){
        $userInformation= User::where('role_name','Membership')->get();
        return view('auth.salarymanage.index',compact('userInformation'));
    }
    public function story(){
        $user=User::where('role_name','Membership')->get();
        $user_admin=Session::get('name');
      
        return view('auth.salarymanage.create',compact('user','user_admin'));
    }
    public function update(Request $request){
        $request->validate([
            'salary_id'=>['required'],
            'work_day'=>['required'],
            'basic_salary'=>['required'],
            'allowance'=>['required'],
            'fee_payable'=>['required'],
            'day_check'=>['required']
        ]);
        $mouth= Carbon::now()->format('m');
        $year=Carbon::now()->format('Y');
        $check_mouth= Salary::where('salary_id',$request->salary_id,)->where('mouth_salary',$mouth.'/'.$year)->first();
        if (isset($check_mouth)){
            Toastr::error("Salary id is checked mouth salary");
            return redirect('/payroll');
        }
        $salary= new Salary;
       
      
        $user= UserInformation::where('salary_id',$request->salary_id)->first();
        $user_id=$user->id;
        $money_received= $request->work_day*$request->basic_salary+$request->allowance-$request->fee_payable;
        $salary->salary_id=$request->salary_id;
        $salary->user_id=$user_id;
        $salary->mouth_salary=$mouth."/".$year;
        $salary->work_day=$request->work_day;
        $salary->basic_salary=$request->basic_salary;
        $salary->allowance=$request->allowance;
        $salary->fee_payable=$request->fee_payable;
        $salary->money_received=$money_received;
        $salary->day_check=$request->day_check;
        $salary->note=$request->note;
        $salary->save();
        Toastr::success("Salary update successfully");
        return redirect('/payroll');
    }
    public function view_detail($user_id){
        $user=User::where('id',$user_id)->first();
        $user_information=UserInformation::where('id',$user_id)->first();
        $salary= Salary::where('salary_id',$user_information->salary_id)->get();

        return view('auth.salarymanage.view',compact('user','user_information','salary'));
    }
    public function view_user_detail(){
        $user=User::where('id',Session::get('id'))->first();
        $user_information=UserInformation::where('id',Session::get('id'))->first();
        $salary= Salary::where('salary_id',$user_information->salary_id)->get();

        return view('auth.salarymanage.viewuser',compact('user','user_information','salary'));
    }
}
