@extends('layout')

@section('content')
    @forelse($comments as $comment)
        <ul>
            <li>{{ $comment->id }}</li>
            <li>{{ $comment->body }}</li>
            <li>
                @if($comment->commentable instanceof \App\Models\Page)
                    <a href="{{ route('page.show', ['id' => $comment->commentable_id]) }}">
                        page...
                    </a>
                @endif

                @if($comment->commentable instanceof \App\Models\Tag)
                    <a href="{{ route('admin.tag.show', ['id' => $comment->commentable_id]) }}">
                        tag...
                    </a>
                @endif

                @if($comment->commentable instanceof \App\Models\Post)
                    <a href="{{ route('admin.post.show', ['id' => $comment->commentable_id]) }}">
                        post...
                    </a>
                @endif

                @if($comment->commentable instanceof \App\Models\Category)
                    <a href="{{ route('admin.category.show', ['id' => $comment->commentable_id]) }}">
                        category...
                    </a>
                @endif

            </li>
        </ul>
    @empty
        <p>Empty</p>
    @endforelse
@endsection()
