<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popular_threads = Thread::withCount('replies')->orderBy('replies_count', 'desc')->paginate(3);

        $new_threads = Thread::orderBy('created_at')->paginate(3);

        if (Auth::check()) {
            $your_threads = Thread::where('user_id', Auth::id())->paginate(3);
        }else{
            $your_threads = null;
        }

        return view('home')->with('popular_threads', $popular_threads)->with('new_threads', $new_threads)->with('your_threads', $your_threads);
    }
}
