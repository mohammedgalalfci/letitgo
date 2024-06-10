@extends('layouts.master')
@section('css')
@toastr_css
<style>
.img {
    border-radius: 50% !important;
}

.idd {
    font-size: 14px;
    font-weight: 600
}

.idd1 {
    font-size: 12px
}
</style>
@section('title')
{{__('language.profile')}}
@stop
@endsection

@section('content')
<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="card p-4" style="width:100% !important">
        <div class="image d-flex flex-column justify-content-center align-items-center">
            @if($user->image)
            <img width="150" height="150" src="{{ url('images/users/'.$user->image) }}" />
            @else
            <img width="150" height="150" src="{{ url('images/users/default.jpg') }}" />
            @endif
            <span class="name my-3" style="font-size:18px"> {{ $user->name }} </span>
            <span class="idd" style="font-size:18px"> {{ $user->email }}</span>
            <div class=" d-flex mt-4">
                <button class="btn1 btn-dark p-2" style="cursor:pointer" data-toggle="modal" data-target="#edit{{ $user->id }}">{{__('language.edit_profile')}}</button>
            </div>
            <div class=" d-flex mt-4">
                <button class="btn1 btn-dark p-2" style="cursor:pointer" data-toggle="modal" data-target="#change_password">{{__('language.change_password')}}</button>
            </div>
            <div class=" px-2 rounded mt-4 date ">
                <span class="join" style="font-size:18px">Joined {{ $user->created_at->format('d M Y') }}</span>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ __('language.edit') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('dashboard.profile.update', $user->id) }}" method="post"
                    enctype="multipart/form-data">
                    {{ method_field('put') }}
                    @csrf

                    <div class="form-group">
                        <label for="Name" class="mr-sm-2">{{ __('language.name') }}
                            :</label>
                        <input id="Name" type="text" name="name" class="form-control" value="{{ $user->name }}"
                            required>
                        <input id="id" type="hidden" name="id" class="form-control" value="{{ $user->id }}">
                    </div>

                    <div class="form-group">
                        <label for="Email" class="mr-sm-2">{{ __('language.email') }}
                            :</label>
                        <input id="Email" type="email" name="email" class="form-control" value="{{ $user->email }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="Image" class="mr-sm-2">{{ __('language.image') }}
                            :</label>
                        <input id="Image" type="file" name="image" value="{{ $user->image }}" class="form-control">
                        @if($user->image)
                        <img width="60" height="60" src="{{ url('images/users/'.$user->image) }}" />
                        @else
                        <img width="60" height="60" src="{{ url('images/users/default.jpg') }}" />
                        @endif
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">{{ __('language.edit') }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ __('language.edit') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('dashboard.profile.change_password') }}" method="POST">
                    @csrf   

                <div class="form-group">
                    <label for="Password" class="mr-sm-2">{{ __('language.current_password') }}
                            :</label>
                    <input type="password" class="form-control" name="current_password">
                </div>

                <div class="form-group">
                    <label for="Password" class="mr-sm-2">{{ __('language.new_password') }}
                            :</label>
                    <input type="password" class="form-control" name="new_password">
                </div>
            
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">{{ __('language.edit') }}</button>
                </div>
            
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
@toastr_js
@toastr_render
@endsection