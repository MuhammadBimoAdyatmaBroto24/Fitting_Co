@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Comment #{{ $comment->id }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.comments.update', $comment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Author Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $comment->name) }}" required>
        </div>
        <div class="form-group">
            <label for="email">Author Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $comment->email) }}" required>
        </div>
        <div class="form-group">
            <label for="content">Comment Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $comment->content) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Comment</button>
        <a href="{{ route('admin.comments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
