@extends('admin/layouts/default')

@section('title')
Pages
@parent
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Pages</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
            </a>
        </li>
        <li class="active">Pages List</li>
    </ol>
</section>

<section class="content">
<div class="container-fluid">
    <div class="row">
     <div class="col-12">
     @include('flash::message')
        <div class="card ">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title float-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Pages List
                </h4>
                <div class="float-right">
                    <a href="{{ route('admin.pages.create') }}" class="btn btn-sm btn-secondary">Create New Page</a>
                </div>
            </div>
          
            <div class="card-body table-responsive theme_bg">
                <br>
                 @include('admin.pages.table')
                 <br>
            </div>
        </div>
        </div>
 </div>
 </div>
</section>
@stop
