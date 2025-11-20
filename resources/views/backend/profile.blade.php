@extends('layouts.backend.app')

@section('content')
    <div class="container">
        <div class="row my-4">
            <form id="form" action="{{ route('admin.profile') }}" method="POST">
                @csrf
                <div class="col-12 d-flex justify-content-between my-2">
                    <h3>Profile Details</h3>
                    {{-- <div class="">
                    <label for="dateFilter">Filter by Date:</label>
                    <input type="date" id="dateFilter" class="form-control">
                </div> --}}
                    <div>
                        {{-- <button type="button" class="btn btn-danger btn-pill" data-toggle="modal" data-target="#exampleModalGrid">
                        Launch Demo Modal
                    </button> --}}
                        <button class="btn btn-primary" type="submit"> <i class="mdi mdi-arrow-up"></i> Update </button>
                        {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalGrid" id="addData"> <i
                            class="mdi mdi-plus"></i> Add Category</button> --}}
                    </div>
                </div>

                <div class="col-12 table-responsive">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="form-group col-md-12">
                                <label for="modal_sequence">Username</label>
                                <input name="name" type="text" class="form-control"
                                    value="{{ old('name') ?? $info->name }}" required>
                            </div>
                            @if (session('inlineerror'))
                                <span class="form-label  text-danger">
                                    {{ session('inlineerror')->first('name') }}</span>
                            @endif
                            <div class="form-group col-md-12">
                                <label for="modal_sequence">Email</label>
                                <input name="email" type="email" class="form-control"
                                    value="{{ old('email') ?? $info->email }}" required>
                                @if (session('inlineerror'))
                                    <span class="form-label  text-danger">
                                        {{ session('inlineerror')->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="modal_sequence">Old Password </label>
                                <input name="old_password" type="password" class="form-control">
                                @if (session('inlineerror'))
                                    <span class="form-label  text-danger">
                                        {{ session('inlineerror')->first('old_password') }}</span>
                                @endif
                                @if (session('inlineerror1'))
                                    <span class="form-label  text-danger">
                                        {{ session('inlineerror1') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="modal_sequence">New Password (add if you want to update)</label>
                                <input name="new_password" type="password" class="form-control">
                                @if (session('inlineerror'))
                                    <span class="form-label  text-danger">
                                        {{ session('inlineerror')->first('new_password') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="modal_sequence">New Confirm Password</label>
                                <input name="confirm_password" type="password" class="form-control">
                                @if (session('inlineerror'))
                                    <span class="form-label  text-danger">
                                        {{ session('inlineerror')->first('confirm_password') }}</span>
                                @endif
                                @if (session('inlineerror2'))
                                    <span class="form-label  text-danger">
                                        {{ session('inlineerror2') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
