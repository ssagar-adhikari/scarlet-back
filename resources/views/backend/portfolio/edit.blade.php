@extends('layouts.backend.app')

@section('content')
    <div class="container mt-4">
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h3 class="mb-0 fw-semibold text-primary">Edit Portfolio</h3>
                <a href="{{ route('admin.portfolio.index') }}" class="btn btn-outline-primary">
                    <i class="mdi mdi-format-list-bulleted me-1"></i> Manage Portfolios
                </a>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.portfolio.update', $portfolio->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold">Title</label>
                        <input type="text" name="title" value="{{ old('title', $portfolio->title) }}"
                            class="form-control @error('title') is-invalid @enderror" placeholder="Enter title">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3"
                            placeholder="Enter description">{{ old('description', $portfolio->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Build Size</label>
                            <input type="text" name="build_size" value="{{ old('build_size', $portfolio->build_size) }}"
                                class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Land Size</label>
                            <input type="text" name="land_size" value="{{ old('land_size', $portfolio->land_size) }}"
                                class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Budget</label>
                            <input type="text" name="budget" value="{{ old('budget', $portfolio->budget) }}"
                                class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Years</label>
                            <input type="text" name="year" value="{{ old('year', $portfolio->year) }}"
                                class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="running" {{ old('status', $portfolio->status) == 'running' ? 'selected' : '' }}>
                                Running</option>
                            <option value="completed"
                                {{ old('status', $portfolio->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Existing Images</label>
                        <div class="d-flex flex-wrap gap-3">
                            @foreach ($portfolio->images as $image)
                                <div class="position-relative" style="width:100px;">
                                    <img src="{{ asset($image->image_path) }}" class="img-thumbnail"
                                        style="width:100px; height:100px; object-fit:cover;">
                                    <button type="button"
                                        class="btn btn-sm btn-danger position-absolute top-0 end-0 delete-image"
                                        data-id="{{ $image->id }}" style="border-radius:50%;">&times;</button>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Add New Images</label>
                        <div id="image-wrapper">
                            <div class="image-input mb-2 d-flex align-items-center">
                                <input type="file" name="images[]" class="form-control me-2 image-file" accept="image/*">
                                <img src="" class="preview-img me-2"
                                    style="width:70px; height:70px; object-fit:cover; display:none;">
                                <button type="button" class="btn btn-danger btn-sm remove-image">X</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success btn-sm" id="add-more">+ Add More</button>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Portfolio</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageWrapper = document.getElementById('image-wrapper');
            const addMoreBtn = document.getElementById('add-more');

            addMoreBtn.addEventListener('click', function() {
                const newInput = document.createElement('div');
                newInput.classList.add('image-input', 'mb-2', 'd-flex', 'align-items-center');
                newInput.innerHTML = `
            <input type="file" name="images[]" class="form-control me-2 image-file" accept="image/*">
            <img src="" class="preview-img me-2" style="width:70px; height:70px; object-fit:cover; display:none;">
            <button type="button" class="btn btn-danger btn-sm remove-image">X</button>
        `;
                imageWrapper.appendChild(newInput);
            });

            imageWrapper.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-image')) {
                    e.target.closest('.image-input').remove();
                }
            });

            imageWrapper.addEventListener('change', function(e) {
                if (e.target.classList.contains('image-file')) {
                    const fileInput = e.target;
                    const file = fileInput.files[0];
                    const preview = fileInput.nextElementSibling;
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            preview.src = event.target.result;
                            preview.style.display = 'block';
                        };
                        reader.readAsDataURL(file);
                    } else {
                        preview.src = '';
                        preview.style.display = 'none';
                    }
                }
            });

            // AJAX delete image
            document.querySelectorAll('.delete-image').forEach(button => {
                button.addEventListener('click', function() {
                    const imageId = this.dataset.id;
                    if (confirm('Are you sure you want to delete this image?')) {
                        fetch(`{{ url('/admin/portfolio/image') }}/${imageId}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Accept': 'application/json'
                                }
                            })
                            .then(res => res.json())
                            .then(data => {
                                if (data.success) {
                                    this.closest('div.position-relative').remove();
                                }
                            });
                    }
                });
            });
        });
    </script>
@endsection
