<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Thread;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    /**
     * Display a resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        $replies = Reply::where('user_id', $user->id)->get();

        $threads = Thread::where('user_id', $user->id)->get();

        return view('profile')->with('user', $user)->with('replies', $replies)->with('threads', $threads);
    }
}
