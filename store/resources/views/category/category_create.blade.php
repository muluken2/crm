@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-success card-outline">
                <div class="card-header">{{ __('Category Registration') }}</div>

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <div class="card-body">

           <div class="row">
               <div class="col-md-6">
                   <form method="POST" action="{{ route('category') }}">
                        @csrf
                    <div class="form-group row">
                            <label for="category_name" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

                            <div class="col-md-6">
                                <input id="category_name" type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" value="{{ old('category_name') }}" required autocomplete="category_name" autofocus>

                                @error('category_name')
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
                   <table class="table">
                       <thead>
                           <tr>
                               <th>#</th>
                               <th>Category Name</th>
                           </tr>
                       </thead>
                       <tbody>
                        <?php $i = 1; ?>
                        @foreach($categories as $category)
                            <tr>
                                <td> {{$i}}</td>
                               <td>{{$category['category_name']}}</td>
                           </tr>
                           <?php $i += 1; ?>
                        @endforeach
                           
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