@extends('layouts.panel')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="font-semibold bg-gray-200 text-gray-700 py-4 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    <h3 class="mb-0">{{ __('Friends') }}</h3>
                </div>
                <div class="card-body">
                    {{--                    <form method="GET" action="{{ route('friends.index') }}" class="form-horizontal pb-3" role="search">--}}
                    {{--                        @csrf--}}
                    {{--                        <div class="input-group">--}}
                    {{--                            <input type="text" name="search" class="form-control bg-light border-0 small"--}}
                    {{--                                   placeholder="{{ __('Search') }}"--}}
                    {{--                                   aria-label="{{ __('Search') }}" aria-describedby="basic-addon2">--}}
                    {{--                            <div class="input-group-append">--}}
                    {{--                                <button class="btn btn-primary" type="submit">--}}
                    {{--                                    <i class="fas fa-search fa-sm"></i>--}}
                    {{--                                </button>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </form>--}}
                    <div class="col-sm-12 table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>{{ __('Nickname') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Is Friend?') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (isset($users) and count($users))
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->nickname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->isFriend ? 'Yes'  : 'No' }}</td>
                                        <td>
                                            @if ($user->pending)
                                                The user is waiting you to accept
                                            @elseif ($user->waiting)
                                                You are waiting the user to accept
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->pending)
                                                <form method="POST" action="{{ route('friends.accept', $user->id) }}"
                                                      style="display: inline">
                                                    @csrf
                                                    <button class="btn btn-primary btn-sm"
                                                            data-href="{{ route('friends.accept', $user->id) }}">Accept
                                                    </button>
                                                </form>
                                                <form method="POST" action="{{ route('friends.reject', $user->id) }}"
                                                      style="display: inline">
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm"
                                                            data-href="{{ route('friends.reject', $user->id) }}">Reject
                                                    </button>
                                                </form>
                                            @elseif ($user->waiting)
                                                <form method="POST" action="{{ route('friends.cancel', $user->id) }}"
                                                      style="display: inline">
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm"
                                                            data-href="{{ route('friends.cancel', $user->id) }}">Cancel
                                                    </button>
                                                </form>
                                            @elseif ($user->isFriend)
                                                <form method="POST" action="{{ route('friends.remove', $user->id) }}"
                                                      style="display: inline">
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm"
                                                            data-href="{{ route('friends.remove', $user->id) }}">Remove
                                                    </button>
                                                </form>
                                            @else
                                                <form method="POST" action="{{ route('friends.add', $user->id) }}"
                                                      style="display: inline">
                                                    @csrf
                                                    <button class="btn btn-primary btn-sm"
                                                            data-href="{{ route('friends.add', $user->id) }}">Add
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        {{--<div class="pagination-wrapper">--}}
                        {{--{!! $users->links() !!}--}}
                        {{--</div>--}}
                    </div>
                    @if (isset($users) and count($users))
                    @else
                        <div class="col-sm-12">
                            <p>{{ __('You have not added any friends yet.') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
