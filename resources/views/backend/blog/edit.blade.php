@extends('layouts.backend.app')

@section('content')
    <div class="container mt-4">
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h3 class="mb-0 fw-semibold text-primary">Edit Blogs</h3>
                <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-primary">
                    <i class="mdi mdi-format-list-bulleted me-1"></i> Manage Blog
                </a>
            </div>
        </div>

        <div class="card mt-3 shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title) }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description', $blog->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Author Name</label>
                        <input type="text" name="author_name" class="form-control"
                            value="{{ old('author_name', $blog->author_name) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Current Image</label><br>
                        @if ($blog->image)
                            <img src="{{ asset($blog->image) }}" class="img-thumbnail mb-2" width="120">
                        @endif
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control mb-3"
                            value="{{ old('meta_title', $blog->meta_title) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Meta Keywords</label>
                        <input type="text" name="meta_keywords" class="form-control mb-3"
                            value="{{ old('meta_keywords', $blog->meta_keywords) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Meta Description</label>
                        <textarea name="meta_description" class="form-control mb-3" rows="3">{{ old('meta_description', $blog->meta_description) }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update </button>
                </form>
            </div>
        </div>
    </div>
@endsection
