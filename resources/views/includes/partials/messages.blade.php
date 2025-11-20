{{-- @php
    $status = false;
    $type = '';
    $message = '';
@endphp --}}

@if ($errors->any())
    <div class="mx-2 p-2">
        <div class="alert alert-danger row">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><span
                aria-hidden="true">&times;</span></button>
        <ul class="list list-group">
            @foreach ($errors->all() as $error)
                <li class="error text text-white text-bold" style="list-style:none;"><i class="fa fa-times"></i>
                    Error: {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-info alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><span
                aria-hidden="true">&times;</span></button>
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><span
                aria-hidden="true">&times;</span></button>
        {{ session('error') }}
    </div>
@endif

@if (session()->get('flash_success'))
    <div class="mx-2 p-2">
        <div type="success" class="header-message row">
            {{ session()->get('flash_success') }}
        </div>
    </div>
@endif
@if (session()->get('error'))
    <div class="mx-2 p-2">
        <div type="danger" class="header-message row">
            {{ session()->get('danger') }}
        </div>
    </div>
@endif

@if (session()->get('flash_warning'))
    <div class="mx-2 p-2">
        <div type="warning" class="header-message row">
            {{ session()->get('flash_warning') }}
        </div>
    </div>
@endif

@if (session()->get('flash_info') || session()->get('flash_message'))
    <div class="mx-2 p-2">
        <div type="info" class="header-message row">
            {{ session()->get('flash_info') }}
        </div>
    </div>
@endif
@if (session()->get('flash_danger'))
    <div class="mx-2 p-2">
        <div type="danger" class="header-message row">
            {{ session()->get('flash_danger') }}
        </div>
    </div>
@endif
@if (session()->get('status'))
    <div class="mx-2 p-2">
        <div type="success" class="header-message row">
            {{ session()->get('status') }}
        </div>
    </div>
@endif

@if (session()->get('resent'))
    <div class="mx-2 p-2">
        <div type="success" class="header-message row">
            @lang('A fresh verification link has been sent to your email address.')
        </div>
    </div>
@endif
@if (session()->get('verified'))
    <div class="mx-2 p-2">
        <div type="success" class="header-message row">
            @lang('Thank you for verifying your e-mail address.')
        </div>
    </div>
@endif
