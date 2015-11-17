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
            <form method="POST" name="edit" role="form" action="{{route('update_product',['id'=>$datam->id])}}">
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
                        <label>Select Sub Category</label>
                        <select class="form-control" name="subcategory_id" required>
                            <?php foreach ($subcat as $data) { ?>
                                <option value="<?php echo $data['id'] ?>"><?php echo $data['sub_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="brand_name"> Product Brand Name</label>
                        <input type="text" name="brand_name" value="{{$datam->brand_name}}" class="form-control" id="sub_name" placeholder="brand_name">
                    </div>
                    <div class="form-group">
                        <label for="product_name"> Product Name</label>
                        <input type="text" name="product_name" value="{{$datam->product_name}}" class="form-control" id="sub_name" placeholder="product_name">
                    </div>
                    <div class="form-group">
                        <label for="sku"> Product SKU</label>
                        <input type="text" name="sku" value="{{$datam->sku}}" class="form-control" id="sub_name" placeholder="sku">
                    </div>
                    <div class="form-group">
                        <label for="product_quantity">product_quantity</label>
                        <input type="text" name="product_quantity" value="{{$datam->product_quantity}}" class="form-control" id="value"  placeholder="product_quantity">
                    </div>     
                    <div class="form-group">
                        <label for="sub_name"> Product Name</label>
                        <textarea class="form-control" name="product_description" rows="3">{{$datam->product_description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="product_price">product_price</label>
                        <input type="text" name="product_price" value="{{$datam->product_price}}" class="form-control" id="value"  placeholder="product_price">
                    </div>     

                              
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div><!-- /.box -->
        <script type="text/javascript">
            document.forms['edit'].elements['category_id'].value = '<?php echo $datam->category_id; ?>';
        </script>
        <script type="text/javascript">
            document.forms['edit'].elements['subcategory_id'].value = '<?php echo $datam->subcategory_id; ?>';
        </script>
       
        <!--General Form Element end here-->
         @endforeach    
    </section><!-- /.content -->
</aside><!-- /.right-side -->
@stop