<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Holiday;
use Illuminate\Http\Request;
use App\Models\UserInformation;
use Yoeunes\Toastr\Facades\Toastr;

class HolidayController extends Controller
{
    public function indexUser(){
        $holiday=Holiday::where('user_id',Session::get('id'))->get();
        return view('auth.holidaymanage.indexUser',compact('holiday'));
    }
    public function store(){
        $user= UserInformation::where('id',Session::get('id'))->first();
        return view('auth.holidaymanage.create',compact('user'));
    }
    public function create(Request $request){
        $request->validate([
            'name'=>['required'],
            'position'=>['required'],
            'department'=>['required'],
            'day_start'=>['required','date'],
            'day_finish'=>['required','date'],
            'reason'=>['required','max:255'],
            'classify'=>['required']
        ]);
        $holiday= new Holiday;
        $holiday->holiday_id= "HL".time();
        $holiday->user_id=Session::get('id');
        $holiday->name=$request->name;
        $holiday->department=$request->department;
        $holiday->position=$request->position;
        $holiday->day_start=$request->day_start;
        $holiday->day_finish=$request->day_finish;
        $holiday->reason=$request->reason;
        $holiday->classify=$request->classify;
        $holiday->status='0';
        $holiday->save();
        Toastr::success("Holiday update successfully");
        return redirect('createholiday');

    }
    public function viewDetailUser($holiday_id){
        $user= Holiday::where('holiday_id',$holiday_id)->first();
        return view ('auth.holidaymanage.detail',compact('user'));
    }
    public function indexAdmin(){
        $holidayWaitting= Holiday::where('status',0)->get();
        $holidayChecked=Holiday::where('status','<>',0)->get();
        return view('auth.holidaymanage.indexAdmin',compact('holidayWaitting','holidayChecked'));
    }
    public function detailAdmin($holiday_id){
        $user= Holiday::where('holiday_id',$holiday_id)->first();
        return view ('auth.holidaymanage.detailAdmin',compact('user'));
    }
    public function checkHoliday($holiday_id,Request $request){
        $request->validate([
            'checked'=>'required'
        ]);
        $holiday= Holiday::where('holiday_id',$holiday_id)->first();
        if ($request->checked=="1"){
            $holiday->status="1";
            $holiday->update();
            Toastr::success("You are Accept");
            return redirect('viewholidayadmin');
        }else{
            $holiday->status="2";
            $holiday->update();
            Toastr::error("You are Deny");
            return redirect('viewholidayadmin');
        }
        
    }
}
