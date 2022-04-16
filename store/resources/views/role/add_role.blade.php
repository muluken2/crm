@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-success card-outline">
                <div class="card-header">{{ __('User Role') }}</div>

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <div class="card-body">

           <div class="row">
               <div class="col-md-6">
                   <form method="POST" action="{{ route('role') }}">
                        @csrf
                    <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Role Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Role Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required> </textarea>  

                                @error('description')
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
                               <th>Role Name</th>
                               <th>Description</th>
                           </tr>
                       </thead>
                       <tbody>
                        <?php $i = 1; ?>
                        @foreach($roles as $role)
                            <tr>
                                <td> {{$i}}</td>
                               <td>{{$role['name']}}</td>
                               <td>{{ $role['description']}}</td>
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