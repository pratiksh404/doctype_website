a@extends('adminlte::page')

@section('title', 'Images')

@section('content_header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Images</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ websiteRedirectRoute('dashboard')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Images</li>
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
                        <h3 class="card-title">All Images </h3>
                        <small> Total Count : {{count($images)}}</small>
                        <a href="{{ websiteCreateRoute('image') }}" class="btn btn-success">Create
                            Image</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Type</th>
                                <th>Video</th>
                                <th>Link</th>
                                <th>Portfolio</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($images))
                            @foreach ($images as $image)
                            <tr>
                                <td><img src="{{url($image->thumbnail('image',$image->image_type == "Slider" ? 'medium' : 'small'))}}"
                                        alt="{{$image->portfolio->portfolio ?? ''}}">
                                </td>
                                <td>{{$image->image_type}}</td>
                                <td>
                                    @if ($image->youtube_link)
                                    <a href="{{$image->youtube_link}}"><i class="fab fa-youtube"></i></a>
                                    @endif
                                </td>
                                <td>
                                    @if ($image->redirect_link)
                                    <a href="{{$image->redirect_link}}"><i class="fa fa-globe"></i></a>
                                    @endif
                                </td>
                                <td>
                                    @if ($image->portfolio)
                                    {{$image->portfolio->portfolio}}
                                    @endif
                                </td>
                                <td class="d-flex justify-content-around">
                                    <a href="{{ websiteEditRoute('image',$image->id) }}" class="btn btn-sm btn-warning"
                                        title="Edit Image"><i class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#image-delete-{{$image->id}}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    @include('website::layouts.image.modal.delete_modal')
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Image</th>
                                <th>Type</th>
                                <th>Video</th>
                                <th>Link</th>
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
@include('website::layouts.image.scripts')
@stop