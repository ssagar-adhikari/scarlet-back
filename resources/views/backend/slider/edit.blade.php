@extends('layouts.backend.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h3 class="mb-0 fw-semibold text-primary">Edit Slider</h3>
                <a href="{{ route('admin.slider.index') }}" class="btn btn-outline-primary">
                    <i class="mdi mdi-format-list-bulleted me-1"></i> Manage Slider
                </a>
            </div>
        </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Sequence</label>
            <input type="number" name="sequence" class="form-control" value="{{ old('sequence', $slider->sequence) }}" required>
            @error('sequence') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Title (optional)</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $slider->title) }}">
            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>YouTube Video ID (optional)</label>
            <input type="text" name="youtube_id" id="youtube_id" class="form-control" value="{{ old('youtube_id', $slider->youtube_id) }}">
            @error('youtube_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Preview YouTube Video</label>
            <div id="youtube-preview" style="margin-top:10px;">
                @if($slider->youtube_id)
                    <iframe width="300" height="170" src="https://www.youtube.com/embed/{{ $slider->youtube_id }}" frameborder="0" allowfullscreen></iframe>
                @endif
            </div>
        </div>

        <div class="mb-3">
            <label>Fallback Image</label><br>
            @if($slider->image)
                <img src="{{ asset('storage/'.$slider->image) }}" id="image-preview" width="150" class="mb-2">
            @else
                <img id="image-preview" style="display:none;" width="150" class="mb-2">
            @endif
            <input type="file" name="image" id="image" class="form-control">
            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<script>
    // YouTube live preview
    document.getElementById('youtube_id').addEventListener('input', function() {
        let id = this.value.trim();
        let preview = document.getElementById('youtube-preview');
        preview.innerHTML = id ? `<iframe width="300" height="170" src="https://www.youtube.com/embed/${id}" frameborder="0" allowfullscreen></iframe>` : '';
    });

    // Image live preview
    document.getElementById('image').addEventListener('change', function(e) {
        let file = e.target.files[0];
        let preview = document.getElementById('image-preview');
        if(file) {
            let reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
