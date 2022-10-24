@extends('layout')

@section('content')
    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Add Category</a>
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
        @forelse($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->title }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->created_at->diffForHumans() }}</td>
                <td>{{ $category->updated_at->diffForHumans() }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('admin.category.edit', $category->id) }}">Update</a>
                    <a class="btn btn-danger" href="{{ route('admin.category.destroy', $category->id) }}">Delete</a>
                </td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse

        </tbody>
    </table>
    <ul>
        <li>
            <a href="{{ $categories->nextPageUrl() }}">Next page</a>
        </li>
        <li>
            <a href="{{ $categories->previousPageUrl() }}">Previous page</a>
        </li>
    </ul>
@endsection()
