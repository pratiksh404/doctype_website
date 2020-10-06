@extends('adminlte::page')

@section('title', 'Plans')

@section('content_header')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Plans</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ websiteRedirectRoute('dashboard')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Plans</li>
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
                        <h3 class="card-title">All Plans </h3>
                        <small> Total Count : {{count($plans)}}</small>
                        <a href="{{ websiteCreateRoute('plan') }}" class="btn btn-success">Create
                            Plan</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover datatable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Period</th>
                                <th>Price</th>
                                <th>Currency</th>
                                <th>Color</th>
                                <th>Services</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($plans))
                            @foreach ($plans as $plan)
                            <tr>
                                <td>{{$plan->plan_name}}</td>
                                <td>{{$plan->plan_period}}</td>
                                <td>{{$plan->plan_price}}</td>
                                <td>{{$plan->plan_currency_symbol}}</td>
                                <td style="background-color: {{$plan->plan_color}}"></td>
                                <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#plan-show-service-{{$plan->id}}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    @include('website::layouts.plan.modal.show_plan_services')
                                </td>
                                <td class="d-flex justify-content-around">
                                    <a href="{{ websiteEditRoute('plan',$plan->id) }}" class="btn btn-sm btn-warning"
                                        title="Edit Plan"><i class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#plan-delete-{{$plan->id}}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                                @include('website::layouts.plan.modal.confirm_delete')
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Period</th>
                                <th>Price</th>
                                <th>Currency</th>
                                <th>Color</th>
                                <th>Services</th>
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
@include('website::layouts.plan.scripts')
@stop