<section class="hero-banner p-0">

    <div id="themeSlider" class="carousel slide" data-ride="carousel">


        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset($banner->source) }}" alt="">
                <div class="caption-head">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="content_box_wrapper wow fadeInUpSmall" data-wow-duration="1.5s"
                                        data-wow-delay="1s">
                                        <div class="content_box">

                                            <h2>{!! $banner->heading !!}</h2>
                                            <p>{!! $banner->description !!}</p>
                                            
                                            @if($banner->btn1_label !='' )
                                            <a href="{{ $banner->btn1_link }}" class="theme_btn {{ ($banner->btn1_type =='Transparent')? 'theme_btn_inverse' : '' }}">{{ $banner->btn1_label }}</a>
                                            @endif

                                            @if($banner->btn2_label !='' )
                                            
                                            <a href="{{ $banner->btn2_link }}" class="theme_btn {{ ($banner->btn2_type =='Transparent')? 'theme_btn_inverse' : '' }}">{{ $banner->btn2_label }}</a>
                                            @endif
                                           

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>