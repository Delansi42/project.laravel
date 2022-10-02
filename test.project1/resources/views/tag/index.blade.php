@extends('layout')

@section('content')
    <a href="/tag/create" class="btn btn-primary">Add Tag</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Created_At</th>
            <th scope="col">Updated_At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($tags as $tag)
        <tr>
            <td>{{$tag->id}}</td>
            <td>{{$tag->title}}</td>
            <td>{{$tag->slug}}</td>
            <td>{{$tag->created_at}}</td>
            <td>{{$tag->updated_at}}</td>
            <td>
                <a href="/tag/{{ $tag->id }}/edit">Update</a>
                <a href="/tag/{{ $tag->id }}/delete">Delete</a>
                <a href="/tag/{{ $tag->id }}/show">Show</a>
            </td>
            @empty
            <p>Empty</p>
        @endforelse
        </tr>
        </tbody>
    </table>
@endsection()