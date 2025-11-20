@extends('layouts.backend.app')

@section('content')

    <div class="container">
        <div class="row my-4">
            <div class="col-12 d-flex justify-content-between my-2">
                <h3>Team List</h3>
                {{-- <div class="">
                    <label for="dateFilter">Filter by Date:</label>
                    <input type="date" id="dateFilter" class="form-control">
                </div> --}}
                <div>
                    {{-- <button type="button" class="btn btn-danger btn-pill" data-toggle="modal" data-target="#exampleModalGrid">
                        Launch Demo Modal
                    </button> --}}
                    <button class="btn btn-primary" id="addData"> <i class="mdi mdi-plus"></i> Add Team</button>
                    {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalGrid" id="addData"> <i
                            class="mdi mdi-plus"></i> Add Category</button> --}}
                </div>
            </div>

            <div class="col-12 table-responsive">

                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @if (!$info->isEmpty())
                        <tbody>
                            @foreach ($info as $key => $val)
                                <tr>
                                    <td>{{ $val->sequence }}</td>
                                    <td>
                                        <a href="{{ asset($val->image) }}" target="_blank">
                                            <img src="{{ asset($val->image) }}" alt="" class="p-2"
                                                height="100">
                                    </td>
                                    </a>

                                    </td>
                                    <td>{{ $val->name ?? '' }}</td>
                                    <td>{{ $val->designation ?? '' }}</td>
                                    <td>{{ $val->description ?? '' }}</td>


                                    <td class="d-flex ">
                                        <a href="#" data-id="{{ $val->id }}" data-name="{{ $val->name }}"
                                            data-designation="{{ $val->designation }}" data-sequence="{{ $val->sequence }}"
                                            data-image="{{ asset($val->image) }}"
                                            data-description="{{ $val->description }}"
                                            class="editData btn btn-success btn-sm mr-2"> <i class="mdi mdi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.team.destroy', $val->id) }}" method="post">
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
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalGridTitle">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <input type="hidden" class="reset-input" id="_method" name="_method" value="">
                                <input type="hidden" name="team_id" id="modal_team_id" class="reset-input"
                                    value="">

                                <div class="form-group col-md-12">
                                    <label for="modal_sequence">Display Order</label>
                                    <input name="sequence" type="number" class="form-control reset-input"
                                        id="modal_sequence" aria-describedby="emailHelp" placeholder="1,2,3..">
                                </div>
                                <div class="form-group col-md-12 d-flex">

                                    <div>

                                        <label for="image">Image</label>
                                        <input name="image" type="file" class="form-control reset-input"
                                            id="modal_image" aria-describedby="emailHelp" placeholder="product image"
                                            onchange="displayImage(event)">
                                    </div>
                                    <div>
                                        <img src="" alt="" class="p-2 preview-image" id="preview-image"
                                            height="100">
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="name">Title</label>
                                    <input name="name" type="text" class="form-control reset-input" id="modal_name"
                                        aria-describedby="emailHelp" placeholder="Name">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="name">Designation</label>
                                    <input name="designation" type="text" class="form-control reset-input" id="modal_designation"
                                        aria-describedby="emailHelp" placeholder="Designation">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="modal_description" cols="30" rows="10"></textarea>
                                    {{-- <input name="name" type="text" class="form-control reset-input" id="modal_name"
                                        aria-describedby="emailHelp" placeholder="category name"> --}}
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
            var url = "{{ route('admin.team.store') }}";
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
            var designation = $(this).data('designation');
            var image = $(this).data('image');
            var description = $(this).data('description');

            $('.reset-input').val('');
            $('.reset-input:input').prop('checked', false);

            $('#modal_team_id').val(id);
            $('#modal_name').val(name);
            $('#modal_sequence').val(sequence);
            $('#modal_designation').val(designation);
            $('#preview-image').attr('src', image);
            $('#modal_description').val(description);

            $('#modalForm').modal('show');
            var url = "{{ route('admin.team.update', ':valId') }}";

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

        function displayImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview-image');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
