@extends('admin/layouts/default')

@section('title')
Pages
@parent
@stop
@section('header_styles')

<style>
    .category_infobox_item {
        position: relative;
        padding: 15px 25px;
        background: #eff1f4;
        box-shadow: -7px -7px 10px rgb(255 255 255), 7px 7px 10px #d8dbe2;
        margin: 20px 0 30px;
        border-radius: 25px;
    }

    .category_infobox_item .category_top_action_bar {
        position: absolute;
        right: 15px;
        top: 22px;
        z-index: 9999;
    }

    .category_infobox_item .accordion_btn {
        color: #242424;
        text-decoration: none;
        font-size: 18px !important;
        position: relative;
        display: block;
        width: 100%;
        padding: 10px 220px 10px 40px;
        text-align: left;
        font-weight: 100;
    }

    .category_infobox_item .accordion_btn .category_infobox_icon {
        color: white;
        position: absolute;
        left: 0;
        top: 12px;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 1;
    }

    .category_infobox_item .accordion_btn .category_infobox_icon i.toggler_btn {
        font-size: 16px;
        line-height: 25px;
    }

    .category_infobox_item .accordion_btn.collapsed .category_infobox_icon i.toggler_btn::after {
        content: "\f078";
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        color: #242424;
    }

    .category_infobox_item .accordion_btn .category_infobox_icon i.toggler_btn::after {
        content: "\f077";
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        font-size: 20px;
        font-style: normal;
        color: #9accff;
    }
</style>
@stop

@section('content')
@include('common.errors')



<section class="content-header">
    <h1>{{ $page->heading }} Info Boxes </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16"
                    data-color="#000"></i>
                
            </a>
        </li>
        <li> <a href="{{ route('admin.pages.index') }}">{{ $page->heading }}</a></li>
        <li class="active">Info Boxes List</li>
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
                            Edit Info Boxes
                            @if($page->type!='courthouse-documents')

                            <button class="btn btn-success float-right" data-toggle="modal"
                                data-target="#create_category"
                                data-id="{{ route('admin.pages.delete', collect($page)->first() ) }}">Insert New Category</button>
                            @endif
                            @if($page->type=='propertyreport')

                            <button class="btn btn-warning float-right mx-3" data-toggle="modal"
                                data-target="#edit_propertyreport_price"
                               >Update Property Report Price</button>
                            @endif
                        </h4>

                    </div>

                    <div class="card-body theme_bg">




                        <div id="accordion">
                            @foreach($page->categories as $category)
                            <div class="category_infobox_item">

                                <div class="accordion_btn btn btn-link collapsed" data-toggle="collapse"
                                    data-target="#collapse{{ $category->id }}" aria-expanded="true"
                                    aria-controls="collapse{{ $category->id }}">
                                    <span class="category_infobox_icon">
                                        <i class="toggler_btn"></i>
                                    </span>
                                    <div class="row">
                                        <div class="col-8">
                                            {{$category->title}}
                                        </div>

                                    </div>


                                </div>
                                <div class="category_top_action_bar">
                                    @if($page->type!='courthouse-documents')


                                    <button class="btn btn-info edit-category"
                                        data-category-id="{{ $category->id }}">Update Category
                                    </button>
                                    <a class="btn btn-danger mx-2"
                                        href="{{ route('admin.pages.deletecategory', collect($category)->first() ) }}"
                                        data-toggle="modal" data-target="#delete_confirm"
                                        data-id="{{ route('admin.pages.deletecategory', collect($category)->first() ) }}">Delete
                                    </a>
                                    @endif
                                </div>


                                <div id="collapse{{ $category->id }}" class="collapse {{ ($loop->first)? 'show' : '' }}"
                                    data-parent="#accordion">

                                    <br>
                                    <div class="row">
                                        @if($page->type!='courthouse-documents')
                                        <div class="form-group col-sm-4">
                                            <p class="mb-0"><b>Name:</b> {{ $category->title }}</p>
                                        </div>
                                        @endif
                                        @php
                                        $categoryPayment = array("propertyreport", "riskdata","individualmaps");
                                        @endphp

                                        @if(in_array($page->type, $categoryPayment))


                                        @if($page->type!='propertyreport')

                                        <!-- Price Field -->
                                        <div class="form-group col-sm-4">
                                            <p class="mb-0"><b>Bundle Price:</b> {{ $category->price }}</p>
                                        </div>

                                    
                                        @endif

                                        @if($page->type!='propertyreport')

                                        <div class="form-group col-sm-4">
                                            <p class="mb-0"><b>Bundle Description:</b> <br>
                                                {!! \Illuminate\Support\Str::limit($category->description, 200,
                                                $end='...') !!}

                                            </p>
                                        </div>
                                        @endif

                                        @endif


                                    </div>

                                    <br>
                                    @include('admin.pages.infoboxtable')
                                    <br>


                                </div>
                            </div>


                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="create_category" tabindex="-1" role="dialog" aria-labelledby="create_category"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteLabel">Insert New Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            {!! Form::open(['route' => 'admin.pages.storecategory','files' => true,'id'=>'new_category_form']) !!}

            <div class="modal-body">
                <div class="row">



                    <!-- Heading Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('title', 'Category Title*:') !!}
                        <br>


                        {!! Form::select('title', $vc_categoriesName, null, ['id' => 'new_category_heading', 'class' =>
                        'form-control']) !!}

                    </div>
                    @php
                    $categoryPayment = array("propertyreport", "riskdata","individualmaps");
                    @endphp

                    @if(in_array($page->type, $categoryPayment))
                    @if($page->type!='propertyreport')
                    <!-- Sub Heading Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('description', 'Buy Bundle Description:') !!}
                        {!! Form::text('description', null, ['class' => 'form-control theme_tinymce']) !!}
                    </div>
                    @endif
                    @if($page->type!='propertyreport')
                    <!-- Price Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('price', 'Price:') !!}
                        {!! Form::number('price', null, ['class' => 'form-control','min'=>'.01','step'=>'.01','required' => 'required','id' =>
                        'new_category_price']) !!}
                    </div>

                    @endif
                    @endif
                    <!-- 
                    <div class="form-group col-sm-6">
                        {!! Form::label('order', 'Order:') !!}
                        {!! Form::number('order', null, ['class' => 'form-control']) !!}
                    </div> -->

                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <!-- Submit Field -->
                <div class="form-group col-sm-12 text-center">
                    <span class="text-danger category_error"></span>
                    <br>
                    {!! Form::hidden('page_id', $page->id, ['class' => 'form-control']) !!}
                    <a href="javascript:void(0);" id="new_category_formsubmit" class="btn btn-primary">Save</a>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>

            </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>
<div class="modal fade" id="edit_category" tabindex="-1" role="dialog" aria-labelledby="edit_category"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteLabel">Update Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            {!! Form::open(['route' => 'admin.pages.updatecategory','files' => true,'id'=>'update_category_form',
            'method' => 'patch']) !!}


            <div class="modal-body">
                <div class="row">



                    <!-- Heading Field -->

                    <div class="form-group col-sm-8">
                        {!! Form::label('title', 'Category Name*:') !!}
                        <br>


                        {!! Form::select('title', $vc_categoriesName, null, ['id' => 'update_category_heading', 'class'
                        => 'form-control']) !!}

                    </div>
                    <div class="form-group col-sm-4">
                        <br>
                        <a href="javascript:;" class="update_category_edit_btn btn btn-primary">
                         Edit Category
                        </a> 
                     </div>
                    @php
                    $categoryPayment = array("propertyreport", "riskdata","individualmaps");
                    @endphp

                    @if(in_array($page->type, $categoryPayment))
                    @if($page->type!='propertyreport')
                    <!-- Sub Heading Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('description', 'Buy Bundle Description:') !!}
                        {!! Form::text('description', null, ['class' => 'form-control theme_tinymce'
                        ,'id'=>'update_category_description']) !!}
                    </div>
                    @endif
                    @if($page->type!='propertyreport')
                    <!-- Price Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('price', 'Price:') !!}
                        {!! Form::number('price', null, ['class' => 'form-control','min'=>'.01','step'=>'.01','required' => 'required','id' =>
                        'update_category_price']) !!}
                    </div>
               
                    @endif
                    @endif


                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <!-- Submit Field -->
                <div class="form-group col-sm-12 text-center">
                    <span class="text-danger update_category_error"></span>
                    <br>
                    {!! Form::hidden('page_id', $page->id, ['class' => 'form-control']) !!}
                    {!! Form::hidden('id', null, ['class' => 'form-control','id'=>'update_category_id']) !!}
                    <a href="javascript:void(0);" id="update_category_formsubmit" class="btn btn-primary">Save</a>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>

            </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>



<div class="modal fade" id="edit_propertyreport_price" tabindex="-1" role="dialog" aria-labelledby="edit_propertyreport_price"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteLabel">Property Report Price</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            {!! Form::open(['route' => 'admin.pages.updateReportPrice','files' => true,'id'=>'update_category_form',
            'method' => 'patch']) !!}


            <div class="modal-body">
                <div class="row">



                    <!-- Heading Field -->

                
                    @php
                    $categoryPayment = array("propertyreport");
                    @endphp

                    @if(in_array($page->type, $categoryPayment))
           
                    <!-- Price Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('price', 'Price:') !!}
                        {!! Form::number('price', $vc_propertyreport_obj['price'], ['class' => 'form-control','min'=>'.01','step'=>'.01','required' => 'required','id' =>
                        'update_category_price']) !!}
                    </div>
               
                    @endif


                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <!-- Submit Field -->
                <div class="form-group col-sm-12 text-center">
                    <span class="text-danger update_category_error"></span>
                    <br>
                    {!! Form::hidden('page_id', $page->id, ['class' => 'form-control']) !!}
                   <button type="submit" class="btn btn-primary mx-2">Save</a>

                    <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal">Cancel</button>
                </div>

            </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>

@stop

@section('footer_scripts')




<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteLabel">Delete Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                Are you sure to delete this Item? This operation is irreversible.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a type="button" class="btn btn-danger Remove_square">Delete</a>
            </div>
        </div>
    </div>
</div>
<script>$(function () { $('body').on('hidden.bs.modal', '.modal', function () { $(this).removeData('bs.modal'); }); });</script>
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap4.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.bootstrap4.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.bootstrap4.css') }}">
<script type="text/javascript" src="{{ asset('vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendors/datatables/js/dataTables.bootstrap4.js') }}"></script>

<script>
    $('.infobox-table').DataTable({
        responsive: true,
        pageLength: 25,

    });
    $('.infobox-table').on('page.dt', function () {
        setTimeout(function () {
            $('.livicon').updateLivicon();
        }, 500);
    });
    $('.infobox-table').on('length.dt', function (e, settings, len) {
        setTimeout(function () {
            $('.livicon').updateLivicon();
        }, 500);
    });

    $('#delete_confirm').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var $recipient = button.data('id');
        var modal = $(this);
        modal.find('.modal-footer a').prop("href", $recipient);
    })

</script>

<script type="text/javascript">
    $(document).ready(function () {

        var pageType = '{{ $page->type }}';

        $(".update_category_edit_btn").click(function (e) {
            

            var category_id = $('#update_category_heading').val();
            if(category_id != ''){
                var category_url ='/admin/categorynames/'+category_id+'/edit' ;
                window.location.href = category_url;
            }

        });
        $("#new_category_formsubmit").click(function (e) {

            e.preventDefault();
            var error = 0;

            var price = $('#new_category_price').val();
            var editorContent = $('#new_category_heading').val();
            // alert(editorContent);
            // var editorContent = tinyMCE.get('new_category_heading').getContent();
            if (editorContent == '' || editorContent == 0) {
                $('.category_error').html('Please select Category');
                error = 1;
            }
            else if (price == '') {
                $('.category_error').html('Please enter Price');
                error = 1;
            }
            else {
                $('.category_error').html('');
                error = 0;
            }

            if (pageType == 'propertyreport') {

                if ($('#new_category_sample').get(0).files.length === 0) {
                    $('.category_error').html('Please upload Sample file');
                    error = 1;
                }
            }

            if (error == 0) {
                $("#new_category_form").submit();
            }

        });

        $("#update_category_formsubmit").click(function (e) {

            e.preventDefault();
            var error = 0;

            var price = $('#update_category_price').val();
            var editorContent = $('#update_category_heading').val();
            // alert(editorContent);
            // var editorContent = tinyMCE.get('new_category_heading').getContent();

            if (editorContent == '' || editorContent == 0) {
                $('.update_category_error').html('Please select Category');
                error = 1;
            }
            else if (price == '') {
                $('.update_category_error').html('Please enter Price');
                error = 1;
            }
            else {
                $('.update_category_error').html('');
                error = 0;
            }



            if (error == 0) {
                $("#update_category_form").submit();
            }

        });
        $("form").submit(function () {
            $('input[type=submit]').attr('disabled', 'disabled');
            return true;
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".edit-category").click(function (e) {
            e.preventDefault();
            var categoryId = $(this).data('category-id');
            var postURL = "{{ url('admin/get-category') }}";
            postURL = postURL + '/' + categoryId;

            $.ajax({
                url: postURL,
                method: "GET",
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (result, pageType) {
                    var data = result.data;
                    console.log('C DATA', result.pageType);
                    // console.log(data.description);
                    $('#update_category_id').val(data.id);
                    $("#update_category_heading option:contains(" + data.title + ")").attr('selected', 'selected');
                    if (result.pageType == 'riskdata' || result.pageType == 'individualmaps') {
                        tinymce.get("update_category_description").setContent(data.description);
                    }

                    $('#update_category_price').val(data.price);

                    $('#edit_category').modal('show');
                },
                error: function (data) {
                    console.log("error");
                    console.log(data);
                }
            });
        });



    });
</script>
@stop