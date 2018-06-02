@extends('layouts.app')
@section('body-class', 'landing-page')
@section('content')
@section('title','welcome to davids store!')

@section('styles')
<style>

    .team .row .col-md-4{
        margin-bottom: 5em;}

    .team .row {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display:         flex;
        flex-wrap: wrap;
    }
   .team .row > [class*='col-'] {
        display: flex;
        flex-direction: column;
    }
    .tt-query {
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    }

    .team .tt-hint {
        color: #999
    }

    .tt-menu {    /* used to be tt-dropdown-menu in older versions */
        width: 222px;
        margin-top: 4px;
        padding: 4px 0;
        background-color: #fff;
        border: 1px solid #ccc;
        border: 1px solid rgba(0, 0, 0, 0.2);
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
        -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
        box-shadow: 0 5px 10px rgba(0,0,0,.2);
    }

    .tt-suggestion {
        padding: 3px 20px;
        line-height: 24px;
    }

    .tt-suggestion.tt-cursor,.tt-suggestion:hover {
        color: #fff;
        background-color: #0097cf;

    }

    .tt-suggestion p {
        margin: 0;
    }

</style>

@endsection
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
<div class="container">
<div class="row">
    <div class="col-md-6">
        <h1 class="title">Mi primera pagina web!!</h1>
        <h4>"It gets easier. Every day it gets a little easier. But you got to do it every day. That's the hard part. But it does get easier."</h4>
        <br />
        <a href="https://www.youtube.com/watch?v=R2_Mn-qRKjA" class="btn btn-danger btn-raised btn-lg">
            <i class="fa fa-play"></i> ver video
        </a>
    </div>
</div>
</div>
</div>

<div class="main main-raised">
<div class="container">
<div class="section text-center section-landing">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="title">Garantia de exito</h2>
            <h5 class="description"> Buenos precios a buena calidad</h5>
        </div>
    </div>

    <div class="features">
        <div class="row">
            <div class="col-md-4">
                <div class="info">
                    <div class="icon icon-primary">
                        <i class="material-icons">chat</i>
                    </div>
                    <h4 class="info-title">Atencion personalizada</h4>
                    <p>Servicio de atencion al cliente online</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info">
                    <div class="icon icon-success">
                        <i class="material-icons">verified_user</i>
                    </div>
                    <h4 class="info-title">Compras seguras</h4>
                    <p>Tus compras siempre seran protegidas mediante los ultimos sistemas de seguridad</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info">
                    <div class="icon icon-danger">
                        <i class="material-icons">fingerprint</i>
                    </div>
                    <h4 class="info-title">compras mediante 2fa</h4>
                    <p>Nos aseguramos de que no te suplanten la identidad</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section text-center">
    <h2 class="title">Categorias disponibles</h2>

    <form class="form-inline" method="get" action="{{url('/search')}}">
        <input type="text" placeholder="Buscar producto" class="form-control" name="query" id="search">
        <button class="btn btn-primary btn-just-icon" type="submit">
        <i class="material-icons">Buscar</i>
        </button>

    </form>


    <div class="team">
        <div class="row">
            @foreach($categories as $category)
            <div class="col-md-4">
                <div class="card team-player">
                    <img src="{{$category->featured_image_url}}" alt="Thumbnail Image" class="img-raised img-circle">
                    <h4 class="title"> <br />
                        <a href="{{url('/categories/'.$category->id)}}"> {{$category->name}}</a>
                        <br>
                        <small class="text-muted">{{ $category->name ? $category->name : 'general'}}</small>
                    </h4>
                    <p class="description">{{$category->description}}

                        <a href="#"></a></p>

                </div>
            </div>
           @endforeach

        </div>

    </div>

</div>


<div class="section landing-section">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="text-center title">Registrate</h2>
            <h4 class="text-center description">Es muy sencillo!</h4>
                <form  method="GET" action="{{ url('quickreg') }}">



                    <div class="content">

                        <div class="input-group">


                            <input id="name" type="text" class="form-control" name="name"  placeholder="Nombre..." value="{{ old('name') }}" required autofocus>

                            <input id="email" type="email" class="form-control" name="email"  placeholder="Email..." value="{{ old('email') }}" required autofocus>
                        </div>

                        <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>

                    </div>
                    <div class="footer text-center">
                        <button type="submit"class="btn btn-simple btn-primary btn-lg">Registrarte</button>
                    </div>
                </form>
        </div>
    </div>

</div>
</div>

</div>

@include('includes.footer')
@endsection

@section('scripts')
    <script src="{{ asset('/js/typeahead.bundle.min.js') }}"> </script>
    <script>
        $(function() {

            var products = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                // `states` is an array of state names defined in "The Basics"
                prefetch: '{{url("/products/json")}}'
            });



            $('#search').typeahead({
                hint: true,
                highlight: true,
                minLength: 1

            },      {
                        name: 'products',
                        source: products


                    });
        });

    </script>
@endsection

