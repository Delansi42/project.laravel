@extends('layout')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Author</th>
            <th scope="col">Category</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
        </tr>
        </thead>
        <tbody>
        @forelse($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>
                    <a href="{{ route('post.authorPosts', ['id' => $post->user_id]) }}">
                        {{ $post->user->name }}
                    </a>
                </td>
                <td>
                    <a href="{{ route('post.categoryPosts', ['id' => $post->category_id]) }}">
                        {{ $post->category->title }}
                    </a>
                </td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
                <td>
                    <a href="{{ route('post.authorCategoryPosts', ['authorId' => $post->user_id, 'categoryId' => $post->category_id]) }}">
                        Author+Category
                    </a>
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
@endsection()
