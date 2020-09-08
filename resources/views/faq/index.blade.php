@extends('adminlte::page')

@section('title', 'FAQs')

@section('content_header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>FAQs</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ websiteRedirectRoute('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">FAQs</li>
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
                        <h3 class="card-title">FAQs</h3>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#faq-create">
                            Create FAQ
                        </button>
                        @include('website::layouts.faq.modal.create_modal')
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($faqs))
                            @foreach ($faqs as $faq)
                            <tr>
                                <td>{{$faq->question}}</td>
                                <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#faq-answer-{{$faq->id}}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    @include('website::layouts.faq.modal.answer_modal')
                                </td>
                                <td class="d-flex justify-content-around">
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#faq-edit-{{$faq->id}}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    @include('website::layouts.faq.modal.edit_modal')
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#faq-delete-{{$faq->id}}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                                @include('website::layouts.faq.modal.confirm_delete')
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Question</th>
                                <th>Answer</th>
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
@include('website::layouts.faq.scripts')
@stop