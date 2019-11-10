@extends('layouts.app')

@section('content')

    <div class="container">
        @can('crud-product')
            <a href="{{route('products.create')}}">
                <img src="https://img.icons8.com/wired/40/000000/create-new.png">
            </a>
        @endcan
        <div class="align-content-xl-center">
            @if(count($products) == 0)
                <div class="d-flex justify-content-center">
                    <h3>@lang('message.NoData')</h3>
                </div>
            @else
                <div class="row" style="margin-top: 10px">
                    @foreach($products as $product)
                        <div class="col-md-3 d-flex justify-content-center">
                            <div class="card" style="width: 18rem; margin-top: 50px">
                                <img src="/asset/storage/{{$item['item']->image}}" class="card-img-top" width="100"
                                     height="190"
                                     alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->name}}</h5>
                                    <p class="card-text">{{$product->price}}$</p>
                                    <p class="card-text">{{$product->description}}</p>
                                    <a href="{{route('cart.addToCart',$product->id)}}"
                                       class="btn btn-success">@lang('message.AddToCart')</a>

                                    @can('crud-product')
                                        <a href="{{route('products.destroy',$product->id)}}"
                                           class="btn btn-danger">@lang('message.Del')</a>
                                        <a href="{{route('products.edit',$product->id)}}"
                                           class="btn btn-primary">@lang('message.Edit')</a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
