@extends('admin.main.master')
@section('content')
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <small>Register Staff Page</small>
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
            <div class="col-sm-offset-4 col-xs-offset-2"  style="text-align: center">
                @if(session('message'))
                <!-- Form Error List -->
                <div class="badge bg-green">
                    <ul><p>{{session('message')}}</p></ul>
                </div>
                @endif 
            </div> 
            <!-- form start -->
            <form method="POST" role="form" action="{{route('staff_register')}}">
                {!! csrf_field() !!}
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputName" placeholder="Staff Name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1"  placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputMobile">Mobile</label>
                        <input type="text" name="mobile" value="{{old('mobile')}}" class="form-control" id="exampleInputEmail1"  placeholder="Enter Mobile">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNID">National ID</label>
                        <input type="text" name="NID" value="{{old('NID')}}" class="form-control" id="exampleInputEmail1"  placeholder="Enter NID">
                    </div>
                   <div class="form-group">
                        <label>Present Address</label>
                        <textarea class="form-control" name="present_address" rows="3">{{old('present_address')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Permanent Address</label>
                        <textarea class="form-control" name="permanent_address" rows="3" >{{old('permanent_address')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputdate">Joining Date</label>
                           <input type="date" name="staff_joining_date" value="{{old('staff_joining_date')}}" class="form-control" id="exampleInputdate"  placeholder="Enter date">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password"  class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confrim Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
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