@extends('admin.main.master')
@section('content')
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <small>Register Admin Page</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::to('/deshboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Registration</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- general form elements start  -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Enter the Correct Info </h3>
            </div><!-- /.box-header -->
            @if (count($errors) > 0)
            <!-- Form Error List -->
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!-- form start -->
            <form method="POST" role="form" action="{{URL::to('/register')}}">
                {!! csrf_field() !!}
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputName" placeholder="Admin Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1"  placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password"  class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confrim Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputphone">Mobile No</label>
                        <input type="text" name="phone_no" value="{{old('phone_no')}}" class="form-control" id="exampleInputName" placeholder="Admin Mobile No">
                    </div>
                    <div class="form-group">
                        <label>Present Address</label>
                        <textarea class="form-control" rows="3"name="present_address" placeholder="Enter your Present Address....">{{old('present_address')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Permanent Address</label>
                        <textarea class="form-control" rows="3"name="permanent_address" placeholder="Enter Your permanent Address">{{old('permanent_address')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Access Level:</label>
                        <select class="form-control" name="admin_access_level"  required>
                            <option value="1">option 1</option>
                            <option value="2">option 2</option>
                            <option value="3">option 3</option>
                            <option value="4">option 4</option>
                            <option value="5">option 5</option>
                        </select>
                    </div>
                    <!--                    <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <input type="file" id="exampleInputFile">
                                            <p class="help-block">Example block-level help text here.</p>
                                        </div>-->
                    <!--                    <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Check me out
                                            </label>
                                        </div>-->
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div><!-- /.box -->

        <!--General Form Element end here-->
    </section><!-- /.content -->
</aside><!-- /.right-side -->
@stop