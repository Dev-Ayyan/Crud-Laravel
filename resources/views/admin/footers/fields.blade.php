<!-- Copyrights Field -->
<div class="form-group col-sm-12">
    {!! Form::label('copyrights', 'Copyrights:') !!}
    {!! Form::text('copyrights', null, ['class' => 'form-control']) !!}
</div>


<!-- Cta Form Heading Field -->
<div class="form-group col-sm-12">
    {!! Form::label('contact_area', 'Footer Contact Email') !!}
    {!! Form::text('contact_area', null, ['class' => 'form-control']) !!}
</div>

<!-- Cta Form Heading Field -->
<div class="form-group col-sm-12">
    {!! Form::label('cta_form_heading', 'Home | Call to Action Heading:') !!}
    {!! Form::text('cta_form_heading', null, ['class' => 'form-control theme_heading_tinymce']) !!}
</div>

<!-- Cta Form Subheading Field -->
<div class="form-group col-sm-12">
    {!! Form::label('cta_form_subheading', 'Home | Call to Action Subheading:') !!}
    {!! Form::text('cta_form_subheading', null, ['class' => 'form-control theme_heading_tinymce']) !!}
</div>



<!-- Cta Form Subheading Field -->
<div class="form-group col-sm-12">
    {!! Form::label('cta_form_bg', 'Home | CTA Background Image - Size [1600 x 1200 px]:') !!} <br>
    {!! Form::file('cta_form_bg', null, ['class' => 'form-control']) !!}

@if(isset($footer->cta_form_bg) && !empty($footer->cta_form_bg))

    <img src="{{url($footer->cta_form_bg)}}" alt="content thumbnail"
         class="form-image-size">

@endif

</div>


<div class="form-group col-sm-12">
    {!! Form::label('cart_field_placeholder', 'Cart Input Field Placeholder Text:') !!}
    {!! Form::text('cart_field_placeholder', null, ['class' => 'form-control']) !!}
</div>




<!-- Facebook Field -->
<div class="form-group col-sm-12">
    {!! Form::label('facebook', 'Facebook:') !!}
    {!! Form::text('facebook', null, ['class' => 'form-control']) !!}
</div>

<!-- Instagram Field -->
<div class="form-group col-sm-12">
    {!! Form::label('instagram', 'Instagram:') !!}
    {!! Form::text('instagram', null, ['class' => 'form-control']) !!}
</div>

<!-- Twitter Field -->
<div class="form-group col-sm-12">
    {!! Form::label('twitter', 'Twitter:') !!}
    {!! Form::text('twitter', null, ['class' => 'form-control']) !!}
</div>

<!-- Linkedin Field -->
<div class="form-group col-sm-12">
    {!! Form::label('linkedin', 'Linkedin:') !!}
    {!! Form::text('linkedin', null, ['class' => 'form-control']) !!}
</div>

<!-- Youtube Field -->
<!-- <div class="form-group col-sm-12">
    {!! Form::label('youtube', 'Youtube:') !!}
    {!! Form::text('youtube', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Maps Field -->
<!-- <div class="form-group col-sm-12">
    {!! Form::label('maps', 'Maps:') !!}
    {!! Form::text('maps', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.footers.index') !!}" class="btn btn-secondary">Cancel</a>
</div>
