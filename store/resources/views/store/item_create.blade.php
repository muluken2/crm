@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-success card-outline">
                <div class="card-header">{{ __('Item Registration') }}</div>

                <div class="card-body">

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                        @csrf
                       <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group row">
                            <label for="item_name" class="col-md-4 col-form-label text-md-right">{{ __('Item Name') }}</label>

                            <div class="col-md-6">
                                <input id="item_name" type="text" class="form-control @error('item_name') is-invalid @enderror" name="item_name" value="{{ old('item_name') }}" required autocomplete="item_name" autofocus>

                                @error('item_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="item_price" class="col-md-4 col-form-label text-md-right">{{ __('Item Price') }}</label>

                            <div class="col-md-6">
                                <input id="item_price" type="number" class="form-control @error('item_price') is-invalid @enderror" name="item_price" value="{{ old('item_price') }}" required autocomplete="item_price" step="0.01">

                                @error('item_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       <div class="form-group row">
                            <label for="category_id " class="col-md-4 col-form-label text-md-right">{{ __('Item Category') }}</label>

                            <div class="col-md-6 select2-purple">
                                   <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" name="category_id" required style="width: 100%">
                                       @foreach($catagories as $category)
                                           <option value="{{$category->id}}"> {{$category->category_name }} </option>
                                        @endforeach
                                    </select>        
                                  </div>
                                </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"  autocomplete="description" placeholder="Enter the description of item"></textarea> 
                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="item_image" class="col-md-4 col-form-label text-md-right">{{ __('Attach Item Image') }}</label>

                            <div class="col-md-6">
                                <input type="file" name="item_image" id="item_image" class="form-control-file" required>  

                                 @error('item_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary m-2">
                                    {{ __('Submit') }}
                                </button>
                                 <button type="reset" class="btn btn-primary">
                                    {{ __('Reset') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered data-table" width="100%">
                            <thead>
                                <tr>
                                <th>Item Name</th>
                                <th>Price</th>
                                <th>Category</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach($products as $product)
                                    <td> {{ $product['item_name'] }}</td>
                                    <td> {{ $product['item_price'] }}</td>
                                    <td> {{ $product['item_category'] }}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection