@extends('layout.master')


@section('title', $page->meta_title)
@section('meta', $page->meta_description)
@section('canonical', "sitemap")

@section('script_css')
<meta property="og:title" content="{{ $page->meta_title }}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@eProperty Report" />
<meta name="twitter:title" content="{{ $page->meta_title }}" />

<meta property="og:description" content="{{ $page->meta_description }}" />
<meta name="twitter:description" content="{{ $page->meta_description }}" />

<meta property="og:image" content="{{ asset('./img/thumbnail.jpg') }}" />
<meta name="twitter:image" content="{{ asset('./img/thumbnail.jpg') }}" />


<meta property="og:url" content="sitemap" />
@append

@section('bodyClass', "homepg")

@section('content')

@if($page->banner)


@include('common.banner',['banner'=> $page->banner])
@else
    @include('common.default-banner')
@endif
<section class="breadcrumbs_sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12 breadcrumbs__col">
                <ul class="breadcrumbs__list">
                    <li class="breadcrumbs__item">
                        <a href="{{ route('get-home') }}" aria-label="Home" class="breadcrumbs__element">Home</a>
                    </li>
                    <li class="breadcrumbs__item">
                        <span class="breadcrumbs__element">{!! $page->heading !!}</span>
                    </li>
                </ul>
            </div>
            <div class="col-12 text-center heading__col wow fadeInUpSmall" data-wow-duration="1s" data-wow-delay="1s">
                <h1>{!! $page->heading !!}</h1>
                <div class="w-75 mx-auto"><p>{!! $page->sub_heading !!}</p></div>
            </div>
        </div>
    </div>
</section>

<section class="sitemap_sec pt-0">
    <div class="container">
        <div class="row">

            <div class="col-md-12"><a href="{{ route('get-home') }}">
                    <h3>Home</h3>
                </a></div>
        </div>

        <div class="row">
            <div class="col-md-12"><a href="{{ route('get-propertyreport') }}">
                    <h3>Property Report</h3>
                </a></div>
            <div class="col-12">
                <ul>
                    <li>Category 1</li>
                    <li>Category 2</li>
                    <li>Category 3</li>
                    <li>Category 4</li>
                    <li>Category 5</li>
                    <li>Category 6</li>
                    <li>Category 7</li>
                    <li>Category 8</li>
                    <li>Category 9</li>
                    <li>Category 10</li>
                    <li>Category 11</li>
                    <li>Category 12</li>
                    <li>Category 13</li>
                    <li>Category 14</li>
                    <li>Category 15</li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12"><a href="{{ route('get-riskdata') }}">
                    <h3>Risk Data</h3>
                </a></div>
            <div class="col-12">
                <ul>
                    <li>Category 1</li>
                    <li>Category 2</li>
                    <li>Category 3</li>
                    <li>Category 4</li>
                    <li>Category 5</li>
                    <li>Category 6</li>
                    <li>Category 7</li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12"><a href="{{ route('get-courthouse-documents') }}">
                    <h3>Courthouse Documents</h3>
                </a></div>
            <div class="col-12">
                <ul>
                    <li>Category 1</li>
                    <li>Category 2</li>
                    <li>Category 3</li>
                    <li>Category 4</li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12"><a href="{{ route('get-individualMaps') }}">
                    <h3>Individual Maps</h3>
                </a></div>
            <div class="col-12">
                <ul>
                    <li>Category 1</li>
                    <li>Category 2</li>
                    <li>Category 3</li>
                    <li>Category 4</li>
                    <li>Category 5</li>
                    <li>Category 6</li>
                    <li>Category 7</li>
                    <li>Category 8</li>
                    <li>Category 9</li>
                    <li>Category 10</li>
                    <li>Category 11</li>
                    <li>Category 12</li>
                    <li>Category 13</li>
                    <li>Category 14</li>
                    <li>Category 15</li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12"><a href="{{ route('get-professional-services') }}">
                    <h3>Professional Services</h3>
                </a></div>
            <div class="col-12">
                <ul>
                    <li>Category 1</li>
                    <li>Category 2</li>
                    <li>Category 3</li>
                    <li>Category 4</li>
                    <li>Category 5</li>
                    <li>Category 6</li>
                    <li>Category 7</li>
                    <li>Category 8</li>
                    <li>Category 9</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12"><a href="{{ route('get-products') }}">
                    <h3>All Products</h3>
                </a></div>
        </div>
        <div class="row">
            <div class="col-md-12"><a href="{{ route('get-faq') }}">
                    <h3>FAQ</h3>
                </a></div>
        </div>
        <div class="row">
            <div class="col-md-12"><a href="{{ route('get-contact') }}">
                    <h3>Contact</h3>
                </a></div>
        </div>
        <div class="row">
            
            <div class="col-md-12"><a href="/privacy-policy">
                    <h3>Privacy Policy</h3>
                </a></div>
        </div>
    </div>

    </div>
</section>



@endsection