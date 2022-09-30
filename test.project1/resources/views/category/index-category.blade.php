@extends('layout')

@section('content')
    <a href="create-category.php" class="btn btn-primary">Add Category</a>
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
        @forelse($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->title}}</td>
                <td>{{$category->slug}}</td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->updated_at}}</td>
                <td>
                    <a href="update-category.php?id={{ $category->id }}">Update</a>
                    <a href="delete-category.php?id={{ $category->id }}">Delete</a>
                </td>
                @empty
                    <p>Empty</p>
                @endforelse
            </tr>
        </tbody>
    </table>
@endsection()
