@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{__('language.products')}}
@stop
@endsection

@section('page-header')
<!-- breadcrumb -->

<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{__('language.products')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('dashboard.dashboard')}}"
                        class="default-color">{{__('language.home')}}</a></li>
                <li class="breadcrumb-item active">{{__('language.products')}}</li>
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
                                <th>{{__('language.name')}}</th>
                                <th>{{__('language.description')}}</th>
                                <th>{{__('language.file')}}</th>
                                <th>{{__('language.price')}}</th>
                                <th>{{__('language.offer')}}</th>
                                <th>{{__('language.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1 ?>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($product->description, 50, $end='...') }}</td>
                                <td><img width="60" height="60" src="{{ url('images/products/' . $product->file)}}"
                                        alt="{{$product->name}}" /></td>
                                <td>{{ $product->price }}</td>
                                <td>@if($product->offer == 1){{ __('language.inside_offer') }} @else
                                    {{ __('language.outside_offer') }} @endif</td>
                                <td>
                                    @if($product->offer == null)
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#offer{{ $product->id }}"
                                        title="{{ __('language.offer') }}">{{ __('language.offer') }}</button>
                                    @else
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteOffer{{ $product->id }}"
                                        title="{{ __('language.delete_offer') }}">{{ __('language.delete_offer') }}</button>
                                    @endif
                                    <a href="{{ route('dashboard.product.components',$product->id) }}" type="button"
                                        class="btn btn-primary btn-sm">{{ __('language.components') }}</i>
                                    </a>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $product->id }}" title="{{ __('language.edit') }}"><i
                                            class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $product->id }}" title="{{ __('language.delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- offer_product -->
                            <div class="modal fade" id="offer{{ $product->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ __('language.offer') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('dashboard.products.offer', $product->id) }}"
                                                method="post">
                                                @csrf
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $product->id }}">
                                                {{ __('language.add_product_to_offer') }}
                                                <br><br>
                                                <div class="modal-footer">
                                                    <button type="submit"
                                                        class="btn btn-success">{{ __('language.add') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_offer_product -->
                            <div class="modal fade" id="deleteOffer{{ $product->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ __('language.delete_offer') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('dashboard.products.delete-offer', $product->id) }}"
                                                method="post">
                                                @csrf
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $product->id }}">
                                                {{ __('language.delete_product_from_offer') }}
                                                <br><br>
                                                <div class="modal-footer">
                                                    <button type="submit"
                                                        class="btn btn-success">{{ __('language.delete') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- edit_product -->
                            <div class="modal fade" id="edit{{ $product->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ __('language.edit') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('dashboard.products.update', $product->id) }}"
                                                method="post" enctype="multipart/form-data">
                                                {{ method_field('put') }}
                                                @csrf
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $product->id }}">

                                                <div class="form-group">
                                                    <label for="name_ar" class="mr-sm-2">{{ __('language.name_ar') }}
                                                        :</label>
                                                    <input id="name_ar" type="text" name="name_ar" class="form-control"
                                                        value="{{ $product->name_ar }}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name_en" class="mr-sm-2">{{ __('language.name_en') }}
                                                        :</label>
                                                    <input id="name_en" type="text" name="name_en" class="form-control"
                                                        value="{{ $product->name_en }}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="description_ar"
                                                        class="mr-sm-2">{{ __('language.description_ar') }}
                                                        :</label>
                                                    <textarea id="description_ar" type="text" name="description_ar"
                                                        class="form-control"
                                                        required>{{ $product->description_ar }}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="description_en"
                                                        class="mr-sm-2">{{ __('language.description_en') }}
                                                        :</label>
                                                    <textarea id="description_en" type="text" name="description_en"
                                                        class="form-control"
                                                        required>{{ $product->description_en }}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="price" class="mr-sm-2">{{ __('language.price') }}
                                                        :</label>
                                                    <input type="text" class="form-control" name="price"
                                                        value="{{ $product->price }}"
                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                                </div>

                                                <div class="form-group">
                                                    <label for="file" class="mr-sm-2">{{ __('language.file') }}
                                                        :</label>
                                                    <input type="file" class="form-control" name="file"
                                                        value="{{$product->file}}">
                                                    @if($product->file)
                                                    <img width="60" height="60"
                                                        src="{{ url('images/products/'.$product->file) }}"
                                                        alt="{{$product->name}}" />
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


                            <!-- delete_product -->
                            <div class="modal fade" id="delete{{ $product->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ __('language.delete') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('dashboard.products.destroy', $product->id) }}"
                                                method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ __('language.warning') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{$product->id}}">
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

<!-- add_product -->
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
                <form action="{{ route('dashboard.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name_ar" class="mr-sm-2">{{ __('language.name_ar') }}
                            :</label>
                        <input id="name_ar" type="text" name="name_ar" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="name_en" class="mr-sm-2">{{ __('language.name_en') }}
                            :</label>
                        <input id="name_en" type="text" name="name_en" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="description_ar" class="mr-sm-2">{{ __('language.description_ar') }}
                            :</label>
                        <textarea id="description_ar" type="text" name="description_ar" class="form-control"
                            required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="description_en" class="mr-sm-2">{{ __('language.description_en') }}
                            :</label>
                        <textarea id="description_en" type="text" name="description_en" class="form-control"
                            required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="price" class="mr-sm-2">{{ __('language.price') }}
                            :</label>
                        <input type="text" class="form-control" name="price"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>

                    <div class="form-group">
                        <label for="file" class="mr-sm-2">{{ __('language.file') }}
                            :</label>
                        <input type="file" class="form-control" name="file">
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