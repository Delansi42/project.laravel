@extends('layout')

@section('content')
    @forelse($pages as $page)
        <ul>
            <li>{{ $page->id }}</li>
            <li>{{ $page->title }}</li>
            <li>{{ $page->description }}</li>
            <li>
                <a href="{{ route('page.show', ['id' => $page->id]) }}">
                    More...
                </a>
            </li>
        </ul>
    @empty
        <p>Empty</p>
    @endforelse
@endsection()
