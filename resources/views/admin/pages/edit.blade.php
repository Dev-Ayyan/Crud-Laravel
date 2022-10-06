@extends('admin/layouts/default')

@section('title')
Pages
@parent
@stop
@section('content')
@include('common.errors')
<section class="content-header">
    <h1>Pages Edit</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16"
                    data-color="#000"></i>

            </a>
        </li>
        <li> <a href="{{ route('admin.pages.index') }}">Pages</a></li>
        <li class="active">Edit </li>
    </ol>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">
                        <h4 class="card-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true"
                                data-c="#fff" data-hc="white"></i>
                            Edit Page
                        </h4>
                    </div>
                    <br />
                    <div class="card-body">
                        {!! Form::model($page, ['route' => ['admin.pages.update', collect($page)->first() ], 'method' =>
                        'patch']) !!}

                        @include('admin.pages.fields')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
@section('footer_scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $("form").submit(function () {
            $('input[type=submit]').attr('disabled', 'disabled');
            return true;
        });
    });
</script>
@stop