@extends('layouts.app')

@section('body-class', 'signup-page')

@section('content')
    <div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}'); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

                    <div class="col-md-4">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>

                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </div>

                    <div class="card card-signup">



                        <form  method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="header header-primary text-center">
                                <h4>REGISTRO</h4>
                          {{--      <div class="social-line">
                                    <a href="#pablo" class="btn btn-simple btn-just-icon">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                    <a href="#pablo" class="btn btn-simple btn-just-icon">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#pablo" class="btn btn-simple btn-just-icon">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </div>--}}
                            </div>
                            <p class="text-divider">COMPLETA TUS datos</p>
                            <div class="content">

                                                               <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">face</i>
										</span>
                                    <input type="text" class="form-control" placeholder="nombre"
                                           name="name" value="{{ old('name', $name) }}" required autofocus>
                                </div>

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">fingerprint</i>
										</span>
                                    <input type="text" class="form-control" placeholder="username"
                                           name="username" value="{{ old('username') }}" required autofocus>
                                </div>




                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>

                                    <input id="email" type="email" class="form-control" name="email"  placeholder="correo" value="{{ old('email', $email) }}" required autofocus>
                                </div>

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">phone</i>
										</span>

                                    <input id="phone" type="phone" class="form-control" name="phone"  placeholder="telefono" value="{{ old('phone') }}" required autofocus>
                                </div>


                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">explore</i>
										</span>

                                    <input id="address" type="text" class="form-control" name="address"  placeholder="direccion" value="{{ old('address') }}" required autofocus>
                                </div>

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>

                                    <input id="password" type="password" placeholder="contraseña" class="form-control" name="password" required>
                                </div>

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>

                                    <input id="password-confirm" type="password" placeholder="confirma contraseña..." class="form-control" name="password_confirmation" required>
                                </div>




                            </div>
                            <div class="footer text-center">
                                <button type="submit"class="btn btn-simple btn-primary btn-lg">REGISTRARSE</button>
                            </div>
                        </form>

                    <!--<a class="btn btn-link" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a> -->
                    </div>
                </div>
            </div>
        </div>


    </div>

    @include('includes.footer')
@endsection
