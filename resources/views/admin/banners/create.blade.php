@extends('admin/layouts/default')

@section('title')
Banner
@parent
@stop

@section('header_styles')

@stop

@section('content')
@include('common.errors')
<section class="content-header">
    <h1>Banners / Videos</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16"
                    data-color="#000"></i>
            </a>
        </li>
        <li><a href="{{ route('admin.banners.index') }}">Banners</a></li>
        <li class="active">Create </li>
    </ol>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="card-title"> <i class="livicon" data-name="user" data-size="16" data-loop="true"
                                data-c="#fff" data-hc="white"></i>
                            Create New Banner
                        </h4>
                    </div>
                    <br />
                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.banners.store','files' => true]) !!}

                        <div class="row">
                            @include('admin.banners.fields')
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@stop
@section('footer_scripts')



<script>
    $(function () {

        $('#heading_color,#description_color').colorpicker({
            colorSelectors: {
                'default': '#ffffff',
                'primary': '#000000',
                'success': '#bedcfb',
            }
        });

        $("form").submit(function () {
            $('input[type=submit]').attr('disabled', 'disabled');
            return true;
        });

        

    
    });
</script>


<script>
    $(document).on('click', '#close-preview', function(){
        $('.image-preview').popover('hide');
        // Hover befor close the preview
        $('.image-preview').hover(
            function () {
                $('.image-preview').popover('show');
            },
            function () {
                $('.image-preview').popover('hide');
            }
        );
    });

    $(function() {
        // Create the close button
        var closebtn = $('<button/>', {
            type:"button",
            text: 'x',
            id: 'close-preview',
            style: 'font-size: initial;',
        });
        closebtn.attr("class","close float-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse");
    });
    // Create the preview image
    $(".image-preview-input input:file").change(function (){
        var img = {
            id: 'dynamic',
            width:250,
            height:200
        };
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);
        }
        reader.readAsDataURL(file);
    });
    });


</script>

@stop