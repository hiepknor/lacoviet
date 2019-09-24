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
                    <div class="breadcrumb-item">Add category</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Add category</h2>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form method="post" action="{{ URL::to('admin/add-category') }}">{{ csrf_field() }}
                                <div class="card-header">
                                    <h4></h4>
                                    <div class="card-header-action">
                                        <a class="btn btn-primary" href="{{ URL::previous() }}">Go Back</a>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Parent</label>
                                        <select class="form-control" name="parent_id">
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
                                        <label>Description</label>
                                        <textarea class="form-control" name="description" style="min-height: 100px"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Url</label>
                                        <input type="text" class="form-control" name="url" required>
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