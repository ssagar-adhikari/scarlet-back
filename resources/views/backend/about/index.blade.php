@extends('layouts.backend.app')

@section('content')
    <div class="container">
        <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row my-4">
                <div class="col-12 d-flex justify-content-between my-2">
                    <h3>About Us Details</h3>
                    <div>
                        <button class="btn btn-primary" type="submit"> <i class="mdi mdi-arrow-up"></i> Update
                        </button>
                    </div>
                </div>
                <hr>
                
                <div class="col-md-12 mb-2">
                    <div>
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $info ? $info->title : '' }}">
                    </div>
                </div>
                <div class="col-md-12 mb-2">
                    <div>
                        <label for="subtitle">Subtitle</label>
                        <input type="text" class="form-control" name="subtitle"
                            value="{{ $info ? $info->subtitle : '' }}">
                    </div>
                </div>
                <div class="col-md-12 mb-2">
                    <div class="row">
                        <div class="col-md-6">

                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" value=""
                                onchange="displayImage(event)">
                        </div>
                        <div class="col-md-6">
                            <img src="{{ $info ? asset($info->image) : '' }}" alt="" class="p-2 preview-image"
                                id="preview-image" height="100">

                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-2">
                    <div>
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" cols="30" rows="5">{{ $info ? $info->description : '' }}</textarea>
                    </div>
                </div>
                <div class="col-md-12 mb-2">
                    <div>
                        <label for="title">Why choose Us Title</label>
                        <input type="text" class="form-control" name="choose_us_title" value="{{ $info ? $info->choose_us_title : '' }}">
                    </div>
                </div>
                <div class="col-md-12 mb-2">
                    <div>
                        <label for="subtitle">Why choose Us Subtitle</label>
                        <input type="text" class="form-control" name="choose_us_subtitle"
                            value="{{ $info ? $info->choose_us_subtitle : '' }}">
                    </div>
                </div>
               
                <div class="col-md-12 mb-2">
                    <div>
                        <label for="description">Why choose Us Description</label>
                        <textarea name="choose_us_description" class="form-control" id="choose_us_description" cols="30" rows="5">{{ $info ? $info->choose_us_description : '' }}</textarea>
                    </div>
                </div>
               

            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
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
