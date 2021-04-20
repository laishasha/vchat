@extends('layouts.panel')

@section('content')
  <div class="row justify-content-center">
    <div class="col-sm-12">
      <h1>
        {{ __('admins.admins') }}
      </h1>
      <div class="card">
        <div class="card-header">
          <h3 class="mb-0">{{ __('Edit') }} {{ __('admins.admins') }}</h3>
        </div>
        <div class="card-body">
          {!! Form::model($model, [
              'method' => 'PATCH',
              'url' => [route('info.update')],
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

          <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            <div class="row">
              {!! Form::label('name', __('admins.name'), ['class' => 'col-sm-2 control-label']) !!}
              <div class="col-sm-10">
                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
              </div>
              <div class="offset-sm-2 col-sm-10">
                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
              </div>
            </div>
          </div>

          <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
            <div class="row">
              {!! Form::label('email', __('admins.email'), ['class' => 'col-sm-2 control-label']) !!}
              <div class="col-sm-10">
                {!! Form::email('email', null,['class' => 'form-control', 'required' => 'required']) !!}
              </div>
              <div class="offset-sm-2 col-sm-10">
                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
              </div>
            </div>
          </div>

          <div class="row justify-content-end">
            <div class="col-sm-2">
              <a class="btn btn-block btn-secondary" href="{{ route('info.show') }}"
                 title="{{ __('Back') }}">
                {{ __('Back') }}
              </a>
            </div>
            <div class="col-sm-2">
              {!! Form::submit(__('Edit'), ['class' => 'btn btn-block btn-info']) !!}
            </div>
          </div>
          {!! Form::close() !!}
        </div>
        <div class="card-footer">
        </div>
      </div>
    </div>
@endsection
