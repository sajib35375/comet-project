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
                                <li class="breadcrumb-item active">Category Table</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-lg-12">
                        @include('validate')
                        <div class="msg"></div>
                        <a class="btn btn-sm btn-primary" data-toggle="modal" href="#modal_show_btn">Add new category</a>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Categories</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category Name</th>
                                            <th>Category Slug</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>


                                        @foreach($data as $cat)


                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $cat->name }}</td>
                                            <td>{{ $cat->slug }}</td>
                                            <td>
                                                @if($cat->status==true)
                                                    <div id="status_active" active_id='{{ $cat->id }}' class="status-toggle">
                                                        <input type="checkbox" id="status_{{ $loop->index+1 }}" class="check" >
                                                        <label for="status_{{ $loop->index+1 }}" class="checktoggle">checkbox</label>
                                                    </div>
                                                @elseif($cat->status==false)
                                                    <div id="status_inactive" inactive_id='{{ $cat->id }}' class="status-toggle">
                                                        <input type="checkbox" id="status_{{ $loop->index+1 }}" class="check" checked >
                                                        <label for="status_{{ $loop->index+1 }}" class="checktoggle">checkbox</label>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info" href="#">View</a>
                                                <a id="edit_btn" edit_id="{{ $cat->id }}" class="btn btn-sm btn-warning" href="#">Edit</a>
                                                <a class="btn btn-sm btn-danger" href="{{ route('category.delete',$cat->id) }}">Delete</a>
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


    <div id="modal_show_btn" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="{{ route('category.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input name="name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <input value="Add"  type="submit" class="btn btn-sm btn-info">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


{{--Edit category modal--}}

    <div id="edit_cat_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="update_form" method="POST" action="{{ route('category.update') }}">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input name="name" type="text" class="form-control">
                            <input name="update_id" type="hidden">
                        </div>
                        <div class="form-group">
                            <input value="update"  type="submit" class="btn btn-sm btn-info">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
