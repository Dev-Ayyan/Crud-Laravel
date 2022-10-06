<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p class="bg-default p-2 rounded">{!! $developer->id !!}</p>
    <hr>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p class="bg-default p-2 rounded">{!! $developer->name !!}</p>
    <hr>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p class="bg-default p-2 rounded">{!! $developer->email !!}</p>
    <hr>
</div>

<!-- Age Field -->
<div class="form-group">
    {!! Form::label('age', 'Age:') !!}
    <p class="bg-default p-2 rounded">{!! $developer->age !!}</p>
    <hr>
</div>

<!-- Job Field -->
<div class="form-group">
    {!! Form::label('job', 'Job:') !!}
    <p class="bg-default p-2 rounded">{!! $developer->job !!}</p>
    <hr>
</div>

<!-- Archived Field -->
<div class="form-group">
    {!! Form::label('archived', 'Archived:') !!}
    <p>@if( $developer->archived  =='1') <span class="badge badge-sm badge-success"> Yes </span> @else <span class="badge badge-sm badge-danger"> No </span> @endif</p>
    <hr>
</div>

<!-- Is Featured Field -->
<div class="form-group">
    {!! Form::label('is_featured', 'Is Featured:') !!}
    <p>@if( $developer->is_featured  =='1') <span class="badge badge-sm badge-success"> Yes </span> @else <span class="badge badge-sm badge-danger"> No </span> @endif</p>
    <hr>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <p class="bg-default p-2 rounded">{!! $developer->image !!}</p>
    <hr>
</div>

