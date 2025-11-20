@extends('layouts.backend.app')

@section('content')

    <div class="container">
        <div class="row my-4">
            <div class="col-12 d-flex justify-content-between my-2">
                <h3>Inquiry List</h3>
                {{-- <div class="row mx-2">
                    <form action="" class="row justify-content-between">
                        @csrf
                        <div class="mx-2 pt-2">
                            <label for=""> From </label>
                        </div>
                        <div class="mx-2">
                            <input type="date" name="from_date" id="dateFilter" class="form-control"
                                value="{{ isset($_GET) && isset($_GET['from_date']) && $_GET['from_date'] ? $_GET['from_date'] : '' }}">
                        </div>
                        <div class="mx-2 pt-2">
                            <label for=""> To</label>
                        </div>
                        <div class="mx-2">
                            <input type="date" name="to_date" id="dateFilter" class="form-control"
                                value="{{ isset($_GET) && isset($_GET['to_date']) && $_GET['to_date'] ? $_GET['to_date'] : '' }}">
                        </div>
                        <div class="mx-2">
                            <button class="btn btn-primary"><i class="mdi mdi-magnify"></i> Filter</button>
                        </div>
                    </form>
                </div> --}}

                {{-- <div>

                    <button class="btn btn-primary" id="addData"> <i class="mdi mdi-plus"></i> Add Inquiry</button>

                </div> --}}
            </div>
            <div class="col-12 table-responsive">

                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Topic</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @if (!$inquiries->isEmpty())
                        <tbody>
                            @foreach ($inquiries as $key => $val)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $val->name ?? '' }}</td>
                                    <td>{{ $val->phone ?? '' }}</td>
                                    <td>{{ $val->email ?? '' }}</td>
                                     <td>{{ $val->topic ?? '' }}</td>
                                    <td>{{ $val->message ?? '' }}</td>
                                    <td>{{ $val->created_at ? date('Y-m-d', strtotime($val->created_at)) : '' }}</td>

                                    <td class="d-flex ">
                                        {{-- <a href="#" data-id="{{ $val->id }}" data-name="{{ $val->name }}"
                                            class="editData btn btn-success btn-sm mr-2"> <i class="mdi mdi-pencil"></i>
                                        </a> --}}
                                        <form action="{{ route('admin.inquiry.destroy', $val->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="mdi mdi-delete"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
            @else
                <tbody>
                    <tr>
                        <td colspan="6">
                            <p>No data found</p>
                        </td>
                    </tr>
                </tbody>
                </table>
                @endif

                {{-- <div class="container">
                    <!-- Your content here -->
                    {{ $info->links('backend.pagination.paginate') }}
                </div> --}}
            </div>
        </div>
    </div>

@endsection
