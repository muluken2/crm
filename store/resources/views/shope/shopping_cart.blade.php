@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-success card-outline">
                <div class="card-header">{{ __('Shopping Cart') }}</div>
                <div class="card-body">
                
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                    @if(Session::has('cart') && $total_price != 0)
                    <div class="row col-md-12 ">
                        <ul class="list-group col-md-12">
                            @foreach($products as $product)
                            <li class="list-group-item">
                              
                                <strong class="col-md-4">{{$product['item']['item_name']}}</strong>
                                <span class="badge badge-pill badge-success">{{ $product['item_price']}}</span>
                                
                                <div class="btn-group col-md-2">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                    <li>

                                        <a href="{{ route('reduce', ['id' => $product['item']['id'] ]) }}" class="dropdown-item">Reduce by 1</a>

                                    </li>
                                    <li><a href="{{ route('reduce_all', ['id' => $product['item']['id'] ]) }}" class="dropdown-item">Reduce by All</a></li>
                                    </ul>
                                </div>
                                  <span class="badge bg-warning text-dark badge-pill" style="float: right;">{{ $product['qty']}}</span>
                            </li>
                            @endforeach
                        </ul> 
                    </div>
                    <div class="row col-md-12">
                        <strong> Total Price: {{$total_price}} ETB</strong>
                    </div>
                    <hr />
                    <div class="row col-md-12">
                        <a href="{{route('checkout')}}" class="btn btn-primary">Checkout</a> 
                    </div>
                    @else
                    <div class="row text-dark col-md-12">
                        <h2>No items in the cart!</h2>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection