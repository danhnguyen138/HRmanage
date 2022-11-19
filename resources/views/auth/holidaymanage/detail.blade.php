@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">View Detail</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">View Detail </li>
    </ol>
    <div class="row">


    </div>
    <div class="card">
        <div class="card-header">
            <h4>View Detail
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

            <form action="{{url('/createholiday')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label >Name</label>
                       
                        <input type="text" name="name" class="form-control" value="{{$user->name}}"readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label >Position</label>
                            <input type="text" name="position" class="form-control" value="{{$user->position}}"readonly >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label >Department</label>
                            <input type="text" name="department" value="{{$user->department}}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label >Day Start</label>
                            <input type="text" name="day_start" value="{{$user->day_start}}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label >Day Finish</label>
                            <input type="text" name="day_finish" value="{{$user->day_finish}}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label >Reason</label>
                            <textarea rows="5" name="reason"  id="mySummernote" class="form-control">{!!$user->reason!!}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label >Classify</label>
                            <input type="text" name="classify" value="{{$user->classify}}" class="form-control" readonly>
                        </div>
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