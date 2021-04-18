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
                            <h3 class="page-title">Welcome !</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Post Table</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <div class="row">
                    <div class="col-xl-12 d-flex">
                        @include('validate')
                        <div class="card flex-fill">
                            <div class="card-header">
                                <h4 class="card-title">Post Form</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Post Format</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" name="post_type" id="post_format">
                                                <option value="">-Select-</option>
                                                <option value="Image">Image</option>
                                                <option value="Gallery">Gallery</option>
                                                <option value="Video">Video</option>
                                                <option value="Audio">Audio</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Post Title</label>
                                        <div class="col-lg-9">
                                            <input name="title" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3">Post Category</label>
                                        <div class="col-md-9">
                                            @foreach($all_cat as $cat)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="{{ $cat->id }}" name="category[]"> {{ $cat->name }}
                                                </label>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Tags</label>
                                        <div class="col-lg-9">
                                            <select style="width: 100%;" class="select-cls" name="select[]" id="" multiple="multiple">
                                                @foreach($all_tag as $tag)
                                                <option  value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="image">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Image</label>
                                            <div class="col-lg-9">
                                                <img style="width: 400px;" id="image" src="" alt=""><br>
                                                <label for="camera_icon"><img style="width: 100px;cursor: pointer;" src="{{ URL::to('admin/assets/img/download.png') }}" alt=""></label>
                                                <input name="image" style="display: none;" id="camera_icon" type="file" class="form-control-file">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="gallery">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Gallery</label>
                                            <div class="col-lg-9">
                                                <div class="image-gallery"></div>
                                                <label for="camera_icon_g"><img style="width: 100px;cursor: pointer;" src="{{ URL::to('admin/assets/img/download.png') }}" alt=""></label>
                                                <input name="gallery[]" multiple style="display: none;" id="camera_icon_g" type="file" class="form-control-file">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="video">

                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Post Video</label>
                                            <div class="col-lg-9">
                                                <input name="video" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="audio">

                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Post Audio</label>
                                            <div class="col-lg-9">
                                                <input name="audio" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Content</label>
                                        <div class="col-lg-9">
                                            <textarea name="content" id="editor"></textarea>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
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
