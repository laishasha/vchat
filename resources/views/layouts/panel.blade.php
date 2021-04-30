@extends('layouts.blank')

@section('body')
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="d-block d-sm-none navbar-brand" href="{{ url('/') }}">
                    <span>{{ config('app.name') }}</span>
                </a>
                <div class="d-none d-sm-flex flex-wrap justify-content-between align-items-center"
                     style="@guest width: 90%; @endguest">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <span>{{ config('app.name') }}</span>
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('friends.index') }}">{{ __('Friends') }}</a>
                            </li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    @guest
                        <!-- Authentication Links -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{ asset('images/' . Auth::user()->avatar) }}" class="rounded-full" style="width: 36px; height: 36px;" alt="Avatar">
                                    {{  Auth::user()->nickname }} <span
                                        class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('info.show') }}">
                                        {{ __('Settings') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    @php $alertTypes = ['success', 'info', 'warning', 'danger']; @endphp
                    @foreach($alertTypes as $alertType)
                        @if(session()->has('alert-' . $alertType))
                            <div class="alert alert-{{$alertType}} alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {!! session()->get('alert-' . $alertType) !!}
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>
@endsection

@push('last-js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
@endpush
