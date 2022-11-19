@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Calculate Salary</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Calculate Salary </li>
    </ol>
    <div class="row">


    </div>
    <div class="card">
        <div class="card-header">
            <h4>Salary
                <a href="{{url('admin/posts')}}" class="btn btn-danger float-end">
                    Back
                </a>
            </h4>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{url('/payroll/save')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label >Employee</label>
                        <Select name="salary_id" class="form-control">
                            <option disabled selected><<--Select Employee-->></option>
                            @foreach ($user as $item)
                                <option value="{{$item->userInformation->salary_id}}">{{$item->userInformation->salary_id." - ".$item->userInformation->name}}</option>
                            @endforeach
                        </Select>
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
             
                {{-- <div class="mb-3">
                    <label >Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label >Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label >Password Confirmed</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
                <input type="hidden" class="image" name="image" value="photo_defaults.jpg">
                <div class="mb-3">
                    <label >Avatar</label>
                    <input type="file" name="avatar" class="form-control">
                </div>
                <h2>Information</h2>
                <div class="mb-3">
                    <label >Gender</label>
                  
                        <select name="gender" class="form-control">
                            <option selected disabled><--Select Gender--></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          
                        </select>
                       
                </div>
                <div class="mb-3">
                    <label >Your Phone</label>
                    <input type="text" name="phone_number" class="form-control">
                </div>
              

                
   
                <div class="mb-3">
                    <label >Birth day</label>
                   
                    <input type="date" class="form-control" name="birth_date" placeholder="" name="birth_day" value="">
                </div>
                <div class="mb-3">
                    <label >Card Id</label>
                    <input type="text" name="pin_code" class="form-control">
                </div>
                <div class="mb-3">
                    <label >Address</label>
                    <input type="text" name="address" class="form-control">
                </div>
               
                <div class="mb-3">
                    <label >Department</label>
                    <input type="text" name="department" class="form-control">
                </div>
                <div class="mb-3">
                    <label >Position</label>
                    <input type="text" name="position" class="form-control">
                </div>
                
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Save Category</button>
                </div> --}}
           

            </form>
        </div>
    </div>
</div>
@endsection