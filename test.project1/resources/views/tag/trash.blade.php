@extends('layout')

@section('content')

    <a href="/tag/" class="btn btn-info">List</a>
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
                <td>{{ $tag->created_at }}</td>
                <td>{{ $tag->udpdated_at }}</td>
                <td>
                    <a href="/tag/{{ $tag->id }}/restore">Restore</a>
                </td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>
@endsection()
