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
                                <li class="breadcrumb-item active">Tag Table</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-lg-12">
                        @include('validate')
                        <a class="btn btn-sm btn-primary" data-toggle="modal" href="#tag_modal_show">Add new Tag</a>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Tags</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tag Name</th>
                                            <th>Tag</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($tag_data as $data)

                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->slug }}</td>
                                            <td>{{ date('d F,Y',strtotime($data->created_at)) }}</td>
                                            <td>
                                                @if($data->status==true)
                                                    <div id="active" active="{{ $data->id }}" class="status-toggle">
                                                        <input  type="checkbox" id="status_{{ $loop->index+1 }}" class="check" >
                                                        <label for="status_{{ $loop->index+1 }}" class="checktoggle">checkbox</label>
                                                    </div>
                                                @elseif($data->status==false)

                                                    <div id="inactive" inactive="{{ $data->id }}" class="status-toggle">
                                                        <input  type="checkbox" id="status_{{ $loop->index+1 }}" checked class="check">
                                                        <label for="status_{{ $loop->index+1 }}" class="checktoggle">checkbox</label>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info" href="#">View</a>
                                                <a class="btn btn-sm btn-warning" href="#">Edit</a>
                                                <a class="btn btn-sm btn-danger" href="#">Delete</a>
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


    <div id="tag_modal_show" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form  action="{{ route('tag.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input name="name" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <input value="Add" class="btn btn-sm btn-info" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
