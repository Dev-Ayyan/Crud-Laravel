<div class="row">
    <!-- Heading Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('heading', 'Heading:') !!}
        {!! Form::text('heading', null, ['class' => 'form-control ']) !!}
    </div>

    <!-- Sub Heading Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('sub_heading', 'Description:') !!}
        {!! Form::text('sub_heading', null, ['class' => 'form-control theme_tinymce']) !!}
    </div>

    @if((isset($page) && $page->type =='default') || !isset($page))


    <!-- Description Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('description', 'Page Content:') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control theme_tinymce', 'rows' => '5']) !!}
    </div>
    @endif

    <!-- Banner Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('banner_id', 'Select Banner / Video:') !!}
        {!! Form::select('banner_id', $vc_all_banners, isset($page->banner_id)?$page->banner_id:null, ['class' =>
        'form-control']) !!}
    </div>
    @if(isset($page) && $page->type =='default' )

    <!-- Slug Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('slug', 'Slug:') !!}
        {!! Form::text('slug', $page->slug, ['class' => 'form-control','required' => '']) !!}
    </div>

    @elseif(isset($page) && $page->type != 'default')

    {!! Form::hidden('slug', $page->slug, ['class' => 'form-control']) !!}

    @else
    <!-- Slug Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('slug', 'Slug:') !!}
        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
    </div>
    @endif



    <div class="form-group col-sm-12">
        <br>
        <hr>

    </div>


    <!-- Meta Title Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('meta_title', 'Meta Title:') !!}
        {!! Form::text('meta_title', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Meta Description Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('meta_description', 'Meta Description:') !!}
        {!! Form::text('meta_description', null, ['class' => 'form-control', 'rows' => '5']) !!}
    </div>

    <!-- Schema Field -->
    <!-- <div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Open Graph Schema', 'Schema:') !!}
    {!! Form::textarea('schema', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div> -->


    @if(isset($page))

    {!! Form::hidden('type', $page->type, ['class' => 'form-control']) !!}
    @else
    {!! Form::hidden('type', 'default', ['class' => 'form-control']) !!}
    @endif
    <!-- Submit Field -->
    <div class="form-group col-sm-12 text-center">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('admin.pages.index') !!}" class="btn btn-secondary">Cancel</a>
    </div>


</div>