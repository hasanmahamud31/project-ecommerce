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
            <form method="POST" role="form" action="{{route('store_product')}}" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="box-body">
                    <!-- select -->
                    <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control" name="category_id" required>
                            <?php foreach ($cat as $data) { ?>
                                <option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- select -->
                    <div class="form-group">
                        <label>Select Sub Category</label>
                        <select class="form-control" name="subcategory_id" required>
                            <?php foreach ($subcat as $data) { ?>
                                <option value="<?php echo $data['id'] ?>"><?php echo $data['sub_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputbrand_name">Product Brand Name</label>
                        <input type="text" name="brand_name" value="{{old('brand_name')}}" class="form-control" id="exampleInputbrand_name"  placeholder="Product brand_name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Product Name:</label>
                        <input type="text" name="product_name" value="{{old('name')}}" class="form-control" id="exampleInputName" placeholder="Product Name">
                    </div>                  
                    <div class="form-group">
                        <label for="exampleInputSKU">Product SKU</label>
                        <input type="text" name="sku" value="{{old('sku')}}" class="form-control" id="exampleInputsku"  placeholder="Product SKU">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputproduct_quantity">Product Quantity</label>
                        <input type="text" name="product_quantity" value="{{old('product_quantity')}}" class="form-control" id="exampleInputproduct_quantity"  placeholder="Product product_quantity">
                    </div>

                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" name="product_description" rows="3">{{old('product_description')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputproduct_price">Product Price</label>
                        <input type="text" name="product_price" value="{{old('product_price')}}" class="form-control" id="exampleInput"  placeholder="Product product_price">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputFile1">File input</label>
                        <input type="file" name="photo1" id="exampleInputFile1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" name="photo2" id="exampleInputFile">                       
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" name="photo3" id="exampleInputFile">                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" name="photo4" id="exampleInputFile">                        
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