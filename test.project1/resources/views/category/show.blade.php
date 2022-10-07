@extends('layout')

@section('content')
    <h1>{{ $category->title }}</h1>
    <ul>
        <li>
            slug: {{ $category->slug }}
        </li>
        <li>
            created: {{ $category->created_at }}
        </li>
        <li>
            updated: {{ $category->updated_at }}
        </li>
    </ul>
@endsection()
