@extends('admin.main.master')
@section('content')
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <small>Register Subcategory Page</small>
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
            <form method="POST" role="form" action="{{route('store_subcategory')}}">
                {!! csrf_field() !!}
                <div class="box-body">
                    <!-- select -->
                    <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control" name="category_id" required>
                            <?php foreach ($data as $datam){?>
                            <option value="<?php echo $datam['id']?>"><?php echo $datam['name']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Sub Category Name:</label>
                        <input type="text" name="sub_name" value="{{old('name')}}" class="form-control" id="exampleInputName" placeholder="Subcategory Name">
                    </div>                  
                    <div class="form-group">
                        <label for="exampleInputValue">value</label>
                        <input type="text" name="value" value="{{old('value')}}" class="form-control" id="exampleInputEmail1"  placeholder="value">
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