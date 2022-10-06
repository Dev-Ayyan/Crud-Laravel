@extends('admin/layouts/default')

@section('title')
Menu
@parent
@stop

@section('content')
<section class="content-header">
    <h1>Menu View</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Menus</li>
        <li class="active">Menu View</li>
    </ol>
</section>

<section class="content paddingleft_right15">
    <div class="row">
      <div class="col-sm-12">
       <div class="card panel-primary">
                <div class="card-heading clearfix">
                    <h4 class="card-title"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Menu details
                    </h4>
                </div>
                    <div class="card-body">
                        @include('admin.menus.show_fields')
                    </div>
                </div>

    <div class="form-group">
           <a href="{!! route('admin.menus.index') !!}" class="btn btn-warning mt-2">Back</a>
    </div>
     </div>
  </div>
</section>
@stop
