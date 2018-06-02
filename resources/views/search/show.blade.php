@extends('layouts.app')
@section('body-class', 'profile-page')
@section('title','resultados')
@section('content')





<div class="header header-filter" style="background-image: url('/img/examples/city.jpg');"></div>

<div class="main main-raised">
<div class="profile-content">
    <div class="container">
        <div class="row">
            <div class="profile">


                @if (session('notification'))
                    <div class="alert alert-success" >
                        {{ session('notification') }}
                    </div>
                @endif


    </div>
</div>
        <div class="description text-center">
            <p> Se han encontrado: {{$products->count()}} productos</p>
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


