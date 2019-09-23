@extends('layouts.backend.app')
@section('content')

    {{--    <div id="content">--}}
    {{--        <div id="content-header">--}}
    {{--            <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>--}}
    {{--                    Home</a> <a href="#">Categories</a> <a href="#" class="current">View Categories</a></div>--}}
    {{--            <h1>Categories</h1>--}}
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
    {{--                        <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>--}}
    {{--                            <h5>View Categories</h5>--}}
    {{--                        </div>--}}
    {{--                        <div class="widget-content nopadding">--}}
    {{--                            <table class="table table-bordered data-table">--}}
    {{--                                <thead>--}}
    {{--                                <tr>--}}
    {{--                                    <th>Category ID</th>--}}
    {{--                                    <th>Category Name</th>--}}
    {{--                                    <th>Category Level</th>--}}
    {{--                                    <th>Category URL</th>--}}
    {{--                                    <th>Actions</th>--}}
    {{--                                </tr>--}}
    {{--                                </thead>--}}
    {{--                                <tbody>--}}
    {{--                                @foreach($categories as $category)--}}
    {{--                                    <tr class="gradeX">--}}
    {{--                                        <td>{{ $category->id }}</td>--}}
    {{--                                        <td>{{ $category->name }}</td>--}}
    {{--                                        <td>{{ $category->parent_id }}</td>--}}
    {{--                                        <td>{{ $category->url }}</td>--}}
    {{--                                        <td class="center"><a href="{{ url('/admin/edit-category/'.$category->id) }}"--}}
    {{--                                                              class="btn btn-primary btn-mini">Edit</a> <a id="delCat"--}}
    {{--                                                                                                           href="{{ url('/admin/delete-category/'.$category->id) }}"--}}
    {{--                                                                                                           class="btn btn-danger btn-mini">Delete</a>--}}
    {{--                                        </td>--}}
    {{--                                    </tr>--}}
    {{--                                @endforeach--}}

    {{--                                </tbody>--}}
    {{--                            </table>--}}
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
                <h1>Categories</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">Categories</h2>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>List categories</h4>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped table-md">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Parent</th>
                                            <th>Url</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach($categories as $category)
                                            <tr class="gradeX">
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->parent_id }}</td>
                                                <td>{{ $category->url }}</td>
                                                @if($category->status == 1)
                                                    <td><div class="badge badge-success">Active</div></td>
                                                @else
                                                    <td><div class="badge badge-danger">Not Active</div></td>
                                                @endif
                                                <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <nav class="d-inline-block">
                                    <ul class="pagination mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection