@extends('adminlte::page')

@section('title', 'Create Image')

@section('content_header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Image</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ websiteRedirectRoute('dashboard')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ websiteRedirectRoute('image')}}">Image</a>
                    </li>
                    <li class="breadcrumb-item active">Create Image</li>
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
                    <h3 class="card-title">Create Image</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ websiteStoreRoute('image') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('website::layouts.image.edit_add')
                        <br>
                        <input type="submit" value="Create" class="btn btn-primary">
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
@include('website::layouts.image.scripts')
@stop