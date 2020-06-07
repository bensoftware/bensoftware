@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"><img class="img-thumbnail" style="width: 100%;height: 100%" src="{{ URL::asset('img/login_image.png') }}"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">{{ trans('text.authentification') }}</h1>
                                    </div>
                                    <form class="user" role="form" method="POST" action="{{ url('/verifyBySMS') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="verify" class="control-label">{{ trans('text_sd.code') }}</label>
                                            <div class="">
                                                <input id="code" type="text" class="form-control form-control-user @error('password') is-invalid @enderror" name="code" required>
                                                @if ($errors->has('code'))
                                                    <span class="help-block">
                                                     <strong>{{ $errors->first('code') }}</strong>
                                                       </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button type="submit" class="btn btn-user btn-primary">
                                                    {{ trans('text_sd.verify') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer"> <a href="#">Réenvoyer le code </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
