@extends('layout.master')

@section('meta_title', '')
@section('meta_description', '')
@section('canonical',"")

@section('script_css')
<meta itemprop="image" content="">
<meta property="og:image" content="" />
<meta name="twitter:image" content="" />
@append

@section('bodyClass',"")

@section('content')

<section>
    <div class="container">
        <div class="row">


            <div class="col-lg-10 offset-lg-1">

                <h2>Edit {{$developer->name }} | {{$developer->job}}</h2>
                <a href="{{route('get-home')}}" class="btn btn-dark">Back</a>


                <form action="{{route('developer.update', $developer->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input value="{{$developer->name}}" type="text" class="form-control my-2 " name="name" id="name" placeholder="name">

                    <input value="{{$developer->email}}" type="email" class="form-control my-2 " name="email" id="email" placeholder="email">

                    <input value="{{$developer->age}}" type="text" class="form-control my-2 " name="age" id="age" placeholder="age">

                    <input value="{{$developer->job}}" type="text" class="form-control my-2 " name="job" id="job" placeholder="job">
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection