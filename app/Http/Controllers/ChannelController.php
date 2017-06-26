<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $channels = Channel::all();

        return view('channel/list')->with('channels', $channels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/createChannel');
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
            'slug' => 'required'
        ]);

        $channelExists = Channel::where('slug', $request->slug)->first();
        if ($channelExists == null) {
            $channel = Channel::create([
                'title' => request('title'),
                'slug' => request('slug')
            ]);

            return redirect($channel->path())->with('msg', 'De channel is aangemaakt.');
        }else{
            return redirect(route('createNewChannel'))
                ->with('msg', 'Die channel bestaat al!');
        }
    }
}
