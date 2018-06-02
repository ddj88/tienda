@extends('layouts.app')
@section('body-class')
@section('content')
@section('title','crear producto!')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">

</div>

<div class="main main-raised">
<div class="container">

<div class="section">
    <h2 class="title text-center" >Crear nuevo producto</h2>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>

                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
            </ul>
        </div>
        @endif
    <form method="post" action="{{url('/admin/products')}}">
        {{csrf_field()}}

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Nombre</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Precio producto</label>
                    <input type="number" class="form-control" name="price" value="{{old('price')}}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Descripcion corta</label>
                    <input type="text" class="form-control" name="description" value="{{old('description')}}">
                </div>

            </div>


            <div class="col-sm-6">
                <div class="form-group label-floating">
                    <label class="control-label">Categoria producto</label>
                   <select class="form-control label-floating" name="category_id">
                       <option value="0">General</option>
                       @foreach($categories as $category)
                           <option value="{{ $category->id }}">{{$category->name}}</option>
                           @endforeach

                   </select>
                </div>
            </div>
        </div>







        <textarea class="form-control" placeholder="descripcion larga" rows="5" name="long_description">{{old('long_description')}}</textarea>

        <button class="btn btn-primary">Insertar producto</button>




    </form>



    <a href="{{url('/admin/products')}}" class="btn brn-default">Cancelar</a>
</div>




</div>

</div>

@include('includes.footer')
@endsection

