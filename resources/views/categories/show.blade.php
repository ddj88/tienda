@extends('layouts.app')
@section('body-class', 'profile-page')
@section('title','dashboard')
@section('content')





<div class="header header-filter" style="background-image: url('/img/examples/city.jpg');"></div>

<div class="main main-raised">
<div class="profile-content">
    <div class="container">
        <div class="row">
            <div class="profile">
                <div class="avatar">
                    <img src="{{$category->featured_image_url}}" alt="Imagen representativa de " {{$category->name}}
                   class="img-circle img-responsive img-raised">
                </div>


                @if (session('notification'))
                    <div class="alert alert-success" >
                        {{ session('notification') }}
                    </div>
                @endif

                <div class="name">
                    <h3 class="title">{{$category->name}}</h3>
                </div>
            </div>
        </div>
        <div class="description text-center">
            <p> {{$category->description}}</p>
        </div>




        <div class="team">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card team-player text-center">
                            <img src="{{$product->featured_image_url}}" alt="Thumbnail Image" class="img-raised img-circle">
                            <h4 class="title"> <br />
                                <a href="{{url('/products/'.$product->id)}}"> {{$product->name}}</a>


                            </h4>
                            <p class="description">{{$product->description}}

                                <a href="#"></a></p>

                        </div>
                        <br /><br />
                    </div>
                @endforeach

            </div>

        </div>
        <div class="text-center" > {{$products->links()}}</div>
    </div>

</div>
    <div class="text-center" >
        <a href="{{url('/')}}" class="btn brn-default" >volver</a>
    </div>

</div>












@include('includes.footer')


