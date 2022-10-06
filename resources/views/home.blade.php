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
                            <a href="{{route('edit-developer', $developer->id)}}" class="btn btn-warning">Edit</a>

                            <form action="{{route('developer.delete', $developer->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>




                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    @endsection