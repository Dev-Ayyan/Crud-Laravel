@extends('admin/layouts/default')

@section('title')
Menus
@parent
@stop

@section('header_styles')

<style>

/**
 * Nestable
 */

 .dd { position: relative; display: block; margin: 0; padding: 0; max-width: 600px; list-style: none; font-size: 13px; line-height: 20px; }

.dd-list { display: block; position: relative; margin: 0; padding: 0; list-style: none; }
.dd-list .dd-list { padding-left: 30px; }
.dd-collapsed .dd-list { display: none; }

.dd-item,
.dd-empty,
.dd-placeholder { display: block; position: relative; margin: 0; padding: 0; min-height: 20px; font-size: 13px; line-height: 20px; }

.dd-handle { display: block; height: 30px; margin: 5px 0; padding: 5px 10px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
    background: #fafafa;
    background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:         linear-gradient(top, #fafafa 0%, #eee 100%);
    -webkit-border-radius: 3px;
            border-radius: 3px;
    box-sizing: border-box; -moz-box-sizing: border-box;
}
.dd-handle:hover { color: #2ea8e5; background: #fff; }

.dd-item > button { display: block; position: relative; cursor: pointer; float: left; width: 25px; height: 20px; margin: 5px 0; padding: 0; text-indent: 100%; white-space: nowrap; overflow: hidden; border: 0; background: transparent; font-size: 12px; line-height: 1; text-align: center; font-weight: bold; }
.dd-item > button:before { content: '+'; display: block; position: absolute; width: 100%; text-align: center; text-indent: 0; }
.dd-item > button[data-action="collapse"]:before { content: '-'; }

.dd-placeholder,
.dd-empty { margin: 5px 0; padding: 0; min-height: 30px; background: #f2fbff; border: 1px dashed #b6bcbf; box-sizing: border-box; -moz-box-sizing: border-box; }
.dd-empty { border: 1px dashed #bbb; min-height: 100px; background-color: #e5e5e5;
    background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                      -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-image:    -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                         -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-image:         linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                              linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-size: 60px 60px;
    background-position: 0 0, 30px 30px;
}

.dd-dragel { position: absolute; pointer-events: none; z-index: 9999; }
.dd-dragel > .dd-item .dd-handle { margin-top: 0; }
.dd-dragel .dd-handle {
    -webkit-box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
            box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
}

</style>
@append

{{-- Page content --}}
@section('content')

@php
    $order_url = route('admin.builders.order', ['id' => $menu_id]);
    $token = csrf_token();
    $itemEditUrl = route('admin.builders.edit', ['id' => "itemId"]);
@endphp


<section class="content-header">
    <h1>Menus</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                
            </a>
        </li>
        <li><a href="{{ route('admin.menus.data') }}">Menus</a></li>
        <li class="active">Menus List</li>
    </ol>
</section>

<section class="content pr-3 pl-3">
    <div class="row">
     <div class="col-12">
     @include('flash::message')
        <div class="card panel-primary ">
            <div class="card-header bg-primary text-white clearfix">
                <h4 class="card-title float-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Menus List
                </h4>
                <div class="float-right">
                    <button type="button" class="btn btn-sm btn-default create-modal-popup" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> @lang('button.create')</button>
                </div>
            </div>
            <br />
                    <div class="cf nestable-lists" style="width: 100%;padding: 0px 15px">
                        <div class="dd" id="nestable"  style="max-width: 100%;">
                            <ol class="dd-list">
                                @foreach($menus as $menu)
                                    <li class="dd-item" data-id="{{ $menu->id }}">
                                        <div class="dd-handle">{{ $menu->title }}
                                        </div>
                                        <div class="item_actions">
                                            
                                                <a href="#" class="btn btn-sm edit-item" >@lang('button.edit')</a>
                                                <a href="{{ route('admin.builders.confirm-delete', $menu->id ) }}"  data-id="{{ route('admin.builders.delete', $menu->id ) }}" class="btn btn-sm"
                                                   data-toggle="modal" data-target="#delete_confirm">Delete</a>
                                        </div>
                                        @if(count($menu->childs))
                                            @include('admin.menubuilders.builder.manageChild',['childs' => $menu->childs])
                                        @endif
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>


<div class="card-body table-responsive">

            </div>
        </div>
        </div>
 </div>
</section>


<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 id="m_hd_add" class="modal-title"><i class="fa fa-plus"></i> Create a New Menu Item</h4>
                <h4 id="m_hd_edit" class="modal-title"><i class="fa fa-edit"></i> Edit Menu Item</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="m_form" action="{{ route('admin.builders.store', ['id' => $menu_id]) }}" method="POST"  data-action-add="{{ route('admin.builders.store', ['id' => $menu_id]) }}" data-action-update="{{ route('admin.builders.store', ['id' => $menu_id]) }}">
                <!-- Modal body -->
                @csrf
                <div class="modal-body">
                    <label for="name">Title of the Menu Item</label>
                    <input type="text" class="form-control" id="m_title" name="title" placeholder="Title" required><br>
                    <label for="type">Link type</label>
                    <select id="m_link_type" class="form-control" name="type">
                        <option value="url" selected="selected">Static URL</option>
                        <!-- <option value="route">Dynamic Route</option> -->
                    </select><br>
                    <div id="m_url_type" style="">
                        <label for="url">URL for the Menu Item eg: <small>https://www.M4FM.com/faq</small></label>
                        <input type="text" class="form-control" id="m_url" name="url" placeholder="URL" required><br>
                    </div>
                    <div id="m_route_type" style="display: none;">
                        <label for="route">Route for the menu item</label>
                        <input type="text" class="form-control" id="m_route" name="route" placeholder="Route"><br>
                        <label for="parameters">Route parameters (if any)</label>
                    </div>
                    <label for="target">Open In</label>
                    <select id="m_target" class="form-control" name="target">
                        <option value="_self" selected="selected">Same Tab/Window</option>
                        <option value="_blank">New Tab/Window</option>
                    </select>
                    <input type="hidden" name="menu_id" value="{{ $menu_id }}">
                    <input type="hidden" name="id" id="m_id" value="">
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer text-center justify-content-center">
                    <input type="submit" class="btn btn-success pull-right delete-confirm__" value="Save">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteLabel">Delete Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                Are you sure to delete this Item? This operation is irreversible.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a  type="button" class="btn btn-danger Remove_square">Delete</a>
            </div>
        </div>
    </div>
</div>
@stop



@section('footer_scripts')

<script src="{{ asset('js/jquery.nestable.js') }}"></script>

<script>
    $(document).ready(function () {
        
        $('.create-modal-popup').click(function(e) {
            $("#m_form"). trigger("reset");
        });
        $('.dd').nestable({
            expandBtnHTML: '',
            collapseBtnHTML: ''
        });


        /**
            * Set Variables
            */
        // var $m_modal       = $('#menu_item_modal'),
        var $m_modal       = $('#myModal'),
            $m_hd_add      = $('#m_hd_add').hide().removeClass('hidden'),
            $m_hd_edit     = $('#m_hd_edit').hide().removeClass('hidden'),
            $m_form        = $('#m_form'),
            $m_form_method = $('#m_form_method'),
            $m_title       = $('#m_title'),
            $m_title_i18n  = $('#title_i18n'),
            $m_url_type    = $('#m_url_type'),
            $m_url         = $('#m_url'),
            $m_link_type   = $('#m_link_type'),
            $m_route_type  = $('#m_route_type'),
            $m_route       = $('#m_route'),
            $m_parameters  = $('#m_parameters'),
            $m_icon_class  = $('#m_icon_class'),
            $m_color       = $('#m_color'),
            $m_target      = $('#m_target'),
            $m_id          = $('#m_id');

        /**
            * Add Menu
            */
        $('.add_item').click(function() {
            $m_form.trigger('reset');
            $m_form.find("input[type=submit]").val('Add');
            $m_modal.modal('show', {data: null});
        });

        /**
            * Edit Menu
            */
        $('.item_actions').on('click', '.edit-item', function (e) {
            var item_id = $(this).parent().parent().attr('data-id');
            
            var url = '{{ $itemEditUrl }}';
            url = url.replace("itemId", item_id)
            $.get(url, function(data, status){

                relatedTarget = data;

            $('#m_title').val(data.title);
            $('#m_url').val(data.url);
            $('#m_route').val(data.route);
            $('#m_icon_class').val(data.icon_class);
            $('#m_color').val(data.color);
            $('#m_target').val(data.target);
            $('#m_id').val(data.id);

            $m_modal.modal('show');
            });

        });


        /**
            * Toggle Form Menu Type
            */
        $m_link_type.on('change', function (e) {
            if ($m_link_type.val() == 'route') {
                $m_url_type.hide();
                $m_route_type.show();
            } else {
                $m_url_type.show();
                $m_route_type.hide();
            }
        });


        /**
            * Reorder items
            */
        $('.dd').on('change', function (e) {
            $.post('{{ $order_url }}', {
                order: JSON.stringify($('.dd').nestable('serialize')),
                _token: '{{ $token }}'
            }, function (data) {
                toastr.success("Successfully updated menu order.");
            });
        });

        $('#delete_confirm').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var $recipient = button.data('id');
            var modal = $(this);
            modal.find('.modal-footer a').prop("href", $recipient);
        })


    });
</script>

@append
