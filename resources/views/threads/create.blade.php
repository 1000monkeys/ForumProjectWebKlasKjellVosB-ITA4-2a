@extends('layouts.app')

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
    <form method="POST" action="{{ route('createNewThreadPost') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Titel:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="channel_id">Choose a Channel:</label>
            <select name="channel_id" id="channel_id" class="form-control" required>
                <option value="">Choose One...</option>

                @foreach ($channels as $channel)
                    <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
                        {{ $channel->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <textarea name="editor1" id="editor1">

        </textarea>
        <br />
        <div class="form-group">
            <input type="submit" value="Submit!" class="form-control btn btn-primary" required>
        </div>
    </form>
@endsection

@section('bottom_javascript')
    <script type="text/javascript">
        $(document).ready(function(){
            CKEDITOR.replace( 'editor1' );
        });
    </script>
@endsection