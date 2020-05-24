<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetsController extends Controller
{
    public function index()
    {
        $tweets = auth()->user()->timeline();
        // $tweets = Tweet::latest()->get();
        return view('tweets.index', compact('tweets'));
    }

    public function store(Request $request)
    {
        $attributes = request()->validate(['body' => 'required|max:255']);

        Tweet::create([
            'user_id' => auth()->user()->id,
            'body' => $attributes['body'],
        ]);
        return redirect()->route('home');
    }
}
