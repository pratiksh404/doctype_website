@extends('adminlte::page')

@section('title', 'Pages')

@section('content_header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pages</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ websiteRedirectRoute('dashboard')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Pages</li>
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
                    <div class=" d-flex justify-content-between">
                        <h3 class="card-title">All Pages </h3>
                        <small> Total Count : {{count($pages)}}</small>
                        <a href="{{ websiteCreateRoute('page') }}" target="_blank" class="btn btn-success">Create
                            Page</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($pages))
                            @foreach ($pages as $page)
                            <tr>
                                <td>{{$page->title}}</td>
                                <td class="d-flex justify-content-around">
                                    <a href="{{ websiteEditRoute('page',$page->id) }}" target="_blank"
                                        class="btn btn-sm btn-warning" title="Edit Page"><i class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#page-delete-{{$page->id}}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                                @include('website::layouts.page.modal.confirm_delete')
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Title</th>
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
@include('website::layouts.page.scripts')
@stop