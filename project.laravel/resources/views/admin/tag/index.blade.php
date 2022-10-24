@extends('layout')

@section('content')
    <a href="{{ route('admin.tag.create') }}" class="btn btn-primary">Add Tag</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($tags as $tag)
            <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->title }}</td>
                <td>{{ $tag->slug }}</td>
                <td>{{ $tag->created_at->diffForHumans() }}</td>
                <td>{{ $tag->updated_at->diffForHumans() }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('admin.tag.edit', $tag->id) }}">Update</a>
                    <a class="btn btn-danger" href="{{ route('admin.tag.destroy', $tag->id) }}">Delete</a>
                </td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse

        </tbody>
    </table>
    <ul>
        <li>
            <a href="{{ $tags->nextPageUrl() }}">Next page</a>
        </li>
        <li>
            <a href="{{ $tags->previousPageUrl() }}">Previous page</a>
        </li>
    </ul>
@endsection()
