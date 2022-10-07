@extends('layout')

@section('content')
    <h1>{{ $post->title }}</h1>
    <ul>
        <li>
            slug: {{ $post->slug }}
        </li>
        <li>
            body: {{ $post->slug }}
        </li>
        <li>
            created: {{ $post->created_at }}
        </li>
        <li>
            updated: {{ $post->updated_at }}
        </li>
    </ul>
@endsection()
