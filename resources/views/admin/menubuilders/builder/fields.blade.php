<!-- Parent Field -->
{{-- <div class="form-group col-sm-12">
    {!! Form::label('parent', 'Select Parent:') !!}
    {!! Form::select('parent', $all_menu,null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Slug Field -->
{{-- <div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Type Field -->
{{-- <div class="form-group col-sm-12">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::select('type', ['top' => 'top','main' => 'main', 'bottom' =>'bottom'], isset($menu->type)?$menu->type:null, ['class' => 'form-control']) !!}
</div> --}}
<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<!-- Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>
<!-- Type Field -->
{{-- <div class="form-group col-sm-12">
    {!! Form::label('target', 'Target:') !!}
    {!! Form::select('target', ['_self' => '_self','_blank' => '_blank'], isset($menu->target)?$menu->target:null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Thumb Field -->
{{-- <div class="form-group col-sm-12">
    {!! Form::label('thumb', 'Thumb:') !!}
    {!! Form::file('thumb', ['class' => 'form-control']) !!}
    @if(isset($menu->thumb) && !empty($menu->thumb))
        <div>
            <img src="{{url('uploads/menus/'.$menu->thumb)}}" alt="department thumbnail"
                 class="form-image-size">
        </div>
    @endif
</div> --}}

<!-- Multilingual Name Field -->
{{-- <div>
    <div class="card-body">
        <div class="bs-example">
            <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                <li class=" nav-item">
                    <a href="#en" data-toggle="tab" class="nav-link active">English</a>
                </li>
                <li class=" nav-item">
                    <a href="#ar" data-toggle="tab" class="nav-link ">Arabic</a>
                </li>
            </ul>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;">
                <div id="myTabContent" class="tab-content" style="overflow: hidden; width: auto; height: 200px;">
                    <div class="tab-pane fade show active in" id="en">
                    
                    <!-- Name Field English -->
                        <div class="form-group col-sm-12">
                            {!! Form::label('name', 'Name*:') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="tab-pane fade " id="ar">
                    
                    <!-- Name Field Arabic -->
                        <div class="form-group col-sm-12">
                            {!! Form::label('name_ar', ':* اسم', ['class' => 'pull-right']) !!}
                            {!! Form::text('name_ar', null, ['class' => 'form-control','dir' =>'rtl']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="slimScrollBar"
                style="background: rgb(216, 74, 56); width: 3px; position: absolute; top: 0px; opacity: 1; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 93.8889px;"></div>
            <div class="slimScrollRail"
                style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
        </div>
    </div>
</div> --}}

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.menubuilders.index') !!}" class="btn btn-default">Cancel</a>
</div>
