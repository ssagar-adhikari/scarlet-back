@extends('layouts.backend.app')

@section('content')
    <div class="container">
        <form action="{{ route('admin.setting.store') }}" method="POST">
            @csrf

            <div class="row my-4">
                <div class="col-12 d-flex justify-content-between my-2">
                    <h3>Setting Details</h3>
                    <div>
                        <button class="btn btn-primary" type="submit"> <i class="mdi mdi-arrow-up"></i> Update
                            Setting</button>
                    </div>
                </div>
                <hr>
                @foreach ($info as $key => $val)
                    {{-- // dd($keys); --}}
                    @if (in_array($key, [
                            'id',
                            'created_at',
                            'updated_at',
                            // 'home_title3',
                            // 'home_subtitle3',
                            // 'home_title4',
                            // 'home_subtitle4',
                            // 'footer_desc',
                        ]))
                        @php
                            continue;
                        @endphp
                    @endif

                    {{-- @if ($key == 'apply_tax')
                        <div class="col-md-12 mb-2">
                            <div>
                                <label for="{{ $key }}">{{ deslugify($key) }}</label>
                            </div>
                            <select name="{{ $key }}" id="{{ $key }}" class="form-control">
                                <option {{ $val == 1 ? 'selected' : '' }} value="1">Yes</option>
                                <option {{ $val == 0 ? 'selected' : '' }} value="0">No</option>
                            </select>
                        </div>
                    @elseif ($key == 'tax_percentage')
                        <div class="col-md-12 mb-2">
                            <div>
                                <label for="{{ $key }}">{{ deslugify($key) }}</label>
                                <input type="number" max="100" class="form-control" name="{{ $key }}"
                                    value="{{ $val ?? 0 }}" min="0" step="0.01">
                            </div>
                        </div>
                    @else
                    @endif --}}
                    <div class="col-md-12 mb-2">
                        <div>
                            <label for="{{ $key }}">{{ deslugify($key) }}</label>
                            <textarea name="{{ $key }}" class="form-control" id="{{ $key }}" cols="30" rows="5">{{ $val ?? '' }}</textarea>
                        </div>
                    </div>
                @endforeach

                <div class="col-12 d-flex justify-content-end my-2">
                    <div>
                        <button class="btn btn-primary" type="submit"> <i class="mdi mdi-arrow-up"></i> Update
                            Setting</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection
