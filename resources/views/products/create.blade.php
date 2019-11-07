@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md d-flex justify-content-center">
            <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    @lang('message.Name')
                    <input type="text" class="
                    @if($errors->has('productName'))
                        border-danger
                    @endif
                    form-control" name="productName" placeholder="@lang('message.EnterNameProduct')">
                    @if($errors->has('productName'))
                        <p class="text-danger">
                            <img src="https://img.icons8.com/dusk/16/000000/warning-shield.png">
                            {{$errors->first('productName')}}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    @lang('message.Price')
                    <input type="text" class="
                    @if($errors->has('productProduct'))
                        border-danger
                    @endif
                    form-control" name="productPrice" placeholder="@lang('message.EnterPriceProduct')">
                    @if($errors->has('productPrice'))
                        <p class="text-danger">
                            <img src="https://img.icons8.com/dusk/16/000000/warning-shield.png">
                            {{$errors->first('productPrice')}}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    @lang('message.Origin')
                    <input type="text" class="
                    @if($errors->has('productOrigin'))
                        border-danger
                    @endif
                    form-control" name="productOrigin" placeholder="@lang('message.EnterOriginProduct')">
                    @if($errors->has('productOrigin'))

                        <p class="text-danger">
                            <img src="https://img.icons8.com/dusk/16/000000/warning-shield.png">
                            {{$errors->first('productOrigin')}}
                        </p>
                    @endif
                </div>
                <div class="form-group">
                    @lang('message.Description')
                    <input type="text" class="
                    @if($errors->has('productDescription'))
                        border-danger
                    @endif
                    form-control" name="productDescription" placeholder="@lang('message.EnterDescriptionProduct')">
                    @if($errors->has('productDescription'))
                        <p class="text-danger">
                            <img src="https://img.icons8.com/dusk/16/000000/warning-shield.png">
                            {{$errors->first('productDescription')}}
                        </p>
                    @endif
                </div>
                <div class="custom-file form-group">
                    <input type="file" name="productImage" class="custom-file-input">
                    <label class="custom-file-label" for="customFile"> @lang('message.ChooseImage')</label>
                    @if($errors->has('productImage'))
                        <p class="text-danger">
                            <img src="https://img.icons8.com/dusk/16/000000/warning-shield.png">
                            {{$errors->first('productImage')}}
                        </p>
                    @endif
                </div>
                <div style="margin-top: 14px">
                    <button type="submit" class="btn btn-primary">@lang('message.Add')</button>
                </div>
            </form>
        </div>
    </div>
@endsection
