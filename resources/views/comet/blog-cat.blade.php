@extends('comet.layouts.app')


@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-posts">

                        @foreach($all_data as $post)
                            @php
                                $featured = json_decode($post->featured);
                            @endphp
                            @if($featured->post_type=='Gallery')
                                <article class="post-single">
                                    <div class="post-info">
                                        <h2><a href="#">{{ $post->title }}</a></h2>
                                        <h6 class="upper"><span>By</span><a href="#"> Admin</a><span class="dot"></span><span>{{ date('d M,Y',strtotime($post->created_at)) }}</span><span class="dot"></span><a href="#" class="post-tag">Startups</a></h6>
                                    </div>
                                    <div class="post-media">
                                        <div data-options="{&quot;animation&quot;: &quot;slide&quot;, &quot;controlNav&quot;: true" class="flexslider nav-outside">
                                            <ul class="slides">
                                                @foreach($featured->post_gallery as $gal)
                                                <li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
                                                    <img src="{{ URL::to('') }}/admin/assets/img/{{ $gal }}" alt="" draggable="false">
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="post-body">
                                        {!! Str::of(htmlspecialchars_decode($post->content))->words(10) !!}
                                        <p><a href="#" class="btn btn-color btn-sm">Read More</a>
                                        </p>
                                    </div>
                                </article>
                            @endif
                            @if($featured->post_type=='Image')
                                <article class="post-single">
                                    <div class="post-info">
                                        <h2><a href="#">{{ $post->title }}</a></h2>
                                        <h6 class="upper"><span>By</span><a href="#"> Admin</a><span class="dot"></span><span>{{ date('d M,Y',strtotime($post->created_at)) }}</span><span class="dot"></span><a href="#" class="post-tag">Startups</a></h6>
                                    </div>
                                    <div class="post-media">
                                        <a href="#">
                                            <img src="{{ URL::to('') }}/admin/assets/img/{{ $featured->post_image }}" alt="">
                                        </a>
                                    </div>
                                    <div class="post-body">
                                        {!! Str::of(htmlspecialchars_decode($post->content))->words(50) !!}
                                        <p><a href="#" class="btn btn-color btn-sm">Read More</a>
                                        </p>
                                    </div>
                                </article>
                                @endif


                            @if($featured->post_type=='Video')
                            <article class="post-single">
                                <div class="post-info">
                                    <h2><a href="#">{{ $post->title }}</a></h2>
                                    <h6 class="upper"><span>By</span><a href="#"> Admin</a><span class="dot"></span><span>{{ date('d M,Y',strtotime($post->created_at)) }}</span><span class="dot"></span><a href="#" class="post-tag">Entrepreneurship</a></h6>
                                </div>
                                <div class="post-media">
                                    <div class="media-video">
                                        <iframe src="{{ $featured->post_video }}" frameborder="0"></iframe>
                                    </div>
                                </div>
                                <div class="post-body">
                                    {!! Str::of(htmlspecialchars_decode($post->content))->words(40) !!}
                                    <p><a href="#" class="btn btn-color btn-sm">Read More</a>
                                    </p>
                                </div>
                            </article>
                            @endif

                    @endforeach



                        <!-- end of article-->
                    </div>

                    <!-- end of pagination-->
                </div>
                @include('comet.layouts.parcial.sidebar')



            </div>
            <!-- end of row-->
        </div>
        <!-- end of container-->
    </section>


@endsection
