@extends('layouts.panel')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="font-semibold bg-gray-200 text-gray-700 py-4 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    <h3 class="mb-0">{{ __('Information') }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-2">
                            <p data-name="username">{{ __('Username') }}</p>
                        </div>
                        <div class="col-sm-10">
                            <p>{{ $model->username }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            <p data-name="nickname">{{ __('Nickname') }}</p>
                        </div>
                        <div class="col-sm-10">
                            <p>{{ $model->nickname }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            <p data-name="email">{{ __('Email') }}</p>
                        </div>
                        <div class="col-sm-10">
                            <p>{{ $model->email }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            <p data-name="avatar">{{ __('Avatar') }}</p>
                        </div>
                        <div class="col-sm-10">
                            <img src="{{ asset('images/' . $model->avatar) }}" class="w-24" alt="Avatar">
                        </div>
                    </div>
                </div>

                {{--        <div class="card-footer">--}}
                {{--          <div class="row">--}}
                {{--            <div class="col-sm-2">--}}
                {{--              <a href="{{ route('info.edit') }}"--}}
                {{--                 class="btn btn-block btn-success">--}}
                {{--                {{ __('Edit') }}--}}
                {{--              </a>--}}
                {{--            </div>--}}
                {{--            <div class="col-sm-2">--}}
                {{--              <a href="{{ route('password.reset') }}"--}}
                {{--                 class="btn btn-block btn-primary">--}}
                {{--                {{ __('Reset password') }}--}}
                {{--              </a>--}}
                {{--            </div>--}}
                {{--            <div class="col-sm-2">--}}
                {{--            </div>--}}
                {{--          </div>--}}
                {{--        </div>--}}
            </div>
        </div>
    </div>
@endsection
