<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p class="bg-default p-2 rounded">{!! $language->id !!}</p>
    <hr>
</div>

<!-- Lang Name Field -->
<div class="form-group">
    {!! Form::label('lang_name', 'Lang Name:') !!}
    <p class="bg-default p-2 rounded">{!! $language->lang_name !!}</p>
    <hr>
</div>

<!-- Archived Field -->
<div class="form-group">
    {!! Form::label('archived', 'Archived:') !!}
    <p>@if( $language->archived  =='1') <span class="badge badge-sm badge-success"> Yes </span> @else <span class="badge badge-sm badge-danger"> No </span> @endif</p>
    <hr>
</div>

<!-- Is Featured Field -->
<div class="form-group">
    {!! Form::label('is_featured', 'Is Featured:') !!}
    <p>@if( $language->is_featured  =='1') <span class="badge badge-sm badge-success"> Yes </span> @else <span class="badge badge-sm badge-danger"> No </span> @endif</p>
    <hr>
</div>

