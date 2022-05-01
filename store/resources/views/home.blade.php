@extends('layouts.app')

@section('content')

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
  <div class="row">
    <div class="col-md-3 col-sm-4">

        <div class="list-group">
          @foreach($categories as $category)
          @php
          $activate = ($category['id'] == $id)? "active": "";
          @endphp
          <a href="{{route('category_', ['id'=>$category['id']])}}" class="list-group-item list-group-item-action {{$activate}}" > {{ $category['category_name']}} </a>
          @endforeach
<!--   <li class="list-group-item active" aria-current="true">An active item</li> -->
        </div> 
    </div>
<div class="col-md-9 col-sm-8"> 
  <div class="row">
  @if($products)
  @foreach($products as $product)
  <div class="col-sm-4 col-md-3">
    <div class="img-fluid img-thumbnail text-center">
      <img src="/item_image/{{$product->item_image}}" alt="book" style="max-height: 150px" class="img-responsive">
      <div class="caption">
        <h3>{{$product->item_name}} </h3>
        <p> {{$product->description}}  </p>
        <div class="row clearfix">
        <div class="text-left col-sm-6"> <strong>{{$product->item_price}} ETB</strong> </div>
        <div class="text-right col-sm-6">
            <a class="btn btn-primary btn-lg btn-flat" title="Add to Cart" href="{{ route('add_to_cart', ['id' => $product['id'] ]) }}">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i> 
                </a>
        </div>
        </div>
      </div>
    </div>
  </div>
@endforeach
@endif
</div>
</div>
</div>

@endsection
