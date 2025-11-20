@extends('layouts.backend.app')

@section('content')

    <style>
        .order-sec {
            border: 1px solid #c6c3c363;

        }
    </style>

    <div class="container">

        <div class="row my-4">
            <div class="col-12 d-flex justify-content-between my-2">
                <h3>Order Details</h3>
                <div>
                    {{-- <button class="btn btn-primary" id="addData"> <i class="mdi mdi-plus"></i> Add Category</button> --}}
                </div>
            </div>

            <div class="col-md-4 order-sec d-flex justify-content-between">
                <label for="">Order ID</label>
                <span>{{ $order->order_id ?? '' }}</span>
            </div>
            <div class="col-md-4 order-sec d-flex justify-content-between">
                <label for="">UserName</label>
                <span>{{ $order->user->name ?? '' }}</span>
            </div>
            <div class="col-md-4 order-sec d-flex justify-content-between">
                <label for="">Order name</label>
                <span>{{ $order->name ?? '' }}</span>
            </div>
            <div class="col-md-4 order-sec d-flex justify-content-between">
                <label for="">Contact</label>
                <span>{{ $order->mobile ?? '' }}</span>
            </div>
            <div class="col-md-4 order-sec d-flex justify-content-between">
                <label for="">Address</label>
                <span>{{ $order->address ?? '' }}</span>
            </div>
            <div class="col-md-4 order-sec d-flex justify-content-between">
                <label for="">Order Datetime</label>
                <span>{{ $order->created_at ? date('Y-m-d H:i:s a', strtotime($order->created_at)) : '' }}</span>
            </div>
            <div class="col-md-4 order-sec d-flex justify-content-between">
                <label for="">Pick up time</label>
                <span>{{ $order->pickup_time ? date('H:i:s a', strtotime($order->pickup_time)) : '' }}</span>
            </div>
        </div>

        <div class="row my-4">
            <div class="col-12 d-flex justify-content-between my-2">
                <h3>Order Product List</h3>
                <div>
                    {{-- <button class="btn btn-primary" id="addData"> <i class="mdi mdi-plus"></i> Add Category</button> --}}
                </div>
            </div>

            <div class="col-12 table-responsive">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Order ID</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @if (!$info->isEmpty())
                        <tbody>
                            @php
                                $subtotal = 0;
                            @endphp
                            @foreach ($info as $key => $val)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $val->order->order_id }}</td>
                                    <td>{{ $val->product->name ?? '' }}</td>
                                    <td>{{ $val->price ?? '' }}</td>
                                    <td>{{ $val->quantity }}</td>
                                    <td>{{ $val->price * $val->quantity }}</td>
                                    <td class="d-flex ">
                                        <form action="{{ route('admin.order-user.destroy', $val->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="mdi mdi-delete"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                    $subtotal = $subtotal + $val->price * $val->quantity;
                                @endphp
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{ number_format($subtotal, 2) }}</td>
                                <td></td>
                            </tr>
                            @php
                            $tax = getTaxRate();
                                $taxamount = ($subtotal * $tax) / 100;
                                $subtotal = $subtotal + $taxamount;
                            @endphp
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Tax</td>
                                <td>{{ number_format($taxamount, 2) }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Total</td>
                                <td>{{ number_format($subtotal, 2) }}</td>
                                <td></td>
                            </tr>
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
