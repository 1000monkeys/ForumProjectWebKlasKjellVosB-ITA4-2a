<?php
    use App\User;
?>

@extends('layouts/app')

@section('extra_javascript')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    @if (count($errors))
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="level">
                            <span class="flex">
                                <a href="{{ route('profile', $thread->user) }}">{{ $thread->user->name }}</a> plaatste:
                                <h2>{{ $thread->title }}</h2>
                            </span>
                        </div>
                    </div>

                    <div class="panel-body">
                        {!! $thread->body !!}
                    </div>
                    <div class="panel-footer">
                        @if ($thread->user->id == Auth::id() ||User::isAdmin())
                            <form action="{{ url($thread->path()) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-link">Delete Thread</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @forelse($replies as $reply)
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Op {{ $reply->created_at }} poste <a href="{{ route('profile', $reply->user) }}">{{ $reply->user->name }}</a> dit als reactie:
                        </div>
                        <div class="panel-body">
                            {!! $reply->body !!}
                        </div>
                        @if($reply->user->id == Auth::id())
                            <div class="panel-footer">
                                <form action="{{ url('/') }}/replies/{{ $reply->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-link">Delete Reply</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <p>Er zijn op dit moment nog geen comments!</p>
        @endforelse
        @if (!User::guest())
            <div class="row">
                <div class="col-md-8">
                    <form method="POST" action="{{ url($thread->path()) }}/reply">
                        {{ csrf_field() }}
                        <textarea name="editor1" id="editor1">

                        </textarea>
                        <br />
                        <div class="form-group">
                            <input type="submit" value="Submit!" class="form-control btn btn-primary" required>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('bottom_javascript')
    <script type="text/javascript">
        $(document).ready(function(){
            CKEDITOR.replace( 'editor1' );
        });
    </script>
@endsection