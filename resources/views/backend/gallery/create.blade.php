@extends('layouts.backend.app')

@section('content')
<div class="container mt-4">
   <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h3 class="mb-0 fw-semibold text-primary">Gallery</h3>
            <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-primary">
                <i class="mdi mdi-format-list-bulleted me-1"></i> Manage Gallery
            </a>
        </div>
    </div>

    <div class="card mt-3 shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Sequence</label>
                    <input type="number" name="sequence" class="form-control" value="{{ old('sequence', 0) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Add Image</button>
            </form>
        </div>
    </div>
</div>
@endsection
