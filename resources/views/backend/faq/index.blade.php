@extends('layouts.backend.app')

@section('content')

    <div class="container">
        <div class="row my-4">
            <div class="col-12 d-flex justify-content-between my-2">
                <h3>FAQ List</h3>
                {{-- <div class="">
                    <label for="dateFilter">Filter by Date:</label>
                    <input type="date" id="dateFilter" class="form-control">
                </div> --}}
                <div>
                    {{-- <button type="button" class="btn btn-danger btn-pill" data-toggle="modal" data-target="#exampleModalGrid">
                        Launch Demo Modal
                    </button> --}}
                    <button class="btn btn-primary" id="addData"> <i class="mdi mdi-plus"></i> Add FAQ</button>
                    {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalGrid" id="addData"> <i
                            class="mdi mdi-plus"></i> Add Category</button> --}}
                </div>
            </div>

            <div class="col-12 table-responsive">

                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                           
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @if (!$info->isEmpty())
                        <tbody>
                            @foreach ($info as $key => $val)
                                <tr>
                                    <td>{{ $val->sequence }}</td>
                                   

                                 
                                    <td>{{ $val->question ?? '' }}</td>
                                    <td>{{ $val->answer ?? '' }}</td>


                                    <td class="d-flex ">
                                        <a href="#" data-id="{{ $val->id }}" data-question="{{ $val->question }}"
                                            data-answer="{{ $val->answer }}" data-sequence="{{ $val->sequence }}"
                                            class="editData btn btn-success btn-sm mr-2"> <i class="mdi mdi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.faq.destroy', $val->id) }}" method="post">
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
                                <input type="hidden" name="faq_id" id="modal_faq_id" class="reset-input"
                                    value="">

                                <div class="form-group col-md-12">
                                    <label for="modal_sequence">Display Order</label>
                                    <input name="sequence" type="number" class="form-control reset-input"
                                        id="modal_sequence" aria-describedby="emailHelp" placeholder="1,2,3..">
                                </div>
                               

                                <div class="form-group col-md-12">
                                    <label for="name">Question</label>
                                    <input name="question" type="text" class="form-control reset-input" id="modal_question"
                                        aria-describedby="emailHelp" placeholder="Question">
                                </div>
                              
                                <div class="form-group col-md-12">
                                    <label for="answer">Answer</label>
                                    <textarea class="form-control" name="answer" id="modal_answer" cols="30" rows="10"></textarea>
                                  
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
            var url = "{{ route('admin.faq.store') }}";
            $('#form').attr('action', url);
            $('#form').attr('method', 'POST');
            $('#_method').attr('value', 'post');

        });
        $(document).on('click', '.editData', function(e) {
            e.preventDefault();
            // alert('asd');
            // $('#imageSpan').addClass('hidden')

            var id = $(this).data('id');
            var sequence = $(this).data('sequence');
            
            var question = $(this).data('question');
            var answer = $(this).data('answer');

            $('.reset-input').val('');
            $('.reset-input:input').prop('checked', false);

            $('#modal_faq_id').val(id);
            $('#modal_question').val(question);
            $('#modal_sequence').val(sequence);
           
            $('#modal_answer').val(answer);

            $('#modalForm').modal('show');
            var url = "{{ route('admin.faq.update', ':valId') }}";

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
