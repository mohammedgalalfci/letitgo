@extends('layouts.master')
@section('css')
@toastr_css
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
@section('title')
    {{__('language.users')}}
@stop
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{__('language.users')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('dashboard.dashboard')}}" class="default-color">{{__('language.home')}}</a></li>
                <li class="breadcrumb-item active">{{__('language.users')}}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- main body --> 
<div class="row">   
      <div class="col-xl-12 mb-30">     
        <div class="card card-statistics h-100"> 
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
          <div class="card-body">
            @can('إضافة مستخدم')
            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ __('language.add') }}
            </button>
            @endcan
            <br><br>
            
            <div class="table-responsive">

            <table id="datatable" class="table table-striped table-bordered p-0">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>{{__('language.name')}}</th>
                      <th>{{__('language.email')}}</th>
                      <th>{{__('language.phone')}}</th>
                      <th>{{__('language.image')}}</th>
                      <th>{{__('language.action')}}</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $i=1 ?>
                  @foreach($users as $user)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            @if($user->image)
                                <img width="60" height="60" src="{{ url('images/users/'.$user->image) }}" />
                            @else
                                <img width="60" height="60" src="{{ url('images/users/default.jpg') }}" />
                            @endif
                        </td>
                        <td>
                            @can('تعديل مستخدم')
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#edit{{ $user->id }}"
                                title="{{ __('language.edit') }}"><i class="fa fa-edit"></i></button>
                            @endcan
                            @can('حذف مستخدم')
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#delete{{ $user->id }}"
                                title="{{ __('language.delete') }}"><i
                                    class="fa fa-trash"></i></button>
                            @endcan
                        </td>
                    </tr>

                    <!-- edit_user -->
                        <div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                            id="exampleModalLabel">
                                            {{ __('language.edit') }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- add_form -->
                                        <form action="{{ route('dashboard.users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                                            {{ method_field('put') }}
                                            @csrf
  
                                                <div class="form-group">
                                                    <label for="Name"
                                                        class="mr-sm-2">{{ __('language.name') }}
                                                        :</label>
                                                    <input id="Name" type="text" name="name"
                                                        class="form-control"
                                                        value="{{ $user->name }}"
                                                        required>
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $user->id }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="Email"
                                                        class="mr-sm-2">{{ __('language.email') }}
                                                        :</label>
                                                    <input id="Email" type="email" name="email"
                                                        class="form-control"
                                                        value="{{ $user->email }}"
                                                        required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="Phone"
                                                        class="mr-sm-2">{{ __('language.phone') }}
                                                        :</label>
                                                    <input id="Phone" type="phone" name="phone"
                                                        class="form-control"
                                                        value="{{ $user->phone }}"
                                                        required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="Image"
                                                        class="mr-sm-2">{{ __('language.image') }}
                                                        :</label>
                                                    <input id="Image" type="file" name="image"
                                                        value="{{ $user->image }}"
                                                        class="form-control">
                                                        @if($user->image)
                                                            <img width="60" height="60" src="{{ url('images/users/'.$user->image) }}" />
                                                        @else
                                                            <img width="60" height="60" src="{{ url('images/users/default.jpg') }}" />
                                                        @endif
                                                </div>

                                            <br><br>

                                            <div class="modal-footer">
                                                <button type="submit"
                                                    class="btn btn-success">{{ __('language.edit') }}</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- delete_user -->
                        <div class="modal fade" id="delete{{ $user->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ __('language.delete') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ __('language.warning') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $user->id }}">
                                                <div class="modal-footer">
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ __('language.delete') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                  @endforeach
              </tbody>     
           </table>
         
          </div>
          </div>
        </div>   
      </div>
  </div> 
<!-- row closed -->

<!-- add_user -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ __('language.add') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('dashboard.users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ __('language.name') }}
                                :</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Email" class="mr-sm-2">{{ __('language.email') }}
                                :</label>
                        <input type="email" class="form-control" name="email">
                    </div>

                    <div class="form-group">
                        <label for="Password" class="mr-sm-2">{{ __('language.password') }}
                                :</label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <div class="form-group">
                        <label for="Phone" class="mr-sm-2">{{ __('language.phone') }}
                                :</label>
                        <input type="phone" class="form-control" name="phone">
                    </div>

                    <div class="form-group">
                        <label for="Image" class="mr-sm-2">{{ __('language.image') }}
                                :</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">{{ __('language.add') }}</button>
            </div>
            </form>

        </div>
    </div>
</div>

@endsection
@section('js')
@toastr_js
@toastr_render
<script>
    $(document).ready(function(){ 
        var multipleSelectDropdown = new Choices('#inputGroupSelect04', {
        removeItemButton: true
        }); 
    });
</script>
@endsection