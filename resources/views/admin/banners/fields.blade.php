<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    <hr>
</div>



<!-- Heading Field -->
<div class="form-group col-sm-12">
    {!! Form::label('heading', 'Heading:') !!}
    {!! Form::text('heading', null, ['class' => 'form-control theme_heading_tinymce']) !!}
</div>


<div class="form-group col-sm-12">
    <hr>
</div>

<!-- Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control theme_tinymce', 'rows' => '5']) !!}
</div>


<div class="form-group col-sm-12">
    <hr>
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::select('type', array('Image' => 'Image'), (isset($banner))? $banner->type : 'Image'  , ['class' => 'form-control'])
    !!}
</div>

<!-- Source Field -->
<div class="form-group col-sm-6">
    {!! Form::label('source', 'Source (Max 15MB - 1920x1080):') !!} <br>
    {!! Form::file('source', null, ['class' => 'form-control']) !!}
    @if(isset($banner))
    @if(isset($banner->source) && !empty($banner->source))
    @if($banner->type=='Video')
    <br>
    <br>
    <video src="{{url($banner->source)}}" controls width="320" height="240"></video>
    @else

    <img src="{{url($banner->source)}}" alt="content thumbnail" class="form-image-size">

    @endif
    @endif
    @endif
</div>


<div class="form-group col-sm-12">
    <hr>
</div>


<!-- Button1 Label Field -->
<div class="form-group col-sm-4">
    {!! Form::label('btn1_label', 'Button1 Label:') !!}
    {!! Form::text('btn1_label', null, ['class' => 'form-control']) !!}
</div>

<!-- Button1 Link Field -->
<div class="form-group col-sm-4">
    {!! Form::label('btn1_link', 'Button1 Link:') !!}
    {!! Form::text('btn1_link', null, ['class' => 'form-control','placeholder'=>'propertyreport']) !!}
</div>

<!-- Button1 Target Field -->
<div class="form-group col-sm-2">
    {!! Form::label('btn1_target', 'Button1 Target:') !!}
    {!! Form::select('btn1_target', array('_self' => 'Same Window','_blank' => 'New Window'), '_self', ['class' =>
    'form-control']) !!}
</div>

<!-- Button1 Type Field -->
<div class="form-group col-sm-2">
    {!! Form::label('btn1_type', 'Button1 Type:') !!}
    {!! Form::select('btn1_type', array('Transparent' => 'Transparent','Filled' => 'Filled'), (isset($banner))? $banner->btn1_type : 'Filled'  ,
    ['class' =>
    'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    <hr>
</div>

<!-- Button2 Label Field -->
<div class="form-group col-sm-4">
    {!! Form::label('btn2_label', 'Button2 Label:') !!}
    {!! Form::text('btn2_label', null, ['class' => 'form-control']) !!}
</div>

<!-- Button2 Link Field -->
<div class="form-group col-sm-4">
    {!! Form::label('btn2_link', 'Button2 Link:') !!}
    {!! Form::text('btn2_link', null, ['class' => 'form-control']) !!}
</div>

<!-- Button2 Target Field -->
<div class="form-group col-sm-2">
    {!! Form::label('btn2_target', 'Button2 Target:') !!}
    {!! Form::select('btn2_target', array('_self' => 'Same Window','_blank' => 'New Window'), '_self', ['class' =>
    'form-control']) !!}
</div>

<!-- Button2 Type Field -->
<div class="form-group col-sm-2">
    {!! Form::label('btn2_type', 'Button2 Type:') !!}
    {!! Form::select('btn2_type', array('Transparent' => 'Transparent','Filled' => 'Filled'),(isset($banner))? $banner->btn2_type : 'Filled' ,
    ['class' =>
    'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    <hr>
</div>

{!! Form::hidden('position', null, ['class' => 'form-control','min'=>'0']) !!}

<!-- Status Field -->
<div class="form-group col-sm-4">
    {!! Form::label('status', 'Status:') !!}

    {!! Form::select('status', array('Active' => 'Active', 'Inactive' => 'Inactive'), 'Active', ['class' =>
    'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    <hr>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.banners.index') !!}" class="btn btn-secondary">Cancel</a>
</div>