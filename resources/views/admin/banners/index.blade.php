@extends('admin/layouts/default')

@section('title')
Banners
@parent
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Banners / Videos</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i></a>
        </li>
        <li class="active">Banners List</li>
    </ol>
</section>

<section class="content">
<div class="container-fluid">
    <div class="row">
     <div class="col-12">
     @include('flash::message')
        <div class="card border-0 shadow ">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title float-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Banners List
                </h4>
                <div class="float-right">
                    <a href="{{ route('admin.banners.create') }}" class="btn btn-sm btn-secondary">Create New Banner</a>
                </div>
            </div>
            <br />
            <div class="card-body table-responsive">
                 @include('admin.banners.table')
                 
            </div>
        </div>
        </div>
 </div>
 </div>
</section>
@stop
