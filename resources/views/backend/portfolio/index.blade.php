@extends('layouts.backend.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Portfolio</h3>
        <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">+ Portfolio</a>
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
                        <th>Title</th>
                        <th> Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($portfolios as $service)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $service->title }}</td>

                        <td>{{ $service->description }}</td>
                        <td>
                            <a href="{{ route('admin.portfolio.edit', $service->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.portfolio.destroy', $service->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this service?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $portfolios->links() }}
        </div>
    </div>
</div>
@endsection
