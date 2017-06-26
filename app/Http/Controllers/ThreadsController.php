<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Thread;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Channel;
use Illuminate\Support\Facades\Auth;

class ThreadsController extends Controller
{
    /**
     * ThreadsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param $channel
     * @return \Illuminate\Http\Response
     */
    public function index($channel)
    {
        $channel = Channel::where('slug', $channel)->first();

        $threads = Thread::where('channel_id', $channel->id)->get();

        return view('threads.index')->with('threads', $threads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $channels = Channel::all();
        return view('threads/create')->with('channels', $channels);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'channel_id' => 'required',
            'editor1' => 'required',
            'channel_id' => 'required|exists:channels,id'
        ]);

        $thread = Thread::create([
            'user_id' => auth()->id(),
            'channel_id' => request('channel_id'),
            'title' => request('title'),
            'body' => request('editor1')
        ]);

        return redirect($thread->path())->with('msg', 'De thread is aangemaakt.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($channel, Thread $thread)
    {
        if (auth()->check()) {
            auth()->user()->read($thread);
        }

        $replies = Reply::where('thread_id', $thread->id)->get();

        return view('threads.show')->with('thread', $thread)->with('replies', $replies);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($channel, $id)
    {
        $thread = Thread::find($id);
        if ($thread != null && Auth::check() && $thread->user->id == Auth::id() || $thread != null && Auth::isAdmin()) {
            $thread->delete();

            return redirect(route('getThreads'));
        }else{
            return redirect('/');
        }
    }
}
