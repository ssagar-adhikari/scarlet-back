@extends('layouts.backend.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h3 class="mb-0 fw-semibold text-primary">Edit Gallery</h3>
            <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-primary">
                <i class="mdi mdi-format-list-bulleted me-1"></i> Manage Gallery
            </a>
        </div>
    </div>

    <div class="card mt-3 shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Sequence</label>
                    <input type="number" name="sequence" class="form-control" value="{{ old('sequence', $gallery->sequence) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Current Image</label><br>
                    @if($gallery->image)
                        <img src="{{ asset($gallery->image) }}" width="120" class="img-thumbnail mb-2">
                    @endif
                    <input type="file" name="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Update Gallery</button>
            </form>
        </div>
    </div>
</div>
@endsection
