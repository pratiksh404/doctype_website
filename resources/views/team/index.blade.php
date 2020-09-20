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
                        <a href="{{ websiteCreateRoute('team') }}" class="btn btn-success">Create
                            Team</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Image</th>
                                <th>Phone</th>
                                <th>Social Media</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($teams))
                            @foreach ($teams as $team)
                            <tr>
                                <td>{{$team->name}}</td>
                                <td>{{$team->designation}}</td>
                                <td>
                                    @if ($team->image)
                                    <img src="{{ url(asset('storage/'.$team->image)) }}" alt="{{$team->name}}"
                                        width="80">
                                    @endif
                                </td>
                                <td>
                                    @if ($team->phone_no)
                                    @foreach ($team->phone_no as $phone_no)
                                    {{$phone_no}}
                                    <br>
                                    @endforeach
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex justify-content-around">
                                        @foreach ($team->social_media as $social_media)
                                        <a href=" {{$social_media['url']}}" target="_blank"><i
                                                class="{{$social_media['icon']}} text-dark"></i></a>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="d-flex justify-content-around">
                                    <a href="{{ websiteEditRoute('team',$team->id) }}" class="btn btn-sm btn-warning"
                                        title="Edit Team"><i class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#team-delete-{{$team->id}}">
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
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Image</th>
                                <th>Phone</th>
                                <th>Social Media</th>
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