@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
    {{__('language.contact_us')}}
@stop
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{__('language.contact_us')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('dashboard.dashboard')}}" class="default-color">{{__('language.home')}}</a></li>
                <li class="breadcrumb-item active">{{__('language.contact_us')}}</li>
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
            
            <div class="table-responsive">

            <table id="datatable" class="table table-striped table-bordered p-0">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>{{__('language.fullname')}}</th>
                      <th>{{__('language.email')}}</th>
                      <th>{{__('language.phone')}}</th>
                      <th>{{__('language.message')}}</th>
                      <th>{{__('language.action')}}</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $i=1 ?>
                  @foreach($contactUs as $contact)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $contact->fullname }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($contact->message, 50, $end='...') }}</td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#delete{{ $contact->id }}"
                                title="{{ __('language.delete') }}"><i
                                    class="fa fa-trash"></i></button>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                data-target="#show{{ $contact->id }}"
                                title="{{ __('language.show') }}">{{ __('language.show') }}</button>
                        </td>
                    </tr>

                    <!-- show message -->
                    <div class="modal fade" id="show{{ $contact->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                            id="exampleModalLabel">
                                            {{ __('language.show') }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {{ $contact->message }}

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- delete_contact -->
                        <div class="modal fade" id="delete{{ $contact->id }}" tabindex="-1" role="dialog"
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
                                            <form action="{{ route('dashboard.contact-us.destroy', $contact->id) }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ __('language.warning') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $contact->id }}">
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


@endsection
@section('js')
@toastr_js
@toastr_render
@endsection