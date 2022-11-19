@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Vacation </h1>
    <div class="card">
        <div class="card-header">
            <h4>View Vacation
                <a href="/add-employee" class="btn btn-primary btn-sm float-end">Salary Calculate</a>
            </h4>
        </div>
        <div class="card-body">
            
            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <h3>Waitting for checked</h3>
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th>
                        STT
                        </th>
                        <th>
                            Holiday ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Day Start
                        </th>
                        <th>
                            Day End
                        </th>
                        <th>
                            Status
                        </th>
                        
                        <th>
                            View/Delete
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt=0;?>
                    @foreach ($holidayWaitting as $item)
                        <?php $stt++;?>
                        <tr>
                            <td>{{$stt}}</td>
                            <td>{{$item->holiday_id}}</td>
                            <td>
                                {{$item->name}}
                            </td>
                            <td>
                                {{$item->day_start}}
                            </td>
                            <td>
                                {{$item->day_finish}}
                            </td>
                            <td>
                               @if ($item->status==0)
                                Waitting for checked
                               @elseif($item->status==1)
                               Acceptance
                               @else
                                Deny
                               @endif
                            </td>
                            <td>
                                <a href="{{url('/viewholidayadmin/detail/'.$item->holiday_id)}}" class="btn btn-success">View Detail</a>
                               
                            </td>
                            
                        </tr>



                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <h3>Checked</h3>
            <table class="table table-bordered" id="myTable1">
                <thead>
                    <tr>
                        <th>
                        STT
                        </th>
                        <th>
                            Holiday ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Day Start
                        </th>
                        <th>
                            Day End
                        </th>
                        <th>
                            Status
                        </th>
                        
                        <th>
                            View/Delete
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt=0;?>
                    @foreach ($holidayChecked as $item)
                        <?php $stt++;?>
                        <tr>
                            <td>{{$stt}}</td>
                            <td>{{$item->holiday_id}}</td>
                            <td>
                                {{$item->name}}
                            </td>
                            <td>
                                {{$item->day_start}}
                            </td>
                            <td>
                                {{$item->day_finish}}
                            </td>
                            <td>
                               @if ($item->status==0)
                                Waitting for checked
                               @elseif($item->status==1)
                               Acceptance
                               @else
                                Deny
                               @endif
                            </td>
                            <td>
                                <a href="{{url('/viewholidayadmin/detail/'.$item->holiday_id)}}" class="btn btn-success">View Detail</a>
                               
                            </td>
                            
                        </tr>



                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
   
    
    

   
</div>
@endsection