@extends('layouts.backend.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h3>Stories</h3>
        <a href="{{ route('admin.story.create') }}" class="btn btn-primary">+ Add Story</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Sequence</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stories as $story)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($story->image)
                                <img src="{{ asset($story->image) }}" width="70" height="70" style="object-fit:cover;">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>{{ $story->title }}</td>
                        <td>{!! Str::limit($story->description, 80) !!}</td>
                        <td>{{ $story->sequence }}</td>
                        <td>
                            <a href="{{ route('admin.story.edit', $story->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.story.destroy', $story->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this story?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $stories->links() }}
        </div>
    </div>
</div>
@endsection
