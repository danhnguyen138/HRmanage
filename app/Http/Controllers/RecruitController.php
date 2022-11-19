<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Recruit;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class RecruitController extends Controller
{
    public function create(){
        return view('auth.recruitmanage.create');
    }
    public function store(Request $request){
        $request->validate([
            'title'=>['required'],
            'description'=>['required']
        ]);
        $data= new Recruit;
        $data->title=$request->title;
        $data->description=$request->description;
        $data->save();
        Toastr::success('Recruit has been created');
        return redirect('viewrecruit');
    }
    public function index(){
        $recruit= Recruit::all();
        return view('auth.recruitmanage.index',compact('recruit'));
    }
    public function viewDetailRecruit($id_recruit){
        $recruit= Recruit::find($id_recruit);
        $candidate= Candidate::where('id_recruitment',$id_recruit)->get();
        return view('auth.recruitmanage.viewDetail',compact('recruit','candidate'));
    }
    
}
