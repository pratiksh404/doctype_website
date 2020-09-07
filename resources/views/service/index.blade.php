@extends('adminlte::page')

@section('title', 'Services')

@section('content_header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Services</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ websiteRedirectRoute('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Services</li>
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
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Services</h3>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#service-create">
                            Create Service
                        </button>
                        @include('website::layouts.service.modal.create_modal')
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Icon</th>
                                <th>Service</th>
                                <th>Excerpt</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($services))
                            @foreach ($services as $service)
                            <tr>
                                <td><i class="{{$service->service_icon}}"></i></td>
                                <td>{{$service->service_name}}</td>
                                <td>{{$service->service_excerpt}}</td>
                                <td class="d-flex justify-content-around">
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#service-edit-{{$service->id}}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    @include('website::layouts.service.modal.edit_modal')
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#service-delete-{{$service->id}}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                                @include('website::layouts.service.modal.confirm_delete')
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Icon</th>
                                <th>Service</th>
                                <th>Excerpt</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
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
@include('website::layouts.service.scripts')
@stop