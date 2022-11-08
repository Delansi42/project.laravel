@extends('layout')

@section('content')
    <h1>Post: {{ $post->title }}</h1>
    <p>{{ $post->body }}</p>

    <hr>
    <div>
        <p>Comments</p>
        <ul>
            @foreach($post->comments as $comment)
                <li>{{ $comment->body }}</li>
            @endforeach
        </ul>
    </div>

    <div>
        <form action="{{ route('admin.post.add.comment', ['id' => $post->id]) }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="body" class="form-label">Add Comment</label>
                <input type="text" class="form-control" id="body" name="body">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection()
