@extends('layouts.backend.app')

@section('content')

    <div class="container">
        <div class="row my-4">
            <div class="col-12 d-flex justify-content-between my-2">
                <h3>Product List</h3>
                {{-- <div class="">
                    <label for="dateFilter">Filter by Date:</label>
                    <input type="date" id="dateFilter" class="form-control">
                </div> --}}
                <div>
                    {{-- <button type="button" class="btn btn-danger btn-pill" data-toggle="modal" data-target="#exampleModalGrid">
                        Launch Demo Modal
                    </button> --}}
                    <button class="btn btn-primary" id="addData"> <i class="mdi mdi-plus"></i> Add Product</button>
                    {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalGrid" id="addData"> <i
                            class="mdi mdi-plus"></i> Add Category</button> --}}
                </div>
            </div>

            <div class="col-12 table-responsive">

                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Display Order</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category Name</th>
                            <th>Price</th>
                            <th>Featured</th>
                            <th>New Arrival</th>
                            <th>Offers</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @if (!$info->isEmpty())
                        <tbody>
                            @foreach ($info as $key => $val)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $val->sequence ?? '' }}</td>
                                    <td><a href="{{ asset($val->image) }}" target="_blank">
                                            <img src="{{ asset($val->image) }}" alt="" class="p-2"
                                                height="100"></td>
                                    </a>
                                    <td>{{ $val->name ?? '' }}</td>
                                    {{-- <td>{{ $val->is_featured && $val->is_featured == 1 ? 'Yes' : 'No' }}</td> --}}
                                    <td>{{ $val->category->name ?? '' }}</td>
                                    <td>{{ $val->price ?? '' }}</td>
                                    <td>{{ $val->is_featured == 1 ? 'Yes' : 'No' }}</td>
                                    <td>{{ $val->new_arrival == 1 ? 'Yes' : 'No' }}</td>
                                    <td>{{ $val->has_offer == 1 ? $val->offer : '' }}</td>
                                    <td>{{ $val->slug ?? '' }}</td>
                                    <td class="d-flex ">
                                        <a href="#" data-id="{{ $val->id }}" data-name="{{ $val->name }}"
                                            data-sequence="{{ $val->sequence }}"
                                            data-category_id="{{ $val->category_id }}" data-price="{{ $val->price }}"
                                            data-new_arrival="{{ $val->new_arrival }}"
                                            data-is_featured="{{ $val->is_featured ?? 0 }}"
                                            data-slug="{{ $val->slug }}" data-offer="{{ $val->offer }}"
                                            data-image="{{ asset($val->image) }}"
                                            data-description="{{ $val->description ?? '' }}"
                                            class="editData btn btn-success btn-sm mr-2"> <i class="mdi mdi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.product.destroy', $val->id) }}" method="post">
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
                        <td colspan="10">
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
                    <h5 class="modal-title" id="exampleModalGridTitle">Add Product</h5>
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
                                <input type="hidden" name="product_id" id="modal_product_id" class="reset-input"
                                    value="">

                                <div class="form-group col-md-6">
                                    <label for="modal_sequence">Display Order</label>
                                    <input name="sequence" type="number" class="form-control reset-input"
                                        id="modal_sequence" aria-describedby="emailHelp" placeholder="1,2,3..">
                                </div>

                                <div class="form-group col-md-6 d-flex">

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

                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input name="name" type="text" class="form-control reset-input" id="modal_name"
                                        aria-describedby="emailHelp" placeholder="product name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="category_id" class="">Category </label>
                                    <select name="category_id" class="form-control reset-input" id="modal_category_id">
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="price">Price</label>
                                    <input name="price" type="number" class="form-control reset-input"
                                        id="modal_price" aria-describedby="emailHelp" placeholder="123.12"
                                        step="0.01">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="offer">Offer</label>
                                    <input name="offer" type="number" class="form-control reset-input"
                                        id="modal_offer" aria-describedby="emailHelp" placeholder="123.12"
                                        step="0.01">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="is_featured" class="">Is Featured (Home Page display)</label>
                                    <select name="is_featured" class="form-control reset-input" id="modal_is_featured">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="new_arrival" class="">Is New Arrival</label>
                                    <select name="new_arrival" class="form-control reset-input" id="modal_new_arrival">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description" class="">Description</label>
                                    <textarea name="description" id="modal_description" class="form-control reset-input"></textarea>

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="slug">slug</label>
                                    <input name="slug" type="text" class="form-control reset-input"
                                        id="modal_slug" readonly>
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
            var url = "{{ route('admin.product.store') }}";
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
            var category_id = $(this).data('category_id');
            var price = $(this).data('price');
            var new_arrival = $(this).data('new_arrival');
            var offer = $(this).data('offer');
            var description = $(this).data('description');
            var image = $(this).data('image');

            $('.reset-input').val('');
            $('.reset-input:input').prop('checked', false);

            $('#modal_product_id').val(id);
            $('#modal_name').val(name);
            $('#modal_sequence').val(sequence);
            $('#modal_is_featured').val(is_featured);
            $('#modal_slug').val(slug);
            $('#modal_category_id').val(category_id);
            $('#modal_price').val(price);
            $('#modal_new_arrival').val(new_arrival);
            $('#modal_offer').val(offer);
            $('#modal_description').val(description);
            $('#preview-image').attr('src', image);

            $('#modalForm').modal('show');
            var url = "{{ route('admin.product.update', ':valId') }}";

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
