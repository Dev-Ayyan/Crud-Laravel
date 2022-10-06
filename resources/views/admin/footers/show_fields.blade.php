<!-- Id Field -->
<!-- <div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $footer->id !!}</p>
    <hr>
</div> -->

<!-- Copyrights Field -->
<div class="form-group">
    {!! Form::label('copyrights', 'Copyrights:') !!}
    <p>{!! $footer->copyrights !!}</p>
    <hr>
</div>


<!-- Contact Area Field -->
<div class="form-group">
    {!! Form::label('contact_area', 'Contact Area:') !!}
    <p>{!! $footer->contact_area !!}</p>
    <hr>
</div>

<!-- Cta Form Heading Field -->
<div class="form-group">
    {!! Form::label('cta_form_heading', 'Cta Form Heading:') !!}
    <p>{!! $footer->cta_form_heading !!}</p>
    <hr>
</div>

<!-- Cta Form Subheading Field -->
<div class="form-group">
    {!! Form::label('cta_form_subheading', 'Cta Form Subheading:') !!}
    <p>{!! $footer->cta_form_subheading !!}</p>
    <hr>
</div>
<!-- Cta Form Subheading Field -->
<div class="form-group">
 

    {!! Form::label('cta_form_bg', 'Home | CTA Background Image - Size [1600 x 1200 px]:') !!} <br>
 
@if(isset($footer->cta_form_bg) && !empty($footer->cta_form_bg))

    <img src="{{url($footer->cta_form_bg)}}" alt="content thumbnail"
         class="form-image-size">

@endif


    <hr>
</div>

<div class="form-group">
    {!! Form::label('cart_field_placeholder', 'Cart Input Field Placeholder Text:') !!}
    <p>{!! $footer->cart_field_placeholder !!}</p>
    <hr>
</div>

<!-- Facebook Field -->
<div class="form-group">
    {!! Form::label('facebook', 'Facebook:') !!}
    <p>{!! $footer->facebook !!}</p>
    <hr>
</div>

<!-- Instagram Field -->
<div class="form-group">
    {!! Form::label('instagram', 'Instagram:') !!}
    <p>{!! $footer->instagram !!}</p>
    <hr>
</div>

<!-- Twitter Field -->
<div class="form-group">
    {!! Form::label('twitter', 'Twitter:') !!}
    <p>{!! $footer->twitter !!}</p>
    <hr>
</div>

<!-- Linkedin Field -->
<div class="form-group">
    {!! Form::label('linkedin', 'Linkedin:') !!}
    <p>{!! $footer->linkedin !!}</p>
    <hr>
</div>

<!-- Youtube Field -->
<!-- <div class="form-group">
    {!! Form::label('youtube', 'Youtube:') !!}
    <p>{!! $footer->youtube !!}</p>
    <hr>
</div> -->

<!-- Maps Field -->
<!-- <div class="form-group">
    {!! Form::label('maps', 'Maps:') !!}
    <p>{!! $footer->maps !!}</p>
    <hr>
</div>
 -->
