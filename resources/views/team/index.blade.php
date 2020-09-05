@extends('adminlte::page')

@section('title', 'Team')

@section('content_header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Teams</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ websiteRedirectRoute('dashboard')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Teams</li>
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
                        <h3 class="card-title">All Teams </h3>
                        <small> Total Count : {{count($teams)}}</small>
                        <a href="{{ websiteCreateRoute('team') }}" target="_blank" class="btn btn-success">Create
                            Team</a>
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
                            @if (isset($teams))
                            @foreach ($teams as $team)
                            <tr>
                                <td>{{$team->id}}</td>
                                <td>{{$team->counter_name}}</td>
                                <td>{{$team->count}}</td>
                                <td><i class="{{$team->counter_icon}}"></i></td>
                                <td class="d-flex justify-content-around">
                                    <a href="{{ websiteEditRoute('Team',$team->id) }}" target="_blank"
                                        class="btn btn-sm btn-warning" title="Edit counter"><i
                                            class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#counter-delete-{{$team->id}}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                                @include('website::layouts.team.modal.confirm_delete')
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
@include('website::layouts.team.scripts')
@stop