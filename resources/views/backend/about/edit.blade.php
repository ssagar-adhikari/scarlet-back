@extends('layouts.backend.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h3 class="mb-0 fw-semibold text-primary">Edit About Us</h3>

            </div>
        </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title', $about->title) }}" class="form-control">
            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" rows="5" class="form-control">{{ old('description', $about->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Image</label><br>
            @if($about->image)
                <img src="{{ asset($about->image) }}" alt="" width="150" class="mb-2">
            @endif
            <input type="file" name="image" class="form-control">
            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
