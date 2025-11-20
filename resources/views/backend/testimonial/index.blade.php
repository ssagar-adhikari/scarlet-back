@extends('layouts.backend.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Testimonials</h3>
        <a href="{{ route('admin.testimonial.create') }}" class="btn btn-primary">+ Testimonial</a>
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
                        <th>Name</th>
                        <th>Description</th>
                        <th>Sequence</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testimonials as $testimonial)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $testimonial->name }}</td>
                        <td>{!! $testimonial->description !!}</td>
                        <td>{{ $testimonial->sequence }}</td>
                        <td>
                            <a href="{{ route('admin.testimonial.edit', $testimonial->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.testimonial.destroy', $testimonial->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this testimonial?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $testimonials->links() }}
        </div>
    </div>
</div>
@endsection
