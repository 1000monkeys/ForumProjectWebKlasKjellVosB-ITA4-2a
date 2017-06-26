@extends('layouts.app')

@section('content')
    <div class="container">
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
                                                <p>Er zijn op dit moment geen relevante resultaten.</p>
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