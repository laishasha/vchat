<?php

namespace App\Http\Controllers;

use App\Models\Friend;
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
        $authUser = Auth::user();
        $pendingFriends = Friend::where('friend_id', $authUser->id)->where('accept', 0)->get();
        $waitingFriends = Friend::where('user_id', $authUser->id)->where('accept', 0)->get();
        $activeFriends = Friend::where('friend_id', $authUser->id)->orWhere('user_id', $authUser->id)->where('accept', 1)->get();

        // people send add request to this user
        $pendingFriendIds = $pendingFriends->pluck('user_id')->toArray();
        // this user send add request to others
        $waitingFriendIds = $waitingFriends->pluck('friend_id')->toArray();
        $activeFriendsIds = $activeFriends->pluck('friend_id')->toArray();

        $excludedIds = [Auth::id()];
        $users = User::excluded($excludedIds)->get();

        foreach ($users as $user) {
            if (in_array($user->id, $pendingFriendIds)) {
                $user['pending'] = true;
            } else {
                $user['pending'] = false;
            }
            if (in_array($user->id, $waitingFriendIds)) {
                $user['waiting'] = true;
            } else {
                $user['waiting'] = false;
            }
            if (in_array($user->id, $activeFriendsIds)) {
                $user['isFriend'] = true;
            } else {
                $user['isFriend'] = false;
            }
        }

        return view('friends.index', compact('users'));
    }

    public function add(Request $request, $id)
    {
        $authUser = Auth::user();
        $friend = User::findOrFail($id);

        $friendRequest = Friend::firstOrCreate([
            'user_id'   => $authUser->id,
            'friend_id' => $friend->id,
        ], [
            'accept' => 0,
        ]);

        return redirect()->to(route('friends.index'));
    }

    public function remove(Request $request, $id)
    {
        $authUser = Auth::user();
        $friend = User::findOrFail($id);

        Friend::where('user_id', $authUser->id)->where('friend_id', $friend->id)->delete();
        Friend::where('user_id', $friend->id)->where('friend_id', $authUser->id)->delete();

        return redirect()->to(route('friends.index'));
    }

    public function accept(Request $request, $id)
    {
        $authUser = Auth::user();
        $friend = User::findOrFail($id);

        $friendRequest = Friend::where('user_id', $friend->id)->where('friend_id', $authUser->id)->get();
        if (isset($friendRequest)) {
            foreach ($friendRequest as $record) {
                $record->update(['accept' => 1]);
            }

            $friendRequest = Friend::firstOrCreate([
                'friend_id'   => $friend->id,
                'user_id' => $authUser->id,
            ], [
                'accept' => 1,
            ]);
        }

        return redirect()->to(route('friends.index'));
    }

    public function reject(Request $request, $id)
    {
        $authUser = Auth::user();
        $friend = User::findOrFail($id);

        $friendRequest = Friend::where('user_id', $friend->id)->where('friend_id', $authUser->id)->get();
        if (isset($friendRequest)) {
            foreach ($friendRequest as $record) {
                $record->delete();
            }
        }

        return redirect()->to(route('friends.index'));
    }

    public function cancel(Request $request, $id)
    {
        $authUser = Auth::user();
        $friend = User::findOrFail($id);

        $friendRequest = Friend::where('user_id', $authUser->id)->where('friend_id', $friend->id)->get();
        if (isset($friendRequest)) {
            foreach ($friendRequest as $record) {
                $record->delete();
            }
        }

        return redirect()->to(route('friends.index'));
    }
}
