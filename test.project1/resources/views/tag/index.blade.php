@extends('layout')

@section('content')
    <a href="create.php" class="btn btn-primary">Add Tag</a>
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
                <a href="update.php?id={{ $tag->id }}">Update</a>
                <a href="delete.php?id={{ $tag->id }}">Delete</a>
            </td>
            @empty
            <p>Empty</p>
        @endforelse
        </tr>
        </tbody>
    </table>
@endsection()