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
                        <input type="text" name="title" class="form-control" >
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label >Description</label>
                        {{--  --}}
                        <textarea name="description" id="mySummernote" rows="5"></textarea>
                      
                        </div>
                    </div>
                   
                   
                   <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Create Recruit</button>
                    </div>
                </div>
             
             
           

            </form>
        </div>
    </div>
</div>
@endsection