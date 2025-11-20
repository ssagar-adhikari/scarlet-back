@extends('layouts.backend.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Best Choose</h3>
        <a href="{{ route('admin.choose.create') }}" class="btn btn-primary">+ Best Choose</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Icon</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($chooses as $choose)
                <tr>
                    <td>{{ $choose->title }}</td>
                    <td>{{ Str::limit($choose->description, 80) }}</td>
                    <td><i class="{{ $choose->icon }}"></i> {{ $choose->icon }}</td>
                    <td>
                        <a href="{{ route('admin.choose.edit', $choose->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.choose.destroy', $choose->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this item?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">No items found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
