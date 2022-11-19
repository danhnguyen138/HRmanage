@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Employee</h1>
    <div class="card">
        <div class="card-header">
            <h4>View Employee 
                <a href="/add-employee" class="btn btn-primary btn-sm float-end">Add User</a>
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
                            Name
                        </th>
                        <th>
                            Image
                        </th>
                        <th>
                            Gender
                        </th>
                        <th>
                            Birthday
                        </th>
                        <th>
                            Address
                        </th>
                        <th>
                            Card ID
                        </th>
                        <th>
                            Department
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Edit/Delete
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt=0;?>
                    @foreach ($usermanage as $item)
                        <?php $stt++;?>
                        <tr>
                            <td>{{$stt}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <img src="{{asset('assets/images/'.$item->avatar)}}" width='60px' height='60px' alt="">
                            </td>
                            <td>
                                {{$item->userInformation->gender}}
                            </td>
                            <td>
                                {{$item->userInformation->birth_date}}
                            </td>
                            <td>
                                {{$item->userInformation->address}}
                            </td>
                            <td>
                                {{$item->userInformation->pin_code}}
                            </td>
                            <td>
                                {{$item->userInformation->department}}
                            </td>
                            <td>
                                {{$item->status}}
                            </td>
                            <td>
                                <a href="{{url('/staffview/view_detail/'.$item->id)}}" class="btn btn-success">View Detail</a>
                                <a href="{{url('/staffview/delete/'.$item->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                            
                        </tr>



                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
   
    
    

   
</div>
@endsection