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
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th>
                        STT
                        </th>
                        <th>
                            Title
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            View
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt=0;?>
                    @foreach ($recruit as $item)
                        <?php $stt++;?>
                        <tr>
                            <td>{{$stt}}</td>
                            <td>{{$item->title}}</td>
                            <td>
                                {{$item->description}}
                            </td>
                            
                          
                            <td>
                                <a href="{{url('/viewrecruitadmin/detail/'.$item->id)}}" class="btn btn-success">View Detail</a>
                               
                            </td>
                            
                        </tr>



                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
   
    
    

   
</div>
@endsection