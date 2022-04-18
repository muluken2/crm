@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-success card-outline">
                    <div class="card-header text-sm-right">
                        <a class="btn btn-success" href="{{route('store')}}" id="createNewProduct"> Create New</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- /.card-header -->
                    <div class="card-body">
                          <table class="table table-bordered data-table" id="example1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Item Name</th>
                                    <th>Item Price</th>
                                    <th>Category</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($products as $product)
                                 <tr>
                                    <td>{{$i}}</td>
                                    <td>
                                        {{$product['item_name']}}
                                    </td>
                                    <td>{{$product['item_price']}}</td>
                                    <td>{{$product['item_category']}}</td>
                                    <td>
                                        @if($product['status'])
                                        <a href="{{route('store_deactive', ['id'=>$product['id']])}}" class="btn btn-info m-1" id="deactivate_{{$product['id']}}">Deactivate</a> 
                                        @else
                                          <a href="{{route('store_activate', ['id'=>$product['id']])}}" class="btn btn-success m-1" id="activate_{{$product['id']}}">Activate</a> 
                                        @endif

                                        <a href="{{route('store_delete', ['id'=>$product['id']])}}" class="btn btn-danger" id="delete_{{$product['id']}}">Delete</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                @endforeach                               
                            </tbody>
                            <tbody>                             
                            </tbody>
                        </table>                      
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection

