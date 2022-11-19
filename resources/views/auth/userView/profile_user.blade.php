@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>


    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
        @endforeach
    </div>
    @endif
    
        
    <div class="row">
        <div class="col-md-5 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="{{asset('assets/images/'.$profile_info->avatar)}}">
                <span class="font-weight-bold">{!!$profile_info->name!!}</span>
                <span class="text-black-50">{!!$profile_info->email!!}</span>
                <span> </span>
            </div>
        </div>
        <form class="col-md-5 border-right" action="{{route('profile_user/save')}}"  method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT');
            
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                
                        
                        {{-- <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="" placeholder="surname"></div> --}}
                    
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" name="name" placeholder="" value="{{$profile_info->name}}" readonly></div>
                        <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" name="email" placeholder="" value="{{$profile_info->email}}" readonly></div>
                        <div class="col-md-12"><label for="labels">Avatar</label><input type="file" name="image" class="form-control"></div>
                        <div class="col-md-6"><label class="labels">Birthday</label>
                            <input type="date" class="form-control" name="birth_date" placeholder="" name="birth_day" value="
                            @if ($userInfo->birth_day)
                                {{$userInfo->birth_day}}
                            @endif

                            ">
 
                        
                        </div>
                        <div class="col-md-6"><label class="labels">Mobile Number</label><input type="text" class="form-control" name="phone_number" placeholder="" name="phone_number" value="{{$profile_info->phone_number}}"></div>
                        <div class="col-md-6"><label class="labels">Gender</label>
                            <select name="gender" class="form-control">
                                <option value=""><--Select Gender--></option>
                                <option value="Male" {{$userInfo->gender=="Male"?'selected':''}}>Male</option>
                                <option value="Female"{{$userInfo->gender=="Female"?'selected':''}}>Female</option>
                              
                            </select>
                        </div>
                        <div class="col-md-6"><label class="labels">Postcode</label><input type="text" class="form-control" name="pin_code" placeholder="" name="pin_code" value="{{$userInfo->pin_code}}"></div>
                        
                        <div class="col-md-12"><label class="labels">Address Line </label><input type="text" class="form-control" name="address" placeholder="" name="address" value="{{$userInfo->address}}"></div>
                        
                        
                        
                        <div class="col-md-6"><label class="labels">Department</label><input type="text" class="form-control" name="department" placeholder="" value="{{$userInfo->department}}"></div>
                        <div class="col-md-6"><label class="labels">Position</label><input type="text" class="form-control" name="position" placeholder="" value="{{$userInfo->position}}"></div>
                        
            
                    
                        
                    
                    </div>
                    
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </div>
        
        </form>
    </div>
</div>

       
     
                
        
    </div>
</div>
@endsection