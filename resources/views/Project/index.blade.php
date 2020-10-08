@extends('adminlte::page')

@section('title', 'Project')

@section('content_header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Project</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ websiteRedirectRoute('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Project</li>
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
                        <h3 class="card-title">Project</h3>
                        <a href="{{websiteCreateRoute('project')}}" class="btn btn-primary">Create Project</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Project</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($projects))
                            @foreach ($projects as $project)
                            <tr>
                                <td>{{$project->name}}</td>
                                <td><img src="{{asset($project->thumbnail('image','small'))}}" alt="{{$project->name}}"
                                        class="img-fluid"></td>
                                <td class="d-flex justify-content-around">
                                    <a href="{{websiteEditRoute('project',$project->id)}}" class="btn btn-warning"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="{{websiteShowRoute}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#project-delete-{{$project->id}}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                                @include('website::layouts.project.modal.confirm_delete')
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Project</th>
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
@include('website::layouts.project.scripts')
@stop