<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $tweets = $user->tweets()->withLikes()
            ->paginate(50);
        return view('profiles.show', compact('user', 'tweets'));
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'username' => [
                'string',
                'required',
                'max:255',
                'alpha_dash',
                Rule::unique('users')->ignore(auth()->user()),
            ],
            'name' => 'string|required|max:255',
            'avatar' => 'file',
            'email' => [
                'string',
                'email',
                'required',
                'max:255',
                Rule::unique('users')->ignore(auth()->user()),
            ],
            'password' => 'string|required|min:3|max:255|confirmed',
        ]);
        if (request('avatar'))
            $data['avatar'] = request('avatar')->store('avatars');
        // dd($data);

        $user->update($data);

        return redirect($user->path());
    }
}
