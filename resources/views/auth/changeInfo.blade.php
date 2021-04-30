@extends('layouts.panel')

@section('content')
  <div class="row justify-content-center">
    <div class="col-sm-12">
      <h1>
        {{ __('auth.password.reset') }}
      </h1>
      <div class="card">
        <div class="card-header">
          <h3 class="mb-0">{{ __('Edit') }} {{ __('auth.password') }}</h3>
        </div>
        <div class="card-body">
          {!! Form::model($model, [
              'method' => 'PATCH',
              'url' => [route('password.reset')],
              'class' => 'form-horizontal',
          ]) !!}

          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <div class="form-group {{ $errors->has('current_password') ? 'has-error' : ''}}">
            <div class="row">
              {!! Form::label('current_password', __('auth.current_password'), ['class' => 'col-sm-2 control-label']) !!}
              <div class="col-sm-10">
                {!! Form::password('current_password', ['class' => 'form-control']) !!}
              </div>
              <div class="offset-sm-2 col-sm-10">
                {!! $errors->first('current_password', '<p class="help-block">:message</p>') !!}
              </div>
            </div>
          </div>

          <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
            <div class="row">
              {!! Form::label('password', __('auth.new_password'), ['class' => 'col-sm-2 control-label']) !!}
              <div class="col-sm-10">
                {!! Form::password('password', ['class' => 'form-control']) !!}
              </div>
              <div class="offset-sm-2 col-sm-10">
                {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
              </div>
            </div>
          </div>

          <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
            <div class="row">
              {!! Form::label('password_confirmation', __('auth.password_confirmation'), ['class' => 'col-sm-2 control-label']) !!}
              <div class="col-sm-10">
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
              </div>
              <div class="offset-sm-2 col-sm-10">
                {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
              </div>
            </div>
          </div>

          <div class="row justify-content-end">
            <div class="col-sm-2">
              <a class="btn btn-block btn-secondary" href="/admin"
                 title="{{ __('Back') }}">
                {{ __('Back') }}
              </a>
            </div>
            <div class="col-sm-2">
              {!! Form::submit(__('auth.password.reset'), ['class' => 'btn btn-block btn-info']) !!}
            </div>
          </div>
          {!! Form::close() !!}
        </div>
        <div class="card-footer">
        </div>
      </div>
    </div>
@endsection
