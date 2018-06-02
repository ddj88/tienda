@extends('layouts.app')
@section('body-class', 'signup-page')
@section('content')
    <div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}'); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="card card-signup">
                        <form  method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="header header-primary text-center">
                                <h4>inicio sesion</h4>
                              {{--  <div class="social-line">
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
                            <p class="text-divider">ingresa datos</p>
                            <div class="content">



                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">fingerprint</i>
										</span>

                                    <input id="username" type="text" class="form-control" name="username"  placeholder="username..." value="{{ old('username') }}" required autofocus>
                                </div>

                                <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>

                                    <input id="password" type="password" placeholder="Password..." class="form-control" name="password" required>
                                </div>



                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        recordar sesion
                                    </label>
                                </div>
                            </div>
                            <div class="footer text-center">
                                <button type="submit"class="btn btn-simple btn-primary btn-lg">entrar</button>
                            </div>
                        </form>

                        <!--<a class="btn btn-link" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a> -->
                    </div>
                </div>
            </div>
        </div>

        @include('includes.footer')

    </div>
@endsection