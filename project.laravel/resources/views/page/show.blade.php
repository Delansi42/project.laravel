@extends('layout')

@section('content')
    <h1>{{ $page->title }}</h1>
    <p>{{ $page->description }}</p>

    <hr>
    <div>
        <p>Comments</p>
        <ul>
            @foreach($page->comments as $comment)
                <li>{{ $comment->body }}</li>
            @endforeach
        </ul>
    </div>

    <div>
        <form action="{{ route('page.add.comment', ['id' => $page->id]) }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="body" class="form-label">Add Comment</label>
                <input type="text" class="form-control" id="body" name="body">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection()
