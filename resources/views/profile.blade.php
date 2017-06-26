@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <b>Naam:</b> {{ $user->name }} <br />
                <b>Email:</b> {{ $user->email }} <br />
                <b>Lid geworden:</b> {{ $user->created_at }}<br /><br />
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div id="bbp-container">
                    <div id="bbp-content" role="main">
                        <div id="forum-front" class="bbp-forum-front">
                            <h1 class="entry-title">
                                Threads
                            </h1>
                            <div class="entry-content">
                                <div id="bbpress-forums">
                                    <ul id="forums-list-0" class="bbp-forums">
                                        <li class="bbp-header">
                                            <ul class="forum-titles">
                                                <li class="bbp-forum-info">Thread titel</li>
                                                <li class="bbp-forum-reply-count">Replies</li>
                                            </ul>
                                        </li><!-- .bbp-header -->
                                        <li class="bbp-body"/>
                                        @forelse ($threads as $thread)
                                            <ul id="bbp-forum-6" class="loop-item-1 even bbp-forum-status-open bbp-forum-visibility-publish post-6 forum type-forum status-publish hentry">
                                                <li class="bbp-forum-info">
                                                    <a class="bbp-forum-title" href="{{ url($thread->path()) }}">
                                                        {{ $thread->title }}
                                                    </a>
                                                </li>
                                                <li class="bbp-forum-reply-count">{{ $thread->replies->count() }}</li>
                                            </ul><!-- #bbp-forum-6 -->
                                        @empty
                                            <p>Deze gebruiker heeft nog geen threads aangemaakt!</p>
                                            @endforelse
                                            </li><!-- .bbp-body -->
                                            <li class="bbp-footer">
                                                <div class="tr">
                                                    <p class="td colspan4">&nbsp;</p>
                                                </div><!-- .tr -->
                                            </li><!-- .bbp-footer -->
                                    </ul><!-- .forums-directory -->
                                </div>
                            </div>
                        </div><!-- #forum-front -->
                    </div><!-- #bbp-content -->
                </div><!-- #bbp-container -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div id="bbp-container">
                    <div id="bbp-content" role="main">
                        <div id="forum-front" class="bbp-forum-front">
                            <h1 class="entry-title">
                                Replies
                            </h1>
                            <div class="entry-content">
                                <div id="bbpress-forums">
                                    <ul id="forums-list-0" class="bbp-forums">
                                        <li class="bbp-header">
                                            <ul class="forum-titles">
                                                <li class="bbp-forum-info">Reply body</li>
                                            </ul>
                                        </li><!-- .bbp-header -->
                                        <li class="bbp-body"/>
                                        @forelse ($replies as $reply)
                                            <ul id="bbp-forum-6" class="loop-item-1 even bbp-forum-status-open bbp-forum-visibility-publish post-6 forum type-forum status-publish hentry">
                                                <li class="bbp-forum-info">
                                                    <a class="bbp-forum-title" href="{{ url($reply->path()) }}">
                                                        @if(strlen($reply->body) > 25)
                                                            {!! substr($reply->body, 0, 22) !!}...
                                                        @else
                                                            {!! $reply->body !!}
                                                        @endif
                                                    </a>
                                                </li>
                                            </ul><!-- #bbp-forum-6 -->
                                        @empty
                                            <p>Deze gebruiker heeft nog geen reply geplaatst!</p>
                                            @endforelse
                                            </li><!-- .bbp-body -->
                                            <li class="bbp-footer">
                                                <div class="tr">
                                                    <p class="td colspan4">&nbsp;</p>
                                                </div><!-- .tr -->
                                            </li><!-- .bbp-footer -->
                                    </ul><!-- .forums-directory -->
                                </div>
                            </div>
                        </div><!-- #forum-front -->
                    </div><!-- #bbp-content -->
                </div><!-- #bbp-container -->
            </div>
        </div>
    </div>
@endsection