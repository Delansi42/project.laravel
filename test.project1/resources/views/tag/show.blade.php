@extends('layout')

@section('content')
    <h1>{{ $tag->title }}</h1>
    <ul>
        <li>
            slug: {{ $tag->slug }}
        </li>
        <li>
            created: {{ $tag->created_at }}
        </li>
        <li>
            updated: {{ $tag->updated_at }}
        </li>
    </ul>
@endsection()