@extends('layouts.admin')

@section('content')
<style>
    .custom-file-input {
        visibility: hidden;
        width: 0;
        height: 0;
        position: absolute;
    }
    .custom-file-label {
        cursor: pointer;
        background-color: #007bff;
        color: white;
        padding: 8px 12px;
        border-radius: 5px;
        display: inline-block;
        margin-bottom: 0;
    }
    .custom-file-label:hover {
        background-color: #0056b3;
    }
    .file-name-display {
        margin-left: 10px;
        font-style: italic;
        color: #555;
    }
</style>
<div class="container">
    <h1>Add New Blog Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="10">{{ old('content') }}</textarea>
        </div>
        <div class="form-group">
            <label>Blog Image</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="image">Choose file</label>
                <span class="file-name-display" id="fileNameDisplay">No file chosen</span>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Add Post</button>
        <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('image').addEventListener('change', function(e) {
        var fileName = e.target.files[0] ? e.target.files[0].name : 'No file chosen';
        document.getElementById('fileNameDisplay').textContent = fileName;
    });
</script>
@endpush
