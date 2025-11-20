@extends('layouts.backend.app')

@section('content')

    <div class="container">
        <div class="row my-4">
            <div class="col-12 d-flex justify-content-between my-2">
                <h3>Reservation List</h3>
                <div class="row">
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
                </div>

                <div>
                    {{-- <button type="button" class="btn btn-danger btn-pill" data-toggle="modal" data-target="#exampleModalGrid">
                        Launch Demo Modal
                    </button> --}}
                    <button class="btn btn-primary" id="addData"> <i class="mdi mdi-plus"></i> Add Reservation</button>
                    {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalGrid" id="addData"> <i
                            class="mdi mdi-plus"></i> Add Category</button> --}}
                </div>
            </div>

            <div class="col-12 table-responsive">

                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @if (!$info->isEmpty())
                        <tbody>
                            @foreach ($info as $key => $val)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $val->name ?? '' }}</td>
                                    <td>{{ $val->mobile ?? '' }}</td>
                                    <td>{{ $val->email ?? '' }}</td>
                                    <td>{{ $val->date ?? '' }}</td>
                                    <td>{{ $val->time ?? '' }}</td>
                                    <td>{{ $val->remarks ?? '' }}</td>

                                    <td class="d-flex ">
                                        <a href="#" data-id="{{ $val->id }}" data-name="{{ $val->name }}"
                                            data-mobile="{{ $val->mobile }}" data-email="{{ $val->email }}"
                                            data-date="{{ $val->date }}" data-time="{{ $val->time }}"
                                            data-remarks="{{ $val->remarks }}"
                                            class="editData btn btn-success btn-sm mr-2"> <i class="mdi mdi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.reservation.destroy', $val->id) }}" method="post">
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
                        <td colspan="8">
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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalGridTitle">Add Reservation</h5>
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
                                <input type="hidden" name="reservation_id" id="modal_reservation_id" class="reset-input"
                                    value="">

                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input name="name" type="text" class="form-control reset-input" id="modal_name"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="modal_mobile">Mobile</label>
                                    <input name="mobile" type="text" class="form-control reset-input" id="modal_mobile"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="modal_email">Email</label>
                                    <input name="email" type="email" class="form-control reset-input" id="modal_email"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="modal_date">Date</label>
                                    <input name="date" type="date" class="form-control reset-input"
                                        id="modal_date" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="modal_time">Time</label>
                                    <input name="time" type="time" class="form-control reset-input"
                                        id="modal_time" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="modal_remarks">Speacial Instructions</label>
                                    <textarea name="remarks" class="form-control reset-input" id="modal_remarks" cols="30" rows="5"></textarea>

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
            $('.modal-title').html('Add Reservation');

            $('.reset-input:input').prop('checked', false);
            $('#modalForm').modal('show');
            var url = "{{ route('admin.reservation.store') }}";
            $('#form').attr('action', url);
            $('#form').attr('method', 'POST');
            $('#_method').attr('value', 'post');

        });
        $(document).on('click', '.editData', function(e) {
            e.preventDefault();
            // alert('asd');
            // $('#imageSpan').addClass('hidden')
            $('.modal-title').html('Update Reservation');


            var id = $(this).data('id');
            var name = $(this).data('name');
            var mobile = $(this).data('mobile');
            var email = $(this).data('email');
            var date = $(this).data('date');
            var time = $(this).data('time');
            var remarks = $(this).data('remarks');

            $('.reset-input').val('');
            $('.reset-input:input').prop('checked', false);

            $('#modal_reservation_id').val(id);
            $('#modal_name').val(name);
            $('#modal_mobile').val(mobile);
            $('#modal_email').val(email);
            $('#modal_date').val(date);
            $('#modal_time').val(time);
            $('#modal_remarks').val(remarks);

            $('#modalForm').modal('show');
            var url = "{{ route('admin.reservation.update', ':valId') }}";

            url = url.replace(":valId", id);
            $('#form').attr('action', url);
            $('#form').attr('method', 'POST');
            $('#_method').attr('value', 'PUT');
        });

        $(document).ready(function() {
            $('#modal_name').keyup(function() {
                var sourceText = $(this).val(); // Get the value from the source input field
                var slug = slugify(sourceText); // Slugify the source text

                $('#modal_slug').val(slug); // Set the slugified value in the target input field
            });

            // Slugify function
            function slugify(text) {
                return text
                    .toLowerCase()
                    .replace(/[^\w\s-]/g, '') // Remove non-word characters (except hyphen and whitespace)
                    .replace(/\s+/g, '-') // Replace whitespace with hyphens
                    .replace(/--+/g, '-') // Replace consecutive hyphens with a single hyphen
                    .trim(); // Trim leading/trailing whitespace
            }
        });
    </script>
@endsection
