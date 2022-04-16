@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-success card-outline">
                    <div class="card-header text-sm-right">
                        <a class="btn btn-success" href="{{route('add_user')}}" id="createNewProduct"> Create New</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- /.card-header -->
                    <div class="card-body">
                          <table class="table table-bordered data-table" id="example1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($users as $user)
                                 <tr>
                                    <td>{{$i}}</td>
                                    <td>
                                        {{$user['name']}}
                                    </td>
                                    <td>{{$user['email']}}</td>
                                    <td>{{$user['role_name']}}</td>
                                    <td>
                                        <a href="{{route('edit_user', ['id'=>$user['id']])}}" class="btn btn-success m-1">Edit</a> 
                                        <a href="{{route('delete_user', ['id'=>$user['id']])}}" class="btn btn-danger">Delete</a>
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

