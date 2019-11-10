@extends('layouts.app')

@section('content')
    <div class="px-4 px-lg-0 ">
        <div class="pb-5">
            <div class="container ">
                <div class="row d-flex justify-content-end ">
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5 ">
                        <table class="table">
                            @if($cart && count($cart->items) != 0)
                            <div class="table-responsive">
                                <thead>
                                <tr>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="p-2 px-3 text-uppercase">Product</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="p-2 text-uppercase text-center">Price</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="p-2 text-uppercase text-center">Quantity</div>
                                    </th>
                                </tr>
                                </thead>
                                    <div>
                                        <tbody>
                                        @foreach($cart->items as $item)
                                            <?php ?>
                                            <tr class="text-center">
                                                <td scope="row" class="border-0 text-left">
                                                    <div class="p-2 ">
                                                        <img src="/asset/storage/{{$item['item']->image}}"
                                                             alt="" width="70" class="img-fluid rounded shadow-sm">
                                                        <div class="ml-3 d-inline-block align-middle">
                                                            <h5 class="mb-0">
                                                                <a href="#"
                                                                   class="text-dark d-inline-block align-middle">
                                                                    {{$item['item']->name}}
                                                                </a>
                                                            </h5>
                                                            <span
                                                                class="text-muted font-weight-normal font-italic d-block">
                                                    {{$item['item']->description}}

                                                </span>
                                                            <a href="{{route('cart.remove',$item['item']->id)}}"
                                                               class="text-dark"><i class="fa fa-trash"></i>delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="border-0 align-middle">
                                                    <strong>${{$item['totalPrice']}}</strong>
                                                </td>
                                                <td class="border-0 align-middle"><strong>
                                                        <ul class="pagination ">
                                                            <li class="page-item"><a class="page-link"
                                                                                     href="{{route('cart.subtraction',$item['item']->id)}}">-</a>
                                                            </li>
                                                            <li class="page-item border-dark"><a
                                                                    class="page-link">{{$item['totalQty']}}</a></li>
                                                            <li class="page-item"><a class="page-link"
                                                                                     href="{{route('cart.plus',$item['item']->id)}}">+</a>
                                                            </li>
                                                        </ul>
                                                    </strong>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tr>
                                            <td class="border-0 d-flex justify-content-end">
                                                <p style="font-size: 24px">@lang('message.TotalPrice'):
                                                    ${{$cart->totalPrice }}</p>
                                            </td>
                                        </tr>
                                    </div>
                            </div>
                            @else
                                <div>
                                    <h3>
                                        @lang('message.NoData')
                                    </h3>
                                </div>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
