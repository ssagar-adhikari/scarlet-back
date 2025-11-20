@extends('layouts.backend.app')

@section('content')
    <div class="container mt-4">
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h3 class="mb-0 fw-semibold text-primary">Edit Gallery Categories</h3>
                <a href="{{ route('admin.gallery-categories.index') }}" class="btn btn-outline-primary">
                    <i class="mdi mdi-format-list-bulleted me-1"></i> Manage Category
                </a>
            </div>
        </div>

        <form action="{{ route('admin.gallery-categories.update', $galleryCategory->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title', $galleryCategory->title) }}" placeholder="Enter category title">

                @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <button class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
