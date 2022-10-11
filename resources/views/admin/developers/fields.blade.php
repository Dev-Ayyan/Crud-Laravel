<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Age Field -->
<div class="form-group col-sm-12">
    {!! Form::label('age', 'Age:') !!}
    {!! Form::text('age', null, ['class' => 'form-control']) !!}
</div>

<!-- Job Field -->
<div class="form-group col-sm-12">
    {!! Form::label('job', 'Job:') !!}
    {!! Form::text('job', null, ['class' => 'form-control']) !!}
</div>

<!-- Archived Field -->
<div class="form-group col-sm-6">
    {!! Form::label('archived', 'Archived:') !!}
    <label class="checkbox-inline">
        {!! Form::checkbox('archived', '1') !!}
    </label>
</div>

<!-- Is Featured Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_featured', 'Is Featured:') !!}
    <label class="checkbox-inline">
        {!! Form::checkbox('is_featured', '1') !!}
    </label>
</div>

<!-- Image Field -->
<div class="form-group col-sm-12">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::text('image', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.developers.index') !!}" class="btn btn-secondary">Cancel</a>
</div>