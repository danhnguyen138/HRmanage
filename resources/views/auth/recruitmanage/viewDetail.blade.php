@extends('layouts.master')
@section('title')
    Recruit
@endsection
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Create Recruit</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Calculate Salary </li>
    </ol>
    <div class="row">


    </div>
    <div class="card">
        <div class="card-header">
            <h4>Create
               
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

            <form action="{{url('/createrecruit')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label>Title</label>
                        {{--  --}}
                        <input type="text" name="title" class="form-control" value="{{$recruit->title}}" >
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label >Description</label>
                        {{--  --}}
                        <textarea name="description" id="mySummernote" rows="5">{!!$recruit->description!!}</textarea>
                      
                        </div>
                    </div>
                   
                   
                  
                </div>
             
             
           

            </form>
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
                            Email
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            View Detail
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt=0;?>
                    @foreach ($candidate as $item)
                        <?php $stt++;?>
                        <tr>
                            <td>{{$stt}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                {{$item->email}}
                            </td>
                            <td>
                                @if ($item->status==2)
                                    Waitting to checked
                                @elseif ($item->status==1)
                                    Accept
                                @else
                                    Deny
                                @endif
                            </td>
                          
                            <td>
                                <a href="{{url('/viewrecruitadmin/detail/CV/'.$item->id)}}" class="btn btn-success">View Detail</a>
                               
                            </td>
                            
                        </tr>



                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection