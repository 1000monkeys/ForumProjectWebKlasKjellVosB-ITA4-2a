@extends('layouts.app')

@section('content')
    @if (count($errors))
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form method="POST" action="{{ route('createNewChannelPost') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Titel:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="slug">Slug:</label>
            <input type="text" name="slug" id="slug" class="form-control" readonly required>
        </div>
        <div class="form-group">
            <input type="submit" value="Submit!" class="form-control btn btn-primary" required>
        </div>
    </form>
@endsection

@section('bottom_javascript')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#title").keyup(function () {
                var title = $("#title").val();
                title = title.split(' ').join('_');
                $("#slug").val(title);
            });

            $("#title").change(function () {
                var title = $("#title").val();
                title = title.split(' ').join('_');
                $("#slug").val(title);
            })
        });
    </script>
@endsection