@extends('layout')
@section('content')
    <form action="@if($isCreate) /tag/store @else /tag/update @endif" method="post">
        <div class="mb-3">
            @if(!$isCreate)
                <input type="hidden" id="id" name="id" value="{{ $tag->id }}">
            @endif

            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $_SESSION['data']['title'] ?? $tag->title }}">

                @isset($_SESSION['errors']['title'])
                    @foreach($_SESSION['errors']['title'] as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endisset

            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ $_SESSION['data']['slug'] ?? $tag->slug }}">

                @isset($_SESSION['errors']['slug'])
                    @foreach($_SESSION['errors']['slug'] as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endisset
        </div>

        <button type="submit" class="btn btn-primary">Send</button>
    </form>
    @php
        unset($_SESSION['errors']);
        unset($_SESSION['data']);
    @endphp

@endsection()