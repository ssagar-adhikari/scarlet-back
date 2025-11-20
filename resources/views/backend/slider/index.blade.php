@extends('layouts.backend.app')

@section('content')
<div class="container mt-4">
     <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Slider</h3>
        <a href="{{ route('admin.slider.create') }}" class="btn btn-primary">+ Slider</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Sequence</th>
                <th>Title</th>
                <th>Youtube ID</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sliders as $slider)
                <tr>
                    <td>{{ $slider->sequence }}</td>
                    <td>{{ $slider->title }}</td>
                    <td>{{ $slider->youtube_id }}</td>
                    <td>
                        @if($slider->image)
                            <img src="{{ asset($slider->image) }}" width="120">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.slider.edit', $slider->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.slider.destroy', $slider->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this slider?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">No sliders found</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
