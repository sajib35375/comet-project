@extends('admin.layouts.app')


@section('content')

    <div class="main-wrapper">

        <!-- Header -->
    @include('admin.layouts.header')
    @include('admin.layouts.menu')


    <!-- Page Wrapper -->
        <div class="page-wrapper">

            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Welcome {{ Auth::user()->name }}!</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Post Table</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-lg-12">
                        @include('validate')
                        <a class="btn btn-sm btn-primary" href="{{ route('post.create') }}">Add new post</a>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Post Table</h4>
                                <a class="badge badge-success" href="{{ route('post.index') }}">published{{ ($published==0) ? '': $published }}</a>
                                <a class="badge badge-danger" href="{{ route('post.trash') }}">trash{{ ($trash==0) ? '' : $trash }}</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Post Title</th>
                                            <th>Post Type</th>
                                            <th>Post Category</th>
                                            <th>Post Tag</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($all_data as $data)
                                            @php
                                                $featured=json_decode($data->featured);
                                            @endphp
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $data->title }}</td>
                                                <td>{{ $featured->post_type }}</td>
                                                <td>{{ $featured->post_type }}</td>
                                                <td>{{ $featured->post_type }}</td>
                                                <td>{{ $data->status }}</td>
                                            <td>
{{--                                                <a class="btn btn-sm btn-info" href="#">View</a>--}}
                                                <a class="btn btn-sm btn-warning" href="{{ route('post.trash.update',$data->id) }}">Data Recover</a>
                                                <a class="btn btn-sm btn-danger" href="{{ route('post.trash.delete',$data->id) }}">Permanently Delete</a>
                                            </td>
                                        </tr>
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
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->



@endsection
