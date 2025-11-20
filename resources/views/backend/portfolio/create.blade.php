@extends('layouts.backend.app')

@section('content')
    <div class="container py-4">
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h3 class="mb-0 fw-semibold text-primary">Add Portfolio</h3>
                <a href="{{ route('admin.portfolio.index') }}" class="btn btn-outline-primary">
                    <i class="mdi mdi-format-list-bulleted me-1"></i> Manage Portfolios
                </a>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                {{-- Validation Errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" value="{{ old('title') }}"
                                class="form-control @error('title') is-invalid @enderror"
                                placeholder="Enter portfolio title" required>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Description</label>
                            <textarea name="description" id="description" rows="3"
                                class="form-control @error('description') is-invalid @enderror" placeholder="Enter project description...">{{ old('description') }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Build Size</label>
                            <input type="text" name="build_size" value="{{ old('build_size') }}"
                                class="form-control @error('build_size') is-invalid @enderror"
                                placeholder="e.g. 2500 sq ft">
                            @error('build_size')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Land Size</label>
                            <input type="text" name="land_size" value="{{ old('land_size') }}"
                                class="form-control @error('land_size') is-invalid @enderror" placeholder="e.g. 4000 sq ft">
                            @error('land_size')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Budget</label>
                            <input type="text" name="budget" value="{{ old('budget') }}"
                                class="form-control @error('budget') is-invalid @enderror" placeholder="e.g. $150,000">
                            @error('budget')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Years</label>
                            <input type="text" name="year" value="{{ old('year') }}"
                                class="form-control @error('year') is-invalid @enderror" placeholder="e.g. 2023">
                            @error('year')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="running" {{ old('status') == 'running' ? 'selected' : '' }}>Running</option>
                                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed
                                </option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Upload Images</label>
                            <div id="image-wrapper" class="mb-2">
                                <div class="image-input d-flex align-items-center mb-2">
                                    <input type="file" name="images[]" class="form-control me-2 image-file"
                                        accept="image/*">
                                    <img src="" class="preview-img rounded border me-2"
                                        style="width:70px; height:70px; object-fit:cover; display:none;">
                                    <button type="button" class="btn btn-outline-danger btn-sm remove-image">
                                        <i class="mdi mdi-close"></i>
                                    </button>
                                </div>
                            </div>
                            <button type="button" class="btn btn-outline-success btn-sm" id="add-more">
                                <i class="mdi mdi-plus"></i> Add More Image
                            </button>
                            @error('images.*')
                                <div><small class="text-danger">{{ $message }}</small></div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="mdi mdi-content-save me-1"></i> Save Portfolio
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Dynamic Image Upload Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageWrapper = document.getElementById('image-wrapper');
            const addMoreBtn = document.getElementById('add-more');

            addMoreBtn.addEventListener('click', function() {
                const newInput = document.createElement('div');
                newInput.classList.add('image-input', 'd-flex', 'align-items-center', 'mb-2');
                newInput.innerHTML = `
            <input type="file" name="images[]" class="form-control me-2 image-file" accept="image/*">
            <img src="" class="preview-img rounded border me-2"
                style="width:70px; height:70px; object-fit:cover; display:none;">
            <button type="button" class="btn btn-outline-danger btn-sm remove-image">
                <i class="mdi mdi-close"></i>
            </button>
        `;
                imageWrapper.appendChild(newInput);
            });

            imageWrapper.addEventListener('click', function(e) {
                if (e.target.closest('.remove-image')) {
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
        });
    </script>
@endsection
