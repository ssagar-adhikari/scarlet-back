@extends('layouts.backend.app')

@section('content')
<div class="container mt-4">
     <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h3 class="mb-0 fw-semibold text-primary">Add Services</h3>
            <a href="{{ route('admin.service.index') }}" class="btn btn-outline-primary">
                <i class="mdi mdi-format-list-bulleted me-1"></i> Manage Services
            </a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.service.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                {{-- <div class="mb-3">
                    <label class="form-label fw-bold">Icon</label>
                    <input type="text" name="icon" value="{{ old('icon') }}" class="form-control @error('icon') is-invalid @enderror">
                    @error('icon') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div> --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Short Description</label>
                    <textarea name="short_description"  class="form-control" rows="3">{{ old('short_description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
