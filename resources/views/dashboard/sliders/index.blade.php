@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
    {{__('language.slider')}}
@stop
@endsection

@section('page-header')
<!-- breadcrumb -->

<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{__('language.slider')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('dashboard.dashboard')}}" class="default-color">{{__('language.home')}}</a></li>
                <li class="breadcrumb-item active">{{__('language.slider')}}</li>
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
            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ __('language.add') }}
            </button>
            <br><br>
            
            <div class="table-responsive">

            <table id="datatable" class="table table-striped table-bordered p-0">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>{{__('language.title')}}</th>
                      <th>{{__('language.image')}}</th>
                      <th>{{__('language.action')}}</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $i=1 ?>
                  @foreach($sliders as $slider)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($slider->title, 50, $end='...') }}</td>
                        <td><img width="60" height="60" src="{{ url('images/sliders/'.$slider->image) }}" /></td>
                        <td>
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#edit{{ $slider->id }}"
                                title="{{ __('language.edit') }}"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#delete{{ $slider->id }}"
                                title="{{ __('language.delete') }}"><i
                                    class="fa fa-trash"></i></button>
                        </td>
                    </tr>

                    <!-- edit_category -->
                        <div class="modal fade" id="edit{{ $slider->id }}" tabindex="-1" role="dialog"
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
                                        <form action="{{ route('dashboard.sliders.update', $slider->id) }}" method="post" enctype="multipart/form-data">
                                            {{ method_field('put') }}
                                            @csrf
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $slider->id }}">

                                                <div class="form-group">
                                                    <label for="title_ar"
                                                        class="mr-sm-2">{{ __('language.title_ar') }}
                                                        :</label>
                                                    <input id="title_ar" type="text" name="title_ar"
                                                        class="form-control"
                                                        value="{{ $slider->title_ar }}"
                                                        required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="title_en"
                                                        class="mr-sm-2">{{ __('language.title_en') }}
                                                        :</label>
                                                    <input id="title_en" type="text" name="title_en"
                                                        class="form-control"
                                                        value="{{ $slider->title_en }}"
                                                        required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="file" class="mr-sm-2">{{ __('language.file') }}
                                                            :</label>
                                                    <input type="file" class="form-control" name="image" value="{{$slider->image}}">
                                                    @if($slider->image)
                                                        <img width="60" height="60" src="{{ url('images/sliders/'.$slider->image) }}" />
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


                        <!-- delete_slider -->
                        <div class="modal fade" id="delete{{ $slider->id }}" tabindex="-1" role="dialog"
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
                                            <form action="{{ route('dashboard.sliders.destroy', $slider->id) }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ __('language.warning') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{$slider->id}}">
                                                <div class="modal-footer">
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ __('language.delete') }}</button>
                                                </div>
                                            </form>
                                        </div>
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

<!-- add_slider -->
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
                <form action="{{ route('dashboard.sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title_ar"
                            class="mr-sm-2">{{ __('language.title_ar') }}
                            :</label>
                        <input id="title_ar" type="text" name="title_ar"
                            class="form-control"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="title_en"
                            class="mr-sm-2">{{ __('language.title_en') }}
                            :</label>
                        <input id="title_en" type="text" name="title_en"
                            class="form-control"
                            required>
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
@endsection