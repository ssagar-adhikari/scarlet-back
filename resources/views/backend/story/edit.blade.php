@extends('layouts.backend.app')

@section('content')
<div class="container mt-4">
       <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h3 class="mb-0 fw-semibold text-primary">Edit Story</h3>
            <a href="{{ route('admin.story.index') }}" class="btn btn-outline-primary">
                <i class="mdi mdi-format-list-bulleted me-1"></i> Manage Story
            </a>
        </div>
    </div>

    <div class="card mt-3 shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.story.update', $story->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $story->title) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" required>{{ old('description', $story->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Current Image</label><br>
                    @if($story->image)
                        <img src="{{ asset($story->image) }}" width="100" height="100" style="object-fit:cover;">
                    @else
                        <p class="text-muted">No image uploaded</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">Change Image (optional)</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>

                <div class="mb-3">
                    <label class="form-label">Sequence</label>
                    <input type="number" name="sequence" class="form-control" value="{{ old('sequence', $story->sequence) }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Story</button>
            </form>
        </div>
    </div>
</div>
@endsection
