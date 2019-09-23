@extends('layouts.backend.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Products</h1>

                <!-- Breadcrumb -->
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Products</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">List products</h2>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4></h4>
                                <div class="card-header-action">
                                    <a href="{{ URL::to('admin/add-product') }}" class="btn btn-primary">Add
                                        product</a>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped table-md">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Sku</th>
                                            <th>Price</th>
                                            <th>Url</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach($products as $product)
                                            <tr class="gradeX">
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ DB::table('categories')->where('id', $product->category_id)->first()->name }}</td>
                                                <td>{{ $product->sku }}</td>
                                                @if($product->promotion_price == 0)
                                                    <td>{{ $product->unit_price }}</td>
                                                @else
                                                    <td>{{ $product->promotion_price }}</td>
                                                @endif
                                                <td>{{ $product->url }}</td>
                                                @if($product->status == 1)
                                                    <td>
                                                        <div class="badge badge-success">Active</div>
                                                    </td>
                                                @else
                                                    <td>
                                                        <div class="badge badge-danger">Not Active</div>
                                                    </td>
                                                @endif
                                                <td>
                                                    <a href="{{ URL::to('admin/edit-product/' . $product->id) }}"
                                                       class="btn btn-secondary">Edit</a>
                                                    <a href="{{ URL::to('admin/delete-product/' . $product->id) }}"
                                                       class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <nav class="d-inline-block">
                                    {{ $products->links('vendor.pagination.backend-pagination') }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection