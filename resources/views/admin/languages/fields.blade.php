<!-- Lang Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('lang_name', 'Lang Name:') !!}
    {!! Form::text('lang_name', null, ['class' => 'form-control']) !!}
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

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.languages.index') !!}" class="btn btn-secondary">Cancel</a>
</div>
