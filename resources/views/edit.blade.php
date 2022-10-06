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

                <h2>Edit</h2>
                <a href="{{route('get-home')}}" class="btn btn-success">Back</a>
                <form action="" method="POST">
                    @csrf
                    <table>
                        <tr>
                            <td></td>
                            <td><input type="text" name="name" value=""></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="submit">Submit</td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection