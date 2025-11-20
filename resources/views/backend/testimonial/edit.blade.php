@extends('layouts.backend.app')

@section('content')
<div class="container mt-4">
      <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h3 class="mb-0 fw-semibold text-primary">Edit Testimonial</h3>
            <a href="{{ route('admin.testimonial.index') }}" class="btn btn-outline-primary">
                <i class="mdi mdi-format-list-bulleted me-1"></i> Manage Testimonials
            </a>
        </div>
    </div>

    <div class="card mt-3 shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.testimonial.update', $testimonial->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $testimonial->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" required>{{ old('description', $testimonial->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Sequence</label>
                    <input type="number" name="sequence" class="form-control" value="{{ old('sequence', $testimonial->sequence) }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Testimonial</button>
            </form>
        </div>
    </div>
</div>
@endsection
