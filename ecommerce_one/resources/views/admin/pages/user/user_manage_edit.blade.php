@extends('admin.main.master')
@section('content')
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <small>Register User Page</small>
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
             @foreach($data as $datam)
            <form method="POST" role="form" action="{{route('user_manage_update',['id'=>$datam->id])}}">
                {!! csrf_field() !!}
                <div class="box-body">
                    
                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" name="name" value="{{$datam->name}}" class="form-control" id="exampleInputName" placeholder="User Name">
                    </div>
                     <div class="form-group">
                        <label for="exampleInputMobile">Mobile</label>
                        <input type="text" name="mobile" value="{{$datam->mobile}}" class="form-control" id="exampleInputEmail1"  placeholder="mobile number">
                    </div>

                    <div class="form-group">
                        <label>Present Address</label>
                        <textarea class="form-control" name="present_address" rows="3">{{$datam->present_address}}</textarea>
                    </div>              
                   
                      @endforeach                  
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