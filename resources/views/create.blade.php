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
                <form method="POST" action="{{route('get-info-form')}}">
                    @csrf
                    @honeypot
                    <input value="{{old('name')}}" type="text" class="form-control my-2 @error('name') border border-danger  @enderror" name="name" id="name" placeholder="name">
                    @error('name') <small class="text-danger">{{$message}}</small> @enderror

                    <input value="{{old('email')}}" type="email" class="form-control my-2 @error('email') border border-danger  @enderror" name="email" id="email" placeholder="email">
                    @error('email') <small class="text-danger">{{$message}}</small> @enderror

                    <input value="{{old('age')}}" type="text" class="form-control my-2 @error('age') border border-danger  @enderror" name="age" id="age" placeholder="age">
                    @error('age') <small class="text-danger">{{$message}}</small> @enderror

                    <input value="{{old('job')}}" type="text" class="form-control my-2 @error('job') border border-danger  @enderror" name="job" id="job" placeholder="job">
                    @error('job') <small class="text-danger">{{$message}}</small> @enderror

                    <button type="submit" class="btn btn-warning">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection