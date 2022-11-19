@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Salary</h1>
    <div class="card">
        <div class="card-header">
            <h4>View Salary 
                <a href="/add-employee" class="btn btn-primary btn-sm float-end">Salary Calculate</a>
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
                            Name
                        </th>
                        <th>
                            Department
                        </th>
                        <th>
                            Position
                        </th>
                        <th>
                            Edit/Delete
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt=0;?>
                    @foreach ($userInformation as $item)
                        <?php $stt++;?>
                        <tr>
                            <td>{{$stt}}</td>
                            <td>{{$item->userInformation->salary_id}}</td>
                            <td>
                                {{$item->name}}
                            </td>
                            <td>
                                {{$item->department}}
                            </td>
                            <td>
                                {{$item->position}}
                            </td>
                            <td>
                                <a href="{{url('/viewholidayuser/detail/'.$item->holiday_id)}}" class="btn btn-success">View Detail</a>
                                <a href="{{url('/viewholidayuser/delete/'.$item->holiday_id)}}" class="btn btn-danger">Delete</a>
                            </td>
                            
                        </tr>



                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
   
    
    

   
</div>
@endsection