@extends('layouts.backend.app')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Categories</h1>

                <!-- Breadcrumb -->
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Categories</a></div>
                    <div class="breadcrumb-item">Edit category</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit category</h2>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form method="post" action="{{ URL::to('admin/edit-category/' . $categoryDetails->id) }}">{{ csrf_field() }}
                                <div class="card-header">
                                    <h4>{{ $categoryDetails->name }}</h4>
                                    <div class="card-header-action">
                                        <a class="btn btn-primary" href="{{ URL::previous() }}">Go Back</a>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Parent</label>
                                        <select class="form-control" name="parent_id">
                                            <option value="0">-- Choose --</option>
                                            @foreach(DB::table('categories')->get() as $category)
                                                <option value="{{ $category->id }}" @if($categoryDetails->parent_id == $category->id) selected="selected" @endif>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $categoryDetails->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description" style="min-height: 100px">{{ $categoryDetails->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Url</label>
                                        <input type="text" class="form-control" name="url" value="{{ $categoryDetails->url }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status" required>
                                            <option value="0">-- Choose --</option>
                                            @foreach(STATUS_VALUES as $key => $value)
                                                <option value="{{ $key }}" @if($categoryDetails->status == $key) selected="selected" @endif>{{ $value }}</option>
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