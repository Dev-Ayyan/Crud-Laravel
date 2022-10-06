@extends('layout.master')


@section('title', "Page Not Found | App Name Here")
@section('meta', "Page Not Found | App Name Here")
@section('canonical', "")

@section('script_css')

@append

@section('bodyClass', "")

@section('content')
<section class="page-not-found">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">

                <img src="{{ asset('./img/page-not-found.svg') }}" alt="" width="40%" class="pb-5">
                <h3>Oops, Page Not Found!</h3>
                <p>Yikes! Can’t find the page you were looking for at the moment. <br>
                    We’re trying to figure things out. Thanks for your patience!</p>
                    <div class="d-inline mx-auto mt-5">
                        <a href="{{ route('get-home') }}" class="theme_btn">HOME</a>
                    </div>
            </div>

        </div>
    </div>
</section>


@endsection