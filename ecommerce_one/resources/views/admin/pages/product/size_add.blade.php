@extends('admin.main.master')
@section('content')
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <small>Register Product Page</small>
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
                <h3 class="box-title">Enter the Correct size </h3>
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
            <form method="POST" role="form" action="{{route('store_product_size')}}" >
                {!! csrf_field() !!}
                <div class="box-body">               
                    <div class="form-group">
                        <label for="exampleInputsize">Enter Size</label>
                        <input type="text" name="size_name" id="exampleInputsize">
                        <input type="hidden" name="product_id" value="<?php echo $id; ?>">                        
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