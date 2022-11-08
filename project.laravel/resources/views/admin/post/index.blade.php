@extends('layout')

@section('content')
    @can('create', \App\Models\Post::class)
    <a href="{{ route('admin.post.create') }}" class="btn btn-primary">Add Post</a>
    @endcan
    @can('access_manager')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">User_id</th>
            <th scope="col">Category_id</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->user_id }}</td>
                <td>{{ $post->category_id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td>{{ $post->created_at->diffForHumans() }}</td>
                <td>{{ $post->updated_at->diffForHumans() }}</td>
                <td>
                    @can('update', $post)
                    <a class="btn btn-primary" href="{{ route('admin.post.edit', $post->id) }}">Update</a>
                    @endcan
                    @can('delete', $post)
                    <a class="btn btn-danger" href="{{ route('admin.post.destroy', $post->id) }}">Delete</a>
                    @endcan
                </td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>
    <ul>
        <li>
            <a href="{{ $posts->nextPageUrl() }}">Next page</a>
        </li>
        <li>
            <a href="{{ $posts->previousPageUrl() }}">Previous page</a>
        </li>
    </ul>
    @endcan
@endsection()
