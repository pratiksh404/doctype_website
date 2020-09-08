@extends('adminlte::page')

@section('title', 'Create Portfolio')

@section('content_header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Portfolio</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ websiteRedirectRoute('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ websiteRedirectRoute('portfolio')}}">Portfolio</a></li>
                    <li class="breadcrumb-item active">Create Portfolio</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@stop

@section('content')


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Portfolio</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ websiteStoreRoute('portfolio') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('website::layouts.portfolio.edit_add')
                        <br>
                        <div class="card card-primary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Portfolio Images</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-lg-6">
                                        <select name="image_type" id="image_type" class="select2 form-control">
                                            <option>Image Type..</option>
                                            <option value="1">Normal</option>
                                            <option value="2">Vertical Image</option>
                                            <option value="3">Horizontal Image</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="file" class="custom-file-input" id="images" name="images[]"
                                            multiple>
                                        <label class="custom-file-label" for="images">Choose Multiple
                                            Image</label>
                                    </div>

                                </div>
                                <br>
                                <input type="submit" value="Create" class="btn btn-primary">
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </form>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
</section>
<!-- /.content -->
@stop

@section('css')
<link rel="stylesheet" href="{{asset('css/admin_custom.css')}}">
@stop

@section('js')
@include('website::layouts.portfolio.scripts')
@stop