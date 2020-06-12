<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function store(User $user)
    {
        auth()->user()->toggleFollow($user);

        $message = '';
        if (auth()->user()->following($user)) {
            $message = 'You follow ' . $user->name;
        } else {
            $message = 'You unfollow ' . $user->name;
        }

        return back()->with('success', $message);
    }
}
