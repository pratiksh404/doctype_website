@extends('adminlte::page')

@section('title', 'Portfolios')

@section('content_header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Portfolio</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ websiteRedirectRoute('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Portfolios</li>
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
                        <h3 class="card-title">Portfolios</h3>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#portfolio-create">
                            Create Portfolio
                        </button>
                        @include('website::layouts.portfolio.modal.create_modal')
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Portfolio</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($portfolios))
                            @foreach ($portfolios as $portfolio)
                            <tr>
                                <td>{{$portfolio->portfolio}}</td>
                                <td class="d-flex justify-content-around">
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#portfolio-edit-{{$portfolio->id}}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    @include('website::layouts.portfolio.modal.edit_modal')
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#portfolio-delete-{{$portfolio->id}}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                                @include('website::layouts.portfolio.modal.confirm_delete')
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Portfolio</th>
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