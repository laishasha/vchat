<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;

class FriendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $users = User::excluded([Auth::id()])->get();

        return view('friends.index', compact('users'));
    }

    public function add(Request $request)
    {
        $users = User::excluded([Auth::id()])->get();

        return view('friends.index', compact('users'));
    }

    public function remove(Request $request)
    {
        $users = User::excluded([Auth::id()])->get();

        return view('friends.index', compact('users'));
    }
}
