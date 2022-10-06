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
<section class="bg-light"></section>
<div class="container">
    <div class="row mb-4">
        <div class="col-lg-10 offset-lg-1">
            <form method="POST" action="{{route('developer.store')}}">
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

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-10 offset-1">
            <table class="table-lg table w-100 table-stripped table-bordered">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Job</th>
                        <th>Image</th>
                        <th>Customize</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($developers as $developer)

                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$developer->name}}</td>
                        <td>{{$developer->email}}</td>
                        <td>{{$developer->age}}</td>
                        <td>{{$developer->job}}</td>
                        <td>{{$developer->image}}</td>
                        <td>
                            <a href="{{route('get-edit', $developer->id)}}" class="btn btn-warning d-inline m-1">Edit</a>

                            <form action="{{route('developer.destroy', $developer->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger d-inline m-1">Delete</button>
                            </form>




                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    @endsection