@extends('layouts.backend.app')

@section('content')

    <div class="container">
        <div class="row my-4">
            <div class="col-12 d-flex justify-content-between my-2">
                <h3>Banner List</h3>
                {{-- <div class="">
                    <label for="dateFilter">Filter by Date:</label>
                    <input type="date" id="dateFilter" class="form-control">
                </div> --}}
                <div>
                    {{-- <button type="button" class="btn btn-danger btn-pill" data-toggle="modal" data-target="#exampleModalGrid">
                        Launch Demo Modal
                    </button> --}}
                    <button class="btn btn-primary" id="addData"> <i class="mdi mdi-plus"></i> Add Banner</button>
                    {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalGrid" id="addData"> <i
                            class="mdi mdi-plus"></i> Add Category</button> --}}
                </div>
            </div>

            <div class="col-12 table-responsive">

                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Page Name</th>
                            <th>Image</th>
                            {{-- <th>Link</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    @if (!$info->isEmpty())
                        <tbody>
                            @foreach ($info as $key => $val)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $val->title ?? '' }}</td>
                                    <td><a href="{{ asset($val->image) }}" target="_blank">
                                            <img src="{{ asset($val->image) }}" alt="" class="p-2"
                                                height="100"></td>
                                    </a>
                                    <td class="d-flex ">
                                        <a href="#" data-id="{{ $val->id }}" data-name="{{ $val->title }}"
                                            data-image="{{ $val->image }}" class="editData btn btn-success btn-sm mr-2">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.banner.destroy', $val->id) }}" method="post">
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
                    <h5 class="modal-title" id="exampleModalGridTitle">Add Banner</h5>
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
                                <input type="hidden" name="banner_id" id="modal_banner_id" class="reset-input"
                                    value="">


                                <div class="form-group col-md-12">
                                    <label for="name">Name</label>
                                    <input name="title" type="text" class="form-control reset-input" id="modal_name"
                                        aria-describedby="emailHelp" placeholder="Banner page name">
                                </div>
                                
                                <div class="form-group col-md-12 d-flex">

                                    <div>

                                        <label for="image">Image</label>
                                        <input name="image" type="file" class="form-control reset-input"
                                            id="modal_image" aria-describedby="emailHelp" placeholder="Banner image"
                                            onchange="displayImage(event)">
                                    </div>
                                    <div>
                                        <img src="" alt="" class="p-2 preview-image " id="preview-image"
                                            height="100">
                                    </div>
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
            var url = "{{ route('admin.banner.store') }}";
            $('#form').attr('action', url);
            $('#form').attr('method', 'POST');
            $('#_method').attr('value', 'post');

        });
        $(document).on('click', '.editData', function(e) {
            e.preventDefault();

            var id = $(this).data('id');
            var name = $(this).data('name');
            var image = $(this).data('image');


            $('.reset-input').val('');
            $('#modal_image').val('');
            $('.reset-input:input').prop('checked', false);
            
            $('#modal_banner_id').val(id);
            $('#modal_name').val(name);
            $('#preview-image').attr('src', image);
            // console.log('asd');

            $('#modalForm').modal('show');
            var url = "{{ route('admin.banner.update', ':valId') }}";

            url = url.replace(":valId", id);
            $('#form').attr('action', url);
            $('#form').attr('method', 'POST');
            $('#_method').attr('value', 'PUT');
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
