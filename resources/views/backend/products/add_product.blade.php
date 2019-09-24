@extends('layouts.backend.app')
@section('content')

{{--    <div id="content">--}}
{{--        <div id="content-header">--}}
{{--            <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>--}}
{{--                    Home</a>--}}
{{--                <a href="#">Products</a> <a href="#" class="current">Add Product</a></div>--}}
{{--            <h1>Products</h1>--}}
{{--            @if(Session::has('flash_message_error'))--}}
{{--                <div class="alert alert-error alert-block">--}}
{{--                    <button type="button" class="close" data-dismiss="alert">×</button>--}}
{{--                    <strong>{!! session('flash_message_error') !!}</strong>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            @if(Session::has('flash_message_success'))--}}
{{--                <div class="alert alert-success alert-block">--}}
{{--                    <button type="button" class="close" data-dismiss="alert">×</button>--}}
{{--                    <strong>{!! session('flash_message_success') !!}</strong>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--        <div class="container-fluid">--}}
{{--            <hr>--}}
{{--            <div class="row-fluid">--}}
{{--                <div class="span12">--}}
{{--                    <div class="widget-box">--}}
{{--                        <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>--}}
{{--                            <h5>Add Product</h5>--}}
{{--                        </div>--}}
{{--                        <div class="widget-content nopadding">--}}
{{--                            <form enctype="multipart/form-data" class="form-horizontal" method="post"--}}
{{--                                  action="{{ url('/admin/add-product') }}" name="add_product" id="add_product"--}}
{{--                                  novalidate="novalidate"> {{ csrf_field() }}--}}
{{--                                <div class="control-group">--}}
{{--                                    <label class="control-label">Under Category</label>--}}
{{--                                    <div class="controls">--}}
{{--                                        <select name="category_id" id="category_id" style="width: 220px;">--}}
{{--                                            <?php echo $categories_dropdown; ?>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="control-group">--}}
{{--                                    <label class="control-label">Product Name</label>--}}
{{--                                    <div class="controls">--}}
{{--                                        <input type="text" name="product_name" id="product_name">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="control-group">--}}
{{--                                    <label class="control-label">Product Code</label>--}}
{{--                                    <div class="controls">--}}
{{--                                        <input type="text" name="product_code" id="product_code">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="control-group">--}}
{{--                                    <label class="control-label">Product Color</label>--}}
{{--                                    <div class="controls">--}}
{{--                                        <input type="text" name="product_color" id="product_color">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="control-group">--}}
{{--                                    <label class="control-label">Description</label>--}}
{{--                                    <div class="controls">--}}
{{--                                        <textarea name="description" id="description"></textarea>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="control-group">--}}
{{--                                    <label class="control-label">Price</label>--}}
{{--                                    <div class="controls">--}}
{{--                                        <input type="text" name="price" id="price">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="control-group">--}}
{{--                                    <label class="control-label">Image</label>--}}
{{--                                    <div class="controls">--}}
{{--                                        <input type="file" name="image" id="image">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-actions">--}}
{{--                                    <input type="submit" value="Add Product" class="btn btn-success">--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Products</h1>

                <!-- Breadcrumb -->
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Products</a></div>
                    <div class="breadcrumb-item">Add product</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Add product</h2>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form method="post" action="{{ URL::to('admin/add-product') }}">{{ csrf_field() }}
                                <div class="card-header">
                                    <h4>New product</h4>
                                    <div class="card-header-action">
                                        <a class="btn btn-primary" href="{{ URL::previous() }}">Go Back</a>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="category_id" required>
                                            <option value="">-- Choose --</option>
                                            @foreach(DB::table('categories')->get() as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Sku</label>
                                        <input type="text" class="form-control" name="sku" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description" style="min-height: 100px"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Url</label>
                                        <input type="text" class="form-control" name="url" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Unit price</label>
                                        <input type="number" class="form-control" name="unit_price" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Promotion price</label>
                                        <input type="number" class="form-control" name="promotion_price">
                                    </div>
                                    <div class="form-group">
                                        <label>Images</label>
                                        <input id="input-id" type="file" class="file" data-preview-file-type="text">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status" required>
                                            <option value="">-- Choose --</option>
                                            @foreach(STATUS_VALUES as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection