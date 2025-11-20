@extends('layouts.backend.app')

@section('content')

    <div class="container">
        <div class="row my-4">
            <div class="col-12 d-flex justify-content-between my-2">
                <h3>Category List</h3>
                {{-- <div class="">
                    <label for="dateFilter">Filter by Date:</label>
                    <input type="date" id="dateFilter" class="form-control">
                </div> --}}
                <div>
                    {{-- <button type="button" class="btn btn-danger btn-pill" data-toggle="modal" data-target="#exampleModalGrid">
                        Launch Demo Modal
                    </button> --}}
                    {{-- <button class="btn btn-primary" id="addData"> <i class="mdi mdi-plus"></i> Add Category</button> --}}
                    {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalGrid" id="addData"> <i
                            class="mdi mdi-plus"></i> Add Category</button> --}}
                </div>
            </div>

            <div class="col-12 table-responsive">

                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Identity</th>
                            <th>Last Order</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @if (!$info->isEmpty())
                        <tbody>
                            @foreach ($info as $key => $val)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $val->email ?? '' }}</td>
                                    <td>{{ date('Y-m-d') ?? '' }}</td>
                                    <td>{{ 'Demo' }}</td>
                                    <td>{{ 'asd' }}</td>
                                    {{-- <td>{{ $val->slug ?? '' }}</td> --}}
                                    <td class="d-flex ">
                                        <a href="{{ route('admin.user.order-history', $val->id) }}"
                                            class="btn btn-success btn-sm mr-2"> <i class="mdi mdi-file-account"></i> Order
                                            History
                                        </a>
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

    <!-- Grid Modal -->
    <div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalGrid"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalGridTitle">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form">
                    @csrf
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <input type="hidden" class="reset-input" id="_method" name="_method" value="">
                                <input type="hidden" name="category_id" id="modal_category_id" class="reset-input"
                                    value="">

                                <div class="form-group col-md-12">
                                    <label for="modal_sequence">Display Order</label>
                                    <input name="sequence" type="number" class="form-control reset-input"
                                        id="modal_sequence" aria-describedby="emailHelp" placeholder="1,2,3..">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="name">Name</label>
                                    <input name="name" type="text" class="form-control reset-input" id="modal_name"
                                        aria-describedby="emailHelp" placeholder="category name">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="is_featured" class="">Is Featured (Home Page display)</label>
                                    <select name="is_featured" class="form-control reset-input" id="modal_is_featured">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                    {{-- <input name="is_featured" type="checkbox" class="form-control reset-input"
                                        id="modal_is_featured" value="1"> --}}
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="slug">slug</label>
                                    <input name="slug" type="text" class="form-control reset-input" id="modal_slug"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary ">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).on('click', '#addData', function(e) {
            e.preventDefault();
            $('.reset-input').val('');
            $('.reset-input:input').prop('checked', false);
            $('#modalForm').modal('show');
            var url = "{{ route('admin.category.store') }}";
            $('#form').attr('action', url);
            $('#form').attr('method', 'POST');
            $('#_method').attr('value', 'post');

        });
        $(document).on('click', '.editData', function(e) {
            e.preventDefault();
            // alert('asd');
            // $('#imageSpan').addClass('hidden')

            var id = $(this).data('id');
            var name = $(this).data('name');
            var sequence = $(this).data('sequence');
            var is_featured = $(this).data('is_featured');
            var slug = $(this).data('slug');

            $('.reset-input').val('');
            $('.reset-input:input').prop('checked', false);

            $('#modal_category_id').val(id);
            $('#modal_name').val(name);
            $('#modal_sequence').val(sequence);
            $('#modal_is_featured').val(is_featured);
            $('#modal_slug').val(slug);

            $('#modalForm').modal('show');
            var url = "{{ route('admin.category.update', ':valId') }}";

            url = url.replace(":valId", id);
            $('#form').attr('action', url);
            $('#form').attr('method', 'POST');
            $('#_method').attr('value', 'PUT');
        });
    </script>
@endsection
