@extends('layout')

@section('content')
    <h1>Tag: {{ $tag->title }}</h1>
    <p>{{ $tag->slug }}</p>

    <hr>
    <div>
        <p>Comments</p>
        <ul>
            @foreach($tag->comments as $comment)
                <li>{{ $comment->body }}</li>
            @endforeach
        </ul>
    </div>

    <div>
        <form action="{{ route('admin.tag.add.comment', ['id' => $tag->id]) }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="body" class="form-label">Add Comment</label>
                <input type="text" class="form-control" id="body" name="body">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection()
