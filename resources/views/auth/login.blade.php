@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block"><img class="" style="width: 100%;height: 100%" src="{{ URL::asset('img/login_image_anapej.jpg') }}"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">{{ trans('text.authentification') }}</h1>
                  </div>
                  <form class="user" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">{{ trans('text.login') }}</label>
                        <div class="">
                            <input id="email" type="text" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label">{{ trans('text.mot_passe') }}</label>
                        <div class="">
                            <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> {{ trans('text.restez_connecte') }}
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-user btn-primary btn-block">
                            {{ trans('text.connexion') }}
                        </button>
                    </div>
                    <hr>
                    <a href="#" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Se connecter avec Google
                    </a>
                    <a href="#" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Se connecter avec Facebook
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="#">Vous avez oublier votre mot de passe?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="#">Créer un compte!</a>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
