@extends('layout')

@section('content')
    <h1>{{ $category->title }}</h1>
    <ul>
        <li>
            slug: {{ $category->slug }}
            created: {{ $category->created_at }}
            update: {{ $category->updated_at }}
        </li>
    </ul>
@endsection()
