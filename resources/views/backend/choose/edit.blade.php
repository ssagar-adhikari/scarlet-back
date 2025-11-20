@extends('layouts.backend.app')

@section('content')
<div class="container mt-4">
  <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h3 class="mb-0 fw-semibold text-primary">Edit Best Choose</h3>
                <a href="{{ route('admin.choose.index') }}" class="btn btn-outline-primary">
                    <i class="mdi mdi-format-list-bulleted me-1"></i> Manage Best Choose
                </a>
            </div>
        </div>

    <form action="{{ route('admin.choose.update', $choose->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $choose->title) }}" required>
            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required>{{ old('description', $choose->description) }}</textarea>
            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Icon</label>
            <input type="text" name="icon" class="form-control" value="{{ old('icon', $choose->icon) }}" required>
            @error('icon') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
