@extends('layout')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse

        </tbody>
    </table>
    <ul>
        <li>
            <a href="{{ $users->nextPageUrl() }}">Next page</a>
        </li>
        <li>
            <a href="{{ $users->previousPageUrl() }}">Previous page</a>
        </li>
    </ul>
@endsection()
