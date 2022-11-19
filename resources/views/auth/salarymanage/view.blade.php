@extends('layouts.master')
@section('title')
    View User
@endsection
@section('content')
<div>
<div class="container-fluid px-4">
    <h1 class="mt-4">View User</h1>
    <div class="card">
        <div class="card-header">
            <h4>View Salary 
                <a href="{{url('staffview')}}" class="btn btn-danger btn-sm float-end">Back</a>
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
        
        
            <div class="row">
                <div class="col-md-5 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="{{asset('assets/images/'.$user->avatar)}}">
                        <span class="font-weight-bold">{!!$user->name!!}</span>
                        <span class="text-black-50">{!!$user->email!!}</span>
                        <span> </span>
                    </div>
                </div>
                <form class="col-md-5 border-right"  method="POST" enctype="multipart/form-data">
                    @csrf
                
                    
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Detail User</h4>
                            </div>
                        
                                
                                {{-- <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="" placeholder="surname"></div> --}}
                            
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" name="name" placeholder="" value="{{$user->name}}"></div>
                                <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" name="email" placeholder="" value="{{$user->email}}"></div>
                        
                                <div class="col-md-6"><label class="labels">Birthday</label>
                                    <input type="text" class="form-control" name="birth_date" placeholder="" name="birth_day" value="{{$user_information->birth_date}}">
        
                                
                                </div>
                                <div class="col-md-6"><label class="labels">Mobile Number</label><input type="text" class="form-control" name="phone_number" placeholder=""  value="{{$user_information->phone_number}}"></div>
                                <div class="col-md-6"><label class="labels">Gender</label>
                                    <input type="text" class="form-control"  placeholder="" name="gender" value="{{$user_information->phone_number}}">
                                </div>
                                <div class="col-md-6"><label class="labels">Postcode</label><input type="text" class="form-control" name="pin_code" placeholder=""  value="{{$user_information->pin_code}}"></div>
                                
                                <div class="col-md-12"><label class="labels">Address Line </label><input type="text" class="form-control" name="address" placeholder=""  value="{{$user_information->address}}"></div>
                                
                                
                                
                                <div class="col-md-6"><label class="labels">Department</label><input type="text" class="form-control" name="department" placeholder="" value="{{$user_information->department}}"></div>
                                <div class="col-md-6"><label class="labels">Position</label><input type="text" class="form-control" name="position" placeholder="" value="{{$user_information->position}}"></div>
                                
                    
                            
                                
                            
                            </div>
                            
                        
                        </div>
        
                </form>
            </div>

        </div>

       
     
                
        
    </div>
</div>
<div class="container-fluid px-4">
    <h1 class="mt-4">Salary</h1>
    <div class="card">
        <div class="card-header">
            <h4>View Salary 
              
            </h4>
        </div>
        <div class="card-body">
            
            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th>
                        STT
                        </th>
                        <th>
                            Salary ID
                        </th>
                        <th>
                            Mouth Salary
                        </th>
                        <th>
                            Basic Salary
                        </th>
                        <th>
                            Work Day
                        </th>
                        <th>
                            Allowance
                        </th>
                      
                        
                        <th>
                            Fee payable
                        </th>
                        <th>
                            Money Received
                        </th>
                        <th>
                            Day Check
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt=0;?>
                    @foreach ($salary as $item)
                        <?php $stt++;?>
                        <tr>
                            <td>{{$stt}}</td>
                            <td>{{$item->salary_id}}</td>
                            <td>
                                {{$item->mouth_salary}}
                            </td>
                            <td>
                                {{$item->basic_salary}}
                            </td>
                            <td>
                                {{$item->work_day}}
                            </td>
                            <td>
                                {{$item->allowance}}
                            </td>
                            <td>
                                {{$item->fee_payable}}
                            </td>
                            <td class="text-primary">
                                {{$item->money_received}}
                            </td>
                            <td>
                                {{$item->day_check}}
                            </td>
                        </tr>



                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
   
    
    

   
</div>
</div>
@endsection