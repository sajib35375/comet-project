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
                                <a class="badge badge-success" href="{{ route('post.index') }}">published{{ ($published==0) ? '': $published}}</a>
                                <a class="badge badge-danger" href="{{ route('post.trash') }}">trash{{ ($trash==0) ? '': $trash}}</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Post Title</th>
                                            <th>Author</th>
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
                                            <td>{{ $data->user->name }}</td>
                                            <td>{{ $featured->post_type }}</td>
                                            <td>
                                                <ul>
                                                    @foreach($data->category as $cat)
                                                    <li>{{ $cat->name }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                <ul>
                                                @foreach($data->tag as $tag)
                                                    <li>{{ $tag->name }}</li>
                                                @endforeach
                                                </ul>
                                            </td>
                                            <td>{{ $data->status }}</td>
                                            <td>
{{--                                                <a class="btn btn-sm btn-info" href="#">View</a>--}}
                                                <a class="btn btn-sm btn-warning" id="post_edit_btn" edit_id={{ $data->id }}  href="#"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-sm btn-danger" href="{{ route('post.trash.update',$data->id) }}"><i class="fa fa-trash"></i></a>
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

{{--post edit modal--}}
    <div id="post_edit_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>All Post control panel</h2>
                </div>
                <div class="modal-body">
                    <form id="edit_form_id" action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Title</label>
                            <input name="title" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <img style="width: 400px;" id="image_id" src="" alt="">
                            <label for="">Featured for Image</label>
                            <input name="featured-image" class="form-control-file" type="file">
                        </div>
                        <div class="form-group">
                            <div class="gallery">
                                <img src="" alt="">
                            </div>
                            <label for="">Featured for Gallery</label>
                            <input name="featured-gallery" class="form-control-file" type="file" multiple>
                        </div>
                        <div class="form-group">
                            <label for="">Content</label>
                            <textarea name="content" ></textarea>
                        </div>
                        <div class="form-group">
                            <input value="update" class="btn btn-info btn-sm" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
