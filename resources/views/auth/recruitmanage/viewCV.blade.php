@extends('layouts.master')
@section('title')
    Recruit
@endsection
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Recruit </h1>
    <div class="card">
        <div class="card-header">
            <h4>View Recruit
                <a href="/add-employee" class="btn btn-primary btn-sm float-end">Salary Calculate</a>
            </h4>
        </div>
        <div class="card-body">
            
            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <form action="{{url('/payroll/save')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label >Employee</label>
                            <input type="text" name="name" class="form-control" value="{{}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label >Work day</label>
                            <input type="number" name="work_day" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label >Basic Salary</label>
                            <input type="number" name="basic_salary" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label >Allowance</label>
                            <input type="number" name="allowance" value="0" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label >Fee Payable</label>
                            <input type="number" name="fee_payable" value="0" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label >Day check</label>
                            <input type="text" name="day_check" value="<?php echo date('d-m-Y'); ?>"class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label >Description</label>
                            <textarea rows="5" name="note"  id="mySummernote" class="form-control"></textarea>
                        </div>
                    </div>
                   <div class="col-md-12">
                        <div class="mb-3">
                            <label >Admin name</label>
                            <input type="text" name="" value="{{$user_admin}}"class="form-control" readonly>
                        </div>
                   </div>
                   <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Save Salary</button>
                    </div>
                </div>
             
               

            </form>
        </div>
    </div>
   
    
    

   
</div>
@endsection