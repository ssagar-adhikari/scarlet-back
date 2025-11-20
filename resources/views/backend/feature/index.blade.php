@extends('layouts.backend.app')

@section('content')

    <div class="container">
        <div class="row my-4">
            <div class="col-12 d-flex justify-content-between my-2">
                <h3>Feature List</h3>
                {{-- <div class="">
                    <label for="dateFilter">Filter by Date:</label>
                    <input type="date" id="dateFilter" class="form-control">
                </div> --}}
                <div>
                    {{-- <button type="button" class="btn btn-danger btn-pill" data-toggle="modal" data-target="#exampleModalGrid">
                        Launch Demo Modal
                    </button> --}}
                    <button class="btn btn-primary" id="addData"> <i class="mdi mdi-plus"></i> Add Feature</button>
                    {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalGrid" id="addData"> <i
                            class="mdi mdi-plus"></i> Add Category</button> --}}
                </div>
            </div>

            <div class="col-12 table-responsive">

                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th>SN</th>

                            <th>Icon</th>
                            <th>Title</th>
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
                                        <span class="{{ $val->icon }}">
                                        </span>

                                    </td>
                                    <td>{{ $val->title ?? '' }}</td>
                                    <td>{{ $val->description ?? '' }}</td>


                                    <td class="d-flex ">
                                        <a href="#" data-id="{{ $val->id }}" data-title="{{ $val->title }}"
                                            data-sequence="{{ $val->sequence }}" data-icon="{{ $val->icon }}"
                                            data-description="{{ $val->description }}" data-slug="{{ $val->slug }}"
                                            class="editData btn btn-success btn-sm mr-2"> <i class="mdi mdi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.feature.destroy', $val->id) }}" method="post">
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
                    <h5 class="modal-title" id="exampleModalGridTitle">Add Feature</h5>
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
                                <input type="hidden" name="feature_id" id="modal_feature_id" class="reset-input"
                                    value="">

                                <div class="form-group col-md-12">
                                    <label for="modal_sequence">Display Order</label>
                                    <input name="sequence" type="number" class="form-control reset-input"
                                        id="modal_sequence" aria-describedby="emailHelp" placeholder="1,2,3..">
                                </div>
                                {{-- <div class="form-group col-md-12 d-flex">

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
                                </div> --}}

                                <div class="form-group col-md-12">
                                    <label for="name">Title</label>
                                    <input name="title" type="text" class="form-control reset-input" id="modal_title"
                                        aria-describedby="emailHelp" placeholder="Title">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="name">Icon</label>
                                    <input name="icon" type="text" class="form-control reset-input" id="modal_icon"
                                        aria-describedby="emailHelp" placeholder="Icon">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="modal_description" cols="30" rows="10"></textarea>
                                    {{-- <input name="name" type="text" class="form-control reset-input" id="modal_name"
                                        aria-describedby="emailHelp" placeholder="category name"> --}}
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="name">Slug</label>
                                    <input name="slug" type="text" class="form-control reset-input" id="modal_slug"
                                        aria-describedby="emailHelp" placeholder="Title" readonly>
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
            var url = "{{ route('admin.feature.store') }}";
            $('#form').attr('action', url);
            $('#form').attr('method', 'POST');
            $('#_method').attr('value', 'post');

        });
        $(document).on('click', '.editData', function(e) {
            e.preventDefault();
            // alert('asd');
            // $('#imageSpan').addClass('hidden')

            var id = $(this).data('id');
            var title = $(this).data('title');
            var sequence = $(this).data('sequence');
            var icon = $(this).data('icon');
            var slug = $(this).data('slug');
            var description = $(this).data('description');

            $('.reset-input').val('');
            $('.reset-input:input').prop('checked', false);

            $('#modal_feature_id').val(id);
            $('#modal_title').val(title);
            $('#modal_sequence').val(sequence);
            $('#modal_icon').val(icon);
            $('#modal_slug').val(slug);
            $('#modal_description').val(description);

            $('#modalForm').modal('show');
            var url = "{{ route('admin.feature.update', ':valId') }}";

            url = url.replace(":valId", id);
            $('#form').attr('action', url);
            $('#form').attr('method', 'POST');
            $('#_method').attr('value', 'PUT');
        });

        $(document).ready(function() {
            $('#modal_title').keyup(function() {
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
