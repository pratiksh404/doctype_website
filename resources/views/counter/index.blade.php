@extends('adminlte::page')

@section('title', 'Counter')

@section('content_header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Counters</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ websiteRedirectRoute('dashboard')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Counter</li>
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
                        <h3 class="card-title">All Counters </h3>
                        <small> Total Count : {{count($counters)}}</small>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#counter-create">
                            Create Counter
                        </button>
                        @include('website::layouts.counter.modal.create_modal')
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Counter Name</th>
                                <th>Counts</th>
                                <th>Icon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($counters))
                            @foreach ($counters as $counter)
                            <tr>
                                <td>{{$counter->id}}</td>
                                <td>{{$counter->counter_name}}</td>
                                <td>{{$counter->count}}</td>
                                <td><i class="{{$counter->counter_icon}}"></i></td>
                                <td class="d-flex justify-content-around">
                                    <a href="{{ websiteEditRoute('counter',$counter->id) }}"
                                        class="btn btn-sm btn-warning" title="Edit counter"><i
                                            class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#counter-delete-{{$counter->id}}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                                @include('website::layouts.counter.modal.confirm_delete')
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Counter Name</th>
                                <th>Counts</th>
                                <th>Icon</th>
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
@include('website::layouts.counter.scripts')
@stop