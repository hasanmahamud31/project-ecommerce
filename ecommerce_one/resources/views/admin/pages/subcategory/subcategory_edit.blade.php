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
            <form method="POST" name="edit" role="form" action="{{route('update_subcategory',['id'=>$datam->id])}}">
                {!! csrf_field() !!}
                <div class="box-body">
                    <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control" name="category_id"  required>
                            <?php foreach ($category_info as $cat_info) { ?>
                                <option value="<?php echo $cat_info['id'] ?>"><?php echo $cat_info['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sub_name"> Subcategory Name</label>
                        <input type="text" name="sub_name" value="{{$datam->sub_name}}" class="form-control" id="sub_name" placeholder="Sub Category Name">
                    </div>
                    <div class="form-group">
                        <label for="value">value</label>
                        <input type="text" name="value" value="{{$datam->value}}" class="form-control" id="value"  placeholder="value">
                    </div>     

                              
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div><!-- /.box -->
        <script type="text/javascript">
            document.forms['edit'].elements['category'].value = '<?php echo $datam->category; ?>';
        </script>
       
        <!--General Form Element end here-->
         @endforeach    
    </section><!-- /.content -->
</aside><!-- /.right-side -->
@stop