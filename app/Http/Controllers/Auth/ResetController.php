<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResetController extends Controller
{
    public function showResetForm()
    {
        $model = Auth::user();

        return view('auth.reset', compact('model'));
    }

    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required|password',
            'password'         => 'required|confirmed|min:6',
        ], [], [
            'current_password'      => __('auth.current_password'),
            'validation.password'   => __('auth.current_password.invalid'),
            'password'              => __('auth.password'),
            'password_confirmation' => __('auth.password_confirmation'),
        ]);

        $requestData = $request->all();
        $requestData['password'] = bcrypt($requestData['password']);

        $model = Auth::user();
        $model->update($requestData);

        return redirect()->route('info.show')
            ->with('alert-success', __('auth.password.reset.success'));
    }

    public function showInfo()
    {
        $model = Auth::user();

        return view('auth.info', compact('model'));
    }

    public function editInfo()
    {
        $model = Auth::user();

        return view('auth.edit', compact('model'));
    }

    public function updateInfo(Request $request)
    {
        $model = Auth::user();

        $requestData = $request->all();

        $this->validate($request, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'nickname' => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'avatar'   => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:4096'],
        ]);

        unset($requestData['username']);

        $model->update($requestData);

        return redirect()->route('info.show')->with('alert-success', __('crud.updated'));
    }
}
