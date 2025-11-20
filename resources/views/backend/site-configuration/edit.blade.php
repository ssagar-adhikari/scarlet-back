@extends('layouts.backend.app')

@section('content')
<div class="container my-4">
    <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h3 class="mb-0 fw-semibold text-primary">Edit Site Configuration</h3>

            </div>
        </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.configuration.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control mb-3" value="{{ old('title', $config->title) }}" required>

                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control mb-3" value="{{ old('email', $config->email) }}" required>

                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control mb-3" value="{{ old('phone', $config->phone) }}" required>

                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control mb-3" value="{{ old('address', $config->address) }}" required>

                <label class="form-label">Facebook</label>
                <input type="text" name="facebook" class="form-control mb-3" value="{{ old('facebook', $config->facebook) }}" required>

                <label class="form-label">Instagram</label>
                <input type="text" name="instagram" class="form-control mb-3" value="{{ old('instagram', $config->instagram) }}" required>

                <label class="form-label">Pinterest</label>
                <input type="text" name="pinterest" class="form-control mb-3" value="{{ old('pinterest', $config->pinterest) }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Map Embed Code</label>
                <input type="text" name="map" class="form-control mb-3"  value="{{ old('map', $config->map) }}" required>

                <label class="form-label">Meta Title</label>
                <input type="text" name="meta_title" class="form-control mb-3" value="{{ old('meta_title', $config->meta_title) }}">

                <label class="form-label">Meta Keywords</label>
                <input type="text" name="meta_keywords" class="form-control mb-3" value="{{ old('meta_keywords', $config->meta_keywords) }}">

                <label class="form-label">Meta Description</label>
                <textarea name="meta_description" class="form-control mb-3" rows="3">{{ old('meta_description', $config->meta_description) }}</textarea>

                <label class="form-label">Logo</label>
                <input type="file" name="logo" class="form-control mb-3">
                @if($config->logo)
                    <img src="{{ asset($config->logo) }}" alt="Logo" width="100" class="mb-3">
                @endif
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update Configuration</button>
    </form>
</div>
@endsection
