@extends('layouts.app')

@section('content')
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

@if(Auth::user()->hasRole('Admin'))
   <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3> {{$user}} </h3>
                <p>User</p>
              </div>
              <div class="icon">                
                <i class="fa fa-user"></i>
              </div>
              <a href="{{ url('/user') }}" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$role}}</h3>
                <p>Role</p>
              </div>
              <div class="icon">
                <i class="fa fa-road"></i>
              </div>
               <a href="{{ url('/add_role') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$category}}</h3>

                <p>Category </p>
              </div>
              <div class="icon">
                <i class="fa fa-clone"></i>
              </div>
              <a href="{{ url('/category') }}" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{$store}}</h3>

                <p> Stored Item </p>
              </div>
              <div class="icon">
                <i class="fa fa-road"></i>
              </div>
              <a href="{{ url('/store_item') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
@endif 

          
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$store}}</h3>

                <p>Buy Item</p>
              </div>
              <div class="icon">
                <i class="fa fa-credit-card-alt"></i>
              </div>
              <a href="{{ url('/') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h3>{{$store}}</h3>

                <p>Sell Item</p>
              </div>
              <div class="icon">
                <i class="fa fa-cutlery"></i>
              </div>
               <a href="{{ url('/store') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
</div>
</div>
</section>
@endsection