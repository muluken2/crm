@extends('layouts.app')

@section('content')

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
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
            <a href="{{ route('add_to_cart', ['id' => $product['id'] ]) }}" class="btn btn-primary" role="button">Add to Cart</a> 
        </div>
        </div>
      </div>
    </div>
  </div>

@endforeach
@endif
</div>

               
@endsection
