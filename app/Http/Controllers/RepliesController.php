<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Thread;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RepliesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param $channel
     * @param Thread $thread
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store($channel, Thread $thread, Request $request)
    {
        $this->validate($request, [
            'editor1' => 'required'
        ]);

        $reply = Reply::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'body' => request('editor1')
        ]);

        return back()->with('msg', 'Uw reply is geplaatst.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reply = Reply::find($id);
        if ($reply != null && Auth::check() && Auth::id() == $reply->user_id) {
            Reply::destroy($id);
        }
        return back()->with('msg', 'Uw reply is verwijderd!');
    }
}
