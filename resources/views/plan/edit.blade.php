@extends('adminlte::page')

@section('title', 'Edit Plan')

@section('content_header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Plan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ websiteRedirectRoute('dashboard')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ websiteRedirectRoute('plan')}}">Plan</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Plan</li>
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
                    <h3 class="card-title">Edit Plan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ websiteUpdateRoute('plan',$plan->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        @include('website::layouts.plan.edit_add')
                        <br>
                        <input type="submit" value="Edit" class="btn btn-primary">
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
@include('website::layouts.plan.scripts')
@stop