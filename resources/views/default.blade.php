@extends('layout.master')


@section('meta_title', $page->meta_title)
@section('meta_description', $page->meta_description)
@section('canonical', "".$page->slug)

@section('script_css')
<meta property="og:title" content="{{ $page->meta_title }}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="" />
<meta name="twitter:title" content="{{ $page->meta_title }}" />

<meta property="og:description" content="{{ $page->meta_description }}" />
<meta name="twitter:description" content="{{ $page->meta_description }}" />

<meta property="og:image" content="{{ asset('./img/thumbnail.jpg') }}" />
<meta name="twitter:image" content="{{ asset('./img/thumbnail.jpg') }}" />

<meta property="og:url" content="{{ $page->slug }}" />
@append

@section('bodyClass', "contactpg")

@section('content')

@if($page->banner)
    @include('common.banner',['banner'=> $page->banner])
@else
    @include('common.default-banner')
@endif

@endsection