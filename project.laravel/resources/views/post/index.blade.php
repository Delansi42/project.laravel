@extends('layout')

@section('content')
    @forelse($posts as $post)
        <ul>
            <li>{{ $post->id }}</li>
            <li>{{ $post->user_id }}</li>
            <li>{{ $post->category_id }}</li>
            <li>{{ $post->title }}</li>
            <li>{{ $post->body }}</li>
            <li>{{ $post->created_at }}</li>
            <li>{{ $post->updated_at }}</li>
            <li>
                <ul>
                    <li>{{ $post->user->id }}</li>
                    <li>{{ $post->user->name }}</li>
                    <li>{{ $post->user->email }}</li>
                    <li>{{ $post->user->created_at }}</li>
                    <li>{{ $post->user->updated_at }}</li>
                    <li>
                        <ul>
                            <li>{{ $post->category->id }}</li>
                            <li>{{ $post->category->title }}</li>
                            <li>{{ $post->category->slug }}</li>
                            <li>{{ $post->category->created_at }}</li>
                            <li>{{ $post->category->udpdated_at }}</li>
                            <li>
                                @foreach($post->tags as $tag)
                                    <ul>
                                        <li>{{ $tag->id }}</li>
                                        <li>{{ $tag->title }}</li>
                                        <li>{{ $tag->slug }}</li>
                                        <li>{{ $tag->created_at }}</li>
                                        <li>{{ $tag->udpdated_at }}</li>
                                    </ul>
                                @endforeach
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    @empty
        <p>Empty</p>
    @endforelse
@endsection()

